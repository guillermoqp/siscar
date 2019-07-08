<!-- Data picker -->
<link href="<?php echo base_url() ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Modificación de Prevision.</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <form id="formulario" name="formPrevision" role="form" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-3">
                    <div class="control-group">
                        <div class="controls">
                            <div class="form-group" id="mes">
                                <label class="font-noraml">Mes-Año  <span class="required">*</span></label>
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input name="mes" id="mes" type="text" class="form-control" value="<?php echo date('Y-m', strtotime($prevision_dominio["mes_anio"])) ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group">
                        <label  class="control-label"> Dias Laborables  <span class="required">*</span></label>
                        <div class="controls">
                            <input id="dias_laborables" name="dias_laborables" class="form-control" type="number" value="<?php echo $prevision_dominio["nro_dias"] ?>" onchange="actualizarTodos(this)">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="control-group">
                    <label for="dni" class="control-label">Comentarios</label>
                    <div class="controls">
                        <textarea name="comentarios" class="form-control"><?php echo $prevision_dominio["descripcion"] ?></textarea>
                    </div>
                </div>
            </div>
            <hr class="hr-primary" />
            <table class="table table-striped table-bordered table-hover datatable-buttons" id="tabla_prevision">
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
                            <td>
                                <input type="hidden" name="id_dominio" value="<?php echo $pdd['fk_dominio'] ?>">
                                <?php echo $pdd["dominio"] ?>
                            </td>
                            <td><input class="form-control empleados" id="<?php echo 'empleados_' . $pdd['fk_dominio']; ?>" name="<?php echo 'empleados_' . $pdd['fk_dominio']; ?>" value="<?php echo $pdd['nro_empleados'] ?>" onkeypress="return soloNumeros(event)"  onchange="actualizarFila(this)" type="number"></td>
                            <td>
                                <input class="form-control vacaciones" id="<?php echo 'vacaciones_' . $pdd['fk_dominio']; ?>" name="<?php echo 'vacaciones_' . $pdd['fk_dominio']; ?>" value="<?php echo $pdd['nro_vacaciones'] ?>" onchange="actualizarFila(this)" onkeypress="return soloNumeros(event)" type="number">
                            </td>
                            <td>
                                <input class="form-control disponible" id="<?php echo 'disponible_' . $pdd['fk_dominio']; ?>" name="<?php echo 'disponible_' . $pdd['fk_dominio']; ?>" value="<?php echo $pdd['hrs_disponibles'] ?>" readonly="readonly">
                            </td>
                            <td>
                                <input class="form-control demandaConfirmada" id="<?php echo 'demandaConfirmada_' . $pdd['fk_dominio']; ?>" name="<?php echo 'demandaConfirmada_' . $pdd['fk_dominio']; ?>" value="<?php echo $pdd['hrs_solutions'] ?>" onkeypress="return soloNumeros(event)" type="number">
                            </td>
                            <td>
                                <input class="form-control" id="<?php echo 'descripcion_' . $pdd['fk_dominio']; ?>" name="<?php echo 'descripcion_' . $pdd['fk_dominio']; ?>" type="text" value="<?php echo $pdd['descripcion'] ?>">
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr class="info">
                        <td></td>
                        <td><h1><strong> Totales : </strong></h1></td>
                        <td><h2 id="total_empleados"></h2></td>
                        <td><h2 id="total_vacaciones"></h2></td>
                        <td><h2 id="total_disponible"></h2></td>
                        <td><h2 id="total_demandaConfirmada"></h2></td>
                        <td></td>
                    </tr>
                </tfoot>    
            </table>
            <div class="form-actions">
                <div class="span12">
                    <div class="span6 offset3">
                        <button type="button" id="form-submit" name="editarPrevision" class="btn btn-success"><i class="fa fa-edit"></i> Editar</button>
                        <button id="form-cancel" type="button" class="btn btn-danger"><i class="fa fa-backward"></i> Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Data picker -->
