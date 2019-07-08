<?php Class Proveedores extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->library("form_validation");
        $this->load->model("dominio_model");
        $this->load->model("proveedor_model");
    }
    public function index() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/x-json; charset=utf-8;");
        $idDominio=$this->input->get("idGrupo",TRUE);
        $proveedores=array();
        if(isset($idDominio)&&$idDominio!=0)
        {
            $proveedores=$this->dominio_model->get_one_dominio($idDominio);
        }
        else{
            $proveedores=$this->dominio_model->get_all_dominios();
        }
        $json=array("codigoRespuesta"=>0,"mensajeRespuesta"=>"Exito al realizar la consulta, se encontraron: ".sizeof($proveedores)." proveedores.","proveedores"=>$proveedores);
        print(json_encode($json));
    }
    public function dominioDetalle() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/x-json; charset=utf-8;");
        $post=json_decode(file_get_contents('php://input'),true);
        log_message('error', "parametro1 : ".$post["parametro1"]." parametro2 : ".$post["parametro2"]);
        $dominio = $this->proveedor_model->get_dominio_empleados($post["parametro1"]);
        if(!empty($dominio))
        {
            $json = array("codigoRespuesta"=>0,"mensajeRespuesta"=>"Exito al realizar la consulta","dominio"=>$dominio);
        }else{
            $json = array("codigoRespuesta"=>1,"mensajeRespuesta"=>"Error Sin datos.");
        }
        print(json_encode($json));
    }
}