<!-- Datatables -->
<link href="<?php print(base_url("assets/css/plugins/dataTables/dataTables.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/buttons.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/fixedHeader.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/responsive.bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/dataTables/scroller.bootstrap.min.css")) ?>" rel="stylesheet">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Importar OT</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
    	<form role="form" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
        <div class="row">
        	<div class="col-md-3">
                <label  class="control-label">Nombre : </label>
                <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Ingrese un Nombre" <?php print(!empty($registros)?"":"required") ?>/>
            </div>
		    <div class="col-md-3">
		        <label  class="control-label">Archivo Adjunto (Excel) : </label>
		        <input id="archivo_excel" name="archivo_excel" type="file" class="archivo form-control" <?php print(!empty($registros)?"":"required") ?>/>
		        <?php echo form_error('archivo_excel'); ?>
		    </div>
		    <div class="col-md-3">
		    	<button type="submit" name="importarOT" class="btn btn-success"><i class="fa fa-check"></i> Importar</button>
		    </div>
            <?php if(isset($registros)&&!empty($registros)){ ?>
            <div class="col-md-3">
                <button type="submit" name="guardarOT" class="btn btn-info"><i class="fa fa-save"></i> Guardar</button>
            </div>
            <?php } ?>
        </div>
        </form>
        <hr class="hr-primary"/>
        <table class="table table-striped table-bordered table-hover datatable-buttons">
            <thead>
                <tr>
                    <th>COD_EMPRESA</th>
                    <th>NU_ORDEN_ORIGEN_OT</th>
                    <th>COD_ACTIVIDAD</th>
                    <th>COD_SUBACTIVIDAD</th>
                    <th>COD_SECTOR</th>
                    <th>COD_RUTA</th>
                    <th>COORDENADA_X</th>
                    <th>COORDENADA_Y</th>
                    <th>TIPO_ENTIDAD</th>
                    <th>TIPO_DOC</th>
                    <th>NRO_DOC</th>
                    <th>RAZON_SOCIAL</th>
                    <th>NOMBRE_COMERCIAL</th>
                    <th>NOMBRE_CLIENTE</th>
                    <th>AP APTERNO CLIENTE</th>
                    <th>AP MATERNO CLIENTE</th>
                    <th>DIRECCION</th>
                    <th>REFERENCIA</th>
                    <th>DE_CAMPOS_JSON</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($registros as $registro){ ?>
                    <tr class="gradeX">
                        <td><?php print($registro[0]); ?></td>
                        <td><?php print($registro[1]); ?></td>
                        <td><?php print($registro[2]); ?></td>
                        <td><?php print($registro[3]); ?></td>
                        <td><?php print($registro[4]); ?></td>
                        <td><?php print($registro[5]); ?></td>
                        <td><?php print($registro[6]); ?></td>
                        <td><?php print($registro[7]); ?></td>
                        <td><?php print($registro[8]); ?></td>
                        <td><?php print($registro[9]); ?></td>
                        <td><?php print($registro[10]); ?></td>
                        <td><?php print($registro[11]); ?></td>
                        <td><?php print($registro[12]); ?></td>
                        <td><?php print($registro[13]); ?></td>
                        <td><?php print($registro[14]); ?></td>
                        <td><?php print($registro[15]); ?></td>
                        <td><?php print($registro[16]); ?></td>
                        <td><?php print($registro[17]); ?></td>
                        <td><?php print($registro[18]); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
$("#archivo_excel").change(function() {
    archivo = $("#archivo_excel").val();
    nombre_archivo = $("#archivo_excel").val().split('\\').pop();
    nombre_permitido = "OT";
    extensiones_permitidas = new Array(".xlsx",".xls"); 
    extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase(); 
    permitida = false;
    nombre_premitido = false;
    for (var i = 0; i < extensiones_permitidas.length; i++) { 
        if (extensiones_permitidas[i] == extension) { permitida = true; break; } 
    } 
    if(nombre_archivo.indexOf(nombre_permitido) != -1){
        nombre_premitido = true;
        swal("Exito", "Archivo válido", "success");
    }                   
    if(permitida == false || nombre_premitido == false){
        swal("Error", "Archivo no válido", "error");
        $("#archivo_excel").val("");
    }
});
</script>
<script type="text/javascript">
$(document).ready(function () {
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