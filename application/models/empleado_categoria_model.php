<?php Class Empleado_Categoria_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_one_empleado_categoria($idEmpleado) {
        $query = $this->db->query("CALL get_one_empleado_categoria('{$idEmpleado}')");
        $empleado_categoria = $query->row_array();
        $query->next_result(); 
        $query->free_result(); 
        return $empleado_categoria;
    }
    public function getById($id) {
        $this->db->where('fk_empleado', $id);
        $this->db->order_by('id_empleado_categoria', 'asc');
        $this->db->limit(1);
        return $this->db->get('empleado_categoria')->result();
    }
    public function getHistory($id) {
        $query = $this->db->query("CALL getHistory_emplado_categoria('{$id}')");
        $getHistory = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $getHistory;
    }
    public function insert_empleado_categoria($id_empleado, $id_categoria_nueva, $fecha_cambio_dominio, $salario, $comentario, $estado, $evaluador ,$tipo) {
        $id_empleado_categoria = FALSE;
        $this->db->trans_start();
        $query1 = $this->db->query('UPDATE empleado SET fk_categoria = ? WHERE id_empleado = ?', array($id_categoria_nueva, $id_empleado));
        if ($query1) {
            $query = $this->db->query('INSERT INTO empleado_categoria (salario, fecha , descripcion , estado , evaluador, tipo , fk_empleado , fk_categoria ) VALUES (?,?,?,?,?,?,?,?)', array($salario, $fecha_cambio_dominio, $comentario, $estado, $evaluador ,$tipo, $id_empleado, $id_categoria_nueva));
            $id_empleado_categoria = $this->db->insert_id();
            $this->db->trans_complete();
        }
        return $id_empleado_categoria;
    }
}