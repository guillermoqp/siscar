<?php Class Usuarios_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model('dominio_model', '', TRUE); 
    }
    public function get_all_usuarios() {
        $query = $this->db->query("CALL get_all_usuarios()");
        $usuarios = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $usuarios;
    }
    public function get_one_usuario_empleado($codigo) {
        $query = $this->db->query("CALL get_one_usuario_empleado('{$codigo}')");
        $empleado = $query->row_array();
        $query->next_result(); 
        $query->free_result(); 
        return $empleado;
    }
    public function get_one_usuario_permiso($usuario,$password) {
        $query = $this->db->query("CALL get_one_usuario_permiso('{$usuario}','{$password}');");
        $usuario = $query->row_array();
        $query->next_result(); 
        $query->free_result(); 
        return $usuario;
    }
    public function get($perpage = 0, $start = 0, $one = false) {
        $this->db->from('usuario');
        $this->db->select('usuario.*, permiso.nombre as permiso');
        $this->db->limit($perpage, $start);
        $this->db->join('permiso', 'usuario.fk_permiso = permiso.id_permiso', 'left');
        $query = $this->db->get();
        $result = !$one ? $query->result() : $query->row();
        return $result;
    }
    public function getById($id) {
        $this->db->where('id_usuario', $id);
        $this->db->limit(1);
        return $this->db->get('usuario')->row();
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
        if ($this->db->affected_rows()=='1') {
            return TRUE;
        }
        return FALSE;
    }
    public function count($table) {
        return $this->db->count_all($table);
    }
    /*  Obtiene datos(mail,nombres) los Usuarios que son Lideres */
    public function get_all_usuarios_lideres() {
        $query = $this->db->query("CALL get_all_usuarios_lideres();");
        $usuarios_lideres = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        foreach ($usuarios_lideres as $usuario_lider) {
            $usuario_lider["lider_nombres_dominios"] = $this->dominio_model->get_nombres_dominios($usuario_lider["dominios"]);
        }
        return $usuarios_lideres;
    }    
    /*  Usuario : AYUDA DE AUTOCOMPLETADO DE Usuarios */
    public function autoCompleteUsuario($parametro) {
        $query=$this->db->query("CALL autoCompleteUsuario('{$parametro}')");
        $usuarios=array();
        if ($query->num_rows>=0) {
            foreach ($query->result_array() as $row) {
                $usuarios[] = array("label"=>$row["username"],"usuarioSET"=>$row["username"]);
            }
            $query->next_result(); 
            $query->free_result(); 
        }
        return $usuarios;
    }
}