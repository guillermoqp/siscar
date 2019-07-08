<?php Class Administrarpermisos{
    var $permisos = array();
    var $tabla = 'permiso';
    var $pk = 'id_permiso';
    var $select = 'permisos';
    public function  __construct() {
        $this->CI=&get_instance();
        $this->CI->load->database();
    }
    public function verificarPermiso($idPermiso = null,$opcion = null){
        if($idPermiso==null||$opcion == null){
            return false;
        }
        if($this->permisos==null){
            if(!$this->cargarPermisos($idPermiso)){
                return false;
            }
        }
        if(is_array($this->permisos[0])){
            if(array_key_exists($opcion, $this->permisos[0])){
                if ($this->permisos[0][$opcion] == 1) {
                    return true;
                } 
                return false;
            }
            return false;
        }
        return false;
    }
    private function cargarPermisos($id = null){
        if($id != null){
            $this->CI->db->select($this->tabla.'.'.$this->select);
            $this->CI->db->where($this->pk,$id);
            $this->CI->db->limit(1);
            $array = $this->CI->db->get($this->tabla)->row_array();
            if(count($array) > 0){
                $array = unserialize($array[$this->select]);
                $this->permisos = array($array);
                return true;
            }
            return false;
        }
        return false;
    }
}