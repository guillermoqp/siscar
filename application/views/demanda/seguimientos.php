<!-- Datatables -->
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/scroller.bootstrap.min.css" rel="stylesheet">
<!-- Data picker -->
<link href="<?php echo base_url() ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Seguimiento de Demanda</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'aDemanda')) { ?>
            <form action="<?php echo base_url() ?>demanda/seguimiento_adicionar" method="post" >
                <div class="row">
                    <div class="col-md-3">
                        <div class="control-group">
                            <label for="date" class="control-label">Fecha Corte  <span class="required">*</span></label>
                            <div class="controls">
                                <div class="form-group">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input id="fecha_corte" name="fecha_corte" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="button" id="form-submit" name="generarSeguimiento" class="btn btn-success"><i class="fa fa-plus"></i> Generar Seguimiento Demanda</button>
                    </div>
                </div>
            </form>
        <hr class="hr-primary" />
        <?php } ?>
        <table id="grid_name" cellpadding="0" cellspacing="0"></table>
        <div id="pager2" class="scroll" style="text-align: center;"></div>
        <table class="table table-striped table-bordered table-hover datatable-buttons">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha Corte</th>
                    <th>Nro Dias Corte</th>
                    <th>Bloqueado</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($seguimientos as $seguimiento) { ?>
                    <tr class="gradeX">
                        <td><?php echo $seguimiento["id_seguimiento"] ?></td>
                        <td><?php echo $seguimiento["fecha_corte"] ?></td>
                        <td><?php echo $seguimiento["nro_dias_corte"] ?></td>
                        <?php
                        if ($seguimiento["flag_bloqueo"] == 1) {
                            $bloqueado = 'SI';
                        } else {
                            $bloqueado = 'NO';
                        }
                        ?>
                        <td><?php echo $bloqueado ?></td>
                        <td><?php echo date('d/m/Y', strtotime($seguimiento["fecha"])) ?></td>
                        <td><?php echo $seguimiento["descripcion"] ?></td>
                        <?php
                        if ($seguimiento["estado"] == 1) {
                            $estado = 'Activo';
                        } else {
                            $estado = 'Desactivo';
                        }
                        ?>
                        <td>
                            <?php echo $estado ?><br>
                            Avance : <?php 
                            if ($seguimiento["avance"]>=0 && $seguimiento["avance"]<=20) {
                                $estilo = 'danger';
                            }
                            if ($seguimiento["avance"]>20 && $seguimiento["avance"]<=50) {
                                $estilo = 'warning';
                            }
                            if ($seguimiento["avance"]>50 && $seguimiento["avance"]<=80) {
                                $estilo = 'info';
                            }
                            if ($seguimiento["avance"]>80) {
                                $estilo = 'success';
                            }                            
                            ?>
                            <h4><?php echo $seguimiento["avance"] ?> %</h4>
                            <div class="progress progress-striped active">
                                <div style="width: <?php echo $seguimiento["avance"] ?>%" class="progress-bar progress-bar-<?php echo $estilo ?>">
                                    <?php echo $seguimiento["avance"] ?>% <span class="sr-only"></span>
                                </div>
                            </div> 
                        </td>
                        <td>
                            <?php if ($seguimiento["flag_bloqueo"] == 1) { ?>
                                    <p><span class="label label-danger">Seguimiento de Demanda Bloqueado.</span></p>
                            <?php } else {  ?>
                            <div class="dt-buttons btn-group"> 
                                <?php if($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'aDemanda') || $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'eDemanda') || $this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'eDemandaDominio')) { ?>
                                    <a href="<?php echo base_url() . 'demanda/seguimiento_adicionar/' . $seguimiento["id_seguimiento"]; ?>" class="btn btn-default btn-xs btn-flat" data-toggle="tooltip" data-placement="bottom" title="Editar Seguimiento de Demanda">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'dDemanda')) { ?>
                                    <a id="bloquear_seguimiento" seguimiento="<?php echo $seguimiento["id_seguimiento"]; ?>" type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalBloquear">
                                            <i class="fa fa-close"></i>
                                    </a>
                                <?php } ?>
                                <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'dDemanda')) { ?>
                                    <a id="eliminar_seguimiento" seguimiento="<?php echo $seguimiento["id_seguimiento"]; ?>" type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalEliminar">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                <?php } ?>
                            </div>
                            <?php } ?>
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
            <form id="id_elimiminar" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                    <h4 class="modal-title">Eliminar Seguimiento de Demanda</h4>
                </div>
                <div class="modal-body">
                    <p>¿Realmente desea eliminar el Seguimiento de Demanda Seleccionado?. <br>Se perderan todos los datos asociados.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal inmodal" id="modalBloquear" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <form id="id_bloquear" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                    <h4 class="modal-title">Bloquear Seguimiento de Demanda</h4>
                </div>
                <div class="modal-body">
                    <p>¿Realmente desea bloquear el Seguimiento de Demanda?. <br>No se podran editar los datos asociados.</p>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Bloquear</button>
                </div>
            </form>
        </div>
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
<!-- Data picker -->
<script src="<?php echo base_url() ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $(document).on('click', 'a', function (event) {
        var seguimiento = $(this).attr('seguimiento');
        $('#id_elimiminar').attr('action', "<?php echo base_url().'demanda/seguimiento_desactivar/' ?>" + seguimiento);
    });
    $(document).on('click', 'a', function (event) {
        var seguimiento = $(this).attr('seguimiento');
        $('#id_bloquear').attr('action', "<?php echo base_url().'demanda/seguimiento_bloquear/' ?>" + seguimiento);
    });
    $("#fecha_corte").inputmask("d-m-y");
    $('#fecha_corte').datepicker({
        format: "dd-mm-yyyy",
        separator: ' - ',
        todayBtn: true,
        language: "es",
        autoclose: true,
        todayHighlight: true
    });
    $('#form-submit').on('click', function () {
        var boton_submit = this;
        swal({
            title: "Registrar Seguimiento de Demanda",
            text: "¿Esta seguro que desea guardar esta informacion?. Se generaran registros en base a la Fecha de Corte seleccionada.",
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
    $(document).on('click', 'button', function (event) {
        var seguimiento = $(this).attr('seguimiento');
        $('#id_seguimiento').val(seguimiento);
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
        dom: "lBfrtip",
        columnDefs: [
            {
                targets: 1,
                className: 'noVis'
            }
        ],
        lengthMenu: [
            [5,10, 25, 50, -1],
            ['5','10', '25', '50', 'Todo']
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
        language: { "url" : "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json" }
    });
    $('.datatable-buttons').on('select.dt deselect.dt', function () {
        table.buttons(['.btn-disabled']).enable(
                table.rows({selected: true}).indexes().length === 0 ? false : true
        );
    });
});
</script>