<script src="<?php echo base_url() ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<script type="text/javascript">
function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}
function calcularTotales() {
    var total_empleados = 0;
    var total_vacaciones = 0;
    var total_disponible = 0;
    var demandaConfirmada = 0;
    $("tr.gradeX").each(function () {
        var $empleados = parseInt($('.empleados', this).val()),
            $vacaciones = parseInt($('.vacaciones', this).val()),
            $disponible = parseInt($('.disponible', this).val()),
            $demandaConfirmada = parseInt($('.demandaConfirmada', this).val());
            total_empleados += $empleados;
            total_vacaciones += $vacaciones;
            total_disponible += $disponible;
            demandaConfirmada += $demandaConfirmada;
    });
    $("#total_empleados").text(total_empleados + ' Empleados.');
    $("#total_vacaciones").text(total_vacaciones + ' Horas.');
    $("#total_disponible").text(total_disponible + ' Horas.');
    $("#total_demandaConfirmada").text(demandaConfirmada + ' Horas.');
}
function actualizarFila(objeto)
{
    var id_dominio = objeto.id.split("_").pop();
    if ($.isNumeric(id_dominio)) {
        var empleados = $('#empleados_' + id_dominio).val();
        var vacaciones = $('#vacaciones_' + id_dominio).val();
        var dias_laborables = $('#dias_laborables').val();
        $('#disponible_' + id_dominio).val(parseFloat((empleados * 9 * dias_laborables) - vacaciones));
        $("#tabla_prevision").on('input','input',calcularTotales);
    }
}
function actualizarTodos(objeto){}
$(document).ready(function () {
    $("#tabla_prevision").on('input','input',calcularTotales);
    calcularTotales();
    $("#mes").inputmask("d-m-y");
    $('#mes .input-group.date').datepicker({
        format: "dd-mm-yyyy",
        separator: ' - ',
        todayBtn: true,
        language: "es",
        autoclose: true,
        todayHighlight: true,
        minViewMode: 1,
        keyboardNavigation: false,
        forceParse: false
    });
    $('#formPrevision').validate({
        rules: {
            mes: {required: true},
            dias_laborables: {required: true, minlength: 1, maxlength: 2, digits: true},
            comentarios: {required: true}
        },
        messages: {
            dias_laborables: {required: 'Campo Requerido.', minlength: "Minimo {0} digitos", maxlength: "Máximo {0} digitos", digits: "Solo digitos"},
            mes: {required: 'Campo Requerido.'},
            comentarios: {required: 'Campo Requerido.'}
        }
    });
    /*  VALIDAR ANTI ENTER    */
    $(document).on("keypress", "form", function (event) {
        return event.keyCode != 13;
    });
    $.fn.enableCellNavigation = function () {
        var arrow = {left: 37, up: 38, right: 39, down: 40};
        this.find('input').keydown(function (e) {
            if ($.inArray(e.which, [arrow.left, arrow.up, arrow.right, arrow.down]) < 0) {
                return;
            }
            var input = e.target;
            var td = $(e.target).closest('td');
            var moveTo = null;
            switch (e.which) {
                case arrow.left:
                {
                    if (input.selectionStart == 0) {
                        moveTo = td.prev('td:has(input,textarea)');
                    }
                    break;
                }
                case arrow.right:
                {
                    if (input.selectionEnd == input.value.length) {
                        moveTo = td.next('td:has(input,textarea)');
                    }
                    break;
                }
                case arrow.up:
                case arrow.down:
                {
                    var tr = td.closest('tr');
                    var pos = td[0].cellIndex;
                    var moveToRow = null;
                    if (e.which == arrow.down) {
                        moveToRow = tr.next('tr');
                    } else if (e.which == arrow.up) {
                        moveToRow = tr.prev('tr');
                    }
                    if (moveToRow.length) {
                        moveTo = $(moveToRow[0].cells[pos]);
                    }
                    break;
                }
            }
            if (moveTo && moveTo.length) {
                e.preventDefault();
                moveTo.find('input,textarea').each(function (i, input) {
                    input.focus();
                    input.select();
                });
            }
        });
    };
    $('#tabla_prevision').enableCellNavigation();
    $('#form-submit').on('click', function () {
        var boton_submit = this;
        swal({
            title: "Editar la Prevision",
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
    $('#form-cancel').click(function () {
        swal({
            title: "Esta seguro de cancelar el la Modificacion",
            text: "",
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
                location.replace("<?php echo base_url() . 'demanda/prevision'; ?>");
            }
        });
    });
});
</script>