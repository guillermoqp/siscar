<!-- Datatables -->
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/scroller.bootstrap.min.css" rel="stylesheet">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Prevision de Demanda</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'aDemanda')) { ?>
            <a href="<?php echo base_url() ?>demanda/prevision_adicionar" class="btn btn-success"><i class="fa fa-plus"></i> Adicionar Prevision</a>
        <hr class="hr-primary" />
        <?php } ?>
        <table id="grid_name" cellpadding="0" cellspacing="0"></table>
        <div id="pager2" class="scroll" style="text-align: center;"></div>
        <table class="table table-striped table-bordered table-hover datatable-buttons" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mes/Año</th>
                    <th>Nro Dias</th>
                    <th>Bloqueado</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($previsiones as $prevision) { ?>
                    <tr class="gradeX">
                        <td><?php echo $prevision["id_prevision"] ?></td>
                        <td><?php echo $prevision["mes_anio"] ?></td>
                        <td><?php echo $prevision["nro_dias"] ?></td>
                        <?php
                        if ($prevision["flag_bloqueo"] == 1) {
                            $bloqueado = 'SI';
                        } else {
                            $bloqueado = 'NO';
                        }
                        ?>
                        <td><?php echo $bloqueado ?></td>
                        <td><?php echo date('d/m/Y', strtotime($prevision["fecha"])) ?></td>
                        <td><?php echo $prevision["descripcion"] ?></td>
                        <?php
                        if ($prevision["estado"] == 1) {
                            $estado = 'Activo';
                        } else {
                            $estado = 'Desactivo';
                        }
                        ?>
                        <td><?php echo $estado ?></td>
                        <td>
                            <div class="dt-buttons btn-group">
                                <?php if ($prevision["flag_bloqueo"] == 1) { ?>
                                    <p><span class="label label-danger">Prevision Bloqueada</span></p>
                                <?php } else {  ?>
                                    <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'vDemanda')) { ?>
                                        <a href="<?php echo base_url() . 'demanda/prevision_visualizar/' . $prevision["id_prevision"]; ?>" class="btn btn-default btn-xs btn-flat" data-toggle="tooltip" data-placement="bottom" title="Ver detalle">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'eDemanda')) { ?>
                                        <a href="<?php echo base_url() . 'demanda/prevision_editar/' . $prevision["id_prevision"]; ?>" class="btn btn-default btn-xs btn-flat" data-toggle="tooltip" data-placement="bottom" title="Editar Prevision">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'dDemanda')) { ?>
                                        <a id="bloquear_prevision" prevision="<?php echo $prevision["id_prevision"]; ?>" type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalBloquear">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    <?php } ?>
                                    <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'dDemanda')) { ?>
                                        <a prevision="<?php echo $prevision["id_prevision"]; ?>" type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalEliminar">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
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
<div class="modal inmodal" id="modalEliminar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <form id="idelim" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                    <h4 class="modal-title">Eliminar Prevision</h4>
                </div>
                <div class="modal-body">
                    <p>¿Realmente desea eliminar la prevision de Demanda?. <br>Se perderan todos los datos asociados.</p>
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
                    <h4 class="modal-title">Bloquear Prevision</h4>
                </div>
                <div class="modal-body">
                    <p>¿Realmente desea bloquear la prevision?. No se podran editar los datos asociados.</p>
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
<script type="text/javascript">
$(document).ready(function () {
    $(document).on('click', 'a', function (event) {
        var prevision = $(this).attr('prevision');
        $('#idelim').attr('action', "<?php echo base_url().'demanda/prevision_eliminar/' ?>" + prevision);    
    });
    $(document).on('click', 'a', function (event) {
        var prevision = $(this).attr('prevision');
        $('#id_bloquear').attr('action', "<?php echo base_url().'demanda/prevision_bloquear/' ?>" + prevision);
    });

    $('[data-toggle="tooltip"]').tooltip();
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
});
</script>