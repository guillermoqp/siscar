<?php Class Permisos_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_all_permisos() {
        $query = $this->db->query("CALL get_all_permisos()");
        $permisos = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $permisos;
    }
    public function get_one_permiso($id_permiso) {
        $query = $this->db->query("CALL get_one_permiso('{$id_permiso}')");
        $permiso = $query->row_array();
        $query->next_result(); 
        $query->free_result(); 
        return $permiso;
    }
    public function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $array = 'array') {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('id_permiso', 'desc');
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result = !$one ? $query->result() : $query->row();
        return $result;
    }
    public function getActive($table, $fields) {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where('estado', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function getById($id) {
        $this->db->where('id_permiso', $id);
        $this->db->limit(1);
        return $this->db->get('permiso')->row();
    }
    public function add($table, $data) {
        $this->db->insert($table, $data);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }
        return FALSE;
    }
    public function edit($table, $data, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);
        if ($this->db->affected_rows() >= 0) {
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
}