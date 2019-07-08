<?php Class Movil extends CI_Controller {
    
    public $configuracionFTP;

    public function __construct() {
        parent::__construct();
        $this->load->model("usuarios_model");
        $this->load->model("empleados_model");
        $this->load->model("empleado_dominio_model");
        $this->load->helper("guidV4");
        $this->load->helper("path");
        $this->load->library("ftp");
        $this->configuracionFTP=$this->config->item("configuracionFTP");
    }
    public function setHeaders() { 
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/x-json; charset=utf-8;");
    }
    public function loginMovil() {
        $this->load->library("encrypt");
        $codigoRespuesta="";
        $mensajeRespuesta="";
        $idTransaccion=guidV4();
        $request=json_decode(file_get_contents("php://input"),true);
        $usuario=$request["usuario"];
        $password=$this->encrypt->sha1($request["password"]);
        $usuarioLogin=$this->usuarios_model->get_one_usuario_permiso($usuario,$password);
        if (count($usuarioLogin)>0) {
            if($usuarioLogin["fk_empleado"]!=null&&isset($usuarioLogin["fk_empleado"])&&$usuarioLogin["fk_empleado"]!="")
            {
                $empleado=$this->empleados_model->get_one_empleado_edad($usuarioLogin["fk_empleado"]);
                $empleado_lider_dominios=$this->empleado_dominio_model->get_one_empleado_lider_dominio($empleado["id_empleado"]);
                if(is_array($empleado_lider_dominios)&&!empty($empleado_lider_dominios)){
                    $empleado_lider_dominios=explode(",",$empleado_lider_dominios["dominios"]);
                }
            }
            $datos=array(
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
            $codigoRespuesta=0;
            $mensajeRespuesta="Exito en Login";
        }else {
            $codigoRespuesta=1;
            $mensajeRespuesta="Usuario o password incorrectos.Por favor inténtelo nuevamente o sírvase comunicarse con el administrador del Sistema.";
        }
        $response=array("idTransaccion"=>$idTransaccion,"codigoRespuesta"=>$codigoRespuesta,"mensajeRespuesta"=>$mensajeRespuesta,"datos"=>$datos);
        $this->setHeaders();
        $response=json_encode($response);
        print($response);
    }
    public function subirMultimedia() {
        $request=json_decode(file_get_contents("php://input"),true);
        $codigoRespuesta="";
        $mensajeRespuesta="";
        $idTransaccion=guidV4();
        $idUsuario=$request["idUsuario"];
        $nombreMultimedia=$request["nombreMultimedia"];
        $tipoMultimedia=$request["tipoMultimedia"];
        $strBase64=$request["strBase64"];
        if(($idUsuario!=null&&isset($idUsuario)&&$idUsuario!="")&& 
           ($strBase64!=null&&isset($strBase64)&&$strBase64!="")&& 
           ($nombreMultimedia!=null&&isset($nombreMultimedia)&&$nombreMultimedia!="")&&
           ($tipoMultimedia!=null&&isset($tipoMultimedia)&&$tipoMultimedia!="")
        )
        {   
            $carpetaRaiz=FCPATH."assets/archivos/encuestador/";
            $carpetaFTP="encuestador/";
            $anioMes=date("Ym");
            if($tipoMultimedia=="imagen"){
                $img=str_replace("data:image/jpeg;base64,","",$strBase64);
                $img=str_replace(" ","+",$img);
                $data=base64_decode($img);
                $carpetaSubida=$carpetaRaiz.$idUsuario."/".$anioMes."/";
                $rutaNombreArchivo=substr(set_realpath($carpetaSubida.$nombreMultimedia),0,-1);
                if(!file_exists($carpetaSubida))
                {
                    mkdir($carpetaSubida,DIR_WRITE_MODE,true);
                }
                if(file_put_contents($rutaNombreArchivo,$data)){
                    $carpetaSubidaFTP=$carpetaFTP.$idUsuario."/".$anioMes."/".$nombreMultimedia;
                    $respuesta=$this->subirFTP($carpetaSubidaFTP,$rutaNombreArchivo);
                    if($respuesta=="1"){
                        $codigoRespuesta=0;
                        $mensajeRespuesta="Exito al subir Imagen: ".$nombreMultimedia." al FTP ".$rutaFinal;
                    }else{
                        $codigoRespuesta=1;
                        $mensajeRespuesta="Error al subir Imagen: ".$nombreMultimedia." al FTP, detalle: ".$respuesta.$rutaFinal;
                    }
                    $rutaFTP=$carpetaSubidaFTP;
                    $codigoRespuesta=0;
                    $mensajeRespuesta="Exito al subir Imagen: ".$rutaFTP;
                }else{
                    $codigoRespuesta=1;
                    $mensajeRespuesta="Ocurrio algun error al subir Imagen: ".$rutaFTP;
                }
            }
            if($tipoMultimedia=="audio"){
                $audio=str_replace("data:audio/ogg;base64,","",$strBase64);
                $audio=str_replace(" ","+",$audio);
                $data=base64_decode($audio);
                $carpetaSubida=$carpetaRaiz.$idUsuario."/".$anioMes."/";
                $rutaFinal=$carpetaSubida.$nombreMultimedia;
                if(!file_exists($carpetaSubida)) 
                {
                    mkdir($carpetaSubida,DIR_WRITE_MODE,true);
                }
                if(file_put_contents($rutaFinal,$data)){
                    $codigoRespuesta=0;
                    $mensajeRespuesta="Exito al subir Audio : ".$nombreMultimedia;
                }else{
                    $codigoRespuesta=1;
                    $mensajeRespuesta="Ocurrio algun error al subir Audio: ".$nombreMultimedia;
                }
            }
            if($tipoMultimedia=="video"){
                $video=str_replace("data:video/mp4;base64,","",$strBase64);
                $video=str_replace(" ","+",$video);
                $data=base64_decode($video);
                $carpetaSubida=$carpetaRaiz.$idUsuario."/".$anioMes."/";
                $rutaFinal=$carpetaSubida.$nombreMultimedia;
                if(!file_exists($carpetaSubida)) 
                {
                    mkdir($carpetaSubida,DIR_WRITE_MODE,true);
                }
                if(file_put_contents($rutaFinal,$data)){
                    $codigoRespuesta=0;
                    $mensajeRespuesta="Exito al subir Video : ".$nombreMultimedia;
                }else{
                    $codigoRespuesta=1;
                    $mensajeRespuesta="Ocurrio algun error al subir Video: ".$nombreMultimedia;
                }
            }
        }else{
            $codigoRespuesta=2;
            $mensajeRespuesta="Faltan Parametros.";
        }
        $response=array("idTransaccion"=>$idTransaccion,"codigoRespuesta"=>$codigoRespuesta,"mensajeRespuesta"=>$mensajeRespuesta,"rutaFTP"=>$rutaFTP);
        $this->setHeaders();
        $response=json_encode($response);
        print($response);
    }
    public function subirFTP($rutaSubida,$archivo) {
        $subido="0";
        try {
            $this->ftp->connect($this->configuracionFTP);
            log_message("error"," archivo : ".$archivo.", rutaSubida: ".$rutaSubida);
            if($this->ftp->upload($archivo,$rutaSubida,"ascii",0775)) {
                $subido="1";
            }else{
                log_message("info","Error al subir a FTP.");
            }
            $this->ftp->close();
        } catch (Exception $e) {
            $subido="Error en : ".$e->getMessage();
            log_message("info",$subido);
        } finally{
            log_message("info"," Fin.");
        }
        return $subido;
    }
    public function listarFTP() {
        $idTransaccion=guidV4();
        $this->ftp->connect($this->configuracionFTP);
        $archivos=$this->ftp->list_files("/encuestador/18/20197");
        $this->ftp->close();
        $response=array("idTransaccion"=>$idTransaccion,"archivos"=>$archivos);
        $this->setHeaders();
        $response=json_encode($response);
        print($response);
    }
    public function crearCarpetaFTP() {
        $idTransaccion=guidV4();
        $request=json_decode(file_get_contents("php://input"),true);
        $nombreCarpeta=$request["nombreCarpeta"];
        try {
            $this->ftp->connect($this->configuracionFTP);
            $crear=$this->ftp->mkdir($nombreCarpeta,0755);
            log_message("info"," crear : ".$crear);
            $this->ftp->chmod($nombreCarpeta,0755);
            $this->ftp->close();
            $codigoRespuesta=0;
            $mensajeRespuesta="Exito al crear la carpeta : ".$nombreCarpeta;
        } catch (Exception $e) {
            $codigoRespuesta=-1;
            $mensajeRespuesta="Error al crear la carpeta : ".$nombreCarpeta.", detalle :".$e->getMessage();
            log_message("error"," Error : ".$e->getMessage());
        } finally{
            $response=array("idTransaccion"=>$idTransaccion,"codigoRespuesta"=>$codigoRespuesta,"mensajeRespuesta"=>$mensajeRespuesta);
            $this->setHeaders();
            $response=json_encode($response);
        }
        print($response);
    }
}