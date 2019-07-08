<?php Class Importar extends CI_Controller {
    public $urlFolder=FCPATH."assets/archivos/ots/";
    public function __construct() {
        parent::__construct();
        if ((!$this->session->userdata("session_id"))||(!$this->session->userdata("logueado"))) {
            redirect(base_url("login"));
        }
        $this->load->library("session");
        $this->load->helper("file");
        $this->load->helper("form");
        $this->data["menuImportar"]="Importar";
    }
    public function index() {
        $this->data["view"] = "importar/index";
        $this->load->view("template/template",$this->data);
    }
    public function do_upload($nombreCampoForm) {
        $this->load->library('upload');
        $this->load->helper('file');
        $image_upload_folder=$this->urlFolder;
        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder,DIR_WRITE_MODE,true);
        }
        $this->upload_config = array(
            "upload_path" => $image_upload_folder,
            "allowed_types" => "xlsx|xls|XLSX||XLS",
            "max_size" => 2048,
            "remove_space" => TRUE,
            "encrypt_name" => FALSE);
        $this->upload->initialize($this->upload_config);
        if (!$this->upload->do_upload($nombreCampoForm)) {
            $upload_error=$this->upload->display_errors();
            return false;
        } else {
            $file_info = array($this->upload->data());
            //return $file_info[0]['file_name'];//se retorna la ubicacion web de archivo subido
            //var_dump($file_info);
            //return $image_upload_folder.$file_info[0]["file_name"];
            return $file_info[0]["full_path"];//se retorna la ubicacion fisica de archivo subido
        }
    }
    public function importar_ot() {
        $this->data["subMenuImportarOT"]="ImportarOT";
        $registros = array();
        if ($this->input->server("REQUEST_METHOD")=="POST"){
            if(isset($_POST["importarOT"])) {   
                $nombre=(""!==$this->input->post("nombre")?$this->input->post("nombre"):"Sin Nombre");
                $rutaArchivo = $this->do_upload("archivo_excel");
                if($rutaArchivo){
                    $this->session->set_flashdata("success","Exito al subir al subir el archivo, Nombre : ".$rutaArchivo);
                    $this->load->library('excel');//cargar libreria
                    try {
                        $inputFileType = PHPExcel_IOFactory::identify($rutaArchivo);
                        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                        $objPHPExcel = $objReader->load($rutaArchivo);
                    } catch (Exception $e) {
                        $this->session->set_flashdata("error","Error cargando archivo :".pathinfo($rutaArchivo,PATHINFO_BASENAME).": ".$e->getMessage());
                        chown($rutaArchivo,666);
                        //unlink($rutaArchivo);
                        delete_files($this->urlFolder);
                    }
                    $sheet = $objPHPExcel->getSheet(0);//Obtener dimensiones del excel de la primera hoja
                    $highestRow = $sheet->getHighestRow();
                    $highestColumn = $sheet->getHighestColumn();//iterar cada fila del excel en turnos
                    $cabecera = $sheet->rangeToArray("A"."1".":".$highestColumn."1",NULL,TRUE,FALSE);
                    if(sizeof($cabecera[0])==19){//Mas de 19 campos
                        for ($row=2;$row<=$highestRow;$row++) {//leer desde la 2da fila  (Data)
                            $filaData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
                            array_push($registros,$filaData[0]);
                        }
                    }else{
                        $this->session->set_flashdata("error","Error formato de OT incorrecto, Nombre : ".$rutaArchivo);
                        chown($rutaArchivo,666);
                        //unlink($rutaArchivo);
                        delete_files($this->urlFolder);
                    }
                } else {
                    $this->session->set_flashdata("error","Ocurrio algun error al importar el archivo , Nombre : ".$rutaArchivo);
                    chown($rutaArchivo,666);
                    //unlink($rutaArchivo);
                    delete_files($this->urlFolder);
                }
            }else{
                $this->session->set_flashdata("error","No ha seleccionado ningún archivo para subir.");
            }
            if(isset($_POST["guardarOT"])){
                delete_files($this->urlFolder);
                $registros = array();
                $this->session->set_flashdata("success","Exito al guardar el archivo");
            }
        }
        $this->data["view"]="importar/importarOT";
        $this->data["registros"] = $registros;
        $this->load->view("template/template",$this->data);
    }

    public function nestable() {
        if ($this->input->server("REQUEST_METHOD")=="POST"){
            if(isset($_POST["guardarFormulario"])) {   
                $this->session->set_flashdata("success"," guardarFormulario : ".$this->input->post("guardarFormulario"));
            }
        }
        $this->data["subMenuNestable"]="Nestable";
        $this->data["view"]="importar/nestable";
        $this->load->view("template/template",$this->data);
    }
}
//redirect(base_url()."error404");
/*
$_SERVER['DOCUMENT_ROOT'] : C:/xampp/htdocs
array(1) { [0]=> array(14) { 
["file_name"]=> string(8) "OT2.xlsx" 
["file_type"]=> string(65) "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" 
["file_path"]=> string(43) "C:/xampp/htdocs/siscar/assets/archivos/ots/" 
["full_path"]=> string(51) "C:/xampp/htdocs/siscar/assets/archivos/ots/OT2.xlsx" 
["raw_name"]=> string(3) "OT2" 
["orig_name"]=> string(8) "OT2.xlsx" 
["client_name"]=> string(8) "OT2.xlsx" 
["file_ext"]=> string(5) ".xlsx" 
["file_size"]=> float(10.13)
["is_image"]=> bool(false) 
["image_width"]=> string(0) "" 
["image_height"]=> string(0) "" 
["image_type"]=> string(0) "" 
["image_size_str"]=> string(0) "" } } 
*/