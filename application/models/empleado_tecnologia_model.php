<?php Class Empleado_Tecnologia_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_one_empleado_tecnologia($idEmpleado) {
        $query = $this->db->query('', array($idEmpleado));
        return $query->row_array();
    }
    public function getById($id){
        $this->db->where('fk_empleado',$id); 
        $this->db->order_by('id_empleado_tecnologia','asc');
        $this->db->limit(1); 
        return $this->db->get('empleado_tecnologia')->result();
    }
    public function getHistory($id){
        $query = $this->db->query("CALL getHistory_empleado_tecnologia('{$id}')");
        $getHistory = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $getHistory;
    }
    public function insert_empleado_tecnologia($id_empleado, $id_tecnologia, $nivel , $anios ,  $flag_principal , $comentario , $estado ) {
        $this->db->trans_start();
        $query = $this->db->query('INSERT INTO empleado_tecnologia (nivel , anios , flag_principal , fecha , descripcion , estado , fk_empleado , fk_tecnologia ) VALUES (?,?,?,?,?,?,?,?)', 
                array( $nivel ,$anios, $flag_principal , date('Y-m-d'), $comentario, $estado ,$id_empleado,$id_tecnologia));
        $id_empleado_tecnologia = $this->db->insert_id();
        $this->db->trans_complete();
        return $id_empleado_tecnologia;
    }
}