<link href="<?php echo base_url() ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<!-- sweetAlert. -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/js/plugins/sweetalert/sweetalert2.css" rel="stylesheet" type="text/css">
<div class="col-lg-12">
    <div class="ibox-content">
        <h2 class="font-bold">Editar Seguimiento de Demanda para el Dominio : <strong><?php echo $seguimiento_prevision['dominio'] ?></strong>, Cliente : <strong><?php echo $seguimiento_prevision['cliente'] ?></strong></h2>
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="post" enctype="multipart/form-data" id="formularioEditarSeguimiento" name="formularioEditarSeguimiento">
                    <input name="id_seguimiento_prevision" id="id_seguimiento_prevision" value="<?php echo $seguimiento_prevision['id_seguimiento_prevision'] ?>" type="hidden"/>
                    <input name="id_seguimiento" id="id_seguimiento" value="<?php echo $seguimiento_prevision['fk_seguimiento'] ?>" type="hidden" />
                    <div class="row">
                        <div class="col-md-2">
                            <label>Días laborales (Dias)</label>
                            <div class="input-group">
                                <input id="dias_laborales" type="number" class="form-control" value="<?php echo $dias_laborales ?>" readonly=""/>
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-2">
                            <label>Días período corte (Dias)</label>
                            <div class="input-group">
                                <input id="dias_corte" type="number" class="form-control" value="<?php echo $dias_corte ?>" readonly=""/>
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-2">
                            <label>3.- Colaboradores (Personas)</label>
                            <div class="input-group">
                                <input id="nro_empleados" type="number" class="form-control" value="<?php echo $seguimiento_prevision['nro_empleados'] ?>" readonly=""/>
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-2">
                            <label>6.- Nro horas vacaciones (Horas)</label>
                            <div class="input-group">
                                <input id="nro_vacaciones" type="number" class="form-control" value="<?php echo $seguimiento_prevision['nro_vacaciones'] ?>" readonly=""/>
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-2">
                            <label>8.- Disponibilidad real (Horas)</label>
                            <div class="input-group">
                                <input id="hrs_disponibles" type="number" class="form-control" value="<?php echo $seguimiento_prevision['hrs_disponibles'] ?>" readonly=""/>
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-2">
                            <label>9.- Demanda confirmada por Lima (Horas)</label>
                            <div class="input-group">
                                <input id="hrs_solutions" type="number" class="form-control" value="<?php echo $seguimiento_prevision['hrs_solutions'] ?>" readonly=""/>
                            </div><!-- /input-group -->
                        </div>
                    </div>
                    <hr class="hr-primary" />
                    <div class="row">
                        <div class="col-md-6">
                            <label>11.- Demanda que debió enviarse (Horas)</label>
                            <div class="input-group">
                                <input name="hrs_plan_meta" id="hrs_plan_meta" type="text" class="form-control danger" readonly="readonly" value="<?php echo (isset($seguimiento_prevision['hrs_plan_meta']) && $seguimiento_prevision['hrs_plan_meta'] != '') ? $seguimiento_prevision['hrs_plan_meta'] : "" ?>" required/>
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-6">
                            <label>13.- Avance de envío demanda confirmada (Horas)</label>
                            <div class="input-group">
                                <input name="hrs_plan_real" id="hrs_plan_real" type="text" class="form-control" required onchange="actualizarHrs_plan_porcentaje()" value="<?php echo (isset($seguimiento_prevision['hrs_plan_real']) && $seguimiento_prevision['hrs_plan_real'] != '') ? $seguimiento_prevision['hrs_plan_real'] : "" ?>"/>
                            </div><!-- /input-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>14.- % de Avance por envío de demanda</label>
                            <div class="input-group">
                                <input name="hrs_plan_porcentaje" id="hrs_plan_porcentaje" type="number" class="form-control" readonly="readonly" value="<?php echo (isset($seguimiento_prevision['hrs_plan_porcentaje']) && $seguimiento_prevision['hrs_plan_porcentaje'] != '') ? $seguimiento_prevision['hrs_plan_porcentaje'] : "" ?>"/>
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-6">
                            <label>15.- Horas que debieron ejecutarse según lo planificado (Horas)</label>
                            <div class="input-group">
                                <input name="hrs_ejec_meta" id="hrs_ejec_meta" type="text" class="form-control" required onchange="actualizarHrs_ejec_porcentaje(this)" value="<?php echo (isset($seguimiento_prevision['hrs_ejec_meta']) && $seguimiento_prevision['hrs_ejec_meta'] != '') ? $seguimiento_prevision['hrs_ejec_meta'] : "" ?>"/>
                            </div><!-- /input-group -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>16.- Avance de lo Ejecutado (Horas)</label>
                            <div class="input-group">
                                <input name="hrs_ejec_real" id="hrs_ejec_real" type="text" class="form-control" required onchange="actualizarHrs_ejec_porcentaje(this)" value="<?php echo (isset($seguimiento_prevision['hrs_ejec_real']) && $seguimiento_prevision['hrs_ejec_real'] != '') ? $seguimiento_prevision['hrs_ejec_real'] : "" ?>"/>
                            </div><!-- /input-group -->
                        </div>
                        <div class="col-md-6">
                            <label>17.- % de Desvío según lo ejecutado</label>
                            <div class="input-group">
                                <input name="hrs_ejec_porcentaje" id="hrs_ejec_porcentaje" type="number" class="form-control" readonly="readonly" value="<?php echo (isset($seguimiento_prevision['hrs_ejec_porcentaje']) && $seguimiento_prevision['hrs_ejec_porcentaje'] != '') ? $seguimiento_prevision['hrs_ejec_porcentaje'] : "" ?>"/>
                            </div><!-- /input-group -->
                        </div>
                    </div>
                    <hr class="hr-primary" />
                    <div class="row">
                        <div class="col-md-3">
                            <div class="checkbox i-checks"><label><input id="incurridos_validados" name="incurridos_validados" type="checkbox"> Incurridos Validados</label></div>
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox i-checks"><label><input id="flag_no_conformidades" name="flag_no_conformidades" type="checkbox"> NC</label></div>
                            <input name="no_conformidades" id="no_conformidades" type="number" class="form-control" onkeypress="return soloNumeros(event)"/>
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox i-checks"><label><input id="flag_inc_internas" name="flag_inc_internas" type="checkbox"> Inc. Int.</label></div>
                            <input name="inc_internas" id="inc_internas" type="number" class="form-control" onkeypress="return soloNumeros(event)"/>
                        </div>
                        <div class="col-md-3">
                            <div class="checkbox i-checks"><label><input id="flag_inc_externas" name="flag_inc_externas" type="checkbox"> Inc. Ext.</label></div>
                            <input name="inc_externas" id="inc_externas" type="number" class="form-control" onkeypress="return soloNumeros(event)"/>
                        </div>
                    </div>
                    <hr class="hr-primary" />
                    <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'dDemanda')) { ?>
                    <input id="flagProduccion" type="hidden" name="flagProduccion" value="1">
                    <div class="row">
                        <div class="col-md-6">
                            <label  class="control-label"> Facturabilidad</label> 
                            <input name="facturabilidad" id="facturabilidad" type="number" class="form-control" readonly=""/>
                        </div>
                        <div class="col-md-6">
                            <label  class="control-label"> Ocupabilidad</label>
                            <input name="ocupabilidad" id="ocupabilidad" type="number" class="form-control" readonly=""/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label  class="control-label"> Estado Delivery</label>
                            <div class="row">
                                <div class="col-sm-3"><input class="estado_delivery" id="estado_delivery" type="radio" name="estado_delivery" value="0"><img src="<?php echo base_url().'assets/img/indicadores/delivery_0.png' ?>" class="img-responsive" width="30" height="30"></div>   
                                <div class="col-sm-3"><input class="estado_delivery" id="estado_delivery" type="radio" name="estado_delivery" value="1"><img src="<?php echo base_url().'assets/img/indicadores/delivery_1.png' ?>" class="img-responsive" width="30" height="30"></div>    
                                <div class="col-sm-3"><input class="estado_delivery" id="estado_delivery" type="radio" name="estado_delivery" value="2"><img src="<?php echo base_url().'assets/img/indicadores/delivery_2.png' ?>" class="img-responsive" width="30" height="30"></div> 
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label  class="control-label"> Demanda</label>
                            <div class="row">
                                <div class="col-sm-3"><input class="demanda" id="demanda" type="radio" name="demanda" value="0">  <img src="<?php echo base_url().'assets/img/indicadores/demanda_0.png' ?>" class="img-responsive" width="50" height="50"></div>
                                <div class="col-sm-3"><input class="demanda" id="demanda" type="radio" name="demanda" value="1">  <img src="<?php echo base_url().'assets/img/indicadores/demanda_1.png' ?>" class="img-responsive" width="50" height="50"></div>
                                <div class="col-sm-3"><input class="demanda" id="demanda" type="radio" name="demanda" value="2">  <img src="<?php echo base_url().'assets/img/indicadores/demanda_2.png' ?>" class="img-responsive" width="50" height="50"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Comentario Produccion : </label>
                            <textarea name="descripcion" id="descripcion" class="form-control" required><?php echo (isset($seguimiento_prevision['descripcion']) && $seguimiento_prevision['descripcion'] != '') ? $seguimiento_prevision['descripcion'] : "" ?></textarea>
                        </div>
                    </div>
                    <?php } else{ ?>
                    <input id="flagLiderDominio" type="hidden" name="flagLiderDominio" value="1">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Comentario Lider Dominio : </label>
                            <textarea name="comentario" id="comentario" class="form-control" required><?php echo (isset($seguimiento_prevision['comentario']) && $seguimiento_prevision['comentario'] != '') ? $seguimiento_prevision['comentario'] : "" ?></textarea>
                        </div>
                    </div>
                    <?php }  ?>
                    <hr class="hr-primary" />
                    <button type="button" id="form-submit" name="editarSeguimiento" class="btn btn-success"><i class="fa fa-edit"></i> Editar</button>
                    <button type="button" id="form-cancel" class="btn btn-warning"><i class="fa fa-backward"></i> Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>  
