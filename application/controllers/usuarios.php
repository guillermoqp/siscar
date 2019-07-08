<?php Class Usuarios extends CI_Controller {
    public function __construct() {
        parent::__construct();
        if((!$this->session->userdata('session_id'))||(!$this->session->userdata('logueado'))){
            redirect(base_url("login"));
        }
        if(!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'cUsuario')){
            $this->session->set_flashdata('error','No tiene el permiso de Gestionar Usuarios.');
            redirect(base_url());
        }
        $this->load->helper(array('form','codegen_helper'));
        $this->load->model('usuarios_model', '', TRUE);
        $this->load->model('empleados_model', '', TRUE);
        $this->data['menuUsuarios'] = 'Usuarios';
        $this->data['menuConfiguraciones'] = 'Configuraciones';
    }
    public function do_upload($field_name) {
        $this->load->library('upload');
        $this->load->helper('file');
        $image_upload_folder = FCPATH . 'assets/uploads/usuarios';
        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
        }
        $this->upload_config = array(
            'upload_path' => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|JPEG||PNG||JPG||BMP',
            'max_size' => 2048,
            'remove_space' => TRUE,
            'encrypt_name' => TRUE);
        $this->upload->initialize($this->upload_config);
        if (!$this->upload->do_upload($field_name)) {
            $upload_error = $this->upload->display_errors();
            return false;
        } else {
            $file_info = array($this->upload->data());
            return $file_info[0]['file_name'];
        }
    }
    public function index() {
        $this->data['usuarios'] = $this->usuarios_model->get_all_usuarios();
        $this->data['view'] = 'usuarios/usuarios';
        $this->load->view("template/template",$this->data);
    }
    public function adicionar() {
        if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['agregarUsuario'])) {
            $this->load->library('form_validation');
            $this->load->library('encrypt');
            $fk_empleado = ($this->input->post('id_empleado')  !== "") ? $this->input->post('id_empleado') : null ; 
            $eliminado = "0";
            $usrId = $this->session->userdata('id_usuario');
            $ipAdd = $_SERVER['REMOTE_ADDR'] ;
            $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $fchRg = date("Y-m-d H:i:s");
            $fchAc = date("Y-m-d H:i:s");
            $data = array(
                'nombre' => $this->input->post('nombre'),
                'username' => $this->input->post('username'),
                'password' => $this->encrypt->sha1($this->input->post('password')),
                'email' => $this->input->post('email'),
                'estado' => $this->input->post('estado'),
                'fecha' => date('Y-m-d'),
                'eliminado' => $eliminado,
                'fchRg' => $fchRg,
                'fchAc' => $fchAc,
                'usrId' => $usrId,
                'ipAdd' => $ipAdd,
                'hosNm' => $hosNm,
                'fk_permiso' => $this->input->post('id_permiso'),
                'fk_empleado' => $fk_empleado,
            );
            $imagen = $this->do_upload('foto');
            if ($imagen) {
                $data['foto'] = 'assets/uploads/usuarios/' . $imagen;
            } else {
                $data['foto'] = '';
            }
            //var_dump($data);
            if ($this->usuarios_model->add('usuario', $data) == TRUE) {
                $this->session->set_flashdata('success', 'Usuario Registrado con exito.');
                redirect(base_url("usuarios"));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p> Ocurrio un error!</p></div>';
            }
        }
        $this->load->model('permisos_model');
        $this->data['permisos'] = $this->permisos_model->getActive('permiso', 'permiso.id_permiso,permiso.nombre');
        $this->data['view'] = 'usuarios/adicionarUsuario';
        $this->load->view("template/template",$this->data);
    }
    public function editar() {
        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Usuario no encontrado.');
            redirect(base_url("usuarios"));
        }
        if (is_numeric($this->uri->segment(3))) {
        $usuario = $this->usuarios_model->getById($this->uri->segment(3));
        if (!isset($usuario->id_usuario)) {
            $this->session->set_flashdata('error', 'Usuario no encontrado o no existe.');
            redirect(base_url("usuarios"));
        } else {
            if ($this->input->server('REQUEST_METHOD') == 'POST' && isset($_POST['editarUsuario'])) {
                if ($this->input->post('id_usuario') == 5 && $this->input->post('estado') == 0) {
                    $this->session->set_flashdata('error', 'El Administrador no puede ser desactivado.');
                    redirect(base_url("usuarios/editar/".$this->input->post('id_usuario')));
                }
                $password = $this->input->post('password');
                $usrId = $this->session->userdata('id_usuario');
                $ipAdd = $_SERVER['REMOTE_ADDR'] ;
                $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                $fchAc = date("Y-m-d H:i:s");
                if ($password != null) {
                    $this->load->library('encrypt');
                    $password = $this->encrypt->sha1($password);
                    $data = array(
                        'nombre' => $this->input->post('nombre'),
                        'username' => $this->input->post('username'),
                        'password' => $password,
                        'email' => $this->input->post('email'),
                        'estado' => $this->input->post('estado'),
                        'fecha' => date("Y-m-d"),
                        'fchAc' => $fchAc,
                        'usrId' => $usrId,
                        'ipAdd' => $ipAdd,
                        'hosNm' => $hosNm,
                        'fk_permiso' => $this->input->post('id_permiso')
                    );
                    $imagen = $this->do_upload('foto');
                    if ($imagen) {
                        $data['foto'] = 'assets/uploads/usuarios/' . $imagen;
                    } else {
                        $data['foto'] = $usuario->foto;
                    }
                } else {
                    $data = array(
                        'nombre' => $this->input->post('nombre'),
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'estado' => $this->input->post('estado'),
                        'fecha' => date("Y-m-d"),
                        'fchAc' => $fchAc,
                        'usrId' => $usrId,
                        'ipAdd' => $ipAdd,
                        'hosNm' => $hosNm,
                        'fk_permiso' => $this->input->post('id_permiso')
                    );
                    $imagen = $this->do_upload('foto');
                    if ($imagen) {
                        $data['foto'] = 'assets/uploads/usuarios/' . $imagen;
                    } else {
                        $data['foto'] = $usuario->foto;
                    }
                }
                //var_dump($data);
                if ($this->usuarios_model->edit('usuario', $data, 'id_usuario', $this->input->post('id_usuario')) == TRUE) {
                    $this->session->set_flashdata('success', 'Usuario modificado con exito');
                    redirect(base_url("usuarios"));
                } else {
                    $this->session->set_flashdata('error', ' Ocurrio algun error.');
                    redirect(base_url("usuarios"));
                }
            }
        }           
        $this->data['result'] = $this->usuarios_model->getById($this->uri->segment(3));
        $this->load->model('permisos_model');
        $this->data['permisos'] = $this->permisos_model->getActive('permiso', 'permiso.id_permiso,permiso.nombre');
        $this->data['view'] = 'usuarios/editarUsuario';
        $this->load->view("template/template",$this->data);
        }
    }
    public function desactivar($id_usuario) {
        $usuario = $this->usuarios_model->getById($id_usuario);
        if (!isset($usuario->fk_empleado) || $usuario->fk_empleado === "" ) {
            $this->session->set_flashdata('error', 'Un Usuario Administrador no puede ser desactivado o eliminado.');
            redirect(base_url("usuarios"));
        }
        $resultado = $this->usuarios_model->delete('usuario','id_usuario',$id_usuario);
        if ($resultado) {
            $this->session->set_flashdata('success',' Usuario Eliminado/Desactivado con exito.');
        } else {
            $this->session->set_flashdata('error', ' Ocurrio algun error al Eliminar el Usuario.');
        }
        redirect(base_url("usuarios"));
    }
    public function autoCompleteEmpleado()
    {
        header("Content-type:application/json");
        if (isset($_GET['term']))
        {
            $q = strtolower($_GET['term']);
            $usuarios = $this->empleados_model->autoCompleteEmpleado($q);
        }
        print(json_encode($usuarios));
    }
    /* Metodo POST para editar el Nombre de usuario */
    public function editarNoUsuario($id_usuario)
    {
        if ($this->input->server('REQUEST_METHOD')=='POST'&&isset($_POST['editarNoUsuario'])) {
            $valor = $this->input->post('valor');
            $this->session->set_flashdata("success"," Usuario ID : ".$id_usuario.", valor : ".$valor);
            redirect(base_url("usuarios"));
        }else{
            $this->session->set_flashdata('error',"Usuario NO modificado.");
            redirect(base_url("usuarios"));
        }
    }
}