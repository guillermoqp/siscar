<?php Class Roles_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_all_roles() {
        $query = $this->db->query("CALL get_all_roles()");
        $roles = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $roles;
    }
    public function getAllData($start, $limit, $sidx, $sord, $where) {
        $this->db->select('id_rol,nombre,descripcion,fecha,estado');
        $this->db->limit($limit);
        if ($where != NULL)
        {    
            $this->db->where($where, NULL, FALSE);
        }
        else{
            $this->db->where('estado !=', "0");
        }
        $this->db->order_by($sidx, $sord);
        $query = $this->db->get('rol', $limit, $start);
        return $query->result();
    }
    public function insert_rol($data) {
        return $this->db->insert('rol', $data);
    }
    public function update_rol($id, $data) {
        $this->db->where('id_rol', $id);
        return $this->db->update('rol', $data);
    }
    public function delete_rol($id) {
        $this->db->where('id_rol', $id);
        $this->db->delete('rol');
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