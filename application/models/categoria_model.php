<?php Class Categoria_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_all_categorias() {
        $query = $this->db->query("CALL get_all_categorias()");
        $categorias = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $categorias;
    }
    public function getAllData($start, $limit, $sidx, $sord, $where) {
        $this->db->select('id_categoria,codigo,nombre,banda,nivel');
        $this->db->limit($limit);
        if ($where != NULL){    
            $this->db->where($where, NULL, FALSE);
        }
        else{
            $this->db->where('eliminado !=',"1");
        }
        $this->db->order_by($sidx,$sord);
        $query = $this->db->get('categoria', $limit, $start);
        return $query->result();
    }
    public function insert_categoria($data) {
        return $this->db->insert('categoria', $data);
    }
    public function update_categoria($id, $data) {
        $this->db->where('id_categoria', $id);
        return $this->db->update('categoria', $data);
    }
    public function delete_categoria($id) {
        $this->db->where('id_categoria', $id);
        $this->db->delete('categoria');
    }
    public function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array') {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = !$one ? $query->result() : $query->row();
        return $result;
    }
}