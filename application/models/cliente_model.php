<?php Class Cliente_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_all_clientes() { 
        $query = $this->db->query("CALL get_all_clientes()");
        $categorias = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $categorias;
    }
    public function getAllData($start, $limit, $sidx, $sord, $where) {
        $this->db->select('id_cliente,nombre,fecha,estado,descripcion');
        $this->db->limit($limit);
        if ($where != NULL){    
            $this->db->where($where, NULL, FALSE);
        }
        else{
            $this->db->where('eliminado !=', "1");
        }
        $this->db->order_by($sidx, $sord);
        $query = $this->db->get('cliente', $limit, $start);
        return $query->result();
    }
    public function insert_cliente($data) {
        return $this->db->insert('cliente', $data);
    }
    public function update_cliente($id, $data) {
        $this->db->where('id_cliente', $id);
        return $this->db->update('cliente', $data);
    }
    public function delete_cliente($id) {
        $this->db->where('id_cliente', $id);
        $this->db->delete('cliente');
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