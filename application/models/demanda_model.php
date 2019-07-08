<?php Class Demanda_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    /*  METODOS DEL MODULO DEMANDA : PREVISION DE DEMANDA   */
    public function get_one_prevision($id_prevision) {
        $id_prevision = intval($id_prevision);
        $sql = "CALL get_one_prevision(?);" ;
        $query=$this->db->query($sql,array($id_prevision)); 
        $prevision = $query->row_array();
        $query->next_result();
        $query->free_result();
        return $prevision;
    }
    public function get_all_prevision() {
        $query = $this->db->query('CALL get_all_prevision();');
        $previsiones = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $previsiones;
    }
    public function get_dominios_prevision($id_prevision) { /* SIRVE PARA VALIDAR LOS DOMINIOS REGISTRADOS PARA UNA PREVISION */
        $id_prevision = intval($id_prevision);
        $sql = "CALL get_dominios_prevision(?);" ;
        $query=$this->db->query($sql,array($id_prevision)); 
        $prevision_dominio = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $prevision_dominio;
    }
    public function insert_prevision($mes, $dias_laborables, $comentarios, $estado, $prevision) {
        $fecha = date("Y-m-d");
        $this->db->trans_start();
        $success = $this->db->query("CALL insert_prevision('$mes','$dias_laborables','$fecha','$comentarios','$estado',@id_salida);");
        $success->next_result();
        $success->free_result();
        $query = $this->db->query('SELECT @id_salida as id_salida');
        $id_salida = $query->row_array();
        $id_prevision = $id_salida["id_salida"];
        foreach ($prevision as $id_dominio => $filaPrev) {
            $nro_empleados = $filaPrev['nro_empleados'];
            $nro_vacaciones = $filaPrev['nro_vacaciones'];
            $hrs_disponibles = $filaPrev['hrs_disponibles'];
            $hrs_solutions = $filaPrev['hrs_solutions'];
            $fecha = date("Y-m-d");
            $descripcion = $filaPrev['descripcion'];
            $sql = "CALL insert_prevision_dominio(?,?,?,?,?,?,?,?,?);" ;
            $success=$this->db->query($sql,array($nro_empleados,$nro_vacaciones,$hrs_disponibles,$hrs_solutions,$fecha,$descripcion,'1',$id_dominio,$id_prevision)); 
            $success->next_result();
            $success->free_result();
        }
        $this->db->trans_complete();
        return $id_prevision;
    }
    public function update_prevision($mes, $dias_laborables, $comentarios, $estado, $prevision, $id_prevision) {
        $exito = FALSE;
        $this->db->trans_begin();
        $fecha = date("Y-m-d");
        $sql = "CALL update_prevision(?,?,?,?,?,?);" ;
        $success=$this->db->query($sql,array($mes,$dias_laborables,$fecha,$comentarios,$estado,$id_prevision)); 
        $success->next_result();
        $success->free_result();
        $contador = 0;
        if ($success) {
            foreach ($prevision as $id_dominio => $filaPrev) {
                $nro_empleados = $filaPrev['nro_empleados'];
                $nro_vacaciones = $filaPrev['nro_vacaciones'];
                $hrs_disponibles = $filaPrev['hrs_disponibles'];
                $hrs_solutions = $filaPrev['hrs_solutions'];
                $descripcion = htmlentities($filaPrev['descripcion']);
                $fecha = date("Y-m-d");
                $sql = "CALL update_prevision_dominio(?,?,?,?,?,?,?,?,?);" ;
                $success2=$this->db->query($sql,array($nro_empleados,$nro_vacaciones,$hrs_disponibles,$hrs_solutions,$fecha,$descripcion,'1',$id_dominio,$id_prevision)); 
                $success2->next_result();
                $success2->free_result();
                if($success2){
                    $contador++;
                }
            }
            if($contador == count($prevision))
            {
                $exito = TRUE;
                $this->db->trans_commit();
            }
        }
        return $exito;
    }
    public function bloquear_prevision($flag_bloqueo, $id_prevision) {
        $id_prevision = intval($id_prevision);
        $fecha = date("Y-m-d");
        $sql = "CALL bloquear_prevision(?,?,?);" ;
        $this->db->trans_begin();
        $query=$this->db->query($sql,array($fecha,$flag_bloqueo,$id_prevision));
        $query->next_result();
        $query->free_result();
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        }else{
            $this->db->trans_commit();
        }
        return $query;
    }
    public function eliminar_prevision($id_prevision) {
        $id_prevision = intval($id_prevision);
        $sql = "CALL eliminar_prevision(?);" ;
        $this->db->trans_begin();
        $query=$this->db->query($sql,array($id_prevision));
        $query->next_result();
        $query->free_result();
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        }else{
            $this->db->trans_commit();
        }
        return $query;
    }

    /*  METODOS DEL MODULO DEMANDA : SEGUIMIENTO DE DEMANDA   */
    public function get_one_seguimiento($id_seguimiento) {
        $id_seguimiento = intval($id_seguimiento);
        $sql = "CALL get_one_seguimiento(?);" ;
        $query=$this->db->query($sql,array($id_seguimiento));
        $seguimiento = $query->row_array();
        $query->next_result();
        $query->free_result();
        return $seguimiento;
    }
    public function get_all_seguimiento() {
        $query = $this->db->query('CALL get_all_seguimiento();');
        $seguimientos = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $seguimientos;
    }
    public function get_all_seguimiento_avance() {
        $query = $this->db->query("CALL get_all_seguimiento_avance();");
        $seguimientos = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $seguimientos;
    }
    public function get_all_prevision_dominio($id_prevision) {
        $prevision = $this->get_one_prevision($id_prevision);
        $id_prevision = intval($id_prevision);
        $sql = "CALL get_prevision_dominio_by_fk_prevision(?);" ;
        $query2=$this->db->query($sql,array($id_prevision));
        $prevision_dominios = $query2->result_array();
        $query2->next_result();
        $query2->free_result();
        foreach ($prevision_dominios as $key => $prevision_dominio) {
            $prevision['prevision_dominio_detalle'][$key]['id_prevision_dominio'] = $prevision_dominio["id_prevision_dominio"];
            $prevision['prevision_dominio_detalle'][$key]['nro_empleados'] = $prevision_dominio["nro_empleados"];
            $prevision['prevision_dominio_detalle'][$key]['nro_vacaciones'] = $prevision_dominio["nro_vacaciones"];
            $prevision['prevision_dominio_detalle'][$key]['hrs_disponibles'] = $prevision_dominio["hrs_disponibles"];
            $prevision['prevision_dominio_detalle'][$key]['hrs_solutions'] = $prevision_dominio["hrs_solutions"];
            $prevision['prevision_dominio_detalle'][$key]['descripcion'] = $prevision_dominio["descripcion"];
            $prevision['prevision_dominio_detalle'][$key]['flag_bloqueo'] = $prevision_dominio["flag_bloqueo"];
            $prevision['prevision_dominio_detalle'][$key]['fk_dominio'] = $prevision_dominio["fk_dominio"];
            $prevision['prevision_dominio_detalle'][$key]['dominio'] = $prevision_dominio["dominio"];
            $prevision['prevision_dominio_detalle'][$key]['cliente'] = $prevision_dominio["cliente"];
        }
        return $prevision;
    }
    public function existe_prevision($fecha_corte) {
        $sql = "CALL existe_prevision(?);" ;
        $query=$this->db->query($sql,array($fecha_corte));
        $prevision = $query->row_array();
        $query->next_result();
        $query->free_result();
        return $prevision;
    }
    public function insert_seguimiento($fecha_corte, $estado, $prevision_dominio) {
        $this->db->trans_start();
        $fk_prevision = $prevision_dominio["id_prevision"];
        $fecha = date("Y-m-d");
        $success = $this->db->query("CALL insert_seguimiento('$fecha_corte','$fecha','$estado','$fk_prevision',@id_salida);");
        $success->next_result();
        $success->free_result();
        $query = $this->db->query('SELECT @id_salida as id_salida');
        $id_salida = $query->row_array();
        $id_seguimiento = $id_salida["id_salida"];
        $eliminado = "0";
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'];
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $fchRg = date("Y-m-d H:i:s");
        $fchAc = date("Y-m-d H:i:s");
        foreach ($prevision_dominio["prevision_dominio_detalle"] as $id_prevision_dominio => $filaPrev) {
            $id_prevision_dominio = $filaPrev['id_prevision_dominio'];
            $nro_empleados = $filaPrev['nro_empleados'];
            $nro_vacaciones = $filaPrev['nro_vacaciones'];
            $hrs_disponibles = $filaPrev['hrs_disponibles'];
            $hrs_solutions = $filaPrev['hrs_solutions'];
            $sql = "CALL insert_seguimiento_prevision(?,?,?,?,?,?,?,?,?,?,?,?);" ;
            $success=$this->db->query($sql,array($nro_empleados,$nro_vacaciones,$hrs_disponibles,$hrs_solutions,$eliminado,$fchRg,$fchAc,$usrId,$ipAdd,$hosNm,$id_seguimiento,$id_prevision_dominio));
            $success->next_result();
            $success->free_result();
        }
        $this->db->trans_complete();
        return $id_seguimiento;
    }
    public function update_seguimiento($dias_corte, $comentarios, $id_seguimiento) {
        $sql="CALL update_seguimiento(?,?,?);" ;
        $comentarios=htmlentities($comentarios);
        $success=$this->db->query($sql,array($comentarios,$dias_corte,$id_seguimiento));
        $success->next_result();
        $success->free_result();
        return $success;
    }
    public function get_all_seguimiento_prevision($id_seguimiento) {
        $seguimiento = $this->get_one_seguimiento($id_seguimiento);
        $id_seguimiento = intval($id_seguimiento);
        $sql = "CALL get_seguimiento_prevision_by_fk_seguimiento(?);" ;
        $query2=$this->db->query($sql,array($id_seguimiento));
        $seguimiento_previsiones = $query2->result_array();
        $query2->next_result();
        $query2->free_result();
        foreach ($seguimiento_previsiones as $key => $seguimiento_prevision) {
            $seguimiento['seguimiento_prevision_detalle'][$key]['id_seguimiento_prevision'] = $seguimiento_prevision["id_seguimiento_prevision"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['hrs_plan_meta'] = $seguimiento_prevision["hrs_plan_meta"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['hrs_plan_real'] = $seguimiento_prevision["hrs_plan_real"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['hrs_plan_porcentaje'] = $seguimiento_prevision["hrs_plan_porcentaje"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['hrs_ejec_meta'] = $seguimiento_prevision["hrs_ejec_meta"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['hrs_ejec_real'] = $seguimiento_prevision["hrs_ejec_real"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['hrs_ejec_porcentaje'] = $seguimiento_prevision["hrs_ejec_porcentaje"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['descripcion'] = $seguimiento_prevision["descripcion"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['comentario'] = $seguimiento_prevision["comentario"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['flag_bloqueo'] = $seguimiento_prevision["flag_bloqueo"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['fk_seguimiento'] = $seguimiento_prevision["fk_seguimiento"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['fk_prevision_dominio'] = $seguimiento_prevision["fk_prevision_dominio"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['cliente'] = $seguimiento_prevision["cliente"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['dominio'] = $seguimiento_prevision["dominio"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['nro_empleados'] = $seguimiento_prevision["nro_empleados"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['nro_vacaciones'] = $seguimiento_prevision["nro_vacaciones"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['hrs_disponibles'] = $seguimiento_prevision["hrs_disponibles"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['hrs_solutions'] = $seguimiento_prevision["hrs_solutions"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['fk_dominio'] = $seguimiento_prevision["fk_dominio"];
            /* NUEVOS CAMPOS */
            $seguimiento['seguimiento_prevision_detalle'][$key]['estado_delivery'] = $seguimiento_prevision["estado_delivery"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['demanda'] = $seguimiento_prevision["demanda"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['facturabilidad'] = $seguimiento_prevision["facturabilidad"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['ocupabilidad'] = $seguimiento_prevision["ocupabilidad"];
            /* AUDITORIA */
            $seguimiento['seguimiento_prevision_detalle'][$key]['eliminado'] = $seguimiento_prevision["eliminado"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['fchRg'] = $seguimiento_prevision["fchRg"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['fchAc'] = $seguimiento_prevision["fchAc"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['ipAdd'] = $seguimiento_prevision["ipAdd"];
            $seguimiento['seguimiento_prevision_detalle'][$key]['hosNm'] = $seguimiento_prevision["hosNm"];
        }
        return $seguimiento;
    }

    public function get_one_seguimiento_prevision($id_seguimiento_prevision) {
        $id_seguimiento_prevision = intval($id_seguimiento_prevision);
        $sql = "CALL get_one_seguimiento_prevision(?);" ;
        $query=$this->db->query($sql,array($id_seguimiento_prevision));
        $seguimiento_prevision = $query->row_array();
        $query->next_result();
        $query->free_result();
        return $seguimiento_prevision;
    }
    public function update_seguimiento_prevision_lideres($id_seguimiento_prevision, $hrs_plan_meta, $hrs_plan_real, $hrs_plan_porcentaje, $hrs_ejec_meta, $hrs_ejec_real, $hrs_ejec_porcentaje, $comentario, $incurridos_validados, $no_conformidades, $inc_internas, $inc_externas) {
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'];
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $fchAc = date("Y-m-d H:i:s");
        $comentario = htmlentities($comentario);
        $sql = "CALL update_seguimiento_prevision_lideres(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);" ;
        $success=$this->db->query($sql,array($hrs_plan_meta,$hrs_plan_real,$hrs_plan_porcentaje,$hrs_ejec_meta,$hrs_ejec_real,$hrs_ejec_porcentaje,$comentario,$incurridos_validados,$no_conformidades,$inc_internas,$inc_externas,$fchAc,$usrId,$ipAdd,$hosNm,$id_seguimiento_prevision));
        $success->next_result();
        $success->free_result();
        return $success;
    }
    public function update_seguimiento_prevision_produccion($id_seguimiento_prevision, $estado_delivery, $demanda, $descripcion, $facturabilidad, $ocupabilidad) {
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'];
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $fchAc = date("Y-m-d H:i:s");
        $descripcion = htmlentities($descripcion);
        $sql = "CALL update_seguimiento_prevision_produccion(?,?,?,?,?,?,?,?,?,?);" ;
        $success=$this->db->query($sql,array($estado_delivery,$demanda,$descripcion,$facturabilidad,$ocupabilidad,$fchAc,$usrId,$ipAdd,$hosNm,$id_seguimiento_prevision));
        $success->next_result();
        $success->free_result();
        return $success;
    }
    public function bloquear_seguimiento($flag_bloqueo, $id_seguimiento) {
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'];
        $fecha = date("Y-m-d");
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $fchAc = date("Y-m-d H:i:s");
        $this->db->trans_start();
        $sql = "CALL bloquear_seguimiento(?,?,?,?,?,?,?);" ;
        $query=$this->db->query($sql,array($id_seguimiento,$flag_bloqueo,$fecha,$fchAc,$usrId,$ipAdd,$hosNm));
        $query->next_result();
        $query->free_result();
        $this->db->trans_complete();
        return $query;
    }
    public function eliminar_seguimiento($id_seguimiento) {
        $id_seguimiento = intval($id_seguimiento);
        $sql = "CALL eliminar_seguimiento(?);" ;
        $this->db->trans_begin();
        $query=$this->db->query($sql,array($id_seguimiento));
        $query->next_result();
        $query->free_result();
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        }else{
            $this->db->trans_commit();
        }
        return $query;
    }
    /*  NOTIFICACIONES DEL MASTER   */
    public function get_all_seguimiento_x_usuario() {
        $query = $this->db->query("CALL get_all_seguimiento_x_usuario()");
        $previsiones = $query->result_array();
        $query->next_result();
        $query->free_result();
        return $previsiones;
    }
}