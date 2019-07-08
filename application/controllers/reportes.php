<?php Class Reportes extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id'))||(!$this->session->userdata('logueado'))) {
            redirect(base_url("login"));
        }
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),"vSeguimientoDemanda")) {
            $this->session->set_flashdata('error', 'No tiene el permiso de Visualizar Reportes.');
            redirect(base_url());
        }
        $this->load->model('demanda_model', '', TRUE);
        $this->load->model('permisos_model', '', TRUE);
        $this->data['menuReportes'] = 'Reportes';
    }
    public function index() {
        $this->data["view"]="reportes/index";
        $this->load->view("template/template",$this->data);
    }
    public function seguimiento_demanda() {
        $this->data['menuReporteSeguimientoDemanda'] = 'SeguimientoDemanda';
        if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['xx'])) {
            
        }
        $this->data['permisos'] = $this->permisos_model->getActive('permiso','permiso.id_permiso,permiso.nombre');
        $this->data['seguimientos'] = $this->demanda_model->get_all_seguimiento();
        $this->data['view'] = 'reportes/seguimientoDemanda';
        $this->load->view("template/template",$this->data);
    }
    public function seguimiento_demanda_ver($id_seguimiento) {
        $this->data['menuReporteSeguimientoDemanda'] = 'SeguimientoDemanda';
        if(intval($id_seguimiento)) {
            $id_seguimiento = intval($id_seguimiento);
            $seguimiento = $this->demanda_model->get_all_seguimiento_prevision($id_seguimiento);
            if (!isset($seguimiento["id_seguimiento"])) {
                $this->session->set_flashdata('error', 'Seguimiento de Demanda no encontrado.');
                redirect(base_url("reportes/seguimiento_demanda"));
            } else {
                $prevision_dominio = $this->demanda_model->get_all_prevision_dominio($seguimiento["fk_prevision"]);
                $this->data['seguimiento'] = $seguimiento;
                $this->data['prevision_dominio'] = $prevision_dominio;
                $this->data['view'] = 'reportes/seguimientoDemandaVer';
                $this->load->view("template/template",$this->data);
            }
        } else {
            redirect(base_url("error404"));
        }
    }
    /* SE AGREGO PARA REPORTES con PHPEXCEL */
    public function seguimiento_demanda_excel($id_seguimiento) {
        $id_seguimiento=intval($id_seguimiento);
        $seguimiento=$this->demanda_model->get_all_seguimiento_prevision($id_seguimiento);
        $prevision_dominio=$this->demanda_model->get_all_prevision_dominio($seguimiento["fk_prevision"]);
        $detalles=$seguimiento["seguimiento_prevision_detalle"];
        $nombreReporte="Seguimiento de Demanda : ".date_format(date_create($prevision_dominio['mes_anio']),'Y-m');
        if($this->input->server('REQUEST_METHOD')=="POST"&&isset($_POST['exportarExcel'])) {
            if($this->input->post('nombreReporte')!=null&&strlen($this->input->post('nombreReporte'))>0) {
                $nombreReporte=$this->input->post('nombreReporte');
            }
        }
        $this->load->library("excel");
        $object=new PHPExcel();
        $object->setActiveSheetIndex(0);
        $columnasReporte = array("Cliente",
            "Dominio","Colaboradores",
            "Nro horas vacaciones","Disponibilidad real",
            "Demanda confirmada por Lima (Horas)",
            "Demanda que debió enviarse (Ref en hrs)");
        $column=0;
        foreach($columnasReporte as $columnaReporte) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column,1,$columnaReporte);
            $column++;
        }
        $filaExcel=2;
        foreach($detalles as $fila) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$filaExcel,$fila["cliente"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$filaExcel,$fila["dominio"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$filaExcel,$fila["nro_empleados"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$filaExcel,$fila["nro_vacaciones"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4,$filaExcel,$fila["hrs_disponibles"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5,$filaExcel,$fila["hrs_solutions"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6,$filaExcel,$fila["hrs_plan_meta"]);
            $filaExcel++;
        }
        $object_writer=PHPExcel_IOFactory::createWriter($object,'Excel5');
        header("Content-Type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'.$nombreReporte.'.xls"');
        $object_writer->save('php://output');
    }
}