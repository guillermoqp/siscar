<?php Class Mantenedores extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!$this->session->userdata('session_id')) || (!$this->session->userdata('logueado'))) {
            redirect(base_url().'login');
        }
        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('categoria_model', '', TRUE);
        $this->load->model('dominio_model', '', TRUE);
        $this->load->model('tecnologia_model', '', TRUE);
        $this->load->model('cliente_model', '', TRUE);
        $this->load->model('etiqueta_model', '', TRUE);
        $this->load->model('roles_model', '', TRUE);
        $this->load->model('institucion_educativa_model', '', TRUE);
        $this->data['menuMantenedores'] = 'Mantenedores';
        error_reporting(1);// para no reportar los warnings en los responses
    }
    function index() {
        $this->data['view'] = 'mantenedores/index';
        $this->load->view("template/template",$this->data);
    }
    function categorias() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mCategorias')) {
            $this->session->set_flashdata('error', 'No tiene el permiso de Mantenedor de Categorias.');
            redirect(base_url());
        }
        $this->data['menuCategorias'] = 'Mantenedore de Categorias';
        $this->data['view'] = 'mantenedores/categorias';
        $this->load->view("template/template",$this->data);
    }
    function cargar_categorias() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $limit = isset($_POST['rows']) ? $_POST['rows'] : 10;
        $sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'nombre';
        $sord = isset($_POST['sord']) ? $_POST['sord'] : '';
        $start = $limit * $page - $limit;
        $start = ($start < 0) ? 0 : $start;
        $where = "";
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper'] : false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;
        if ($_POST['_search'] == 'true') {
            $ops = array(
                'eq' => '=',
                'ne' => '<>',
                'lt' => '<',
                'le' => '<=',
                'gt' => '>',
                'ge' => '>=',
                'bw' => 'LIKE',
                'bn' => 'NOT LIKE',
                'in' => 'LIKE',
                'ni' => 'NOT LIKE',
                'ew' => 'LIKE',
                'en' => 'NOT LIKE',
                'cn' => 'LIKE',
                'nc' => 'NOT LIKE'
            );
            foreach ($ops as $key => $value) {
                if ($searchOper == $key) {
                    $ops = $value;
                }
            }
            if ($searchOper == 'eq')
                $searchString = $searchString;
            if ($searchOper == 'bw' || $searchOper == 'bn')
                $searchString .= '%';
            if ($searchOper == 'ew' || $searchOper == 'en')
                $searchString = '%' . $searchString;
            if ($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni')
                $searchString = '%' . $searchString . '%';
            $where = "$searchField $ops '$searchString' ";
        }
        if (!$sidx)
            $sidx = 1;
        $count = $this->db->count_all_results('categoria');
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $query = $this->categoria_model->getAllData($start, $limit, $sidx, $sord, $where);
        $response->page = $page;
        $response->total = $total_pages;
        $response->records = $count;
        $i = 0;
        foreach ($query as $row) {
            $response->rows[$i]['id'] = $row->id_categoria;
            $response->rows[$i]['cell'] = array($row->codigo, $row->nombre, $row->banda, $row->nivel);
            $i++;
        }
        print(json_encode($response));
    }

    public function crud_categorias() {
        $oper = $this->input->post('oper');
        $id = $this->input->post('id'); //id_categoria
        $codigo = $this->input->post('codigo');
        $nombre = $this->input->post('nombre');
        $banda = $this->input->post('banda');
        $nivel = $this->input->post('nivel');
        $eliminado = "0";
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'] ;
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $fchRg = date("Y-m-d H:i:s");
        $fchAc = date("Y-m-d H:i:s");
        switch ($oper) {
            case 'add':
                $data = array('codigo' => $codigo,'nombre' => $nombre, 'banda' => $banda, 'nivel' => $nivel , 'eliminado' => $eliminado, 'fchRg' => $fchRg, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm);
                $this->categoria_model->insert_categoria($data);
                break;
            case 'edit':
                $data = array('id_categoria' => $id, 'codigo' => $codigo, 'nombre' => $nombre, 'banda' => $banda, 'nivel' => $nivel , 'eliminado' => $eliminado, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm);
                $this->categoria_model->update_categoria($id, $data);
                break;
            case 'del':
                $eliminado = "1";
                $data = array('eliminado' => $eliminado, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm );
                //$this->categoria_model->delete_categoria($id);
                $this->categoria_model->update_categoria($id, $data);
                break;
        }
    }
    function dominios() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mDominios')) {
            $this->session->set_flashdata('error', 'No tiene el permiso de Mantenedor de Dominios.');
            redirect(base_url());
        }
        $this->data['menuDominios'] = 'Mantenedore de Dominios';
        $this->data['view'] = 'mantenedores/dominios';
        $this->load->view("template/template",$this->data);
    }
    function cargar_dominios() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $limit = isset($_POST['rows']) ? $_POST['rows'] : 10;
        $sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'nombre';
        $sord = isset($_POST['sord']) ? $_POST['sord'] : '';
        $start = $limit * $page - $limit;
        $start = ($start < 0) ? 0 : $start;
        $where = "";
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper'] : false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;
        if ($_POST['_search'] == 'true') {
            $ops = array(
                'eq' => '=',
                'ne' => '<>',
                'lt' => '<',
                'le' => '<=',
                'gt' => '>',
                'ge' => '>=',
                'bw' => 'LIKE',
                'bn' => 'NOT LIKE',
                'in' => 'LIKE',
                'ni' => 'NOT LIKE',
                'ew' => 'LIKE',
                'en' => 'NOT LIKE',
                'cn' => 'LIKE',
                'nc' => 'NOT LIKE'
            );
            foreach ($ops as $key => $value) {
                if ($searchOper == $key) {
                    $ops = $value;
                }
            }
            if ($searchOper == 'eq')
                $searchString = $searchString;
            if ($searchOper == 'bw' || $searchOper == 'bn')
                $searchString .= '%';
            if ($searchOper == 'ew' || $searchOper == 'en')
                $searchString = '%' . $searchString;
            if ($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni')
                $searchString = '%' . $searchString . '%';
            $where = "$searchField $ops '$searchString' ";
        }
        if (!$sidx)
            $sidx = 1;
        $count = $this->db->count_all_results('dominio');
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $query = $this->dominio_model->getAllData($start, $limit, $sidx, $sord, $where);
        $response->page = $page;
        $response->total = $total_pages;
        $response->records = $count;
        $i = 0;
        foreach ($query as $row) {
            $response->rows[$i]['id'] = $row->id_dominio;
            $response->rows[$i]['cell'] = array($row->nombre, $row->fecha, $row->estado, $row->descripcion, $row->fk_cliente);
            $i++;
        }
        print(json_encode($response));
    }
    public function crud_dominios() {
        $oper = $this->input->post('oper');
        $id = $this->input->post('id'); //id_dominio
        $nombre = $this->input->post('nombre');
        $fecha = $this->input->post('fecha');
        $estado = $this->input->post('estado');
        $descripcion = $this->input->post('descripcion');
        $fk_cliente = $this->input->post('fk_cliente');
        $eliminado = "0";
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'] ;
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $fchRg = date("Y-m-d H:i:s");
        $fchAc = date("Y-m-d H:i:s");
        switch ($oper) {
            case 'add':
                $data = array('nombre' => $nombre, 'fecha' => $fecha, 'estado' => $estado, 'descripcion' => $descripcion, 'fk_cliente' => $fk_cliente , 'eliminado' => $eliminado, 'fchRg' => $fchRg, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm);
                $this->dominio_model->insert_dominio($data);
                break;
            case 'edit':
                $data = array('id_dominio' => $id, 'nombre' => $nombre, 'fecha' => $fecha, 'estado' => $estado, 'descripcion' => $descripcion, 'fk_cliente' => $fk_cliente, 'eliminado' => $eliminado, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm);
                $this->dominio_model->update_dominio($id, $data);
                break;
            case 'del':
                $eliminado = "1";
                $data = array('eliminado' => $eliminado, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm );
                //$this->dominio_model->delete_dominio($id);
                $this->dominio_model->update_dominio($id, $data);
                break;
        }
    }
    function tecnologias() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mTecnologias')) {
            $this->session->set_flashdata('error', 'No tiene el permiso de Mantenedor de Tecnologias.');
            redirect(base_url());
        }
        $this->data['menuTecnologias'] = 'Mantenedore de Tecnologias';
        $this->data['view'] = 'mantenedores/tecnologias';
        $this->load->view("template/template",$this->data);
    }

    function cargar_tecnologias() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $limit = isset($_POST['rows']) ? $_POST['rows'] : 10;
        $sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'nombre';
        $sord = isset($_POST['sord']) ? $_POST['sord'] : '';
        $start = $limit * $page - $limit;
        $start = ($start < 0) ? 0 : $start;
        $where = "";
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper'] : false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;
        if ($_POST['_search'] == 'true') {
            $ops = array(
                'eq' => '=',
                'ne' => '<>',
                'lt' => '<',
                'le' => '<=',
                'gt' => '>',
                'ge' => '>=',
                'bw' => 'LIKE',
                'bn' => 'NOT LIKE',
                'in' => 'LIKE',
                'ni' => 'NOT LIKE',
                'ew' => 'LIKE',
                'en' => 'NOT LIKE',
                'cn' => 'LIKE',
                'nc' => 'NOT LIKE'
            );
            foreach ($ops as $key => $value) {
                if ($searchOper == $key) {
                    $ops = $value;
                }
            }
            if ($searchOper == 'eq')
                $searchString = $searchString;
            if ($searchOper == 'bw' || $searchOper == 'bn')
                $searchString .= '%';
            if ($searchOper == 'ew' || $searchOper == 'en')
                $searchString = '%' . $searchString;
            if ($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni')
                $searchString = '%' . $searchString . '%';
            $where = "$searchField $ops '$searchString' ";
        }
        if (!$sidx)
            $sidx = 1;
        $count = $this->db->count_all_results('tecnologia');
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $query = $this->tecnologia_model->getAllData($start, $limit, $sidx, $sord, $where);
        $response->page = $page;
        $response->total = $total_pages;
        $response->records = $count;
        $i = 0;
        foreach ($query as $row) {
            $response->rows[$i]['id'] = $row->id_tecnologia;
            $response->rows[$i]['cell'] = array($row->nombre, $row->grupo);
            $i++;
        }
        print(json_encode($response));
    }
    public function crud_tecnologias() {
        $oper = $this->input->post('oper');
        $id = $this->input->post('id'); //id_tecnologia
        $nombre = $this->input->post('nombre');
        $grupo = $this->input->post('grupo');
        $eliminado = "0";
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'] ;
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $fchRg = date("Y-m-d H:i:s");
        $fchAc = date("Y-m-d H:i:s");
        switch ($oper) {
            case 'add':
                $data = array('nombre' => $nombre, 'grupo' => $grupo , 'eliminado' => $eliminado, 'fchRg' => $fchRg, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm );
                $this->tecnologia_model->insert_tecnologia($data);
                break;
            case 'edit':
                $data = array('id_tecnologia' => $id, 'nombre' => $nombre, 'grupo' => $grupo, 'eliminado' => $eliminado, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm );
                $this->tecnologia_model->update_tecnologia($id, $data);
                break;
            case 'del':
                $eliminado = "1";
                $data = array('eliminado' => $eliminado, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm );
                //$this->tecnologia_model->delete_tecnologia($id);
                $this->tecnologia_model->update_tecnologia($id, $data);
                break;
        }
    }
    function clientes() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mClientes')) {
            $this->session->set_flashdata('error', 'No tiene el permiso de Mantenedor de Clientes.');
            redirect(base_url());
        }
        $this->data['menuClientes'] = 'Mantenedore de Clientes';
        $this->data['view'] = 'mantenedores/clientes';
        $this->load->view("template/template",$this->data);
    }
    function cargar_clientes() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $limit = isset($_POST['rows']) ? $_POST['rows'] : 10;
        $sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'nombre';
        $sord = isset($_POST['sord']) ? $_POST['sord'] : '';
        $start = $limit * $page - $limit;
        $start = ($start < 0) ? 0 : $start;
        $where = "";
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper'] : false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;
        if ($_POST['_search'] == 'true') {
            $ops = array(
                'eq' => '=',
                'ne' => '<>',
                'lt' => '<',
                'le' => '<=',
                'gt' => '>',
                'ge' => '>=',
                'bw' => 'LIKE',
                'bn' => 'NOT LIKE',
                'in' => 'LIKE',
                'ni' => 'NOT LIKE',
                'ew' => 'LIKE',
                'en' => 'NOT LIKE',
                'cn' => 'LIKE',
                'nc' => 'NOT LIKE'
            );
            foreach ($ops as $key => $value) {
                if ($searchOper == $key) {
                    $ops = $value;
                }
            }
            if ($searchOper == 'eq')
                $searchString = $searchString;
            if ($searchOper == 'bw' || $searchOper == 'bn')
                $searchString .= '%';
            if ($searchOper == 'ew' || $searchOper == 'en')
                $searchString = '%' . $searchString;
            if ($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni')
                $searchString = '%' . $searchString . '%';
            $where = "$searchField $ops '$searchString' ";
        }
        if (!$sidx)
            $sidx = 1;
        $count = $this->db->count_all_results('cliente');
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $query = $this->cliente_model->getAllData($start, $limit, $sidx, $sord, $where);
        $response->page = $page;
        $response->total = $total_pages;
        $response->records = $count;
        $i = 0;
        foreach ($query as $row) {
            $response->rows[$i]['id'] = $row->id_cliente;
            $response->rows[$i]['cell'] = array($row->nombre, $row->fecha, $row->estado, $row->descripcion);
            $i++;
        }
        print(json_encode($response));
    }
    public function crud_clientes() {
        $oper = $this->input->post('oper');
        $id = $this->input->post('id'); //id_cliente
        $nombre = $this->input->post('nombre');
        $fecha = $this->input->post('fecha');
        $estado = $this->input->post('estado');
        $descripcion = $this->input->post('descripcion');
        $eliminado = "0";
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'] ;
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $fchRg = date("Y-m-d H:i:s");
        $fchAc = date("Y-m-d H:i:s");
        switch ($oper) {
            case 'add':
                $data = array('nombre' => $nombre, 'fecha' => $fecha, 'estado' => $estado, 'descripcion' => $descripcion, 'eliminado' => $eliminado, 'fchRg' => $fchRg, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm);
                $this->cliente_model->insert_cliente($data);
                break;
            case 'edit':
                $data = array('id_cliente' => $id, 'nombre' => $nombre, 'fecha' => $fecha, 'estado' => $estado, 'descripcion' => $descripcion, 'eliminado' => $eliminado, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm);
                $this->cliente_model->update_cliente($id, $data);
                break;
            case 'del':
                $eliminado = "1";
                $data = array('eliminado' => $eliminado, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm );
                //$this->cliente_model->delete_cliente($id);
                $this->cliente_model->update_cliente($id, $data);
                break;
        }
    }
    public function get_clientes_json() {
        $clientes = $this->cliente_model->get_all_clientes();
        header('Content-Type: application/x-json; charset=utf-8');
        print(json_encode($clientes));
    }
    
    /*********** MANTENEDOR PARA ETIQUETAS DE LAS LECCIONES APRENDIDAS ***************/
    function etiquetas() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mEtiquetas')) {
            $this->session->set_flashdata('error', 'No tiene el permiso de Mantenedor de Etiquetas.');
            redirect(base_url());
        }
        $this->data['menuEtiquetas'] = 'Mantenedore de Etiquetas';
        $this->data['view'] = 'mantenedores/etiquetas';
        $this->load->view("template/template",$this->data);
    }
    function cargar_etiquetas() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $limit = isset($_POST['rows']) ? $_POST['rows'] : 10;
        $sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'nombre';
        $sord = isset($_POST['sord']) ? $_POST['sord'] : '';
        $start = $limit * $page - $limit;
        $start = ($start < 0) ? 0 : $start;
        $where = "";
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper'] : false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;
        if ($_POST['_search'] == 'true') {
            $ops = array(
                'eq' => '=',
                'ne' => '<>',
                'lt' => '<',
                'le' => '<=',
                'gt' => '>',
                'ge' => '>=',
                'bw' => 'LIKE',
                'bn' => 'NOT LIKE',
                'in' => 'LIKE',
                'ni' => 'NOT LIKE',
                'ew' => 'LIKE',
                'en' => 'NOT LIKE',
                'cn' => 'LIKE',
                'nc' => 'NOT LIKE'
            );
            foreach ($ops as $key => $value) {
                if ($searchOper == $key) {
                    $ops = $value;
                }
            }
            if ($searchOper == 'eq')
                $searchString = $searchString;
            if ($searchOper == 'bw' || $searchOper == 'bn')
                $searchString .= '%';
            if ($searchOper == 'ew' || $searchOper == 'en')
                $searchString = '%' . $searchString;
            if ($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni')
                $searchString = '%' . $searchString . '%';
            $where = "$searchField $ops '$searchString' ";
        }
        if (!$sidx)
            $sidx = 1;
        $count = $this->db->count_all_results('etiqueta');
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $query = $this->etiqueta_model->getAllData($start, $limit, $sidx, $sord, $where);
        $response->page = $page;
        $response->total = $total_pages;
        $response->records = $count;
        $i = 0;
        foreach ($query as $row) {
            $response->rows[$i]['id'] = $row->id_etiqueta;
            $response->rows[$i]['cell'] = array($row->nombre, $row->descripcion);
            $i++;
        }
        print(json_encode($response));
    }

    public function crud_etiquetas() {
        $oper = $this->input->post('oper');
        $id = $this->input->post('id'); //id_etiqueta
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $eliminado = "0";
        $usrId = $this->session->userdata('id_usuario');
        $ipAdd = $_SERVER['REMOTE_ADDR'] ;
        $hosNm = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $fchRg = date("Y-m-d H:i:s");
        $fchAc = date("Y-m-d H:i:s");
        switch ($oper) {
            case 'add':
                $data = array('nombre' => $nombre, 'descripcion' => $descripcion , 'eliminado' => $eliminado, 'fchRg' => $fchRg, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm );
                $this->etiqueta_model->insert_etiqueta($data);
                break;
            case 'edit':
                $data = array('id_etiqueta' => $id, 'nombre' => $nombre, 'descripcion' => $descripcion, 'eliminado' => $eliminado, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm );
                $this->etiqueta_model->update_etiqueta($id, $data);
                break;
            case 'del':
                $eliminado = "1";
                $data = array('eliminado' => $eliminado, 'fchAc' => $fchAc, 'usrId' => $usrId , 'ipAdd' => $ipAdd, 'hosNm' => $hosNm );
                $this->etiqueta_model->update_etiqueta($id, $data);
                break;
        }
    }

    
    /*********** MANTENEDOR PARA ROLES ***************/
    function roles() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mRoles')) {
            $this->session->set_flashdata('error', 'No tiene el permiso de Mantenedor de Roles.');
            redirect(base_url());
        }
        $this->data['menuRoles'] = 'Mantenedore de Roles';
        $this->data['view'] = 'mantenedores/roles';
        $this->load->view("template/template",$this->data);
    }
    function cargar_roles() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $limit = isset($_POST['rows']) ? $_POST['rows'] : 10;
        $sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'nombre';
        $sord = isset($_POST['sord']) ? $_POST['sord'] : '';
        $start = $limit * $page - $limit;
        $start = ($start < 0) ? 0 : $start;
        $where = "";
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper'] : false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;
        if ($_POST['_search'] == 'true') {
            $ops = array(
                'eq' => '=',
                'ne' => '<>',
                'lt' => '<',
                'le' => '<=',
                'gt' => '>',
                'ge' => '>=',
                'bw' => 'LIKE',
                'bn' => 'NOT LIKE',
                'in' => 'LIKE',
                'ni' => 'NOT LIKE',
                'ew' => 'LIKE',
                'en' => 'NOT LIKE',
                'cn' => 'LIKE',
                'nc' => 'NOT LIKE'
            );
            foreach ($ops as $key => $value) {
                if ($searchOper == $key) {
                    $ops = $value;
                }
            }
            if ($searchOper == 'eq')
                $searchString = $searchString;
            if ($searchOper == 'bw' || $searchOper == 'bn')
                $searchString .= '%';
            if ($searchOper == 'ew' || $searchOper == 'en')
                $searchString = '%' . $searchString;
            if ($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni')
                $searchString = '%' . $searchString . '%';
            $where = "$searchField $ops '$searchString' ";
        }
        if (!$sidx)
            $sidx = 1;
        $count = $this->db->count_all_results('rol');
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $query = $this->roles_model->getAllData($start, $limit, $sidx, $sord, $where);
        $response->page = $page;
        $response->total = $total_pages;
        $response->records = $count;
        $i = 0;
        foreach ($query as $row) {
            $response->rows[$i]['id'] = $row->id_rol;
            $response->rows[$i]['cell'] = array($row->nombre, $row->descripcion);
            $i++;
        }
        print(json_encode($response));
    }

    public function crud_roles() {
        $oper = $this->input->post('oper');
        $id = $this->input->post('id'); //id_rol
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $fecha = date("Y-m-d H:i:s");
        $estado = "1";
        switch ($oper) {
            case 'add':
                $data = array('nombre' => $nombre, 'descripcion' => $descripcion , 'fecha' => $fecha, 'estado' => $estado);
                $this->roles_model->insert_rol($data);
                break;
            case 'edit':
                $data = array('id_rol' => $id, 'nombre' => $nombre, 'descripcion' => $descripcion, 'fecha' => $fecha, 'estado' => $estado);
                $this->roles_model->update_rol($id, $data);
                break;
            case 'del':
                $estado = "0";
                $data = array('estado' => $estado, 'fecha' => $fecha);
                $this->roles_model->update_rol($id, $data);
                break;
        }
    }
    
    
    /*********** MANTENEDOR PARA INTTITUCIONES EDUCATIVAS ***************/
    function institucion_educativa() {
        if (!$this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'mInstitucionEducativa')) {
            $this->session->set_flashdata('error', 'No tiene el permiso de Mantenedor de Institucion Educativa.');
            redirect(base_url());
        }
        $this->data['menuInstitucionEducativa'] = 'Mantenedore de Institucion Educativa';
        $this->data['view'] = 'mantenedores/institucion_educativa';
        $this->load->view("template/template",$this->data);
    }
    function cargar_institucion_educativa() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $limit = isset($_POST['rows']) ? $_POST['rows'] : 10;
        $sidx = isset($_POST['sidx']) ? $_POST['sidx'] : 'nombre';
        $sord = isset($_POST['sord']) ? $_POST['sord'] : '';
        $start = $limit * $page - $limit;
        $start = ($start < 0) ? 0 : $start;
        $where = "";
        $searchField = isset($_POST['searchField']) ? $_POST['searchField'] : false;
        $searchOper = isset($_POST['searchOper']) ? $_POST['searchOper'] : false;
        $searchString = isset($_POST['searchString']) ? $_POST['searchString'] : false;
        if ($_POST['_search'] == 'true') {
            $ops = array(
                'eq' => '=',
                'ne' => '<>',
                'lt' => '<',
                'le' => '<=',
                'gt' => '>',
                'ge' => '>=',
                'bw' => 'LIKE',
                'bn' => 'NOT LIKE',
                'in' => 'LIKE',
                'ni' => 'NOT LIKE',
                'ew' => 'LIKE',
                'en' => 'NOT LIKE',
                'cn' => 'LIKE',
                'nc' => 'NOT LIKE'
            );
            foreach ($ops as $key => $value) {
                if ($searchOper == $key) {
                    $ops = $value;
                }
            }
            if ($searchOper == 'eq')
                $searchString = $searchString;
            if ($searchOper == 'bw' || $searchOper == 'bn')
                $searchString .= '%';
            if ($searchOper == 'ew' || $searchOper == 'en')
                $searchString = '%' . $searchString;
            if ($searchOper == 'cn' || $searchOper == 'nc' || $searchOper == 'in' || $searchOper == 'ni')
                $searchString = '%' . $searchString . '%';
            $where = "$searchField $ops '$searchString' ";
        }
        if (!$sidx)
            $sidx = 1;
        $count = $this->db->count_all_results('institucion_educativa');
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 0;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        $query = $this->institucion_educativa_model->getAllData($start, $limit, $sidx, $sord, $where);
        $response->page = $page;
        $response->total = $total_pages;
        $response->records = $count;
        $i = 0;
        foreach ($query as $row) {
            $response->rows[$i]['id'] = $row->id_institucion_educativa;
            $response->rows[$i]['cell'] = array($row->nombre, $row->descripcion);
            $i++;
        }
        print(json_encode($response));
    }

    public function crud_institucion_educativa() {
        $oper = $this->input->post('oper');
        $id = $this->input->post('id'); //id_institucion_educativa
        $nombre = $this->input->post('nombre');
        $descripcion = $this->input->post('descripcion');
        $fecha = date("Y-m-d H:i:s");
        $estado = "1";
        switch ($oper) {
            case 'add':
                $data = array('nombre' => $nombre, 'descripcion' => $descripcion , 'fecha' => $fecha, 'estado' => $estado);
                $this->institucion_educativa_model->insert_institucion_educativa($data);
                break;
            case 'edit':
                $data = array('id_institucion_educativa' => $id, 'nombre' => $nombre, 'descripcion' => $descripcion, 'fecha' => $fecha, 'estado' => $estado);
                $this->institucion_educativa_model->update_institucion_educativa($id, $data);
                break;
            case 'del':
                $estado = "0";
                $data = array('estado' => $estado, 'fecha' => $fecha);
                $this->institucion_educativa_model->update_institucion_educativa($id, $data);
                break;
        }
    }
}
