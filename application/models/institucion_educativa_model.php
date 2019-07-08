<?php Class Institucion_educativa_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_all_instituciones() {
        $query = $this->db->query("CALL get_all_instituciones()");
        $instituciones = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $instituciones;
    }
    public function getAllData($start, $limit, $sidx, $sord, $where) {
        $this->db->select('id_institucion_educativa,nombre,descripcion,estado,fecha');
        $this->db->limit($limit);
        if ($where != NULL)
        {    
            $this->db->where($where, NULL, FALSE);
        }
        else{
            $this->db->where('estado !=', "0");
        }
        $this->db->order_by($sidx, $sord);
        $query = $this->db->get('institucion_educativa', $limit, $start);
        return $query->result();
    }
    public function insert_institucion_educativa($data) {
        return $this->db->insert('institucion_educativa', $data);
    }
    public function update_institucion_educativa($id, $data) {
        $this->db->where('id_institucion_educativa', $id);
        return $this->db->update('institucion_educativa', $data);
    }
    public function delete_tecnologia($id) {
        $this->db->where('id_institucion_educativa', $id);
        $this->db->delete('institucion_educativa');
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
