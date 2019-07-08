<?php Class Tecnologia_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_all_tecnologias() {
        $query = $this->db->query("CALL get_all_tecnologias()");
        $tecnologias = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $tecnologias;
    }
    public function getAllData($start, $limit, $sidx, $sord, $where) {
        $this->db->select('id_tecnologia,nombre,grupo');
        $this->db->limit($limit);
        if ($where != NULL){    
            $this->db->where($where, NULL, FALSE);
        }
        else{
            $this->db->where('eliminado !=', "1");
        }
        $this->db->order_by($sidx, $sord);
        $query = $this->db->get('tecnologia', $limit, $start);
        return $query->result();
    }
    public function insert_tecnologia($data) {
        return $this->db->insert('tecnologia', $data);
    }
    public function update_tecnologia($id, $data) {
        $this->db->where('id_tecnologia', $id);
        return $this->db->update('tecnologia', $data);
    }
    public function delete_tecnologia($id) {
        $this->db->where('id_tecnologia', $id);
        $this->db->delete('tecnologia');
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