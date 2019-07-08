<!-- Datatables -->
<link href="<?php print(base_url("assets/css/plugins/dataTables/dataTables.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/buttons.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/fixedHeader.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/responsive.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/scroller.bootstrap.min.css")) ?>" rel="stylesheet">
<!-- Data picker -->
<link href="<?php print(base_url("assets/css/plugins/datapicker/datepicker3.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/jasny/jasny-bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/iCheck/custom.css")) ?>" rel="stylesheet">
<div class="widget-box">
    <div class="widget-content">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <form id="formularioFiltrarEmpleados" method="POST">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="control-group">
                                    <label  class="control-label">Cliente</label>
                                    <div class="controls">
                                        <select class="form-control m-b" name="id_cliente" id="id_cliente">
                                            <option value="">Seleccione...</option>
                                            <?php foreach ($clientes as $cliente) { print('<option value="'.$cliente["id_cliente"].'">'.$cliente["nombre"].'</option>'); }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="control-group">
                                    <label  class="control-label">Dominio</label>
                                    <div class="controls">
                                        <select class="form-control m-b" name="id_dominio" id="id_dominio">
                                            <option value="">Seleccione...</option>
                                            <?php foreach ($dominios as $dominio) { print('<option value="'.$dominio["id_dominio"].'">'.$dominio["nombre"].'</option>'); }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="control-group">
                                    <label  class="control-label">Categoria</label>
                                    <div class="controls">
                                        <select class="form-control m-b" name="id_categoria" id="id_categoria">
                                            <option value="">Seleccione...</option>
                                            <?php foreach($categorias as $categoria) { print('<option value="'.$categoria["id_categoria"].'">'.$categoria["codigo"].'</option>');
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="control-group">
                                    <label  class="control-label">Estado</label>
                                    <div class="controls">
                                        <select class="form-control m-b" name="estado" id="estado">
                                            <option value="1" selected>Activo</option>
                                            <option value="0">Baja</option>
                                            <option value="2">Baja Temporal</option>
                                            <option value="3">Renuncia</option>
                                            <option value="4">No Aceptó</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="control-group">
                                    <label for="date" class="control-label">Fecha Ingreso</label>
                                    <div class="controls">
                                        <div class="form-group">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" id="fecha_ingreso" name="fecha_ingreso" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="control-group">
                                    <label for="date" class="control-label">Fecha Salida</label>
                                    <div class="controls">
                                        <div class="form-group">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" id="fecha_salida" name="fecha_salida" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="checkbox i-checks"><label><input id="filtro_fecha" type="checkbox"> Filtro</label></div>
                                <div class="control-group">
                                    <label for="date" class="control-label">Fecha Consulta al :</label>
                                    <div class="controls">
                                        <div class="form-group">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                <input type="text" id="fecha_consulta" name="fecha_consulta" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="span12">
                                <div class="span6 offset3">
                                    <button name="filtrarEmpleados" id="filtrarEmpleados" type="submit" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Empleados</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'aEmpleado')) { ?>
            <a href="<?php print(base_url("empleados/adicionar")) ?>" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Empleado</a>
            <a href="<?php print(base_url("empleados/agrupados")) ?>" class="btn btn-default"><i class="fa fa-user-md"></i> Agrupados Cliente - Dominio</a>
            <a href="<?php print(base_url("empleados/agrupados")) ?>" class="btn btn-default"><i class="fa fa-sitemap"></i> Agrupados Categorias</a>
            <a href="<?php print(base_url("empleados/cumpleanios")) ?>" class="btn btn-default"><i class="fa fa-calendar-o"></i> Cumpleaños</a>
        <?php } ?>
        <div class="col-md-3">
            <div class="control-group">
                <label for="apellidos" class="control-label">Nombre Reporte</span></label>
                <form action="<?php print(base_url("empleados/exportar_excel")) ?>" method="POST">
                <div class="controls">
                    <input class="form-control" id="nombreReporte" type="text" name="nombreReporte"/>
                </div>
            </div>
            <button name="exportarExcel" type="submit" class="btn btn-info"><i class="fa fa-file-excel-o"></i> Exportar Excel</button>
            </form>
        </div>
        <hr class="hr-primary" />
        <?php if(isset($fecha_consulta) && $fecha_consulta != null ) { ?>
            <h1><span class="label label-success"><i class="fa fa-calendar-o"></i> Datos Filtrados con Fecha de Consulta al : <?php print($fecha_consulta) ?></span></h1>
        <?php } ?>
        <table id="tablaEmpleados" class="table table-striped table-bordered jambo_table bulk_action datatable-buttons">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Codigo</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>DNI</th>
                    <th>Sexo</th>
                    <th>Estado Civil</th>
                    <th>Fecha Nacimiento</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Salida</th>
                    <th>Dominio</th>
                    <th>Categoria</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead> 
            <tbody>
                <?php foreach ($empleados as $empleado) { ?>
                    <tr class="gradeX">
                        <td><?php print($empleado["id_empleado"]) ?></td>
                        <td><?php print($empleado["cod_empleado"]) ?></td>
                        <td><?php print($empleado["nombres"]) ?></td>
                        <td><?php print($empleado["apellidos"]) ?></td>
                        <td><?php print($empleado["dni"]) ?></td>
                        <td><?php print(($empleado["sexo"]) != '') ? (($empleado["sexo"] == 'M') ? 'Masculino' : 'Femenino') : '--' ?></td>
                        <td><?php
                            switch ($empleado["estado_civil"]) {
                                case 'S':
                                    $estado_civil = "Soltero";
                                    break;
                                case 'C':
                                    $estado_civil = "Casado";
                                    break;
                                case 'V':
                                    $estado_civil = "Viudo";
                                    break;
                                default : $estado_civil = "--";
                            }
                            print($estado_civil)
                            ?></td>
                        <td><?php print(($empleado["fecha_nacimiento"]) != '' || $empleado["fecha_nacimiento"] != null) ? date('d/m/Y', strtotime($empleado["fecha_nacimiento"])) : '--' ?></td>
                        <td><?php print(($empleado["fecha_ingreso"]) != '' || $empleado["fecha_ingreso"] != null) ? date('d/m/Y', strtotime($empleado["fecha_ingreso"])) : '--' ?></td>
                        <td><?php print(($empleado["fecha_salida"]) != '' || $empleado["fecha_salida"] != null) ? date('d/m/Y', strtotime($empleado["fecha_salida"])) : '--' ?></td>
                        <td><?php print($empleado["nombredominio"]) ?></td>
                        <td><?php print($empleado["nombrecategoria"]) ?></td>
                        <td><?php
                            switch ($empleado["estado"]) {
                                case '0':
                                    $estado = "Baja";
                                    break;
                                case '1':
                                    $estado = "Activo";
                                    break;
                                case '2':
                                    $estado = "Baja Temporal";
                                    break;
                                case '3':
                                    $estado = "Renuncia";
                                    break;
                                case '4':
                                    $estado = "No Aceptó";
                                    break;
                                default : $estado = "--";
                            }
                            print($estado)
                            ?></td>
                        <td>
                            <div class="dt-buttons btn-group">
                                <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'vEmpleado')) { ?>
                                    <a href="<?php print(base_url("empleados/visualizar/".$empleado["id_empleado"])); ?>" class="btn btn-default btn-xs btn-flat" data-toggle="tooltip" data-placement="bottom" title="Ver detalle">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'eEmpleado')) { ?>
                                    <a href="<?php print(base_url("empleados/editar/".$empleado["id_empleado"])); ?>" class="btn btn-default btn-xs btn-flat" data-toggle="tooltip" data-placement="bottom" title="Editar Empleado">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'dEmpleado')) { ?>
                                    <a idEmpleado="<?php print($empleado["id_empleado"]) ?>" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalEliminar" data-placement="bottom" title="Eliminar Empleado">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                <?php } ?>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal inmodal" id="modalEliminar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <form id="idEmpleadoEliminar" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                    <h4 class="modal-title">Eliminar/Dar de Baja a Empleado</h4>
                </div>
                <div class="modal-body">
                    <p>¿Realmente desea eliminar/Dar de Baja al Empleado, se perderan todos los datos asociados.?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Data Tables -->
<script src="<?php print(base_url("assets/js/plugins/dataTables/jquery.dataTables.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.bootstrap.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.buttons.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/buttons.colVis.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/buttons.bootstrap.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/buttons.flash.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/buttons.html5.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/buttons.print.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.fixedHeader.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.keyTable.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.responsive.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/responsive.bootstrap.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/datatables.scroller.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/jszip.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/pdfmake.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/vfs_fonts.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/dataTables.select.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/datetime.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/moment.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/dataTables/datetime-moment.js")) ?>"></script>
<!-- InputMask -->
<script src="<?php print(base_url("assets/js/plugins/input-mask/jquery.inputmask.js")) ?>" type="text/javascript"></script>
<script src="<?php print(base_url("assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js")) ?>" type="text/javascript"></script>
<script src="<?php print(base_url("assets/js/plugins/input-mask/jquery.inputmask.extensions.js")) ?>" type="text/javascript"></script>
<!-- Data picker -->
<script src="<?php print(base_url("assets/js/plugins/datapicker/bootstrap-datepicker.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/validate.js")) ?>"></script>
<!-- iCheck -->
<script src="<?php print(base_url("assets/js/plugins/iCheck/icheck.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/scripts/dataTableUtils.js")) ?>"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#fecha_consulta').prop('disabled', true);
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
    });
    $('#filtro_fecha').on('ifChanged',function(event) {
        if (event.target.checked) {
            $('#fecha_consulta').prop('disabled', false);
            $('#id_cliente').prop('disabled', true);
            $('#id_dominio').prop('disabled', true);
            $('#id_categoria').prop('disabled', true);
            $('#fecha_ingreso').prop('disabled', true);
            $('#fecha_salida').prop('disabled', true);
            $('#estado').prop('disabled', true);
            $('#fecha_consulta').focus();
        } else {
            $('#fecha_consulta').prop('disabled', true);
            $('#id_cliente').prop('disabled', false);
            $('#id_dominio').prop('disabled', false);
            $('#id_categoria').prop('disabled', false);
            $('#fecha_ingreso').prop('disabled', false);
            $('#fecha_salida').prop('disabled', false);
            $('#estado').prop('disabled', false);
            $('#id_cliente').focus();
        }
    });
    $(document).on('click','a', function (event) {
        var idEmpleado=$(this).attr("idEmpleado");
        $("#idEmpleadoEliminar").attr("action","<?php print(base_url("empleados/excluir")) ?>"+"/"+idEmpleado);
    });
    
    $('[data-toggle="tooltip"]').tooltip();
    $("#fecha_ingreso").inputmask("d-m-y");
    $("#fecha_salida").inputmask("d-m-y");
    $("#fecha_consulta").inputmask("d-m-y");
    $('#fecha_ingreso').datepicker({
        format: "dd-mm-yyyy",
        separator: ' - ',
        todayBtn: true,
        language: "es",
        autoclose: true,
        todayHighlight: true
    });
    $('#fecha_salida').datepicker({
        format: "dd-mm-yyyy",
        separator: ' - ',
        todayBtn: true,
        language: "es",
        autoclose: true,
        todayHighlight: true
    });
    $('#fecha_consulta').datepicker({
        format: "dd-mm-yyyy",
        separator: ' - ',
        todayBtn: true,
        language: "es",
        autoclose: true,
        todayHighlight: true
    });
    var tablaEmpleados=crearDataTablePorId("tablaEmpleados");
});
</script>