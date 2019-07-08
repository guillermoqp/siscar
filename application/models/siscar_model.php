<?php Class Siscar_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
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
    public function getById($id) {
        $this->db->from('usuario');
        $this->db->select('usuario.*, permiso.nombre as permiso');
        $this->db->join('permiso', 'permiso.id_permiso = usuario.fk_permiso', 'left');
        $this->db->where('id_usuario', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }
    public function modificarPassword($password,$antiguoPassword,$id) {
        $this->db->where("id_usuario",$id);
        $this->db->limit(1);
        $usuario=$this->db->get("usuario")->row();
        $antiguoPassword=$this->encrypt->sha1($antiguoPassword);
        if ($usuario->password!=$antiguoPassword) {
            return false;
        } else {
            $this->db->set("password",$this->encrypt->sha1($password));
            $this->db->where("id_usuario",$id);
            return $this->db->update("usuario");
        }
    }
    public function add($table, $data) {
        $this->db->insert($table,$data);
        if ($this->db->affected_rows()=='1') {
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
    public function update_user($sha1,$email,$id_usuario) {
        $query = $this->db->query('UPDATE usuario SET password = ?, fecha = ? , fsw = NULL, fchRgFsw = NULL WHERE email = ? AND id_usuario = ?'
                , array($sha1, date("Y-m-d"), $email, $id_usuario));
        return $query;
    }
    public function does_email_exist($email) {
        $this->db->where('email', $email);
        $this->db->from('usuario');
        $num_res = $this->db->count_all_results();
        if ($num_res == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function does_code_match($code,$email) {
        $this->db->where("email",$email);
        $this->db->where("fsw",$code);
        $this->db->from("usuario");
        $num_res=$this->db->count_all_results();
        if ($num_res == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function get_all_by_code_match($code) {
        $this->db->where("fsw",$code);
        $this->db->from("usuario");
        $query=$this->db->get("");
        $num_res = $this->db->count_all_results();
        if ($num_res == 1) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
}