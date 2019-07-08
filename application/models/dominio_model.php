<?php Class Dominio_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_one_dominio($id_dominio) {
        $id_dominio = intval($id_dominio);
        $query = $this->db->query("CALL get_one_dominio('{$id_dominio}')");
        $dominio = $query->row_array();
        $query->next_result(); 
        $query->free_result(); 
        return $dominio;
    }
    public function get_all_dominios(){
        $query = $this->db->query("CALL get_all_dominios()");
        $categorias = $query->result_array();
        $query->next_result(); 
        $query->free_result();
        return $categorias;
    }
    public function get_nombres_dominios($ids_dominios){
        $nombres_dominios="";
        $dominios=explode(",",$ids_dominios);
        foreach($dominios as $dominio){
            $nombre_dominio=$this->get_one_dominio($dominio);
            $nombres_dominios.=$nombre_dominio["nombre"]." ,";
        }
        return $nombres_dominios;  
    }
    public function getAllData($start, $limit, $sidx, $sord, $where) {
        $this->db->select('id_dominio,nombre,fecha,estado,descripcion,fk_cliente');
        $this->db->limit($limit);
        if ($where != NULL){    
            $this->db->where($where, NULL, FALSE);
        }
        else{
            $this->db->where('eliminado !=', "1");
        }
        $this->db->order_by($sidx, $sord);
        $query = $this->db->get('dominio', $limit, $start);
        return $query->result();
    }
    public function get_all_dominios_cliente() {
        $query = $this->db->query("CALL get_all_dominios_cliente()");
        $dominios_cliente = $query->result_array();
        $query->next_result(); 
        $query->free_result();
        return $dominios_cliente;
    }
    public function get_dominio_empleados($id_dominio){
        $query = $this->db->query("CALL get_one_dominio_cliente_by_id_dominio('{$id_dominio}')");
        $dominio = $query->result_array();
        $query->next_result(); 
        $query->free_result();
        $query2 = $this->db->query("CALL get_empleados_data_by_fk_dominio('{$id_dominio}')");
        $empleados_dominio = $query2->result_array();
        $query2->next_result(); 
        $query2->free_result();
        foreach ($empleados_dominio as $key => $empleado_dominio) {
            $dominio['empleado_dominio_detalle'][$key]['id_empleado'] = $empleado_dominio["id_empleado"];
            $dominio['empleado_dominio_detalle'][$key]['fecha_ingreso'] = $empleado_dominio["fecha_ingreso"];
            $dominio['empleado_dominio_detalle'][$key]['cod_empleado'] = $empleado_dominio["cod_empleado"];
            $dominio['empleado_dominio_detalle'][$key]['nombres'] = $empleado_dominio["nombres"];
            $dominio['empleado_dominio_detalle'][$key]['apellidos'] = $empleado_dominio["apellidos"];
            $dominio['empleado_dominio_detalle'][$key]['nombrecategoria'] = $empleado_dominio["nombrecategoria"];
            $dominio['empleado_dominio_detalle'][$key]['nombrerol'] = $empleado_dominio["nombrerol"];
            $dominio['empleado_dominio_detalle'][$key]['tiempo'] = $empleado_dominio["tiempo"];
        }
        return $dominio;
    }
    public function insert_dominio($data) {
        return $this->db->insert('dominio', $data);
    }
    public function update_dominio($id, $data) {
        $this->db->where('id_dominio', $id);
        return $this->db->update('dominio', $data);
    }
    public function delete_dominio($id) {
        $this->db->where('id_dominio', $id);
        $this->db->delete('dominio');
    }
    public function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        $this->db->select($fields);
        $this->db->from($table);        
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }
}