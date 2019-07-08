<?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'),'vDashboard')) { ?>
<!-- morris -->
<link href="<?php print(base_url("assets/css/plugins/morris/morris-0.4.3.min.css")) ?>" rel="stylesheet">
<!-- Data picker -->
<link href="<?php print(base_url("assets/css/plugins/datapicker/datepicker3.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/jasny/jasny-bootstrap.min.css")) ?>" rel="stylesheet">
<link href="<?php print(base_url("assets/css/plugins/iCheck/custom.css")) ?>" rel="stylesheet">
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Panel Administrador</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="row">
                <div class="col-md-1">
                    <div class="checkbox i-checks">
                        <label><input id="filtro_fecha" type="checkbox"> Filtro</label>
                    </div>
                </div>
                <form role="form" method="POST">
                    <div class="col-md-3">
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
                    <div class="col-md-3">
                        <button name="filtrarEmpleados" type="submit" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </form>
                <div class="col-md-4">
                <?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata('permiso'), 'aEmpleado')) { ?>
                    <a href="<?php print(base_url("empleados/agrupados")) ?>" class="btn btn-primary"><i class="fa fa-users"></i> Dominios </a>
                    <a href="<?php print(base_url("empleados/cumpleanios")) ?>" class="btn btn-primary"><i class="fa fa-calendar-o"></i> Cumpleaños</a>
                <?php } ?>    
                </div>    
            </div>   
            <div class="row">
                <br><br><br><br>
                <div class="flot-chart-pie-content" id="empleados_dona"></div><br><br><br><br><br><br><br><br>
                <br><br><br><br>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Empleados por Dominio.</h5>
                        </div>
                        <div class="ibox-content">
                            <div id="empleados_por_dominio_barra"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php if ($this->administrarpermisos->verificarPermiso($this->session->userdata("permiso"),"vDashboard")) { ?>
<!-- InputMask -->
<script src="<?php print(base_url("assets/js/plugins/input-mask/jquery.inputmask.js")) ?>" type="text/javascript"></script>
<script src="<?php print(base_url("assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js")) ?>" type="text/javascript"></script>
<script src="<?php print(base_url("assets/js/plugins/input-mask/jquery.inputmask.extensions.js")) ?>" type="text/javascript"></script>
<!-- Data picker -->
<script src="<?php print(base_url("assets/js/plugins/datapicker/bootstrap-datepicker.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/validate.js")) ?>"></script>
<!-- iCheck -->
<script src="<?php print(base_url("assets/js/plugins/iCheck/icheck.min.js")) ?>"></script>
<!-- Morris -->
<script src="<?php print(base_url("assets/js/plugins/morris/raphael-2.1.0.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/morris/morris.js")) ?>"></script>
<!-- Flot -->
<script src="<?php print(base_url("assets/js/plugins/flot/jquery.flot.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/flot/jquery.flot.tooltip.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/flot/jquery.flot.resize.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/flot/jquery.flot.pie.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/flot/jquery.flot.time.js")) ?>"></script>
<script> 
$(document).ready(function () {
    $('#fecha_consulta').prop('disabled',true);
    $('.i-checks').iCheck({
        checkboxClass: 'icheckbox_square-green',
        radioClass: 'iradio_square-green'
    });
    $("#fecha_consulta").inputmask("d-m-y");
    $('#fecha_consulta').datepicker({
        format: "dd-mm-yyyy",
        separator: ' - ',
        todayBtn: true,
        language: "es",
        autoclose: true,
        todayHighlight: true
    });
    $('#filtro_fecha').on('ifChanged',function (event) {
        if (event.target.checked) {
            $('#fecha_consulta').prop('disabled',false);
            $('#fecha_consulta').focus();
        } else {
            $('#fecha_consulta').prop('disabled',true);
        }
    });
    var nro_empleados = [];
    var nombredominio = [];
    <?php if(is_array($empleados_por_dominio)&&!empty($empleados_por_dominio)) { ?>
    nro_empleados = <?php print(json_encode(array_column($empleados_por_dominio,"nro_empleados"))) ?>;
    nombredominio = <?php print(json_encode(array_column($empleados_por_dominio,"nombredominio"))) ?>;
    <?php } ?>
    var data_barras = [];
    for (var i = 0; i < nro_empleados.length; i++) {
        data_barras.push({y: ''+nombredominio[i]+'', a: parseInt(nro_empleados[i])});
    }
    Morris.Bar({
        element: 'empleados_por_dominio_barra',
        data: data_barras,
        xkey: 'y',
        ykeys: ['a'],
        labels: ['Dominio'],
        hideHover: 'auto',
        resize: true,
        barColors: ['#1ab394']
    });
    var data_dona2 = [];
    for (var i = 0; i < nro_empleados.length; i++) {
        data_dona2.push({label: '' + nombredominio[i] + '', data: parseInt(nro_empleados[i])});
    }
    var plotObj = $.plot($("#empleados_dona"), data_dona2, {
        series: {
            pie: {
                show: true
            }
        },
        grid: {
            hoverable: true,
            clickable: true
        },
        tooltip: true,
        radius : 5,
        innerRadius: 1,
        tooltipOpts: {
            content: "%p.0%, %s",
            shifts: {
                x: 20,
                y: 0
            },
            defaultTheme: true
        }
    });
});
</script>
<?php } ?>
