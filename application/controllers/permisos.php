<?php Class Permisos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id'))||(!$this->session->userdata('logueado'))) {
            redirect(base_url("login"));
        }
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata("permiso"),"cPermiso")) {
            $this->session->set_flashdata("error","No cuenta con permiso para configurar los Permisos del Sistema.");
            redirect(base_url("permisos"));
        }
        $this->load->helper(array("form","codegen_helper"));
        $this->load->model("permisos_model");
        $this->data["menuConfiguraciones"]="Configuraciones";
        $this->data["menuPermisos"]="Permisos";
    }
    public function index() {
        $this->data["permisos"]=$this->permisos_model->get_all_permisos();
        $this->data["view"]="permisos/permisos";
        $this->load->view("template/template",$this->data);
    }
    public function adicionar() {
        $this->load->library("form_validation");
        $this->data["custom_error"]="";
        $this->form_validation->set_rules("nombre","Nombre","trim|required|xss_clean");
        if ($this->form_validation->run()==false) {
            $this->data["custom_error"]=(validation_errors()?'<div class="form_error">'.validation_errors().'</div>':false);
        } else {
            $nombrePermiso = $this->input->post('nombre');
            $fecha = date('Y-m-d');
            $estado = 1;
            $permisos = array(
                'vDashboard' => $this->input->post('vDashboard'),
                'vEmpleado' => $this->input->post('vEmpleado'),
                'aEmpleado' => $this->input->post('aEmpleado'),
                'eEmpleado' => $this->input->post('eEmpleado'),
                'dEmpleado' => $this->input->post('dEmpleado'),
                'vVacaciones' => $this->input->post('vVacaciones'),
                'aVacaciones' => $this->input->post('aVacaciones'),
                'eVacaciones' => $this->input->post('eVacaciones'),
                'dVacaciones' => $this->input->post('dVacaciones'),
                'vLecAprendidas' => $this->input->post('vLecAprendidas'),
                'aLecAprendidas' => $this->input->post('aLecAprendidas'),
                'eLecAprendidas' => $this->input->post('eLecAprendidas'),
                'dLecAprendidas' => $this->input->post('dLecAprendidas'),
                'vPresupuestoAnual' => $this->input->post('vPresupuestoAnual'),
                'aPresupuestoAnual' => $this->input->post('aPresupuestoAnual'),
                'ePresupuestoAnual' => $this->input->post('ePresupuestoAnual'),
                'dPresupuestoAnual' => $this->input->post('dPresupuestoAnual'),
                'vDemanda' => $this->input->post('vDemanda'),
                'aDemanda' => $this->input->post('aDemanda'),
                'eDemanda' => $this->input->post('eDemanda'),
                'eDemandaDominio' => $this->input->post('eDemandaDominio'),
                'dDemanda' => $this->input->post('dDemanda'),
                'vReporteComparativo' => $this->input->post('vReporteComparativo'),
                'vSeguimientoDemanda' => $this->input->post('vSeguimientoDemanda'),
                'vResultadosEconomicos' => $this->input->post('vResultadosEconomicos'),
                'mDominios' => $this->input->post('mDominios'),
                'mRoles' => $this->input->post('mRoles'),
                'mCategorias' => $this->input->post('mCategorias'),
                'mInstitucionEducativa' => $this->input->post('mInstitucionEducativa'),
                'mTecnologias' => $this->input->post('mTecnologias'),
                'mEtiquetas' => $this->input->post('mEtiquetas'),
                'mClientes' => $this->input->post('mClientes'),
                'cUsuario' => $this->input->post('cUsuario'),
                'cPermiso' => $this->input->post('cPermiso'),
                'cBackup' => $this->input->post('cBackup')
            );
            $permisos=serialize($permisos);
            $data=array(
                'nombre' => $nombrePermiso,
                'fecha' => $fecha,
                'permisos' => $permisos,
                'estado' => $estado
            );
            if ($this->permisos_model->add('permiso', $data) == TRUE) {
                $this->session->set_flashdata('success', 'Permiso Registrado con Exito.');
                redirect(base_url("permisos"));
            } else {
                $this->session->set_flashdata('error', 'Ocurrio algun Error al Registrar el Permiso.');
                redirect(base_url("permisos"));
            }
            //var_dump($permisos);
        }
        $this->data['view']='permisos/adicionarPermiso';
        $this->load->view("template/template",$this->data);
    }
    public function editar() {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Permiso no encontrado.');
            redirect(base_url("permisos"));
        }
        if (is_numeric($this->uri->segment(3))) {
            $permiso = $this->permisos_model->getById($this->uri->segment(3));
            if (!isset($permiso->id_permiso)) {
                $this->session->set_flashdata('error', 'Permiso no encontrado.');
                redirect(base_url("permisos"));
            } else {
                if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['editarPermiso'])) {
                    $nombrePermiso = $this->input->post('nombre');
                    $estado = $this->input->post('estado');
                    $permisos = array(
                        'vDashboard' => $this->input->post('vDashboard'),
                        'vEmpleado' => $this->input->post('vEmpleado'),
                        'aEmpleado' => $this->input->post('aEmpleado'),
                        'eEmpleado' => $this->input->post('eEmpleado'),
                        'dEmpleado' => $this->input->post('dEmpleado'),
                        'vVacaciones' => $this->input->post('vVacaciones'),
                        'aVacaciones' => $this->input->post('aVacaciones'),
                        'eVacaciones' => $this->input->post('eVacaciones'),
                        'dVacaciones' => $this->input->post('dVacaciones'),
                        'vLecAprendidas' => $this->input->post('vLecAprendidas'),
                        'aLecAprendidas' => $this->input->post('aLecAprendidas'),
                        'eLecAprendidas' => $this->input->post('eLecAprendidas'),
                        'dLecAprendidas' => $this->input->post('dLecAprendidas'),
                        'vPresupuestoAnual' => $this->input->post('vPresupuestoAnual'),
                        'aPresupuestoAnual' => $this->input->post('aPresupuestoAnual'),
                        'ePresupuestoAnual' => $this->input->post('ePresupuestoAnual'),
                        'dPresupuestoAnual' => $this->input->post('dPresupuestoAnual'),
                        'vDemanda' => $this->input->post('vDemanda'),
                        'aDemanda' => $this->input->post('aDemanda'),
                        'eDemanda' => $this->input->post('eDemanda'),
                        'eDemandaDominio' => $this->input->post('eDemandaDominio'),
                        'dDemanda' => $this->input->post('dDemanda'),
                        'vReporteComparativo' => $this->input->post('vReporteComparativo'),
                        'vSeguimientoDemanda' => $this->input->post('vSeguimientoDemanda'),
                        'vResultadosEconomicos' => $this->input->post('vResultadosEconomicos'),
                        'mDominios' => $this->input->post('mDominios'),
                        'mRoles' => $this->input->post('mRoles'),
                        'mCategorias' => $this->input->post('mCategorias'),
                        'mInstitucionEducativa' => $this->input->post('mInstitucionEducativa'),
                        'mTecnologias' => $this->input->post('mTecnologias'),
                        'mEtiquetas' => $this->input->post('mEtiquetas'),
                        'mClientes' => $this->input->post('mClientes'),
                        'cUsuario' => $this->input->post('cUsuario'),
                        'cPermiso' => $this->input->post('cPermiso'),
                        'cBackup' => $this->input->post('cBackup')
                    );
                    $permisos = serialize($permisos);
                    $data = array(
                        'nombre' => $nombrePermiso,
                        'permisos' => $permisos,
                        'fecha' => date("Y-m-d"),
                        'estado' => $estado
                    );
                    //var_dump($data);
                    if ($this->permisos_model->edit('permiso', $data, 'id_permiso', $this->input->post('id_permiso')) == TRUE) {
                        $this->session->set_flashdata('success', 'Permiso Modificado con exito.');
                        redirect(base_url("permisos"));
                    } else {
                        $this->data["custom_error"]='<div class="form_error"><p> Ocurrio un error al Actualizar el Permiso.</p></div>';
                    }
                }
                $this->data["result"]=$this->permisos_model->getById($this->uri->segment(3));
                $this->data["permiso"]= $this->permisos_model->get_one_permiso($this->uri->segment(3));
                $this->data["view"]="permisos/editarPermiso";
                $this->load->view("template/template",$this->data);
            }
        }
    }
    public function desactivar($id_permiso) {
        $permiso = $this->permisos_model->get_one_permiso($id_permiso);
        if (!isset($permiso) || $permiso["id_permiso"] === "") {
            $this->session->set_flashdata('error', 'Error el Permiso a Eliminar no existe o no esta Registrado.');
            redirect(base_url("permisos"));
        }
        $data = array('estado' => 0);
        if ($this->permisos_model->edit('permiso', $data, 'id_permiso', $id_permiso)) {
            $this->session->set_flashdata('success', 'Permiso Eliminado/Desactivado con Exito.');
        } else {
            $this->session->set_flashdata('error', 'Error al Eliminar/Desactivar el Permiso.');
        }
        redirect(base_url("permisos"));
    }
}