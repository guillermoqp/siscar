<?php Class Lecciones_aprendidas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id'))||(!$this->session->userdata('logueado'))) {
            redirect(base_url("login"));
        }
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vLecAprendidas') 
            || !$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'aLecAprendidas') 
            || !$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'eLecAprendidas')
            || !$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'dLecAprendidas')) {
            $this->session->set_flashdata('error', 'No tiene el permiso de Lecciones Aprendidas.');
            redirect(base_url());
        }
        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('lecciones_model', '', TRUE);
        $this->load->model('dominio_model', '', TRUE);
        $this->load->model('etiqueta_model', '', TRUE);
        $this->data['menuLeccionesAprendidas'] = 'LeccionesAprendidas';
    }
    public function index() {
        $this->data['view'] = 'lecciones/index';
        $this->data['lecciones'] = $lecciones = $this->lecciones_model->get_all_lecciones();
        $this->data['historial'] = $this->lecciones_model->get_historial_lecciones();
        $this->load->view("template/template",$this->data);
    }
    public function do_upload($field_name) {
        $this->load->library('upload');
        $this->load->helper('file');
        $image_upload_folder = FCPATH.'assets/archivos/lecciones/';
        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder,DIR_WRITE_MODE,true);
        }
        $this->upload_config = array(
            'upload_path' => $image_upload_folder,
            'allowed_types' => 'xlsx|xls|XLSX||XLS',
            'max_size' => 2048,
            'remove_space' => TRUE,
            'encrypt_name' => TRUE);
        $this->upload->initialize($this->upload_config);
        if (!$this->upload->do_upload($field_name)) {
            $upload_error=$this->upload->display_errors();
            return false;
        } else {
            $file_info = array($this->upload->data());
            return $file_info[0]['file_name'];
        }
    }
    public function adicionar() {
        $this->data['nombrePagina'] = "Añadir Leccion Aprendida";
        if ($this->input->server('REQUEST_METHOD')=="POST"&&isset($_POST["adicionarLeccion"])) {
            $nombre = ("" !== $this->input->post('nombre') ? $this->input->post('nombre') : "Sin Nombre");
            $id_dominio = ("" !== $this->input->post('id_dominio') ? $this->input->post('id_dominio') : NULL);
            $etiquetas = ("" !== $this->input->post('id_etiquetas') ? $this->input->post('id_etiquetas') : NULL);
            $descripcion = ("" !== $this->input->post('descripcion') ? $this->input->post('descripcion') : NULL);
            $id_etiquetas = implode(",",$etiquetas);
            //SUBIR EL ARCHIVO
            $archivo = $this->do_upload('archivo_excel');
            if ($archivo) {
                $nombre_archivo="assets/archivos/lecciones/".$archivo;
            } else {
                $nombre_archivo = "";
            }
            $id_leccion_aprendida = $this->lecciones_model->insert_leccion($nombre, $id_dominio, $id_etiquetas,$descripcion,$nombre_archivo);
            if($id_leccion_aprendida){
                $this->session->set_flashdata('success','Exito al Registrar/Añadir la Leccion Aprendida.');
                $this->data['cerrar'] = TRUE;
            }  else{
                $this->session->set_flashdata('error',"Algun Error al Registrar/Añadir la Leccion Aprendida , Nombre : ".$nombre." , (En BD.)");
                log_message('error',"Algun Error al modificar la Leccion Aprendida, Nombre : ".$nombre." , (En BD.)");
                $this->data['cerrar'] = FALSE;
                //unlink($ruta);
            }
            //var_dump($etiquetas,$id_dominio); 
        }
        $this->data['dominios'] = $this->dominio_model->get_all_dominios();
        $this->data['etiquetas'] = $this->etiqueta_model->get_all_etiquetas();
        $this->data['view'] = 'lecciones/adicionarLeccion';
        $this->load->view("template/reporte",$this->data);
    }
    public function editar($id_leccion_aprendida) {
        $this->data['nombrePagina'] = "Editar Leccion Aprendida";
        $leccion_aprendida = $this->lecciones_model->get_one_leccion($id_leccion_aprendida);
        if (isset($leccion_aprendida) && !empty($leccion_aprendida)) {
            if($leccion_aprendida["eliminado"] === 1){
                $this->session->set_flashdata('error', 'NO se puede modificar la Leccion Aprendida, pues ha sido Eliminada.');
                redirect(base_url("lecciones_aprendidas"));
            }else {
                if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['editarLeccionAprendida'])) {
                    $nombre = ("" !== $this->input->post('nombre') ? $this->input->post('nombre') : "Sin Nombre");
                    $id_dominio = ("" !== $this->input->post('id_dominio') ? $this->input->post('id_dominio') : NULL);
                    $etiquetas = ("" !== $this->input->post('id_etiquetas') ? $this->input->post('id_etiquetas') : NULL);
                    $descripcion = ("" !== $this->input->post('descripcion') ? $this->input->post('descripcion') : NULL);
                    $id_etiquetas = implode(",",$etiquetas);
                    $archivo = $this->do_upload('archivo_excel');
                    if ($archivo) {
                        $nombre_archivo = 'assets/archivos/lecciones/'.$archivo;
                    } else {
                        $nombre_archivo = $leccion_aprendida["ruta_archivo"];
                    }
                    $resultado = $this->lecciones_model->update_leccion($nombre, $id_dominio, $id_etiquetas,$descripcion,$id_leccion_aprendida,$nombre_archivo);
                    if ($resultado) {
                        $this->session->set_flashdata('success', 'Exito al Editar la Leccion Aprendida.');
                        $this->data['cerrar'] = TRUE;
                    } else {
                        $this->session->set_flashdata('error',"Algun Error al Editar/Modificar la Leccion Aprendida, id_leccion_aprendida : ".$id_leccion_aprendida." , (En BD.)");
                        log_message('error',"Algun Error al modificar la Leccion Aprendida, id_leccion_aprendida : ".$id_leccion_aprendida." , (En BD.)");
                        $this->data['cerrar'] = FALSE;
                    }
                }
                if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['eliminarLeccionAprendida'])) {
                    $resultado = $this->lecciones_model->eliminar_leccion_aprendida($id_leccion_aprendida);
                    if ($resultado) {
                        $this->session->set_flashdata('success', 'Exito al Eliminar la Leccion Aprendida.');
                        $this->data['cerrar'] = TRUE;
                    } else {
                        $this->session->set_flashdata('error',"Algun Error al Eliminar la Leccion Aprendida, id_leccion_aprendida : ".$id_leccion_aprendida." , (En BD.)");
                        log_message('error',"Algun Error al Eliminar la Leccion Aprendida, id_leccion_aprendida : ".$id_leccion_aprendida." , (En BD.)");
                        $this->data['cerrar'] = FALSE;
                    }
                }
            }
            $this->data['lecciones_editar'] = explode(',',$leccion_aprendida['etiquetas']);
            $this->data['leccion_aprendida'] = $leccion_aprendida;
            $this->data['dominios'] = $this->dominio_model->get_all_dominios();
            $this->data['etiquetas'] = $this->etiqueta_model->get_all_etiquetas();
            $this->data['view'] = 'lecciones/editarLeccion';
            $this->load->view("template/reporte",$this->data);
        } else {
            $this->session->set_flashdata('error', 'NO existe la Leccion Aprendida o no ha sido Registrada.');
            redirect(base_url("lecciones_aprendidas"));
        }
    }
    public function buscar() {
        $asunto = "Sin Asunto";
        $this->benchmark->mark('inicio');
        $lecciones = $this->lecciones_model->get_all_lecciones();
        $this->benchmark->mark('fin');
        $tiempo=$this->benchmark->elapsed_time('inicio','fin');
        if ($this->input->server('REQUEST_METHOD')=='POST'&&isset($_POST['buscar_leccion'])) {
            $asunto = (""!==$this->input->post('asunto')?$this->input->post('asunto'):"");
            $this->benchmark->mark('inicio2');
            $lecciones = $this->lecciones_model->get_all_lecciones_busqueda($asunto);
            $this->benchmark->mark('fin2');
            $tiempo=$this->benchmark->elapsed_time('inicio2','fin2');
        }
        $dataResultado = array("asunto"=>$asunto,"resultados"=>count($lecciones),"lecciones"=>$lecciones,"tiempo"=>$tiempo);
        $this->data["dataResultado"]=$dataResultado;
        $this->data["view"]="lecciones/buscar";
        $this->load->view("template/template",$this->data);
    }
}
