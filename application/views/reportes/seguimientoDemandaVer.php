<!-- Datatables  -->
<link href="<?php print(base_url("assets/css/plugins/dataTables/dataTables.bootstrap.min.css")) ?> rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/buttons.bootstrap.min.css")) ?> rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/fixedHeader.bootstrap.min.css")) ?> rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/responsive.bootstrap.min.css")) ?> rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/scroller.bootstrap.min.css")) ?> rel="stylesheet">
<div class="ibox float-e-margins">
    <div id="impresion">
    <div class="ibox-title">
        <h5>Reporte de Seguimiento de Demanda</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
            <div class="row">
                <div class="col-md-2">
                    <label for="date" class="control-label"> Mes-Año : </label><?php print(date_format(date_create($prevision_dominio['mes_anio']),"Y-m")) ?>  
                </div>
                <div class="col-md-2">
                    <label for="date" class="control-label"> Dias Laborables : </label><?php print($prevision_dominio['nro_dias']) ?>
                </div>
                <div class="col-md-2">
                    <label for="date" class="control-label">Comentarios : </label><?php print((isset($seguimiento['descripcion']) ? $seguimiento['descripcion'] : "")) ?>
                </div>
                <div class="col-md-2">
                    <label for="date" class="control-label">Fecha Corte : </label><?php print($seguimiento['fecha_corte']) ?>
                </div>
                <div class="col-md-2">
                    <label for="date" class="control-label">Dias Corte : </label><?php print((isset($seguimiento['nro_dias_corte']) ? $seguimiento['nro_dias_corte'] : "")) ?>
                </div>
                <div class="col-md-2">
                    <a id="btn_imprimir" href="#" class="btn btn-info btn-flat"><i class="fa fa-print"></i> Imprimir</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form action="<?php print(base_url("reportes/seguimiento_demanda_excel/".$seguimiento['id_seguimiento'])) ?>" method="POST">
                        <div class="control-group">
                            <label for="apellidos" class="control-label">Nombre Reporte</span></label>
                            <div class="controls">
                                <input class="form-control" id="nombreReporte" type="text" name="nombreReporte"/>
                            </div>
                        </div>
                        <button name="exportarExcel" type="submit" class="btn btn-info"><i class="fa fa-file-excel-o"></i> Exportar Excel</button>
                    </form>
                </div>
            </div>
            <table id="tabla" class="table table-striped table-bordered jambo_table bulk_action datatable-buttons">
                <thead>
                    <tr>
                        <th>1.- Cliente</th>
                        <th>2.- Dominio</th>
                        <th>3.- Colaboradores</th>
                        <th>6.- Nro horas vacaciones</th>
                        <th>8.- Disponibilidad real</th>
                        <th>9.- Demanda confirmada por Lima (Horas)</th>
                        <th>11.- Demanda que debió enviarse (Ref en hrs)</th>
                        <th>Se Envio (Horas)</th>
                        <th>17.- % de Desvío según lo ejecutado</th>
                        <th>15.- Horas que debieron ejecutarse según lo planificado</th>
                        <th>20.- Prevista a ejecutar coordinado c/Lima</th>
                        <th>Porcentaje % (Se Debio Ejecutar/Ejecutado)</th>
                        <th>10.- Ocupabilidad confirmada</th> 
                        <th>24.- Facturabilidad</th> 
                        <th>Comentarios Lider</th>
                        <th>23.- Comentario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($seguimiento["seguimiento_prevision_detalle"] as $sp) { ?>
                        <tr class="gradeX" id="fila">
                            <td><?php print($sp["cliente"]) ?></td>
                            <td><?php print($sp["dominio"]) ?></td>
                            <td><?php print($sp['nro_empleados']) ?></td>
                            <td><?php print($sp['nro_vacaciones']) ?></td>
                            <td><?php print($sp['hrs_disponibles']) ?></td>
                            <td><?php print($sp['hrs_solutions']) ?></td>
                            <td><?php print($sp['hrs_plan_meta']) ?></td>
                            <td><?php print($sp['hrs_plan_real']) ?></td>
                            <td><?php print($sp['hrs_plan_porcentaje']) ?></td>
                            <td><?php print($sp['hrs_ejec_meta']) ?></td>
                            <td><?php print($sp['hrs_ejec_real']) ?></td>
                            <td><?php print($sp['hrs_ejec_porcentaje']) ?></td>
                            <td><?php print($sp['ocupabilidad']) ?></td>
                            <td><?php print($sp['facturabilidad']) ?></td>
                            <td><?php print($sp['comentario']) ?></td>
                            <td><?php print($sp['descripcion']) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="ibox float-e-margins">
    <div id="impresion2">
    <div class="ibox-title">
        <h5>Informe Semanal Centros (A fecha de Corte)</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
            <div class="row">
                <div class="col-md-2">
                    <a id="btn_imprimir2" href="#" class="btn btn-info btn-flat">
                        <i class="fa fa-print"></i> Imprimir
                    </a>
                </div>   
            </div>
            <table id="tabla2" class="table table-striped table-bordered jambo_table bulk_action datatable-buttons">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Proyecto</th>
                        <th>HC</th>
                        <th>Estado dlvry</th>
                        <th>Demanda</th>
                        <th>Comentario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($seguimiento["seguimiento_prevision_detalle"] as $sp) { ?>
                        <tr class="gradeX" id="fila">
                            <td><?php print($sp["cliente"]) ?></td>
                            <td><?php print($sp["dominio"]) ?></td>
                            <td><?php print($sp['nro_empleados']) ?></td>
                            <td><?php if($sp['estado_delivery'] != null ) { ?>
                                    <img src="<?php print(base_url('assets/img/indicadores/delivery_'.$sp["estado_delivery"].'.png')) ?>" class="img-responsive" width="30" height="30">
                                <?php }  ?></td>
                            <td><?php if($sp['demanda'] != null ) { ?>
                                    <img src="<?php print(base_url('assets/img/indicadores/demanda_'.$sp["demanda"].'.png')) ?>" class="img-responsive" width="30" height="30">
                                <?php }  ?></td>
                            <td><?php print($sp['descripcion']) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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
<script>
function print(impresion)
{
    var data = document.getElementById(impresion).innerHTML;
    var Window = window.open('', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=50,left=80,width=1100,height=800');
    var usuario = "<?php print($this->session->userdata("nombre_usuario")) ?>"; 
    var fecha_hora = "<?php print(date("d-m-Y H:i:s")) ?>";
    var footer = "<footer class='main-footer'>\n\
                    <div><b>Fecha y Hora de Impresión:</b> <small>"+fecha_hora+"</small></div>\n\
                    <div><b>Generado por:</b> <small>"+usuario+"</small></div>\n\
                    <div class='pull-left'>CAR Trujillo - SISCAR</div><br>\n\
                    <div class='pull-left'><strong>&copy; 2017 - CAR Trujillo - SISCAR</strong></div>\n\
                  </footer>";
    Window.document.open();
    Window.document.write("<link rel='stylesheet' href='<?php print(base_url("assets/css/bootstrap.min.css")) ?>' />");
    Window.document.write("<link rel='stylesheet' href='<?php print(base_url("assets/cssfont-awesome.css")) ?>' />");
    Window.document.write("<link rel='stylesheet' href='<?php print(base_url("assets/css/animate.css")) ?>' />");
    Window.document.write("<link rel='stylesheet' href='<?php print(base_url("assets/css/style.css")) ?>' />");
    Window.document.write('<html><head><title>CAR Trujillo - SISCAR</title></head><body onload="window.print()">'+data+footer+'</html>');
    Window.document.close();
    return false;
}
</script> 
<script type="text/javascript">
$(document).ready(function () {
    $("#btn_imprimir").click(function () 
    {
        $("#tabla").removeClass("jambo_table bulk_action datatable-buttons").addClass();
        print('impresion');
    });
    $("#btn_imprimir2").click(function () 
    {
        $("#tabla2").removeClass("jambo_table bulk_action datatable-buttons").addClass();
        print('impresion2');
    });
    table = $(".datatable-buttons").DataTable({
        lengthMenu: [
            [5,10, 25, 50, -1],
            ['5','10', '25', '50', 'Todo']
        ],    
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
        language:  { "url" : "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"  }
    });
    $('.datatable-buttons').on('select.dt deselect.dt', function () {
        table.buttons(['.btn-disabled']).enable(
        table.rows({selected: true}).indexes().length===0?false:true );
    });
});
</script>