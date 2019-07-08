<!-- Datatables -->
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/dataTables/scroller.bootstrap.min.css" rel="stylesheet">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Registro de Prevision.</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-md-3">
                <div class="control-group">
                    <div class="controls">
                        <div class="form-group" id="mes">
                            <label class="font-noraml">Mes-Año  <span class="required">*</span></label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input name="mes" id="mes" type="text" class="form-control" value="<?php echo date('Y-m', strtotime($prevision_dominio['mes_anio'])) ?>" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="control-group">
                    <label  class="control-label"> Dias Laborables  <span class="required">*</span></label>
                    <div class="controls">
                        <input id="dias_laborables" name="dias_laborables" class="form-control" type="number" value="<?php echo $prevision_dominio["nro_dias"] ?>" readonly="readonly">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="control-group">
                <label for="dni" class="control-label">Comentarios</label>
                <div class="controls">
                    <textarea name="comentarios" readonly="readonly" class="form-control"><?php echo $prevision_dominio["descripcion"] ?></textarea>
                </div>
            </div>
        </div>
        <hr class="hr-primary" />
        <table class="table table-striped table-bordered jambo_table bulk_action datatable-buttons">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Dominio</th>
                    <th>Empleados (N°)</th>
                    <th>Vacaciones (Horas)</th>
                    <th>Disponible (Horas)</th>
                    <th>Demanda Confirmada (Horas)</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prevision_dominio["prevision_dominio_detalle"] as $pdd) { ?>
                    <tr class="gradeX">
                        <td><?php echo $pdd["cliente"] ?></td>
                        <td><?php echo $pdd["dominio"] ?></td>
                        <td><?php echo $pdd["nro_empleados"] ?></td>
                        <td><?php echo $pdd["nro_vacaciones"] ?></td>
                        <td><?php echo $pdd["hrs_disponibles"] ?></td>
                        <td><?php echo $pdd["hrs_solutions"] ?></td>
                        <td><?php echo $pdd["descripcion"] ?></td>
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
<script type="text/javascript">
    $(document).ready(function () {
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
            dom: "Bftlip",
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
                search: 'Filtrar: ',
                info: 'Filas _START_ a _END_ de _TOTAL_',
                infoEmpty: 'No hay resultados.',
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