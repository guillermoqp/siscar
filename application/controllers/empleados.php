<?php Class Empleados extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id'))||(!$this->session->userdata('logueado'))) {
            redirect(base_url("login"));
        }
        $this->load->helper('date');
        $this->load->helper(array('codegen_helper'));
        $this->load->model('empleados_model');
        $this->load->model('categoria_model');
        $this->load->model('empleado_categoria_model');
        $this->load->model('dominio_model');
        $this->load->model('empleado_dominio_model');
        $this->load->model('cliente_model');
        $this->load->model('tecnologia_model');
        $this->load->model('empleado_tecnologia_model');
        $this->load->model('institucion_educativa_model');
        $this->load->model('roles_model');
        $this->data['menuEmpleados'] = 'empleados';
    }
    public function index() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vEmpleado')) {
            $this->session->set_flashdata('error', 'No cuenta con los permisos para gestionar Empleados.');
            redirect(base_url());
        }
        $empleados = $this->empleados_model->get_all_empleado();
        if ($this->input->server('REQUEST_METHOD')=="POST"&&isset($_POST["filtrarEmpleados"])&&isset($_POST["fecha_consulta"])) {
            if (""!==$this->input->post("fecha_consulta")) {
                $fecha_consulta = $this->input->post("fecha_consulta");
                $fecha_consulta = date_create($fecha_consulta);
                $fecha_consulta = date_format($fecha_consulta,"Y-m-d");
            } else {
                $fecha_consulta = null;
            }
            //var_dump($fecha_consulta);
            $empleados = $this->empleados_model->get_all_empleado_filtro_fechas($fecha_consulta);
            $this->data['fecha_consulta'] = $fecha_consulta;
            $this->session->set_flashdata("success","Datos Filtrados.");
        }
        if ($this->input->server("REQUEST_METHOD")=="POST"&&isset($_POST["filtrarEmpleados"])&&isset($_POST["estado"])) {
            $id_cliente = $this->input->post('id_cliente');
            $id_dominio = $this->input->post('id_dominio');
            $id_categoria = $this->input->post('id_categoria');
            if ('' !== $this->input->post('fecha_ingreso')) {
                $fecha_ingreso = $this->input->post('fecha_ingreso');
                $fecha_ingreso = date_create($fecha_ingreso);
                $fecha_ingreso = date_format($fecha_ingreso, 'Y-m-d');
            } else {
                $fecha_ingreso = null;
            }
            if ('' !== $this->input->post('fecha_salida')) {
                $fecha_salida = $this->input->post('fecha_salida');
                $fecha_salida = date_create($fecha_salida);
                $fecha_salida = date_format($fecha_salida, 'Y-m-d');
            } else {
                $fecha_salida = null;
            }
            $estado=$this->input->post('estado');
            //var_dump($id_dominio,$id_categoria,$fecha_ingreso,$fecha_salida,$estado);
            $empleados=$this->empleados_model->get_all_empleado_filtro($id_cliente,$id_dominio,$id_categoria,$fecha_ingreso,$fecha_salida,$estado);
            $this->session->set_flashdata("success","Datos Filtrados.");
        }
        $this->data['clientes'] = $this->cliente_model->get_all_clientes();
        $this->data['dominios'] = $this->dominio_model->get_all_dominios();
        $this->data['categorias'] = $this->categoria_model->get_all_categorias();
        $this->data['empleados'] = $empleados;
        $this->data['view'] = 'empleados/empleados';
        $this->load->view("template/template",$this->data);
    }
    public function adicionar() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'aEmpleado')) {
            $this->session->set_flashdata('error', 'No tiene el permiso para agregar Empleados.');
            redirect(base_url());
        }
        if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['agregarEmpleado'])) {
            $fecha_ingreso = $this->input->post('fecha_ingreso');
            $fecha_ingreso = date_create($fecha_ingreso);
            $fecha_ingreso = date_format($fecha_ingreso, 'Y-m-d');
            $fecha_nacimiento = $this->input->post('fecha_nacimiento');
            $fecha_nacimiento = date_create($fecha_nacimiento);
            $fecha_nacimiento = date_format($fecha_nacimiento, 'Y-m-d');
            $fecha_prueba = date('Y-m-d', strtotime("+6 months", strtotime($fecha_ingreso)));
            $fecha_salida = null;
            $nombres = $this->input->post('nombres') . " " . $this->input->post('apellidos');
            $data = array(
                'cod_empleado' => $this->input->post('cod_empleado'),
                'nombres' => $this->input->post('nombres'),
                'apellidos' => $this->input->post('apellidos'),
                'dni' => $this->input->post('dni'),
                'sexo' => $this->input->post('sexo'),
                'estado_civil' => $this->input->post('estado_civil'),
                'fecha_nacimiento' => $fecha_nacimiento,
                'distrito' => $this->input->post('distrito_2'),
                'fk_institucion_educativa' => $this->input->post('fk_institucion_educativa'),
                'fk_rol' => $this->input->post('fk_rol'),
                'fecha_ingreso' => $fecha_ingreso,
                'fecha_prueba' => $fecha_prueba,
                'fecha_salida' => $fecha_salida,
                'direccion' => $this->input->post('direccion'),
                'telefono' => $this->input->post('telefono'),
                'movil' => $this->input->post('movil'),
                'estado' => $this->input->post('estado'),
                'comentarios' => $this->input->post('comentarios')
            );
            //var_dump($data);
            if ($this->empleados_model->add('empleado', $data) == TRUE) {
                $this->session->set_flashdata('success', 'Empleado adicionado con exito, debe gestionar su Dominio y su Categoria.');
                redirect(base_url("empleados"));
            } else {
                $this->session->set_flashdata('error', 'Ocurrio algun error al registrar al Empleado : ' . $nombres . ' en BD.');
                redirect(base_url("empleados/adicionar"));
            }
        }
        $this->data['institucion_educativa'] = $this->institucion_educativa_model->get_all_instituciones();
        $this->data['roles'] = $this->roles_model->get_all_roles();
        $this->data['view'] = 'empleados/adicionarEmpleado';
        $this->load->view("template/template",$this->data);
    }
    public function editar() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'eEmpleado')) {
            $this->session->set_flashdata('error', 'No tiene permisos para editar Empleados');
            redirect(base_url("empleados"));
        }
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Empleado no encontrado.');
            redirect(base_url("empleados"));
        }
        if (is_numeric($this->uri->segment(3))) {
            $empleado = $this->empleados_model->getById($this->uri->segment(3));
            if(!isset($empleado->id_empleado)) {
                $this->session->set_flashdata("error","Empleado no encontrado.");
                redirect(base_url("empleados"));
            } else {
                if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['editarEmpleado'])) {
                    $id_empleado = $this->input->post('id_empleado');
                    $fecha_ingreso = $this->input->post('fecha_ingreso');
                    $fecha_ingreso = date_create($fecha_ingreso);
                    $fecha_ingreso = date_format($fecha_ingreso, 'Y-m-d');
                    $fecha_nacimiento = $this->input->post('fecha_nacimiento');
                    $fecha_nacimiento = date_create($fecha_nacimiento);
                    $fecha_nacimiento = date_format($fecha_nacimiento, 'Y-m-d');
                    if ("" !== $this->input->post('fecha_salida')) {
                        $fecha_salida = $this->input->post('fecha_salida');
                        $fecha_salida = date_create($fecha_salida);
                        $fecha_salida = date_format($fecha_salida, 'Y-m-d');
                    } else {
                        $fecha_salida = null;
                    }
                    $nombres = $this->input->post('nombres') . " " . $this->input->post('apellidos');
                    $data = array(
                        'cod_empleado' => $this->input->post('cod_empleado'),
                        'nombres' => $this->input->post('nombres'),
                        'apellidos' => $this->input->post('apellidos'),
                        'dni' => $this->input->post('dni'),
                        'sexo' => $this->input->post('sexo'),
                        'estado_civil' => $this->input->post('estado_civil'),
                        'fecha_nacimiento' => $fecha_nacimiento,
                        'fecha_ingreso' => $fecha_ingreso,
                        'fecha_salida' => $fecha_salida,
                        'distrito' => $this->input->post('distrito_2'),
                        'fk_institucion_educativa' => $this->input->post('fk_institucion_educativa'),
                        'fk_rol' => $this->input->post('fk_rol'),
                        'direccion' => $this->input->post('direccion'),
                        'telefono' => $this->input->post('telefono'),
                        'movil' => $this->input->post('movil'),
                        'estado' => $this->input->post('estado'),
                        'comentarios' => $this->input->post('comentarios'),
                    );
                    if ($this->empleados_model->edit('empleado', $data, 'id_empleado', $id_empleado) == TRUE) {
                        $this->session->set_flashdata("success", "Datos del Empleado : " . $nombres . " ,  han sido modificados con exito.");
                        redirect(base_url("empleados"));
                    } else {
                        $this->session->set_flashdata("error", "Ocurrio algun error al modificar los datos del Empleado : " . $nombres . " ,  en BD.");
                        redirect(base_url("empleados/editar/".$id_empleado));
                    }
                }
                $this->data['institucion_educativa'] = $this->institucion_educativa_model->get_all_instituciones();
                $this->data['roles'] = $this->roles_model->get_all_roles();
                $this->data['result'] = $this->empleados_model->getById($this->uri->segment(3));
                $this->data['view'] = 'empleados/editarEmpleado';
                $this->load->view("template/template",$this->data);
            }
        }
    }
    public function visualizar() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vEmpleado')) {
            $this->session->set_flashdata('error', 'No tiene el permiso para editar empleados.');
            redirect(base_url("empleados"));
        }
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Empleado no encontrado.');
            redirect(base_url("empleados"));
        }
        if (is_numeric($this->uri->segment(3))) {
            $empleado = $this->empleados_model->getById($this->uri->segment(3));
            if (!isset($empleado->id_empleado)) {
                $this->session->set_flashdata('error', 'Empleado no encontrado.');
                redirect(base_url("empleados"));
            } else {
                $id_empleado_url = intval($this->uri->segment(3));
                if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['gestionar_dominio'])) {
                    $id_empleado = $this->input->post('id_empleado');
                    $id_dominio_nuevo = $this->input->post('id_dominio_nuevo');
                    $comentario = $this->input->post('comentario');
                    $estado = "1";
                    $fecha_cambio_dominio = $this->input->post('fecha_cambio_dominio');
                    $fecha_cambio_dominio = date_create($fecha_cambio_dominio);
                    $fecha_cambio_dominio = date_format($fecha_cambio_dominio, 'Y-m-d');
                    //var_dump($id_empleado,$id_dominio_nuevo,$fecha_cambio_dominio,$comentario);
                    $id_empleado_dominio = $this->empleado_dominio_model->insert_empleado_dominio($id_empleado, $id_dominio_nuevo, $fecha_cambio_dominio, $comentario, $estado);
                    if ($id_empleado_dominio) {
                        $this->session->set_flashdata('success', 'Exito al actualizar los datos del Dominio.');
                        redirect(base_url("empleados/visualizar/".$id_empleado."#tab2"));
                    } else {
                        $this->session->set_flashdata('error', 'Ocurrio algún error al Guardar los datos del Dominio.');
                        redirect(base_url("empleados/visualizar/".$id_empleado."#tab2"));
                    }
                }
                if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['gestionar_categoria'])) {
                    $id_empleado = $this->input->post('id_empleado');
                    $id_categoria_nueva = $this->input->post('id_categoria_nueva');
                    $fecha_cambio_categoria = $this->input->post('fecha_cambio_categoria');
                    $salario = $this->input->post('salario');
                    $comentario = $this->input->post('comentario');
                    $evaluador = $this->input->post('evaluador');
                    $tipo = $this->input->post('tipo');
                    if($tipo === '0')
                    {
                        $tipo = null;
                    }
                    $estado = "1";
                    $fecha_cambio_categoria = date_create($fecha_cambio_categoria);
                    $fecha_cambio_categoria = date_format($fecha_cambio_categoria, 'Y-m-d');
                    //var_dump($id_empleado,$id_categoria_nueva,$fecha_cambio_categoria,$salario,$comentario,$evaluador,$tipo);
                    $id_empleado_categoria = $this->empleado_categoria_model->insert_empleado_categoria($id_empleado, $id_categoria_nueva, $fecha_cambio_categoria, $salario, $comentario, $estado, $evaluador ,$tipo );
                    if ($id_empleado_categoria) {
                        $this->session->set_flashdata('success', 'Exito al actualizar los datos de la Categoria.');
                        redirect(base_url("empleados/visualizar/".$id_empleado."#tab3"));
                    } else {
                        $this->session->set_flashdata('error', 'Ocurrio algún error al Guardar los datos de la Categoria.');
                        redirect(base_url("empleados/visualizar/".$id_empleado."#tab3"));
                    }
                }
                if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['gestionar_tecnologia'])) {
                    $id_empleado = $this->input->post('id_empleado');
                    $id_tecnologia = $this->input->post('id_tecnologia');
                    $nivel = $this->input->post('nivel');
                    $anios = $this->input->post('anios');
                    $flag_principal = $this->input->post('flag_principal');
                    $comentario = $this->input->post('comentario');
                    $estado = "1";
                    //var_dump($id_empleado,$id_tecnologia,$nivel,$anios,$comentario);
                    $id_empleado_tecnologia = $this->empleado_tecnologia_model->insert_empleado_tecnologia($id_empleado, $id_tecnologia, $nivel, $anios, $flag_principal, $comentario, $estado);
                    if ($id_empleado_tecnologia) {
                        $this->session->set_flashdata('success', 'Exito al actualizar los datos de las Tecnologias.');
                        redirect(base_url("empleados/visualizar/".$id_empleado."#tab4"));
                    } else {
                        $this->session->set_flashdata('error', 'Ocurrio algún error al Guardar los datos de las Tecnologias.');
                        redirect(base_url("empleados/visualizar/".$id_empleado."#tab4"));
                    }
                }
                if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['gestionar_lider_dominio'])) {
                    $id_empleado = $this->input->post('id_empleado');
                    $dominios = $this->input->post('dominios');
                    $es_lider = $this->input->post('es_lider');
                    $fecha_lider_dominio = $this->input->post('fecha_lider_dominio');
                    $fecha_lider_dominio = date_create($fecha_lider_dominio);
                    $fecha_lider_dominio = date_format($fecha_lider_dominio, 'Y-m-d');
                    $eliminado= "0";
                    //var_dump($id_empleado,$dominios,$es_lider,$fecha_lider_dominio);
                    if($es_lider === 'on'){
                        $dominios = implode(",",$this->input->post('dominios'));
                        $id_empleado_lider_dominio = $this->empleado_dominio_model->insert_empleado_lider_dominio($id_empleado, $dominios , $eliminado,$fecha_lider_dominio);
                    }
                    if($es_lider === false){
                        $resultado = $this->empleado_dominio_model->delete_empleado_lider_dominio($id_empleado);
                        $eliminado= "1";
                    }
                    if ($id_empleado_lider_dominio || $resultado) {
                        $this->session->set_flashdata('success', 'Exito al actualizar los datos de Lider de Dominio.');
                        redirect(base_url("empleados/visualizar/".$id_empleado."#tab5"));
                    } else {
                        $this->session->set_flashdata('error', 'Ocurrio algún error al Guardar llos datos de Lider de Dominio.');
                        redirect(base_url("empleados/visualizar/".$id_empleado."#tab5"));
                    }
                }
                $this->data['custom_error'] = '';
                $this->data['empleado'] = $this->empleados_model->get_one_empleado_edad($id_empleado_url);
                $this->data['categorias'] = $this->categoria_model->get_all_categorias();
                $this->data['dominios'] = $this->dominio_model->get_all_dominios();
                $this->data['tecnologias'] = $this->tecnologia_model->get_all_tecnologias();
                $this->data['empleado_categoria'] = $this->empleado_categoria_model->get_one_empleado_categoria($id_empleado_url);
                $this->data['empleado_dominio'] = $this->empleado_dominio_model->get_one_empleado_dominio($id_empleado_url);
                $empleado_lider_dominios = $this->empleado_dominio_model->get_one_empleado_lider_dominio($id_empleado_url);
                $this->data['empleado_lider'] = $empleado_lider_dominios;
                if(is_array($empleado_lider_dominios) && !empty($empleado_lider_dominios)){
                    $empleado_lider_dominios = explode(",", $empleado_lider_dominios["dominios"]);
                }
                $this->data['empleado_lider_dominios'] = $empleado_lider_dominios;
                $this->data['empleado_categoria_historial'] = $this->empleado_categoria_model->getHistory($id_empleado_url);
                $this->data['empleado_dominio_historial'] = $this->empleado_dominio_model->getHistory($id_empleado_url);
                $this->data['empleado_tecnologia_historial'] = $this->empleado_tecnologia_model->getHistory($id_empleado_url);
                $this->data['empleado_lider_dominio_historial'] = $this->empleado_dominio_model->getLiderHistory($id_empleado_url);
                $this->data['view'] = 'empleados/visualizar';
                $this->load->view("template/template",$this->data);
            }
        }
    }
    public function excluir($id_empleado) {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'dEmpleado')) {
            $this->session->set_flashdata('error', 'No tiene el permiso para Eliminar Empleados.');
            redirect(base_url());
        }
        $empleado = $this->empleados_model->getById($id_empleado);
        if (!isset($empleado->id_empleado)) {
            $this->session->set_flashdata('error', 'Empleado no encontrado.');
            redirect(base_url("empleados"));
        } else {
            $resultado = $this->empleados_model->delete_empleado($id_empleado);
            if ($resultado) {
                $this->session->set_flashdata('success', 'Empleado ¡Eliminado con exito!');
                redirect(base_url("empleados"));
            } else {
                $this->session->set_flashdata('error', 'Ocurrio algun error al eliminar al Empleado. (en BD)');
                redirect(base_url("empleados"));
            }
        }
    }
    /*  -----------  REPORTE DE DOMINIOS ------------ */
    public function agrupados() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata("permiso"),"vEmpleado")) {
            $this->session->set_flashdata("error","No tiene el permiso para Visualizar Dominios.");
           redirect(base_url("empleados"));
        }
        $this->data['dominios'] = $this->empleados_model->get_all_data_dominios();
        $this->data['view'] = 'empleados/agrupadosDominio';
        $this->load->view("template/template",$this->data);
    }
    public function dominios($id_dominio) {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vEmpleado')) {
            $this->session->set_flashdata('error', 'No tiene el permiso para Visualizar Dominios.');
           redirect(base_url("empleados/agrupados"));
        } 
        $dominio = $this->dominio_model->get_dominio_empleados($id_dominio);
        if ( empty($dominio) ) {
            $this->session->set_flashdata('error', 'Dominio no encontrado.');
            redirect(base_url("empleados/agrupados"));
        } else {
            $this->data['dominio'] = $dominio;
            $this->data['view'] = 'empleados/verDominio';
            $this->load->view("template/template",$this->data);
        }
    }
    public function dominios_2($id_dominio) {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vEmpleado')) {
            $this->session->set_flashdata('error', 'No tiene el permiso para Visualizar Dominios.');
           redirect(base_url("empleados/agrupados"));
        } 
        $dominio = $this->dominio_model->get_dominio_empleados($id_dominio);
        if ( empty($dominio) ) {
            $this->session->set_flashdata('error', 'Dominio no encontrado.');
            redirect(base_url("empleados/agrupados"));
        } else {
            $this->data['dominio'] = $dominio;
            $this->data['view'] = 'empleados/verDominio2';
            $this->load->view("template/template",$this->data);
        }
    }
    /*  -----------  CUMPLEAÑOS     ------------ */
    public function cumpleanios() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vEmpleado')) {
            $this->session->set_flashdata('error', 'No tiene el permiso para Visualizar Empleados.');
           redirect(base_url("empleados/agrupados"));
        } 
        $this->data['view'] = 'empleados/cumpleanios';
        $this->load->view("template/template",$this->data);
    }
    /*  CARGAR LISTA DE CUMPLEAÑOS POR AJAX/JSON   */
    public function obtener_cumpleanios_json() {
        $start = $this->input->post('start');
        $end = $this->input->post('end');
        $timezoneParam = $this->input->post('_');//timezoneParam
        $cumpleanios = $this->empleados_model->get_all_cumpleanios_data($start,$end);
        $cumpleanios_array = array();
        foreach ($cumpleanios as $cumpleanio) {
            array_push($cumpleanios_array,array('start' => $cumpleanio["inicio"], 'title' => $cumpleanio["titulo"] ));
        }
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($cumpleanios_array));
    }
    /*   NOTIFICACIONES  DEL MASTER PARA CUMPLEAÑOS  */
    public function obtener_notificaciones_cumpleanios_json() {
        header("Content-type:application/json");
        $fecha_sistema = date('Y-m-d');
        $notificaciones = $this->empleados_model->get_all_cumpleanios_fecha($fecha_sistema);
        echo(json_encode($notificaciones));
    }
    /* SE AGREGO PARA REPORTES con PHPEXCEL */
    public function exportar_excel() {
        $nombreReporte="Reporte Empleados PHPExcel";
        if($this->input->server('REQUEST_METHOD')=="POST"&&isset($_POST['exportarExcel'])) {
            if($this->input->post('nombreReporte')!=null&&strlen($this->input->post('nombreReporte'))>0)
            {
                $nombreReporte=$this->input->post('nombreReporte');
            }
        }
        $this->load->library("excel");
        $object=new PHPExcel();
        $object->setActiveSheetIndex(0);
        $columnasReporte=array("ID","Codigo","Nombres","Apellidos","Fecha Ingreso","Dominio","Categoria");
        $column=0;
        foreach($columnasReporte as $columnaReporte) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column,1,$columnaReporte);
            $column++;
        }
        $empleados=$this->empleados_model->get_all_empleado();
        $filaExcel=2;
        foreach($empleados as $fila) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0,$filaExcel,$fila["id_empleado"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1,$filaExcel,$fila["cod_empleado"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2,$filaExcel,$fila["nombres"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3,$filaExcel,$fila["apellidos"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4,$filaExcel,$fila["fecha_ingreso"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5,$filaExcel,$fila["nombredominio"]);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6,$filaExcel,$fila["nombrecategoria"]);
            $filaExcel++;
        }
        $object_writer=PHPExcel_IOFactory::createWriter($object,'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$nombreReporte.'.xls"');
        $object_writer->save("php://output");
    }
}