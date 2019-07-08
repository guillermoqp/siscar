<?php Class Liderdominios{
    public function  __construct() {
        $this->CI=&get_instance();
    }
    public function checkPermiso($dominios=null,$id_dominio=null){
        if($dominios==null||$id_dominio==null){
            return false;
        }
        if(is_array($dominios)){
            if(in_array($id_dominio,$dominios)){
                return true;
            }
            return false;
        }
        return false;
    }
}