<!-- iCheck -->
<script src="<?php echo base_url() ?>assets/js/plugins/iCheck/icheck.min.js"></script>
<!-- Utilitarios -->
<script src="<?php echo base_url() ?>assets/js/scripts/utilitarios.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/sweetalert/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/sweetalert/core.js"></script>
<script>
var demandaConfirmada = 0;
var disponible = 0;
var empleados = 0;
var vacaciones = 0;
function soloNumeros(e){
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57);
}
function actualizarHrs_plan_porcentaje()
{
    var hrs_plan_real = parseFloat($('#hrs_plan_real').val());
    var hrs_solutions = parseFloat($('#hrs_solutions').val());    
    var hrs_plan_porcentaje = (hrs_plan_real/hrs_solutions)*100;
    $('#hrs_plan_porcentaje').val(parseFloat(hrs_plan_porcentaje).toFixed(2));  
}
function actualizarHrs_ejec_porcentaje(objeto)
{
    var hrs_ejec_meta = parseFloat($('#hrs_ejec_meta').val());
    if(isNaN(hrs_ejec_meta)) {
        hrs_ejec_meta = 1;
    }    
    var hrs_ejec_real = parseFloat($('#hrs_ejec_real').val());
    if(isNaN(hrs_ejec_real)) {
        hrs_ejec_real = 1;
    }  
    var hrs_ejec_porcentaje =  $.percentage(hrs_ejec_real, hrs_ejec_meta);
    hrs_ejec_porcentaje = parseFloat(hrs_ejec_porcentaje).toFixed(2);
    hrs_ejec_porcentaje = 100 - hrs_ejec_porcentaje;
    $('#hrs_ejec_porcentaje').val(parseFloat(hrs_ejec_porcentaje).toFixed(2));
}
function calcular_facturabilidad_ocupabilidad()
{
    disponible = parseFloat($('#hrs_disponibles').val());
    demandaConfirmada = parseFloat($('#hrs_solutions').val());
    vacaciones = parseFloat($('#nro_vacaciones').val());
    empleados = parseFloat($('#nro_empleados').val());
    var facturabilidad = parseFloat($.percentage(disponible,disponible+vacaciones)).toFixed(2);
    var ocupabilidad = parseFloat($.percentage(demandaConfirmada , disponible)).toFixed(2);
    $('#descripcion').val("La ocupabilidad confirmada del mes es de "+ocupabilidad+"% para "+empleados+" personas con un nivel de facturabilidad del "+facturabilidad+"%.");
    $('#ocupabilidad').val(ocupabilidad);
    $('#facturabilidad').val(facturabilidad);
}
function limpiar_variables()
{
    $('#estado_delivery').iCheck('indeterminate'); 
    $('#demanda').iCheck('indeterminate'); 
    $('#incurridos_validados').iCheck('indeterminate');
    $('#flag_no_conformidades').iCheck('indeterminate');
    $('#no_conformidades').val("");
    $('#flag_inc_internas').iCheck('indeterminate');
    $('#inc_internas').val("");
    $('#flag_inc_externas').iCheck('indeterminate');
    $('#inc_externas').val("");
}
</script>
<script>
$(document).ready(function(){
    jQuery.extend({
        percentage: function(a, b) {
            return Math.round((a / b) * 100);
        }
    });  
    limpiar_variables();
    calcular_facturabilidad_ocupabilidad();
    <?php if(isset($seguimiento_prevision['estado_delivery']) && $seguimiento_prevision['estado_delivery'] != ''){ ?>
        $('input:radio[id=estado_delivery][value='+<?php echo $seguimiento_prevision['estado_delivery'] ?>+']').iCheck('check');
    <?php } ?>
    <?php if(isset($seguimiento_prevision['demanda']) && $seguimiento_prevision['demanda'] != ''){ ?>
        $('input:radio[id=demanda][value='+<?php echo $seguimiento_prevision['demanda'] ?>+']').iCheck('check');
    <?php } ?>
    <?php if(isset($seguimiento_prevision['incurridos_validados']) && $seguimiento_prevision['incurridos_validados'] != ''){ ?>
        $('#incurridos_validados').iCheck('check');
    <?php } ?>
    <?php if(isset($seguimiento_prevision['no_conformidades']) && $seguimiento_prevision['no_conformidades'] != ''){ ?>
        $('#flag_no_conformidades').iCheck('check');  
    <?php } ?>
    <?php if(isset($seguimiento_prevision['inc_internas']) && $seguimiento_prevision['inc_internas'] != ''){ ?>
        $('#flag_inc_internas').iCheck('check');  
    <?php } ?>
    <?php if(isset($seguimiento_prevision['inc_externas']) && $seguimiento_prevision['inc_externas'] != ''){ ?>
        $('#flag_inc_externas').iCheck('check');  
   <?php } ?>
    var dias_corte = parseFloat($('#dias_corte').val());
    var dias_laborales = parseFloat($('#dias_laborales').val());
    var hrs_solutions = parseFloat($('#hrs_solutions').val());
    
    var hrs_plan_meta = (dias_corte/dias_laborales)*hrs_solutions;
    $('#hrs_plan_meta').val(parseFloat(hrs_plan_meta).toFixed(2)); 
    
    $('#no_conformidades').prop('disabled', true);
    $('#inc_internas').prop('disabled', true);
    $('#inc_externas').prop('disabled', true);
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });
    $('.estado_delivery').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '100%' // optional
    });
    $('.demanda').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green',
        increaseArea: '100%' // optional
    });
    $('#flag_no_conformidades').on('ifChanged', function (event) {
        if (event.target.checked) {
            $('#no_conformidades').prop('disabled', false);
            $('#no_conformidades').focus();
        } else {
            $('#no_conformidades').val("");
            $('#no_conformidades').prop('disabled', true);
        }
    });
    $('#flag_inc_internas').on('ifChanged', function (event) {
        if (event.target.checked) {
            $('#inc_internas').prop('disabled', false);
            $('#inc_internas').focus();
        } else {
            $('#inc_internas').val("");
            $('#inc_internas').prop('disabled', true);
        }
    });
    $('#flag_inc_externas').on('ifChanged', function (event) {
        if (event.target.checked) {
            $('#inc_externas').prop('disabled', false);
            $('#inc_externas').focus();
        } else {
            $('#inc_externas').val("");
            $('#inc_externas').prop('disabled', true);
        }
    });
    $('#form-submit').on('click', function () {
        var boton_submit = this;
        swal({
            title: "Editar Seguimiento de Demanda",
            text: "¿Esta seguro que desea guardar esta informacion?",
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
            title: "¿Esta seguro de cancelar la edicion?",
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
                cerrarVentana();
            }
        });
    });
});
</script>
<script>  
<?php if (isset($cerrar) && $cerrar == TRUE) { ?>
    swal({
        title: "Exito",
        text: "Exito, por favor acepte para actualizar los cambios.",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: "Aceptar",
        cancelButtonText: false,
        closeOnConfirm: false
    },
    function (isConfirm) {
        if (isConfirm) {
            window.onunload = refreshParent();
            function refreshParent() {
                window.opener.location.reload();
            }
            window.close();
        }
    });
<?php }  ?>
</script>