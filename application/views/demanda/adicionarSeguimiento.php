<!-- Datatables  -->
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/scroller.bootstrap.min.css" rel="stylesheet">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Registro de Seguimiento de Demanda.</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <form id="formulario" name="formSeguimiento" role="form" method="post" enctype="multipart/form-data">
            <input name="id_seguimiento" id="id_seguimiento" type="hidden" value="<?php echo $seguimiento['id_seguimiento'] ?>"/>
            <div class="row">
                <div class="col-md-3">
                    <div class="control-group">
                        <label for="date" class="control-label"> Mes-Año</label>
                        <div class="controls">
                            <div class="form-group">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
                                    <input id="mes" name="mes" type="text" class="form-control" readonly="readonly" value="<?php echo date_format(date_create($prevision_dominio['mes_anio']), 'Y-m'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group">
                        <label  class="control-label"> Dias Laborables</label>
                        <div class="controls">
                            <input id="dias_laborables" name="dias_laborables" class="form-control" type="number" readonly="readonly" value="<?php echo $prevision_dominio['nro_dias'] ?>">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group">
                        <label for="date" class="control-label"> Fecha Corte  <span class="required">*</span></label>
                        <div class="controls">
                            <div class="form-group">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input id="fecha_corte" name="fecha_corte" type="text" class="form-control" readonly="readonly" value="<?php echo $seguimiento['fecha_corte'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group">
                        <label  class="control-label"> Dias Corte  <span class="required">*</span></label>
                        <div class="controls">
                            <input id="dias_corte" name="dias_corte" class="form-control" type="number" <?php echo $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'aDemanda') ? '' : 'readonly="readonly"' ;?> value="<?php echo (isset($seguimiento['nro_dias_corte']) ? $seguimiento['nro_dias_corte'] : "") ?>" onchange="actualizarTodos(this)">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="control-group">
                        <label for="dni" class="control-label">Comentarios</label>
                        <div class="controls">
                            <textarea name="comentarios" class="form-control" <?php echo $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'aDemanda') ? '' : 'readonly="readonly"' ;?>><?php echo (isset($seguimiento['descripcion']) ? $seguimiento['descripcion'] : "") ?></textarea>
                        </div>
                    </div>
                </div>
            </div><br>
            <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'aDemanda')) { ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="button" id="modificarSeguimiento" name="modificarSeguimiento" class="btn btn-success"><i class="fa fa-edit"></i> Modificar</button>
                                <button id="cancelarSeguimiento" type="button" class="btn btn-danger"><i class="fa fa-backward"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </form>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"></div>
                <div class="col-md-2"><button type="button" id="ocultarFilasNoEditables" class="btn btn-success"><i class="fa fa-eye"></i> Mostrar solo Editables</button>
                </div>
                <div class="col-md-2"><button type="button" id="reiniciarFilas" class="btn btn-warning"><i class="fa fa-repeat"></i> Mostrar Todos</button></div>
            </div>
            <hr class="hr-primary" />
            <table id="seguimiento_demanda" class="table table-striped table-bordered jambo_table bulk_action datatable-buttons">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Dominio</th>
                        <th>Empleados (N°)</th>
                        <th>Vacaciones (Horas)</th>
                        <th>Disponible (Horas)</th>
                        <th>Demanda Confirmada (Horas)</th>
                        <th>Debio Enviar (Horas)</th>
                        <th>Se Envio (Horas)</th>
                        <th>Porcentaje % (Se Envio/Demanda Confirmada)</th>
                        <th>Se Debio Ejecutar (Horas)</th>
                        <th>Ejecutado (Horas)</th>
                        <th>Porcentaje % (Se Debio Ejecutar/Ejecutado)</th>
                        <th>Comentarios Lider</th>
                        <th>Comentarios Produccion</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($seguimiento["seguimiento_prevision_detalle"] as $sp) { ?>
                    <?php if ($this->liderdominios->checkPermiso($this->session->userdata('empleado_lider_dominios'),$sp['fk_dominio'])) { $flag_editar = "1"; }else { $flag_editar = "0"; }?>
                    <tr class="gradeX" 
                        flag-editar="<?php echo ($flag_editar=="1") ? "1" : "0" ?>"
                        id="fila" 
                        data-toggle="tooltip" 
                        data-placement="top" 
                        title="Ultima actualizacion : <?php echo isset($sp['fchAc']) ? $sp['fchAc'] : "--" ?>">
                            <td><?php echo $sp["cliente"] ?></td>
                            <td><?php echo $sp["dominio"] ?></td>
                            <td><?php echo $sp['nro_empleados'] ?></td>
                            <td><?php echo $sp['nro_vacaciones'] ?></td>
                            <td><?php echo $sp['hrs_disponibles'] ?></td>
                            <td><?php echo $sp['hrs_solutions'] ?></td>
                            <td><?php echo $sp['hrs_plan_meta'] ?></td>
                            <td><?php echo $sp['hrs_plan_real'] ?></td>
                            <td><?php echo $sp['hrs_plan_porcentaje'] ?></td>
                            <td><?php echo $sp['hrs_ejec_meta'] ?></td>
                            <td><?php echo $sp['hrs_ejec_real'] ?></td>
                            <td><?php echo $sp['hrs_ejec_porcentaje'] ?></td>
                            <td><?php echo $sp['comentario'] ?></td>
                            <td><?php echo $sp['descripcion'] ?></td>
                            <td>
                                <div class="dt-buttons btn-group">
                                <?php if ($sp['flag_bloqueo'] == 1) { ?>
                                    <p><span class="label label-danger">Seguimiento Bloqueado.</span></p>
                                <?php } else {  ?>
                                    <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'aDemanda')) { ?>
                                        <button id="editarSeguimientoPrevision" onclick="editarSeguimiento(<?php echo $seguimiento['id_seguimiento'] ?>,<?php echo $sp['id_seguimiento_prevision'] ?>)" type="button" class="btn btn-success btn-xs btn-flat" data-toggle="tooltip" data-placement="bottom" title="Editar Seguimiento">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    <?php } else { ?>
                                        <?php if ($flag_editar === "1") { ?>
                                            <button id="editarSeguimientoPrevision" onclick="editarSeguimiento(<?php echo $seguimiento['id_seguimiento'] ?>,<?php echo $sp['id_seguimiento_prevision'] ?>)" type="button" class="btn btn-success btn-xs btn-flat" data-toggle="tooltip" data-placement="bottom" title="Editar Seguimiento">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        <?php } else { ?>
                                            <p><span class="label label-danger">No puede Editar.</span></p>
                                        <?php } ?>
                                    <?php } ?>  
                                <?php } ?>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
