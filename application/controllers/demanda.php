<?php Class Demanda extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array("form","codegen_helper"));
        $this->load->model("usuarios_model");
        $this->load->model("demanda_model");
        $this->load->model("dominio_model");
        $this->load->model("permisos_model");
        $this->load->library("emailnotificaciones_cls");
        if((!$this->session->userdata('session_id'))||(!$this->session->userdata('logueado'))){
            redirect(base_url("login"));
        }
        if(!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'vDemanda')) {
            $this->session->set_flashdata('error', 'No tiene el permiso de Gestionar Demanda.');
            redirect(base_url());
        }
        $this->data['menuDemanda'] = 'Demanda';
    }
    public function index() {
        $this->data['view'] = 'demanda/index';
        $this->load->view("template/template",$this->data);
    }
    /*  METODOS  MODULO PREVISION MENSUAL  DE DEMANDA */
    public function prevision() {
        $this->data['menuPrevision'] = 'Prevision';
        $this->data['previsiones'] = $this->demanda_model->get_all_prevision();
        $this->data['view'] = 'demanda/previsiones';
        $this->load->view("template/template",$this->data);
    }
    public function prevision_visualizar($id_prevision) {
        $this->data['menuPrevision'] = 'Prevision';
        $prevision_dominio = $this->demanda_model->get_all_prevision_dominio($id_prevision);
        $this->data['prevision_dominio'] = $prevision_dominio;
        $this->data['view'] = 'demanda/visualizarPrevision';
        $this->load->view("template/template",$this->data);
    }
    public function prevision_adicionar() {
        $this->data['menuPrevision'] = 'Prevision';
        if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['agregarPrevision'])) {
            $this->load->library('form_validation');
            $mes = $this->input->post('mes');
            $mes = date_create($mes);
            $mes = date_format($mes,'Y-m-d');
            if (!$this->demanda_model->existe_prevision($mes)) {
                $dias_laborables = $this->input->post('dias_laborables');
                $comentarios = $this->input->post('comentarios');
                $dominios = $this->dominio_model->get_all_dominios_cliente();
                foreach ($dominios as $dominio) {
                    $this->form_validation->set_rules('empleados_' . $dominio['id_dominio'], 'Empleados del Dominio ' . $dominio['nombre'] . ' sin datos.', '');
                    $this->form_validation->set_rules('vacaciones_' . $dominio['id_dominio'], 'Vacaciones del Dominio ' . $dominio['nombre'] . ' sin datos.', '');
                    $this->form_validation->set_rules('disponible_' . $dominio['id_dominio'], 'Horas Disponibles del Dominio ' . $dominio['nombre'] . ' sin datos.', '');
                    $this->form_validation->set_rules('demandaConfirmada_' . $dominio['id_dominio'], 'Demanda confirmada del Dominio ' . $dominio['nombre'] . ' sin datos.', '');
                    $this->form_validation->set_rules('descripcion_' . $dominio['id_dominio'], 'Descripcion del Dominio ' . $dominio['nombre'] . ' sin datos.', '');
                }
                if ($this->form_validation->run() == TRUE) {
                    $prevision = array();
                    foreach ($dominios as $dominio) {
                        $id_dominio = $dominio['id_dominio'];
                        $empleados = $this->input->post('empleados_' . $dominio['id_dominio']);
                        $vacaciones = $this->input->post('vacaciones_' . $dominio['id_dominio']);
                        $disponible = $this->input->post('disponible_' . $dominio['id_dominio']);
                        $demandaConfirmada = $this->input->post('demandaConfirmada_' . $dominio['id_dominio']);
                        $descripcion = $this->input->post('descripcion_' . $dominio['id_dominio']);
                        $prevision[$id_dominio]['nro_empleados'] = ($empleados == '') ? NULL : $empleados;
                        $prevision[$id_dominio]['nro_vacaciones'] = ($vacaciones == '') ? NULL : $vacaciones;
                        $prevision[$id_dominio]['hrs_disponibles'] = ($disponible == '') ? NULL : $disponible;
                        $prevision[$id_dominio]['hrs_solutions'] = ($demandaConfirmada == '') ? NULL : $demandaConfirmada;
                        $prevision[$id_dominio]['descripcion'] = ($descripcion == '') ? NULL : $descripcion;
                        $completo = TRUE;
                    }
                    if ($completo) {
                        $estado = "1";
                        $id_prevision = $this->demanda_model->insert_prevision($mes, $dias_laborables, $comentarios, $estado, $prevision);
                        if ($id_prevision!=null&&$id_prevision!="") {
                            $mes2=$this->input->post("mes");
                            $mes2=date_create($mes2);
                            $mes2=date_format($mes2,"m-Y");
                            $usuariosLideresEntrega=$this->usuarios_model->get_all_usuarios_lideres();
                            $asunto="Nueva Prevision/seguimiento de Demanda del mes de : ".$mes2.", ha sido registrada en SISCAR-T.";
                            $cuerpo = array(
                                "url"=>base_url("demanda/prevision_visualizar/".$id_prevision),
                                "mes"=>$mes2,
                                "dias_laborales"=>$dias_laborables,
                                "fecha"=>date("Y-m-d")
                            );
                            $emails=array_column($usuariosLideresEntrega,"email");
                            $resultado3=$this->emailnotificaciones_cls->enviar_mail_demanda_prevision($emails,$asunto,$cuerpo);
                            if ($resultado3) {
                                $this->session->set_flashdata('success', 'Se Envio un Email a los Usuarios Destinatarios.');
                            }
                            $this->session->set_flashdata('success', 'La Prevision de Demanda para el Mes de : '. $mes2 .' , ha sido registrada con EXITO.');
                            redirect(base_url("demanda/prevision"));
                        } else {
                            $this->session->set_flashdata('error', 'Algun ERROR ocurrio al registrar la Prevision para el mes de : '. $mes2 .' ,  (En BD.)');
                            log_message('error', 'Algun ERROR ocurrio al registrar la Prevision para el mes de : '. $mes2 .' (En BD.)');
                            redirect(base_url("demanda/prevision_adicionar"));
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Llene todos los campos completamente.');
                        redirect(base_url("demanda/prevision_adicionar"));
                    }
                } else {
                    $this->session->set_flashdata('error', 'Llene todos los campos completamente.');
                }
            } else {
                $this->session->set_flashdata('error', 'Ya existe una prevision registrada para el Mes-Año a Registrar.');
                log_message('error', 'Ya existe una prevision registrada para el Mes-Año a Registrar. '. $mes .' (En BD.)');
                redirect(base_url("demanda/prevision_adicionar"));
            }
        }
        $this->data['permisos'] = $this->permisos_model->getActive('permiso', 'permiso.id_permiso,permiso.nombre');
        $this->data['dominios'] = $this->dominio_model->get_all_dominios_cliente();
        $this->data['view'] = 'demanda/adicionarPrevision';
        $this->load->view("template/template",$this->data);
    }
    public function prevision_editar($id_prevision) {
        $this->data['menuPrevision'] = 'Prevision';
        $prevision_dominio = $this->demanda_model->get_all_prevision_dominio($id_prevision);
        if (isset($prevision_dominio) && !empty($prevision_dominio)) {
            if($prevision_dominio["flag_bloqueo"] === 1){
                $this->session->set_flashdata('error', 'NO se puede modificar la prevision, pues ha sido Bloqueada.');
                redirect(base_url("demanda/prevision"));
            }else {
                if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['editarPrevision'])) {
                    $this->load->library('form_validation');
                    $mes = $this->input->post('mes');
                    $mes = date_create($mes);
                    $mes = date_format($mes, 'Y-m-d');
                    $dias_laborables = $this->input->post('dias_laborables');
                    $comentarios = $this->input->post('comentarios');
                    $dominios = $this->demanda_model->get_dominios_prevision($id_prevision);
                    $prevision = array();
                    foreach ($dominios as $dominio) {
                        $id_dominio = $dominio['fk_dominio'];
                        $empleados = $this->input->post('empleados_' . $dominio['fk_dominio']);
                        $vacaciones = $this->input->post('vacaciones_' . $dominio['fk_dominio']);
                        $disponible = $this->input->post('disponible_' . $dominio['fk_dominio']);
                        $demandaConfirmada = $this->input->post('demandaConfirmada_' . $dominio['fk_dominio']);
                        $descripcion = $this->input->post('descripcion_' . $dominio['fk_dominio']);
                        $prevision[$id_dominio]['nro_empleados'] = ($empleados == '') ? NULL : $empleados;
                        $prevision[$id_dominio]['nro_vacaciones'] = ($vacaciones == '') ? NULL : $vacaciones;
                        $prevision[$id_dominio]['hrs_disponibles'] = ($disponible == '') ? NULL : $disponible;
                        $prevision[$id_dominio]['hrs_solutions'] = ($demandaConfirmada == '') ? NULL : $demandaConfirmada;
                        $prevision[$id_dominio]['descripcion'] = ($descripcion == '') ? NULL : $descripcion;
                        $completo = TRUE;
                    }
                        if ($completo) {
                            //var_dump($mes, $dias_laborables, $comentarios, $prevision , $id_prevision);
                            $estado = "1";
                            $resultado = $this->demanda_model->update_prevision($mes, $dias_laborables, $comentarios, $estado, $prevision , $id_prevision);
                            if ($resultado) {
                                $this->session->set_flashdata('success', 'La Prevision De Demanda para el Mes de : '. $mes .' , ha sido ha Modificada con exito.');
                                redirect(base_url("demanda/prevision_editar/".$id_prevision));
                            } else {
                                $this->session->set_flashdata('error',"Algun Error al modificar la Prevision De Demanda para el Mes de : ".$mes.", id_prevision : ".$id_prevision." , (En BD.)");
                                log_message('error',"Algun Error al modificar la Prevision. , Mes : ".$mes.", id_prevision : ".$id_prevision." , (En BD.)");
                                redirect(base_url("demanda/prevision_editar/".$id_prevision));
                            }
                        } else {
                            $this->session->set_flashdata('error', 'Algunos campos estan Incompletos.');
                            redirect(base_url("demanda/prevision_editar/".$id_prevision));
                        }
                    }
                }    
                $this->data['permisos'] = $this->permisos_model->getActive('permiso', 'permiso.id_permiso,permiso.nombre');
                $this->data['prevision_dominio'] = $prevision_dominio;
                $this->data['view'] = 'demanda/editarPrevision';
                $this->load->view("template/template",$this->data);
        } else {
            $this->session->set_flashdata('error', 'NO existe la Prevision o no ha sido Registrada.');
            redirect(base_url("demanda/prevision"));
        }
    }
    public function prevision_bloquear($id_prevision_bloquear) {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'dDemanda')) {
            $this->session->set_flashdata('error', 'No tiene el permiso para Bloquear la Prevision de Demanda.');
            redirect(base_url("demanda/prevision"));
        }
        $prevision = $this->demanda_model->get_one_prevision($id_prevision_bloquear);
        //var_dump($prevision);
        if (!isset($prevision['id_prevision'])) {
            $this->session->set_flashdata('error', 'La Prevision de Demanda no ha sido encontrada o no existe.');
            redirect(base_url("demanda/prevision"));
        } else {
            $flag_bloqueo = "1";
            $resultado = $this->demanda_model->bloquear_prevision($flag_bloqueo, $prevision['id_prevision']);
            if ($resultado) {
                $this->session->set_flashdata('success', 'La Prevision de Demanda del mes de : ' . date('Y-m', strtotime($prevision['mes_anio'])) . ' , ha sido bloqueada con Exito!.');
                redirect(base_url("demanda/prevision"));
            } else {
                $this->session->set_flashdata('error', 'Ocurrio algun error al bloquear La Prevision de Demanda del mes de : ' . date('Y-m', strtotime($prevision['mes_anio'])) . ' (en BD)');
                log_message('error',  'Ocurrio algun error al bloquear la Prevision del mes de : ' . date('Y-m', strtotime($prevision['mes_anio'])) . ' (en BD)' );
                redirect(base_url("demanda/prevision"));
            }
        }
    }
    public function prevision_eliminar($id_prevision) {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'dDemanda')) {
            $this->session->set_flashdata('error', 'No tiene el permiso para Eliminar la Prevision de Demanda.');
            redirect(base_url("demanda/prevision"));
        }
        $prevision = $this->demanda_model->get_one_prevision($id_prevision);
        if (!isset($prevision['id_prevision'])) {
            $this->session->set_flashdata('error', 'La Prevision de Demanda no ha sido encontrada o no existe.');
            redirect(base_url("demanda/prevision"));
        } else { 
            $resultado = $this->demanda_model->eliminar_prevision($prevision['id_prevision']);
            if ($resultado) {
                $this->session->set_flashdata('success', 'La Prevision de Demanda del mes de : ' . date('Y-m', strtotime($prevision['mes_anio'])) . ' , ha sido eliminada con Exito!.');
                redirect(base_url("demanda/prevision"));
            } else {
                $this->session->set_flashdata('error', 'Ocurrio algun error al eliminar la Prevision de Demanda del mes de : ' . date('Y-m', strtotime($prevision['mes_anio'])) . ' (en BD)');
                log_message('error','Ocurrio algun error al eliminar la Prevision del mes de : ' . date('Y-m', strtotime($prevision['mes_anio'])) . ' (en BD)');
                redirect(base_url("demanda/prevision"));
            }
        }
    }
    /* METODOS MODULO SEGUIMIENTO DE DEMANDA */
    public function seguimiento() {
        $this->data['menuSeguimiento'] = 'Seguimiento';
        $this->data['seguimientos'] = $this->demanda_model->get_all_seguimiento_avance();
        $this->data['view'] = 'demanda/seguimientos';
        $this->load->view("template/template",$this->data);
    }
    public function seguimiento_adicionar($id_seguimiento = 0) {
        $this->data['menuSeguimiento'] = 'Seguimiento';
        if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['generarSeguimiento'])) {
            /* GENERAR NUEVO SEGUIMIENTO DE DEMANDA */
            if ('' !== $this->input->post('fecha_corte')) {
                $fecha_corte = $this->input->post('fecha_corte');
                $fecha_corte = date_create($fecha_corte);
                $fecha_corte = date_format($fecha_corte, 'Y-m-d');
            } else {
                $fecha_corte = null;
            }
            $existe_prevision = $this->demanda_model->existe_prevision($fecha_corte);
            if (isset($existe_prevision) && !empty($existe_prevision)) {
                $prevision_dominio = $this->demanda_model->get_all_prevision_dominio($existe_prevision["id_prevision"]);
                $estado = "1";
                $id_seguimiento_insert = $this->demanda_model->insert_seguimiento($fecha_corte, $estado, $prevision_dominio);
                if ($id_seguimiento_insert) {
                    $this->session->set_flashdata('success', ' Se registro el Seguimiento de Demanda para la fecha de corte seleccionada.');
                    redirect(base_url("demanda/seguimiento_adicionar/".$id_seguimiento_insert));
                } else {
                    $this->session->set_flashdata('error', ' Error al registrar el Seguimiento de Demanda para la fecha de corte. (BD)');
                    log_message('error','Error al registrar el Seguimiento de Demanda para la fecha de corte. (BD) :  $fecha_corte : ' . $fecha_corte .' ');
                    redirect(base_url("demanda/seguimiento"));
                }
            } else {
                $this->session->set_flashdata('error', 'NO existe una prevision registrada para la fecha de corte a seleccionada o no ha seleccionado una fecha de Corte/Seguimiento.');
                redirect(base_url("demanda/seguimiento"));
            }
        }
        if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['modificarSeguimiento'])) {
            /* GENERAR NUEVO SEGUIMIENTO DE DEMANDA */
            $dias_corte = $this->input->post('dias_corte');
            $comentarios = $this->input->post('comentarios');
            $id_seguimiento = $this->input->post('id_seguimiento');
            $resultado = $this->demanda_model->update_seguimiento($dias_corte, $comentarios, $id_seguimiento);
            if ($resultado) {
                $this->session->set_flashdata('success', ' ¡ El Seguimiento de Demanda para la fecha de corte seleccionada se ha modificado !');
                redirect(base_url("demanda/seguimiento_adicionar/".$id_seguimiento));
            } else {
                $this->session->set_flashdata('error', ' Ocurrio algun error al modificar el Seguimiento de Demanda para la fecha de corte registrada. (en BD)');
                log_message('error','Error al modificar el Seguimiento de Demanda para la fecha de corte. (BD) , $id_seguimiento : '. $id_seguimiento .' ');
                redirect(base_url("demanda/seguimiento_adicionar/".$id_seguimiento));
            }
            //var_dump($dias_corte,$comentarios);
        }
        if ($id_seguimiento != 0) {
            $this->data['permisos'] = $this->permisos_model->getActive('permiso', 'permiso.id_permiso,permiso.nombre');
            $id_seguimiento = intval($id_seguimiento);
            $seguimiento = $this->demanda_model->get_all_seguimiento_prevision($id_seguimiento);
            if (!isset($seguimiento["id_seguimiento"])) {
                $this->session->set_flashdata('error', 'Seguimiento de Demanda no encontrada.');
                log_message('error',' Seguimiento de Demanda no encontrada., $id_seguimiento : '. $id_seguimiento .' ');
                redirect(base_url("demanda/seguimiento"));
            } else {
                $seguimiento = $this->demanda_model->get_all_seguimiento_prevision($id_seguimiento);
                $prevision_dominio = $this->demanda_model->get_all_prevision_dominio($seguimiento["fk_prevision"]);
                $this->data['seguimiento'] = $seguimiento;
                $this->data['prevision_dominio'] = $prevision_dominio;
                $this->data['view'] = 'demanda/adicionarSeguimiento';
                $this->load->view("template/template",$this->data);
            }
        } else {
            redirect(base_url("error404"));
        }
    }
    public function get_one_seguimiento_prevision_json() {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/x-json; charset=utf-8');
        $id_seguimiento_prevision = $this->input->post('id_seguimiento_prevision');
        $seguimiento_prevision = $this->demanda_model->get_one_seguimiento_prevision($id_seguimiento_prevision);
        $seguimiento_prevision["descripcion"] = html_entity_decode($seguimiento_prevision["descripcion"]);
        $seguimiento_prevision["comentario"] = html_entity_decode($seguimiento_prevision["comentario"]);
        print json_encode($seguimiento_prevision);
    }
    public function editar_seguimiento_prevision($id_seguimiento,$id_seguimiento_prevision) {
        $id_seguimiento_prevision = intval($id_seguimiento_prevision);
        $this->data['nombrePagina'] = "Editar Seguimiento de Demanda";
        if ((!$this->session->userdata('session_id'))||(!$this->session->userdata('logueado'))) {
            redirect(base_url("login"));
        }
        $seguimiento_prevision = $this->demanda_model->get_one_seguimiento_prevision($id_seguimiento_prevision);
        if (isset($seguimiento_prevision) && !empty($seguimiento_prevision)) {
            if($seguimiento_prevision["eliminado"] === 1){
                $this->session->set_flashdata('error', 'NO se puede modificar el Seguimiento de Demanda, pues ha sido Eliminado.');
                //redirect(base_url("/demanda/seguimiento_adicionar/".$id_seguimiento));
                $this->data['cerrar'] = TRUE;
            }else {
                if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['editarSeguimiento'])) {
                    if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['flagProduccion'])) { /* INGRESO : admin, Lider Produccion CAR. */
                        $estado_delivery = $this->input->post('estado_delivery');
                        $demanda = $this->input->post('demanda');
                        $descripcion = $this->input->post('descripcion');
                        $facturabilidad = ($this->input->post('facturabilidad') === '') ? null : $this->input->post('facturabilidad');
                        $ocupabilidad = ($this->input->post('ocupabilidad') === '') ? null : $this->input->post('ocupabilidad');
                        //var_dump($id_seguimiento_prevision, $estado_delivery, $demanda, $descripcion,$facturabilidad,$ocupabilidad);
                        $resultado =  $this->demanda_model->update_seguimiento_prevision_produccion($id_seguimiento_prevision, $estado_delivery, $demanda, $descripcion,$facturabilidad,$ocupabilidad);
                    }else{ /* INGRESO: Lider de Dominio */
                        $hrs_plan_meta = $this->input->post('hrs_plan_meta');
                        $hrs_plan_real = $this->input->post('hrs_plan_real');
                        $hrs_plan_porcentaje = $this->input->post('hrs_plan_porcentaje');
                        $hrs_ejec_meta = $this->input->post('hrs_ejec_meta');
                        $hrs_ejec_real = $this->input->post('hrs_ejec_real');
                        $hrs_ejec_porcentaje = $this->input->post('hrs_ejec_porcentaje');
                        $comentario = $this->input->post('comentario');
                        $incurridos_validados = $this->input->post('incurridos_validados');
                        $incurridos_validados = ((false != $incurridos_validados) ? "1" : NULL);
                        $flag_no_conformidades = $this->input->post('flag_no_conformidades');
                        $no_conformidades = ((false != $flag_no_conformidades) ? $this->input->post('no_conformidades') : NULL);
                        $flag_inc_internas = $this->input->post('flag_inc_internas');
                        $inc_internas = ((false != $flag_inc_internas) ? $this->input->post('inc_internas') : NULL);
                        $flag_inc_externas  = $this->input->post('flag_inc_externas');
                        $inc_externas = ((false != $flag_inc_externas) ? $this->input->post('inc_externas') : NULL);
                        //var_dump($id_seguimiento_prevision, $hrs_plan_meta, $hrs_plan_real, $hrs_plan_porcentaje, $hrs_ejec_meta, $hrs_ejec_real, $hrs_ejec_porcentaje,$comentario,$incurridos_validados,$no_conformidades,$inc_internas,$inc_externas);
                        $resultado = $this->demanda_model->update_seguimiento_prevision_lideres($id_seguimiento_prevision, $hrs_plan_meta, $hrs_plan_real, $hrs_plan_porcentaje, $hrs_ejec_meta, $hrs_ejec_real, $hrs_ejec_porcentaje,$comentario,$incurridos_validados,$no_conformidades,$inc_internas,$inc_externas);
                    }
                    if ($resultado) {
                        $this->session->set_flashdata('success', 'Se ha Modificado el Seguimiento de Demanda para el dominio Seleccionado.');
                        log_message('info', 'Se ha Modificado el Seguimiento de Demanda para el dominio Seleccionado. $id_seguimiento_prevision = '.$id_seguimiento_prevision);
                        //redirect(base_url("demanda/seguimiento_adicionar/".$id_seguimiento));
                        $this->data['cerrar'] = TRUE;
                    } else {
                        $this->session->set_flashdata('error', 'Error al Editar el Seguimiento de Demanda para el dominio Seleccionado. (En BD)');
                        log_message('error', 'Error al Modificar el Seguimiento de Demanda para el dominio Seleccionado. (En BD) : id_seguimiento_prevision  = '.$id_seguimiento_prevision);
                        //redirect(base_url("demanda/seguimiento_adicionar/".$id_seguimiento));
                        $this->data['cerrar'] = FALSE;
                    }      
                }
            }
            $seguimiento = $this->demanda_model->get_one_seguimiento($id_seguimiento);
            $prevision = $this->demanda_model->get_one_prevision($seguimiento["fk_prevision"]);
            $this->data['dias_laborales'] = $prevision["nro_dias"];
            $this->data['dias_corte'] = $seguimiento["nro_dias_corte"];
            $this->data['seguimiento_prevision'] = $seguimiento_prevision;
            $this->data['view'] = 'demanda/editarSeguimiento';
            $this->load->view("template/reporte",$this->data);
        } else {
            $this->session->set_flashdata('error', 'NO existe el Seguimiento de Demanda o Ha sido Eliminado.');
            //redirect(base_url("/demanda/seguimiento_adicionar/".$id_seguimiento));
            $this->data['cerrar'] = TRUE;
        }
    }
    public function seguimiento_bloquear($id_seguimiento_bloquear) {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'dDemanda')) {
            $this->session->set_flashdata('error', 'No tiene el permiso para Bloquear Edicion del Seguimiento de Demanda.');
            redirect(base_url("demanda/seguimiento"));
        } 
        $seguimiento = $this->demanda_model->get_one_seguimiento($id_seguimiento_bloquear);
        if (!isset($seguimiento['id_seguimiento'])) {
            $this->session->set_flashdata('error', 'Seguimiento de Demanda no encontrado.');
            redirect(base_url("demanda/seguimiento"));
        } else {
            $flag_bloqueo = "1";
            $resultado = $this->demanda_model->bloquear_seguimiento($flag_bloqueo, $seguimiento['id_seguimiento']);
            if ($resultado) {
                $this->session->set_flashdata('success', ' El Seguimiento de Demanda con fecha corte : ' . date('d-m-Y', strtotime($seguimiento['fecha_corte'])) . ' , ha sido bloqueada con Exito!.');
                redirect(base_url("demanda/seguimiento"));
            } else {
                $this->session->set_flashdata('error', ' Ocurrio algun error al bloquear el Seguimiento de Demanda con fecha corte : ' . date('d-m-Y', strtotime($seguimiento['fecha_corte'])) . ' (en BD)');
                log_message('error','Ocurrio algun error al bloquear el Seguimiento de Demanda con fecha corte : ' . date('d-m-Y', strtotime($seguimiento['fecha_corte'])) . ' (en BD)');
                redirect(base_url("demanda/seguimiento"));
            }
        }
    }
    public function seguimiento_desactivar($id_seguimiento_eliminar) {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'dDemanda')) {
            $this->session->set_flashdata('error', 'No tiene el permiso para Eliminar el Seguimiento de Demanda.');
            redirect(base_url("demanda/seguimiento"));
        }
        $id_seguimiento_eliminar = intval($id_seguimiento_eliminar);
        $seguimiento = $this->demanda_model->get_one_seguimiento($id_seguimiento_eliminar);
        if (!isset($seguimiento['id_seguimiento'])) {
            $this->session->set_flashdata('error', 'Seguimiento de Demanda no encontrada o no existe.');
            redirect(base_url("demanda/seguimiento"));
        } else { 
            $resultado = $this->demanda_model->eliminar_seguimiento($seguimiento['id_seguimiento']);
            if ($resultado) { 
                $this->session->set_flashdata('success', 'El Seguimiento de Demanda del con Fecha Corte : ' . date('Y-m', strtotime($seguimiento['fecha_corte'])) . ' , ha sido eliminado con Exito!.');
                redirect(base_url("demanda/seguimiento"));
            } else {
                $this->session->set_flashdata('error', 'Ocurrio algun error al eliminar el Seguimiento de Demanda del con Fecha Corte : ' . date('Y-m', strtotime($seguimiento['fecha_corte'])) . ' (en BD)');
                log_message('error','Ocurrio algun error al eliminar el Seguimiento de Demanda del con Fecha Corte : ' . date('Y-m', strtotime($seguimiento['fecha_corte'])) . ' (en BD)');
                redirect(base_url("demanda/seguimiento"));
            }
        }
    }
    /*   NOTIFICACIONES  DEL MASTER   */
    public function obtener_notificaciones_json() {
        header("Access-Control-Allow-Origin:*"); 
        header("Content-Type: application/x-json; charset=utf-8");     
        $id_usuario=$this->input->post("id_usuario");
        $notificaciones=$this->demanda_model->get_all_seguimiento_avance();
        return print(json_encode($notificaciones));
    }
}