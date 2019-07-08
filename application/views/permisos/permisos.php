<!-- Datatables -->
<link href="<?php print(base_url("assets/css/plugins/dataTables/dataTables.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/buttons.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/fixedHeader.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/responsive.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/scroller.bootstrap.min.css")) ?>" rel="stylesheet">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Permisos</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata("permiso"),"cPermiso")) { ?>
            <a href="<?php print(base_url("permisos/adicionar")) ?>" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo Permiso</a>
        <?php } ?>
        <hr class="hr-primary" />
        <table class="table table-striped table-bordered table-hover datatable-buttons" >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Permiso</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($permisos as $permiso) { ?>
                    <tr class="gradeX">
                        <td><?php print($permiso["id_permiso"]) ?></td>
                        <td><?php print($permiso["nombre"]) ?></td>
                        <td><?php print(date("d/m/Y",strtotime($permiso["fecha"]))) ?></td>
                        <td><?php print(($permiso["estado"]==1)?"Activo":"Inactivo") ?></td>
                        <td>
                            <div class="dt-buttons btn-group">
                                <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata("permiso"),"cPermiso")) { ?>
                                    <a href="<?php print(base_url("permisos/editar/".$permiso['id_permiso'])) ?>" class="btn btn-default btn-xs btn-flat" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="fa fa-edit"></i></a>
                                    <a id_permiso="<?php print($permiso["id_permiso"]) ?>" type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modalEliminar"><i class="fa fa-trash-o"></i></a>
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
            <form id="id_eliminar_permiso" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                    <h4 class="modal-title">Eliminar Permiso</h4>
                </div>
                <div class="modal-body">
                    <p>¿Realmente desea eliminar el permiso, se perderan todos los datos asociados?</p>
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
<script type="text/javascript">
$(document).ready(function () {
    $(document).on('click', 'a', function (event) {
        var id_permiso=$(this).attr("id_permiso");
        $('#id_eliminar_permiso').attr("action","<?php print(base_url("permisos/desactivar")) ?>"+"/"+id_permiso);    
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
                className: "fa fa-columns btn-lg btn-info",
                extend: 'colvis',
                text: '',
                columns: ':not(.noVis)'
            },
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