</div>
<!-- Data Tables -->
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/buttons.flash.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/responsive.bootstrap.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/datatables.scroller.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/dataTables.select.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/datetime.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/moment.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/dataTables/datetime-moment.js"></script>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>  
<!-- Utilitarios -->
<script src="<?php echo base_url() ?>assets/js/scripts/utilitarios.js"></script>
<script type="text/javascript">
function editarSeguimiento(id_seguimiento,id_seguimiento_prevision) {
    var alto = 747;
    var ancho = 869;
    var url = "<?php echo base_url().'demanda/editar_seguimiento_prevision/'; ?>"+id_seguimiento+"/"+id_seguimiento_prevision;    
    popup(url,alto,ancho);
};
</script>
<script type="text/javascript">
$(document).ready(function () {
    /*  VALIDAR ANTI ENTER    */
    $(document).on("keypress", "form", function (event) {
        return event.keyCode != 13;
    });
    $('[data-toggle="tooltip"]').tooltip();
    $('#formSeguimiento').validate({
        rules: {
            dias_corte: {required: true, minlength: 1, maxlength: 2, digits: true},
            comentarios: {required: true}
        },
        messages: {
            dias_corte: {required: 'Campo Requerido.', minlength: "Minimo {0} digitos", maxlength: "Máximo {0} digitos", digits: "Solo digitos"},
            comentarios: {required: 'Campo Requerido.'}
        }
    });
    $('#modificarSeguimiento').on('click', function () {
        var boton_submit = this;
        swal({
            title: "Modificar Datos del Seguimiento de Demanda",
            text: "¿Esta seguro que desea guardar esta informacion? ",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false
        },
        function (val) {
            if (val == true) {
                swal.disableButtons();
                $(boton_submit).attr('type', 'submit');
                $(boton_submit).click();
            } else {
                return false;
            }
        });
    });
    $('#cancelarSeguimiento').click(function () {
        swal({
            title: "Cancelar Edicion",
            text: "¿Esta seguro de cancelar la edicion?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false
        },
        function (val) {
            if (val == true) {
                swal.disableButtons();
                location.replace("<?php echo base_url() . 'demanda/seguimiento'; ?>");
            }
        });
    });
    table = $(".datatable-buttons").DataTable({
        deferRender: true,
        processing: true,
        serverSide: false,
        select: true,
        autoWidth: false,
        responsive: true,
        pagingType: 'full_numbers',
        paginate: true,
        order: [],
        deferLoading: [{data: 'num_results'}],
        dom: "Bftlp",
        lengthMenu: [
            [10, 25, 50, -1],
            ['10', '25', '50', 'Todo']
        ],
        buttons: [
            {
                extend: "selectAll",
                className: "fa fa-check-square-o btn-lg",
                text: '',
                titleAttr: 'Seleccionar todo'
            },
            {
                extend: "selectNone",
                className: "fa fa-square-o btn-lg",
                text: '',
                titleAttr: 'Desmarcar todo'
            },
            {
                extend: "selectNone",
                className: "btn-blank",
                text: ''
            },
            {
                extend: "excel",
                className: "fa fa-file-excel-o btn-lg btn-disabled",
                text: '',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            },
            {
                extend: "pdf",
                className: "fa fa-file-pdf-o btn-lg btn-disabled",
                text: '',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true

                    }
                },
                download: 'open'
            },
            {
                extend: "copy",
                className: "fa fa-copy btn-lg btn-disabled",
                text: '',
                titleAttr: 'Copiar filas',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            },
            {
                extend: "print",
                className: "fa fa-print btn-lg btn-disabled",
                text: '',
                titleAttr: 'Imprimir filas',
                enabled: false,
                exportOptions: {
                    modifier: {
                        selected: true
                    }
                }
            }
        ],
        language: {
            lengthMenu: 'Mostrar _MENU_ filas',
            zeroRecords: 'Sin resultados',
            search: 'Filtrar:',
            info: 'Filas _START_ a _END_ de _TOTAL_',
            infoEmpty: 'No hay resultados',
            paginate: {
                first: '<i class="fa fa-angle-double-left" data-toggle="tooltip" data-placement="top" data-original-title="Inicio"></i>',
                previous: '<i class="fa fa-angle-left" data-toggle="tooltip" data-placement="top" data-original-title="Anterior"></i>',
                next: '<i class="fa fa-angle-right" data-toggle="tooltip" data-placement="top" data-original-title="Siguiente"></i>',
                last: '<i class="fa fa-angle-double-right" data-toggle="tooltip" data-placement="top" data-original-title="Final"></i>'
            },
            buttons: {
                selectAll: "Seleccionar todo",
                selectNone: "Quitar seleccion"
            }
        }
    });
    $('.datatable-buttons').on('select.dt deselect.dt', function () {
        table.buttons(['.btn-disabled']).enable(
                table.rows({selected: true}).indexes().length === 0 ? false : true
        );
    });
    $.fn.dataTable.ext.search.push(
          function(settings, data, dataIndex) {
              return $(table.row(dataIndex).node()).attr('flag-editar') == 1;
            }
        );
    table.draw();
    <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'aDemanda')) { ?>
        $.fn.dataTable.ext.search.pop();
        table.draw();
    <?php } ?>
    $("#ocultarFilasNoEditables").click(function() {
        $.fn.dataTable.ext.search.push(
          function(settings, data, dataIndex) {
              return $(table.row(dataIndex).node()).attr('flag-editar') == 1;
            }
        );
        table.draw();
    });    
    $("#reiniciarFilas").click(function() {
        $.fn.dataTable.ext.search.pop();
        table.draw();
    });
});
</script>