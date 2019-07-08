<?php Class Vacaciones extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id'))||(!$this->session->userdata('logueado'))) {
            redirect(base_url("login"));
        }
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata("permiso"),"vVacaciones")) {
            $this->session->set_flashdata("error","No cuenta con permiso para configurar Vacaciones.");
            redirect(base_url());
        }
        $this->load->helper('date');
        $this->load->helper(array('codegen_helper'));
        $this->load->model('empleados_model', '', TRUE);
        $this->load->model('vacaciones_model', '', TRUE);
        $this->data['menuVacaciones']='vacaciones';
    }
    public function index() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata("permiso"),"vVacaciones")) {
            $this->session->set_flashdata("error","No tiene el permiso para Visualizar Vacaciones.");
            redirect(base_url());
        }
        $this->data["dominios"]=$this->empleados_model->get_all_data_dominios();
        $this->data["view"]="vacaciones/agrupadosDominio";
        $this->load->view("template/template",$this->data);
    }
    public function dominio($id_dominio) {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata("permiso"),"vVacaciones")) {
            $this->session->set_flashdata('error', 'No tiene el permiso para Visualizar el Dominio.');
            redirect(base_url("vacaciones"));
        } 
        $dominio = $this->dominio_model->get_one_dominio($id_dominio);
        if ( empty($dominio) ) {
            $this->session->set_flashdata("error","Dominio no encontrado.");
            redirect(base_url("vacaciones"));
        } else {
            $this->data['dominio'] = $dominio;
            $this->data['empleados'] = $this->empleados_model->get_all_empleado_por_dominio($id_dominio);
            $this->data['view'] = 'vacaciones/verDominio';
            $this->load->view("template/template",$this->data);
        }
    }
    /*Get all Vacaciones por Dominio */
    public function getEvents() {
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        $inicio=$this->input->post("start");
        $fin=$this->input->post("end");
        $fk_dominio=$this->input->post("fk_dominio");
        $result=$this->vacaciones_model->getEvents($inicio,$fin,$fk_dominio);
        print(json_encode($result));
    }
    /*Add new event */
    public function addEvent() {
        $nombre=$this->input->post("title");
        $inicio=$this->input->post("start");
        $fin=$this->input->post("end");
        $descripcion=$this->input->post("description");
        $color=$this->input->post("color");
        $fk_dominio=$this->input->post("fk_dominio");
        $fk_empleado=$this->input->post("fk_empleado");
        $allDay="true";
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        $result=$this->vacaciones_model->addEvent($nombre,$inicio,$fin,$descripcion,$color,$allDay,$fk_dominio,$fk_empleado);
        print($result);
    }
    /*Update Event */
    public function updateEvent() {
        $nombre=$this->input->post("title");
        $descripcion=$this->input->post("description");
        $color=$this->input->post("color");
        $id_vacaciones=$this->input->post("id");
        $fk_empleado=$this->input->post("fk_empleado");
        header("Content-type: application/json");
        header("Access-Control-Allow-Origin: *");
        $result=$this->vacaciones_model->updateEvent($nombre,$descripcion,$color,$id_vacaciones,$fk_empleado);
        print($result);
    }
    /*Delete Event*/
    public function deleteEvent() {
        $id_vacaciones=$this->input->get("id");
        header("Content-type: application/json");
        header("Access-Control-Allow-Origin: *");
        $result=$this->vacaciones_model->deleteEvent($id_vacaciones);
        print($result);
    }
    public function dragUpdateEvent() {	
        $inicio=$this->input->post("start");
        $fin=$this->input->post("end");
        $id_vacaciones=$this->input->post("id");
        header("Content-type: application/json");
        header("Access-Control-Allow-Origin: *");
        $result=$this->vacaciones_model->dragUpdateEvent($inicio,$fin,$id_vacaciones);
        print($result);
    }
}