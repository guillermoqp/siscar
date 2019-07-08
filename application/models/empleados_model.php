<?php Class Empleados_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model('dominio_model', '', TRUE);
    }
    public function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array') {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('id_empleado', 'desc');
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = !$one ? $query->result() : $query->row();
        return $result;
    }
    public function get_all_empleado_data() {
        $query = $this->db->query('CALL get_all_empleado_data()');
        $empleados = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $empleados;
    }
    public function get_all_empleado() {
        $query = $this->db->query('CALL get_all_empleado_2()');
        //$query = $this->db->query('CALL get_all_empleado()');
        $empleados = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $empleados;
    }
    public function get_all_empleado_filtro($id_cliente,$id_dominio,$id_categoria,$fecha_ingreso,$fecha_salida,$estado) {
        $where = "WHERE ";
        if ($id_cliente != '') {
            $where .= "dominio.fk_cliente = " . $id_cliente . " AND ";
        }
        if ($id_dominio != '') {
            $where .= "dominio.id_dominio = " . $id_dominio . " AND ";
        }
        if ($id_categoria != '') {
            $where .= "categoria.id_categoria = " . $id_categoria . " AND ";
        }
        if ($fecha_ingreso != '') {
            $where .= "empleado.fecha_ingreso = '" . $fecha_ingreso . "' AND ";
        }
        if ($fecha_salida != '') {
            $where .= "empleado.fecha_salida = '" . $fecha_salida . "' AND ";
        }
        if ($estado != '') {
            $where .= "empleado.estado = " . $estado;
        }
        $consulta = 'SELECT empleado.*,dominio.nombre as nombredominio,categoria.codigo as nombrecategoria FROM empleado
        JOIN (SELECT t1.*
        FROM empleado_dominio  t1
        WHERE t1.fecha = (SELECT MAX(t2.fecha)
                         FROM empleado_dominio t2
                         WHERE t2.fk_empleado = t1.fk_empleado))temp_dom ON (temp_dom.fk_empleado = empleado.id_empleado)
        JOIN dominio ON dominio.id_dominio = temp_dom.fk_dominio
        JOIN (SELECT t1.*
        FROM empleado_categoria  t1
        WHERE t1.fecha = (SELECT MAX(t2.fecha)
                         FROM empleado_categoria t2
                         WHERE t2.fk_empleado = t1.fk_empleado))temp_cat ON (temp_cat.fk_empleado = empleado.id_empleado)
        JOIN categoria ON categoria.id_categoria = temp_cat.fk_categoria ';
        $consulta_Final = $consulta . $where . ' ORDER BY empleado.apellidos ASC;';
        //print_r($consulta_Final);
        $query = $this->db->query($consulta_Final, array());
        $empleados = $query->result_array();
        return $empleados;
    }
    public function get_all_empleado_filtro_fechas($fecha_consulta) {
        $query = $this->db->query("CALL get_all_empleado_filtro_fechas('{$fecha_consulta}')");
        $empleados = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $empleados;
    }
    public function get_one_empleado_edad($id_empleado) {
        $query = $this->db->query("CALL get_one_empleado_edad('{$id_empleado}')");
        $empleado = $query->row_array();
        $query->next_result(); 
        $query->free_result(); 
        return $empleado;
    }
    public function getById($id) {
        $this->db->where('id_empleado', $id);
        $this->db->limit(1);
        return $this->db->get('empleado')->row();
    }
    public function add($table, $data) {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            $id_empleado = $this->db->insert_id();
            $operacion = "INSERT";
            $query = $this->movimiento_empleado($id_empleado, $operacion);
            if ($query) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        return FALSE;
    }
    public function edit($table, $data, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() >= 0) {
            $operacion = "UPDATE";
              $query = $this->movimiento_empleado($ID, $operacion);
              if ($query) {
              return TRUE;
              } else {
              return FALSE;
              }
            return TRUE;
        }
        return FALSE;
    }
    public function delete($table, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }
    public function count($table) {
        return $this->db->count_all($table);
    }
    public function movimiento_empleado($id_empleado, $operacion) {
        $this->db->trans_start();
        $fecha = date("Y-m-d H:i:s");
        $success = $this->db->query("CALL movimiento_empleado('$operacion','$fecha','1','$id_empleado',@id_salida);");
        $success->next_result();
        $success->free_result();
        $query = $this->db->query('SELECT @id_salida as id_salida');
        $id_salida = $query->row_array();
        $id_movimiento_empleado = $id_salida["id_salida"];
        $this->db->trans_complete();
        return $id_movimiento_empleado;
    }
    public function delete_empleado($id_empleado) {
        $this->db->trans_start();
        $operacion = "DELETE";
        $query = $this->movimiento_empleado($id_empleado, $operacion);
        $query2 = $this->db->query('UPDATE empleado SET estado = ?, fecha_salida = ?, fchAc = ? WHERE id_empleado = ?', 
                array("0", date("Y-m-d"), date("Y-m-d H:i:s"), $id_empleado));
        if ($query2) {
            $this->db->trans_complete();
            return $query2;
        } else {
            return FALSE;
        }
    }
    /*  Empleado : AYUDA DE AUTOCOMPLETADO DE Empleados */
    public function autoCompleteEmpleado($parametro) {
        $query = $this->db->query("CALL autoCompleteEmpleado('{$parametro}')");
        $empleados = array();
        if ($query->num_rows >= 0) {
            foreach ($query->result_array() as $row) {
                $empleados[] = array('label' => $row['id_empleado'] . " - " . $row['nombres'] . " " . $row['apellidos'], 'id_empleado' => $row['id_empleado']);
            }
            $query->next_result(); 
            $query->free_result(); 
        }
        return $empleados;
    }
    public function get_all_empleado_por_dominio($id_dominio) {
        $query = $this->db->query("CALL get_all_empleado_por_dominio('{$id_dominio}')");
        $empleados = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $empleados;
    }
    /* REPORTE DE AGRUPADOS POR CLIENTE-DOMINIO - ORDEN CATEGORIA : NIVEL */
    public function get_all_data_dominios() {
        $dominios = $this->dominio_model->get_all_dominios();
        foreach ($dominios as $key => $dominio) {
            $dominios[$key]['empleados'] = $this->get_all_empleado_por_dominio($dominio["id_dominio"]);
        }
        return $dominios;
    }
    /* REPORTE DE PANEL */
    public function get_nro_empleados_por_dominio() {
        $query = $this->db->query("CALL get_nro_empleados_por_dominio()");
        $empleados = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        $total = array('total' => array_sum(array_column($empleados, 'nro_empleados')));
        array_push($empleados, $total);
        return $empleados;
    }
    /*  CARGAR LISTA DE CUMPLEAÑOS POR AJAX/JSON   */
    public function get_all_cumpleanios_data($start,$end) {
        $query = $this->db->query("CALL get_all_cumpleanios_data('{$start}', '{$end}')");
        $cumpleanios = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $cumpleanios;
    }
    /*  CARGAR LISTA DE CUMPLEAÑOS POR AJAX/JSON, POR FECHA   */
    public function get_all_cumpleanios_fecha($fecha) {
        $query = $this->db->query("CALL get_all_cumpleanios_fecha('{$fecha}')");
        $cumpleanios = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $cumpleanios;
    }
}