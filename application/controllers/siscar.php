<?php Class Siscar extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("siscar_model");
        $this->load->model("empleados_model");
        $this->load->model("usuarios_model");
        $this->load->model("empleado_dominio_model");
        //$this->load->library('logincts');
        $this->load->library("session");
        $this->load->library("form_validation");
        $this->load->library("emailnotificaciones_cls");
        $this->load->library("recaptcha");
        $this->load->helper("captcha");
    }
    public function index() {
        if((!$this->session->userdata("session_id"))||(!$this->session->userdata("logueado"))) {
            redirect(base_url("login"));
        }
        if($this->input->server("REQUEST_METHOD")=="POST"&&isset($_POST["filtrarEmpleados"])) {
            if (""!==$this->input->post("fecha_consulta")) {
                $fecha_consulta = $this->input->post("fecha_consulta");
                $fecha_consulta = date_create($fecha_consulta);
                $fecha_consulta = date_format($fecha_consulta,"Y-m-d");
            } else {
                $fecha_consulta = null;
            }
            $this->session->set_flashdata("success","Datos filtrados con fecha: ".$fecha_consulta);
        }
        $this->data['empleados_por_dominio']=$this->empleados_model->get_nro_empleados_por_dominio();
        $this->data['menuPanel'] = 'Panel';
        $this->data['view'] = 'siscar/panel';
        $this->load->view("template/template",$this->data);
    }
    public function modificarPassword() {
        if ((!$this->session->userdata("session_id"))||(!$this->session->userdata("logueado"))) {
            redirect(base_url("login"));
        }
        $passwordAnt=$this->input->post("passwordAnt");
        $password=$this->input->post("password");
        $result=$this->siscar_model->modificarPassword($password,$passwordAnt,$this->session->userdata('id_usuario'));
        if($result){
            $this->session->set_flashdata("success","El Password ha sido actualizado.");
            redirect(base_url("miCuenta"));
        } else {
            $this->session->set_flashdata("error","Ocurrio un error al actualizar el Password.");
            redirect(base_url("miCuenta"));
        }
    }
    public function configurarCaptcha() {
        $configuracionCaptcha=$this->config->item("configuracion");
        $configuracionCaptcha["img_url"]=base_url()."assets/captcha_images/";
        $configuracionCaptcha["font_path"]=base_url("system/fonts/texb.ttf");
        $captcha=create_captcha($configuracionCaptcha);
        $this->session->unset_userdata("codigoCaptcha");
        $this->session->set_userdata("codigoCaptcha",$captcha["word"]);
        return $captcha;
    }
    public function actualizarCaptcha() {
        $dataCaptcha=$this->configurarCaptcha();
        $this->session->unset_userdata("codigoCaptcha");
        $this->session->set_userdata("codigoCaptcha",$dataCaptcha["word"]);
        print($dataCaptcha["image"]);
    }
    public function login() {
        //$this->session->sess_destroy();
        $metodoLoginAntiRobot=$this->config->item("metodoLoginAntiRobot");
        if($metodoLoginAntiRobot!=""&&$metodoLoginAntiRobot==="R"){
            $data=array(
                "metodoLoginAntiRobot"=>$metodoLoginAntiRobot,
                "widget"=>$this->recaptcha->getWidget(array("data-theme"=>"light")),
                "scriptGoogleReCaptcha"=>$this->recaptcha->getScriptTag());
        }
        if($metodoLoginAntiRobot!=""&&$metodoLoginAntiRobot==="C"){
            $data["metodoLoginAntiRobot"]=$metodoLoginAntiRobot;
            $dataCaptcha=$this->configurarCaptcha();
            $data["imagenCaptcha"]=$dataCaptcha["image"];
        }
        if($metodoLoginAntiRobot!=""&&$metodoLoginAntiRobot==="N"){
            $data["metodoLoginAntiRobot"]=$metodoLoginAntiRobot;
        }
        $this->load->view("siscar/login",$data);
    }
    public function salir() {
        $this->session->sess_destroy();
        //session_destroy();
        redirect(base_url("login"));
    }
    public function loginFenix() {
        header("Content-type:application/json");
        $codigo=$this->input->post("codigo");
        $recordarme=$this->input->post("recordarme");
        $usuario=$this->usuarios_model->get_one_usuario_empleado($codigo);
        if (count($usuario) > 0) {
            if(isset($usuario["fk_empleado"]) && $usuario["fk_empleado"] != '' )
            {
                $empleado = $this->empleados_model->get_one_empleado_edad($usuario["fk_empleado"]);
            }else{
                $empleado = null;
            }
            $empleado_lider_dominios = $this->empleado_dominio_model->get_one_empleado_lider_dominio($empleado["id_empleado"]);
            if(is_array($empleado_lider_dominios) && !empty($empleado_lider_dominios)){
                $empleado_lider_dominios = explode(",", $empleado_lider_dominios["dominios"]);
            }
            $datos = array(
                "id_usuario"=>$usuarioLogin["id_usuario"], 
                "username"=>$usuarioLogin["username"],
                "nombre_usuario"=>$usuarioLogin["username"]."-".$usuarioLogin["nombre"], 
                "permiso"=>$usuarioLogin["fk_permiso"],
                "nombre_permiso"=>$usuarioLogin["nombre_permiso"],
                "logueado"=>TRUE , 
                "foto"=>$usuarioLogin["foto"],
                "empleado"=>$empleado,
                "empleado_lider_dominios"=>$empleado_lider_dominios,
                "last_visited"=> date("Y-m-d H:i:s")
            );
            if(isset($recordarme)&&$recordarme!=""){
                $this->session->sess_expiration=10800;//3 horas
            }
            $this->session->set_userdata($datos);
            $json = array("resultado"=>true);
        } else {
            $json = array("resultado"=>false,"mensaje"=>"Es un Empleado pero, no tiene una cuenta asociada en el sistema.");
        }
        print(json_encode($json));
    }
    public function loginSiscar() {
        $ajax=$this->input->get("ajax");
        $metodoLoginAntiRobot=$this->config->item("metodoLoginAntiRobot");
        $this->load->library("encrypt");
        $usuario=$this->input->post("usuario");
        $password=$this->encrypt->sha1($this->input->post("password"));
        $recordarme=$this->input->post("recordarme");
        if($metodoLoginAntiRobot!=""&&$metodoLoginAntiRobot==="R") {
            $recaptcha=$this->input->post("g-recaptcha-response");
            if (!empty($recaptcha)) {
                $response=$this->recaptcha->verifyResponse($recaptcha);
                if (isset($response["success"])&&$response["success"]===true) {
                    $json=$this->validarUsuario($usuario,$password,$recordarme,$ajax);
                }else{
                    $json=array("resultado"=>false,"mensaje"=>"Re-Captcha Incorrecto, detalle:".json_encode($response["error-codes"]));
                }
            }
        }
        if($metodoLoginAntiRobot!=""&&$metodoLoginAntiRobot==="C") {
            $captchaStr=$this->input->post("captcha");
            $captchaSesion=$this->session->userdata("codigoCaptcha");
            if(strcasecmp($captchaStr,$captchaSesion)==0){
                $json=$this->validarUsuario($usuario,$password,$recordarme,$ajax);
            }else{
                $json=array("resultado"=>false,"mensaje"=>"Captcha Incorrecto., enviado:".$captchaStr." , captcha: ".$captchaSesion);
            }
        }
        if($metodoLoginAntiRobot!=""&&$metodoLoginAntiRobot==="N") {
            $json=$this->validarUsuario($usuario,$password,$recordarme,$ajax);
        }
        header("Content-type:application/json");
        print(json_encode($json));
    }
    public function validarUsuario($usuario,$password,$recordarme,$ajax) {
        $usuarioLogin=$this->usuarios_model->get_one_usuario_permiso($usuario,$password);
        if (count($usuarioLogin)>0) {
            if(isset($usuarioLogin["fk_empleado"])&&$usuarioLogin["fk_empleado"]!="")
            {
                $empleado = $this->empleados_model->get_one_empleado_edad($usuarioLogin["fk_empleado"]);
            }else{
                $empleado = null;
            }
            $empleado_lider_dominios = $this->empleado_dominio_model->get_one_empleado_lider_dominio($empleado["id_empleado"]);
            if(is_array($empleado_lider_dominios) && !empty($empleado_lider_dominios)){
                $empleado_lider_dominios = explode(",",$empleado_lider_dominios["dominios"]);
            }
            $datos = array(
                "id_usuario"=>$usuarioLogin["id_usuario"], 
                "username"=>$usuarioLogin["username"],
                "nombre_usuario"=>$usuarioLogin["username"]."-".$usuarioLogin["nombre"], 
                "permiso"=>$usuarioLogin["fk_permiso"],
                "nombre_permiso"=>$usuarioLogin["nombre_permiso"],
                "logueado"=>TRUE , 
                "foto"=>$usuarioLogin["foto"],
                "empleado"=>$empleado,
                "empleado_lider_dominios"=>$empleado_lider_dominios,
                "last_visited"=> date("Y-m-d H:i:s")
            );
            if(isset($recordarme)&&$recordarme!=""){
                $this->session->sess_expiration=10800;//3 horas
            }
            $this->session->set_userdata($datos);
            if ($ajax==true) {
                $json=array("resultado"=>true,"mensaje"=>"Exito en Login");
            } else {
                $json = array("resultado"=>false,"mensaje"=>"No es por Ajax.Por favor inténtelo nuevamente o sírvase comunicarse con el administrador del Sistema.");
            }
        }else {
            if ($ajax==true) {
                $json=array("resultado"=>false,"mensaje"=>"Los Datos de acceso son Incorrectos o el Usuario no Existe.Por favor inténtelo nuevamente o sírvase comunicarse con el administrador del Sistema.");
            } else {
                $json = array("resultado"=>false,"mensaje"=>"No es por Ajax.Por favor inténtelo nuevamente o sírvase comunicarse con el administrador del Sistema.");
            }
        }
        return $json;
    }
    public function miCuenta() {
        if((!$this->session->userdata('session_id'))||(!$this->session->userdata('logueado'))) {
            redirect(base_url("login"));
        }
        $usuario=$this->siscar_model->getById($this->session->userdata("id_usuario"));
        $empleado=$this->session->userdata("empleado");
        $nombresDominios="";
        if(!empty($empleado)){
            $empleadoLiderDominios=$this->empleado_dominio_model->get_one_empleado_lider_dominio($empleado["id_empleado"]);
            if(isset($empleadoLiderDominios)&&isset($empleadoLiderDominios["dominios"]))
            {  $nombresDominios=$this->dominio_model->get_nombres_dominios($empleadoLiderDominios["dominios"]); }
        }
        $this->data["usuario"]=$usuario;
        $this->data["empleado"]=$empleado;
        $this->data["nombresDominios"]=$nombresDominios;
        $this->data["view"]="siscar/miCuenta";
        $this->load->view("template/template",$this->data);
    }
    public function backup() {
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logueado'))) {
            redirect(base_url("login"));
        }
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'cBackup')) {
            $this->session->set_flashdata('error', 'No tiene permiso para realizar un BackUp.');
            redirect(base_url());
        }
        $this->load->dbutil();
        $prefs=array('ignore'=> array(),'format'=>'zip','filename' =>'siscar-'.date("Y-m-d H-i-s").'.sql','add_drop'=>TRUE,'add_insert'=>TRUE,'newline'=>"\n");
        $backup=&$this->dbutil->backup($prefs);
        $this->load->helper('file');
        write_file(base_url("backup/backup.zip"),$backup);
        $this->load->helper("download");
        force_download("siscar".date('d-m-Y H:m:s').'.zip',$backup);
    }
    public function do_upload() {
        if ((!$this->session->userdata("session_id"))||(!$this->session->userdata("logueado"))) {
            redirect(base_url("login"));
        }
        $this->load->library("upload");
        $image_upload_folder=FCPATH."assets/uploads";
        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
        }
        $this->upload_config = array(
            "upload_path"=>$image_upload_folder,
            "allowed_types"=>"png|jpg|jpeg|bmp",
            "max_size"=>2048,
            "remove_space"=>TRUE,
            "encrypt_name"=>TRUE,
        );
        $this->upload->initialize($this->upload_config);
        if (!$this->upload->do_upload()) {
            $upload_error = $this->upload->display_errors();
            print_r($upload_error);
            exit();
        } else {
            $file_info = array($this->upload->data());
            return $file_info[0]["file_name"];
        }
    }
    public function error404() {
        $this->load->view("siscar/error404");
    }
    /*  RECUPERACION DE CUENTA POR EMAIL */
    public function forgot_password() {
        if ($this->input->server("REQUEST_METHOD")=="POST"&&isset($_POST["email"])) {
            ini_set("max_execution_time", 0);
            ini_set("memory_limit","2048M");
            $this->form_validation->set_rules("email","Email","required");
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("error","Complete todos los campos.");
                redirect(base_url("forgot_password"));
            } else {
                $email=$this->input->post("email");
                $this->db->where("email",$email);
                $this->db->from('usuario');
                $num_res = $this->db->count_all_results();
                if ($num_res==1) {
                    $code = mt_rand('5000', '200000');
                    $data = array(
                        'fsw' => $code,
                        'fchRgFsw' => date("Y-m-d H:i:s")
                    );
                    $this->db->where('email', $email);
                    if ($this->db->update('usuario',$data)) {
                        $usuario = $this->siscar_model->get_all_by_code_match($code);
                        $asunto="Re-establecimiento de Contraseña en SISCAR | Centro de Alto Rendimiento - Trujillo, SISCAR-T.";
                        $cuerpo = array(
                            "usuario"=>$usuario,
                            "urlRestablecimiento"=>base_url("new_password/".$code),
                            "email"=>$email,
                            "rutaServer"=>base_url(),
                            "emailAdmin"=>$this->config->item("emailSISCAR"),
                        );
                        $emails=array($email);
                        $resultado=$this->emailnotificaciones_cls->enviar_mail_reestablecer_password($emails,$asunto,$cuerpo);
                        if ($resultado) {
                            $data["submit_success"]=true;
                            $this->session->set_flashdata("success","Se Envio un Email a : <h3>".$email."</h3>, para el reestablecimiento de su contraseña.");
                            redirect(base_url("forgot_password"));
                        } else {
                            $this->session->set_flashdata("error","Ocurrio Algun Error al Enviar el Email.");
                            $this->load->view("siscar/forgot_password");
                        }
                    } else {
                        $this->session->set_flashdata("error","Ocurrio Algun Error al Generar el codigo de re-establecimiento de nueva contraseña.");
                        redirect(base_url("forgot_password"));
                    }
                } else {
                    $this->session->set_flashdata("error","No existe el Email ingresado, o no esta asociado a alguna cuenta en SISCAR.");
                    redirect(base_url("forgot_password"));
                }
            }
        } else {
            $this->load->view("siscar/forgot_password");
        }
    }
    public function new_password($code) {
        $this->data['datos'] = $this->siscar_model->get_all_by_code_match($code);
        if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['confirmar_cambio_password'])) {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('code', 'Código', 'required|min_length[4]|max_length[7]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|min_length[5]|max_length[125]');
            $this->form_validation->set_rules('password1', 'Nueva Contraseña', 'required|min_length[5]');
            $this->form_validation->set_rules('password2', 'Confirmación de Contraseña', 'required|min_length[5]|matches[password1]');
            if ($this->input->post()) {
                $data['code'] = $this->input->post('code');
            } else {
                $data['code'] = $code;
            }
            if ($this->form_validation->run() == FALSE) {
                $this->data['error'] = "error";
            } else {
                $email = $this->input->post('email');
                if (!$this->siscar_model->does_code_match($data['code'], $email)) {
                    redirect(base_url("new_password/".$data['code']));
                } else {
                    $this->load->library('encrypt');
                    $hash = $this->encrypt->sha1($this->input->post('password1'));
                    $result = $this->siscar_model->update_user($hash, $email, $this->data['datos']['id_usuario']);
                    if ($result) {
                        $this->session->set_flashdata('success', 'Su Contraseña se ha actualizado, puede volver a Ingresar con su nueva Contraseña.');
                        redirect(base_url("forgot_password"));
                    } else {
                        $this->session->set_flashdata('error', 'Ocurrio algun error al momento de actualizar su contraseña.');
                        redirect(base_url("new_password/".$data['code']));
                    }
                }
            }
        }
        if (!isset($this->data['datos']) || !$this->data['datos']) {
            $this->session->set_flashdata('error', 'Codigo de re-establecimiento de Contraseña Incorrecto.');
            $this->data['error'] = "Codigo de re-establecimiento de Contraseña Incorrecto.";
        }
        $this->load->view("siscar/new_password",$this->data);
    }
    /*  AUTOCOMPLETADO DE USUARIOS EN EL LOGIN  */
    public function autoCompleteUsuario()
    {
        header("Content-type:application/json");
        if(isset($_GET["term"]))
        {   $q=strtolower($_GET["term"]);
            $usuarios=$this->usuarios_model->autoCompleteUsuario($q);
        }
        print(json_encode($usuarios));
    }
    /* Sesion Expirada */
    public function actualizarSesion(){
        $lastVisitTime=strtotime($this->session->userdata("last_visited"));
        $fin=strtotime("+2 minutes",$lastVisitTime);
        $ahora=strtotime(date("Y-m-d H:i:s"));
        $diff=($lastVisitTime+$fin)-$ahora;
        $segundos=intval(date("s",$diff));
        $jsonResponse=array(
            "segundos"=>$segundos,
            "mensaje"=>"Te quedan ".$segundos." segundos , de sesion."
        );
        print(json_encode($jsonResponse));
        log_message("info"," session: ".$lastVisitTime = strtotime($this->session->userdata("last_visited")));
    }
    public function session_expired() {
        if ($this->input->server("REQUEST_METHOD")=="POST"&&isset($_POST["desbloquear"])&&isset($_POST["password"])) {
            $username=$this->session->userdata("username");
            $password=$this->input->post("password");
            $this->load->library('encrypt');
            $password = $this->encrypt->sha1($password);
            $usuarioLogin=$this->usuarios_model->get_one_usuario_permiso($username,$password);
            if (isset($usuarioLogin)&&count($usuarioLogin)>0) {
                redirect(base_url());
            }else{
               $this->session->set_flashdata("error","Password Incorrecto."); 
            }
        }
        $this->load->view("siscar/session_expired");
    }
}