<?php Class Proveedor_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    public function get_dominio_empleados($id_dominio){
        $query = $this->db->query("CALL get_one_dominio_cliente_by_id_dominio('{$id_dominio}')");
        $dominio = $query->row_array();
        $query->next_result(); 
        $query->free_result();
        $query2 = $this->db->query("CALL get_empleados_data_by_fk_dominio('{$id_dominio}')");
        $empleados_dominio = $query2->result_array();
        $query2->next_result(); 
        $query2->free_result();
        foreach ($empleados_dominio as $key => $empleado_dominio) {
            $dominio['empleado_dominio_detalle'][$key]['id_empleado'] = $empleado_dominio["id_empleado"];
            $dominio['empleado_dominio_detalle'][$key]['fecha_ingreso'] = $empleado_dominio["fecha_ingreso"];
            $dominio['empleado_dominio_detalle'][$key]['cod_empleado'] = $empleado_dominio["cod_empleado"];
            $dominio['empleado_dominio_detalle'][$key]['nombres'] = $empleado_dominio["nombres"];
            $dominio['empleado_dominio_detalle'][$key]['apellidos'] = $empleado_dominio["apellidos"];
            $dominio['empleado_dominio_detalle'][$key]['nombrecategoria'] = $empleado_dominio["nombrecategoria"];
            $dominio['empleado_dominio_detalle'][$key]['nombrerol'] = $empleado_dominio["nombrerol"];
            $dominio['empleado_dominio_detalle'][$key]['tiempo'] = $empleado_dominio["tiempo"];
        }
        return $dominio;
    }
}