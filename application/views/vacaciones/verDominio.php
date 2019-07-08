<link href="<?php echo base_url() ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print'>
<link href="<?php echo base_url() ?>assets/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <center><div class="ibox-title">
                    <h5>Gestionar Vacaciones del Dominio :</h5><strong><h1> <?php echo $dominio["nombre"] ?></h1></strong>
                    </div></center>
                <div id='top'>
                    ** Idioma : <select id='locale-selector'></select>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title2"></h4>
            </div>
            <div class="modal-body">
                <div class="error"></div>
                <form class="form-horizontal" id="crud-form">
                <input type="hidden" id="start">
                <input type="hidden" id="end">
                <input type="hidden" id="fk_dominio" value="<?php echo $dominio["id_dominio"] ?>">
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="title">Nombre/Titulo : </label>
                        <div class="col-md-8">
                            <input id="title" name="title" type="text" class="form-control input-md" />
                        </div>
                    </div>                            
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="description">Descripcion : </label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="color">Seleccione un Color : </label>
                        <div class="col-md-8">
                            <input id="color" name="color" type="text" class="form-control input-md" readonly="readonly"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="color">Empleado : </label>
                        <div class="col-md-8">
                            <select class="form-control m-b" name="fk_empleado" id="fk_empleado">
                                <?php
                                foreach ($empleados as $empleado) {
                                    echo '<option value="' . $empleado["id_empleado"] . '">' .$empleado["nombres"]." ".$empleado["apellidos"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div><center>
                    <i class="fa fa-calendar"></i> Inicio :<p id="inicio" name="inicio"></p>    
                    <i class="fa fa-calendar-o"></i> Fin :<p id="fin" name="fin"></p></center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/fullcalendar/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/fullcalendar/locale-all.js"></script>
<!-- Color picker -->
<script src="<?php echo base_url() ?>assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- iCheck  -->
<script src="<?php echo base_url() ?>assets/js/plugins/iCheck/icheck.min.js"></script>
<!-- Vacaciones -->
<script src="<?php echo base_url() ?>assets/js/scripts/vacaciones.js"></script>