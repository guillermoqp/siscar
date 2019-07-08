<?php Class Empleado_Dominio_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_one_empleado_dominio($idEmpleado) {
        $query = $this->db->query("CALL get_one_empleado_dominio('{$idEmpleado}')");
        $empleado_dominio = $query->row_array();
        $query->next_result(); 
        $query->free_result(); 
        return $empleado_dominio;
    }
    public function get_one_empleado_lider_dominio($idEmpleado) {
        if($idEmpleado!="")
        {
            $query=$this->db->query("CALL get_one_empleado_lider_dominio('{$idEmpleado}')");
            $empleado_lider_dominio=$query->row_array();
            $query->next_result(); 
            $query->free_result(); 
        }else{
            $empleado_lider_dominio=array();
        }
        return $empleado_lider_dominio;
    }
    public function getById($id) {
        $this->db->where('fk_empleado', $id);
        $this->db->order_by('id_empleado_dominio', 'asc');
        $this->db->limit(1);
        return $this->db->get('empleado_dominio')->result();
    }
    public function getHistory($id) {
        $query = $this->db->query("CALL getHistory_empleado_dominio('{$id}')");
        $getHistory = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $getHistory;
    }
    public function getLiderHistory($id) {
        $query = $this->db->query("CALL getLiderHistory('{$id}')");
        $historial = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        foreach ($historial as $key => $registro) {
            $historial[$key]["dominios"] = $this->dominio_model->get_nombres_dominios($registro["dominios"]);
        }
        return $historial;
    }
    public function insert_empleado_dominio($id_empleado, $id_dominio_nuevo, $fecha_cambio_dominio, $comentario, $estado) {
        $id_empleado_dominio = FALSE;
        $this->db->trans_start();
        $query1 = $this->db->query('UPDATE empleado SET fk_dominio = ? WHERE id_empleado = ?', array($id_dominio_nuevo, $id_empleado));
        if ($query1) {
            $query = $this->db->query('INSERT INTO empleado_dominio (fecha , descripcion , estado , fk_empleado , fk_dominio ) VALUES (?,?,?,?,?)', array($fecha_cambio_dominio, $comentario, $estado, $id_empleado, $id_dominio_nuevo));
            $id_empleado_dominio = $this->db->insert_id();
            $this->db->trans_complete();
        }
        return $id_empleado_dominio;
    }
    public function insert_empleado_lider_dominio($id_empleado, $dominios , $eliminado,$fecha_lider_dominio) {
        $usrId = $this->session->userdata('usuario_id');
        $ipAdd = $_SERVER['REMOTE_ADDR'] ;
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $fchAc = date("Y-m-d H:i:s");
        $id_empleado_lider_dominio = FALSE;
        $this->db->trans_start();
        $query = $this->db->query('INSERT INTO empleado_lider_dominio (dominios , eliminado , fchRg , fchAc , usrId, ipAdd, hosNm, fk_empleado ) VALUES (?,?,?,?,?,?,?,?)', 
                array($dominios, $eliminado, $fecha_lider_dominio, $fchAc, $usrId, $ipAdd, $hosNm, $id_empleado));
        $id_empleado_lider_dominio = $this->db->insert_id();
        if($query){
            $this->db->trans_complete();
        }
        return $id_empleado_lider_dominio;
    }
    public function delete_empleado_lider_dominio($id_empleado) {
        $usrId = $this->session->userdata('usuario_id');
        $ipAdd = $_SERVER['REMOTE_ADDR'] ;
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $fchRg = date("Y-m-d H:i:s");
        $fchAc = date("Y-m-d H:i:s");
        $this->db->trans_start();
        $query = $this->db->query('UPDATE empleado_lider_dominio SET eliminado = 1,fchRg = ?,fchAc = ?,usrId = ?,ipAdd = ?,hosNm = ? WHERE fk_empleado = ?', 
                array($fchRg, $fchAc, $usrId, $ipAdd, $hosNm, $id_empleado));
        if($query){
            $this->db->trans_complete();
        }
        return $query;
    }
}