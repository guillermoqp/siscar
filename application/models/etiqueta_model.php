<?php Class Etiqueta_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_all_etiquetas() {
        $query = $this->db->query("CALL get_all_etiquetas()");
        $etiquetas = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $etiquetas;
    }
    public function get_one_etiqueta($id_etiqueta) {
        $id_etiqueta = intval($id_etiqueta);
        $query = $this->db->query("CALL get_one_etiqueta('{$id_etiqueta}')");
        $etiqueta = $query->row_array();
        $query->next_result(); 
        $query->free_result(); 
        return $etiqueta;
    }
    public function getAllData($start, $limit, $sidx, $sord, $where) {
        $this->db->select('id_etiqueta,nombre,descripcion');
        $this->db->limit($limit);
        if ($where != NULL){    
            $this->db->where($where, NULL, FALSE);
        }
        else{
            $this->db->where('eliminado !=', "1");
        }
        $this->db->order_by($sidx, $sord);
        $query = $this->db->get('etiqueta', $limit, $start);
        return $query->result();
    }
    public function insert_etiqueta($data) {
        return $this->db->insert('etiqueta', $data);
    }
    public function update_etiqueta($id, $data) {
        $this->db->where('id_etiqueta', $id);
        return $this->db->update('etiqueta', $data);
    }
    public function delete_etiqueta($id) {
        $this->db->where('id_etiqueta', $id);
        $this->db->delete('etiqueta');
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
    /****** OBTENER NOMBRES DE ETIQUETAS    ******/
    public function get_nombres_etiquestas($ids_etiquetas){
        $nombres_etiquetas = "";
        $idsEtiquetas = explode(",",$ids_etiquetas);
        foreach ($idsEtiquetas as $id_etiqueta) {
            $etiqueta = $this->get_one_etiqueta($id_etiqueta);
            $nombres_etiquetas .= '<span class="label label-success"><i class="fa fa-tags"></i> '.$etiqueta["nombre"].'</span> ';
        }
        return $nombres_etiquetas;  
    }
}
