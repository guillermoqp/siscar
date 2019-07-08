<?php Class Lecciones_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->model('etiqueta_model', '', TRUE);
    }
    public function get_all_lecciones() {
        $sql = "CALL get_all_lecciones_aprendidas();" ;
        $query=$this->db->query($sql); 
        $lecciones = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        foreach ($lecciones as $key => $leccion) {
            $lecciones[$key]["etiquetas"] = $this->etiqueta_model->get_nombres_etiquestas($leccion["etiquetas"]);
        }
        return $lecciones;
    }
    public function get_all_lecciones_busqueda($asunto) {
        $sql = "CALL get_all_lecciones_busqueda(?);" ;
        $query=$this->db->query($sql,array($asunto)); 
        $lecciones = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        foreach ($lecciones as $key => $leccion) {
            $lecciones[$key]["etiquetas"] = $this->etiqueta_model->get_nombres_etiquestas($leccion["etiquetas"]);
        }
        return $lecciones;
    }
    public function get_one_leccion($id_leccion) {
        $sql = "CALL get_one_leccion_aprendida(?);" ;
        $query=$this->db->query($sql,array($id_leccion));
        $leccion= $query->row_array();
        $query->next_result(); 
        $query->free_result(); 
        return $leccion;
    }
    public function get_historial_lecciones() {
        $sql = "CALL get_historial_lecciones();" ;
        $query=$this->db->query($sql,array());
        $historial = $query->result_array();
        $query->next_result(); 
        $query->free_result(); 
        return $historial;
    }
    public function insert_leccion($nombre, $id_dominio, $id_etiquetas,$descripcion,$nombre_archivo) {
        $this->db->trans_start();
        $eliminado = "0";
        $nombre = htmlentities($nombre);
        $descripcion = htmlentities($descripcion);
        $fchRg = date("Y-m-d H:i:s");
        $fchAc = date("Y-m-d H:i:s");
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'];
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $success = $this->db->query("CALL insert_leccion('$nombre','$descripcion','$id_etiquetas','$nombre_archivo','$eliminado','$fchRg','$fchAc','$usrId','$ipAdd','$hosNm','$id_dominio','$usrId',@id_salida);");
        $query = $this->db->query('SELECT @id_salida as id_salida');
        $id_salida = $query->row_array();
        $id_leccion_aprendida = $id_salida["id_salida"];
        $success->next_result();
        $success->free_result();
        if($success){
            $this->db->trans_complete();
        }
        return $id_leccion_aprendida;
    }
    public function update_leccion($nombre, $id_dominio, $id_etiquetas,$descripcion,$id_leccion_aprendida,$nombre_archivo) {
        $exito = FALSE;
        $this->db->trans_start();
        $eliminado = "0";
        $nombre = htmlentities($nombre);
        $descripcion = htmlentities($descripcion);
        $fchAc = date("Y-m-d H:i:s");
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'];
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $sql = "CALL update_leccion(?,?,?,?,?,?,?,?,?,?,?,?);" ;
        $success=$this->db->query($sql,array($nombre,$descripcion,$id_etiquetas,$nombre_archivo,$eliminado,$fchAc,$usrId,$ipAdd,$hosNm,$id_dominio,$usrId,$id_leccion_aprendida)); 
        $success->next_result();
        $success->free_result();
        if($success){
            $this->db->trans_complete();
            $exito = TRUE;
        }
        return $exito;
    }
    public function eliminar_leccion_aprendida($id_leccion_aprendida) {
        $exito = FALSE;
        $this->db->trans_start();
        /*$eliminado = "1";
        $fchAc = date("Y-m-d H:i:s");
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'];
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);*/
        $sql = "CALL eliminar_leccion_aprendida(?);" ;
        $success=$this->db->query($sql,array($id_leccion_aprendida));
        $success->next_result();
        $success->free_result();
        if($success){
            $this->db->trans_complete();
            $exito = TRUE;
        }
        return $exito;
    }
}
