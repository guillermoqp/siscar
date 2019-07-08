<!-- Date picker -->
<link href="<?php echo base_url() ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<style>
    ul input {display: none;}
    ul label {display: block;}
    ul input:checked + label {color: #000; font-size: 16px;}
</style>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Editar Empleado</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <form id="formEmpleado" method="post" class="form-horizontal">
            <input type="hidden" id="id_empleado" name="id_empleado" value="<?php echo $result->id_empleado; ?>"/>
            <div class="row">
                <div class="col-md-2">
                    <div class="control-group">
                        <label for="apellidos" class="control-label">Codigo empleado<span class="required">*</span></label>
                        <div class="controls">
                            <input class="form-control" id="cod_empleado" type="text" name="cod_empleado" value="<?php echo $result->cod_empleado; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="control-group">
                        <label for="dni" class="control-label">DNI<span class="required">*</span></label>
                        <div class="controls">
                            <input class="form-control" id="dni" type="text" name="dni" value="<?php echo $result->dni; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="control-group">
                        <label for="nombres" class="control-label">Nombres<span class="required">*</span></label>
                        <div class="controls">
                            <input class="form-control" id="nombres" type="text" name="nombres" value="<?php echo $result->nombres; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="control-group">
                        <label for="apellidos" class="control-label">Apellidos<span class="required">*</span></label>
                        <div class="controls">
                            <input class="form-control" id="apellidos" type="text" name="apellidos" value="<?php echo $result->apellidos; ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <div class="control-group">
                        <label  class="control-label">Estado Civil*</label>
                        <div class="controls">
                            <select class="form-control m-b" name="estado_civil" id="estado_civil">
                                <option value="S" <?php echo (($result->estado_civil === 'S') ? "selected" : "") ?>>Soltero</option>
                                <option value="C" <?php echo (($result->estado_civil === 'C') ? "selected" : "") ?>>Casado</option>
                                <option value="E" <?php echo (($result->estado_civil === 'E') ? "selected" : "") ?>>Separado</option>
                                <option value="D" <?php echo (($result->estado_civil === 'D') ? "selected" : "") ?>>Divorciado</option>
                                <option value="V" <?php echo (($result->estado_civil === 'V') ? "selected" : "") ?>>Viudo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="control-group">
                        <label  class="control-label">Sexo*</label>
                        <div class="controls">
                            <select class="form-control m-b" name="sexo" id="sexo">
                                <?php
                                if ($result->sexo == 'M') {
                                    $masculino = 'selected';
                                    $femenino = '';
                                } else {
                                    $masculino = '';
                                    $femenino = 'selected';
                                }
                                ?>
                                <option value="M" <?php echo $masculino; ?>>Masculino</option>
                                <option value="F" <?php echo $femenino; ?>>Femenino</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group col-md-12">
                        <label for="date" class="control-label">Fecha Nacimiento*<span class="required">*</span></label>
                        <div class="controls">
                            <div class="form-group">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input id="fecha_nacimiento" name="fecha_nacimiento" type="text" class="form-control" value="<?php echo (isset($result->fecha_nacimiento) ? date_format(date_create($result->fecha_nacimiento), 'd-m-Y') : "") ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group col-md-12">
                        <label for="date" class="control-label">Fecha Ingreso*<span class="required">*</span></label>
                        <div class="controls">
                            <div class="form-group" id="fechaIngreso">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo date_format(date_create($result->fecha_ingreso), 'd-m-Y'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="control-group col-md-12">
                        <label for="date" class="control-label">Fecha Salida*<span class="required">*</span></label>
                        <div class="controls">
                            <div class="form-group" id="fechaSalida">
                                <div class="input-group date">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="text" class="form-control"  id="fecha_salida" name="fecha_salida" value="<?php echo (isset($result->fecha_salida)) ? date_format(date_create($result->fecha_salida), 'd-m-Y') : ""; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="control-group">
                        <label class="control-label">Departamento - Provincia - Distrito (elija)<span class="required">*</span></label>
                        <div class="controls">
                            <a class="btn btn-info" data-toggle="modal" data-target="#modalDistrito">
                                <i class="fa fa-home"></i>
                            </a>
                            <input class="form-control" id="distrito_2" type="text" name="distrito_2" readonly="" value="<?php echo $result->distrito; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="control-group">
                        <label for="dni" class="control-label">Direccion<span class="required">*</span></label>
                        <div class="controls">
                            <textarea name="direccion" class="form-control"><?php echo $result->direccion; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="control-group">
                            <label for="apellidos" class="control-label">Telefono<span class="required">*</span></label>
                            <div class="controls">
                                <input class="form-control" id="telefono" type="text" name="telefono" value="<?php echo $result->telefono; ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label for="apellidos" class="control-label">Movil</label>
                            <div class="controls">
                                <input class="form-control" id="movil" type="text" name="movil" value="<?php echo $result->movil; ?>"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group">
                        <label  class="control-label">Institucion Educativa<span class="required">*</span></label>
                        <div class="controls">
                            <select class="form-control m-b" name="fk_institucion_educativa" id="fk_institucion_educativa">
                                <?php
                                foreach ($institucion_educativa as $ie) {
                                    if ($ie["id_institucion_educativa"] == $result->fk_institucion_educativa) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    echo '<option value="' . $ie["id_institucion_educativa"] . '"' . $selected . '>' . $ie["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-md-3"> 
                    <div class="control-group">
                        <label  class="control-label">Rol <span class="required">*</span></label>
                        <div class="controls">
                            <select class="form-control m-b" name="fk_rol" id="fk_rol">
                                <?php
                                foreach ($roles as $rol) {
                                    if ($rol["id_rol"] == $result->fk_rol) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    echo '<option value="' . $rol["id_rol"] . '"' . $selected . '>' . $rol["nombre"] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="control-group">
                        <label  class="control-label">Estado*</label>
                        <div class="controls">
                            <select class="form-control m-b" name="estado" id="estado">
                                <?php
                                switch ($result->estado) {
                                    case '0':
                                        $baja = "selected";
                                        $activo = "";
                                        $baja_temporal = "";
                                        $renuncia = "";
                                        $no_acepto = "";
                                        break;
                                    case '1':
                                        $baja = "";
                                        $activo = "selected";
                                        $baja_temporal = "";
                                        $renuncia = "";
                                        $no_acepto = "";
                                        break;
                                    case '2':
                                        $baja = "";
                                        $activo = "";
                                        $baja_temporal = "selected";
                                        $renuncia = "";
                                        $no_acepto = "";
                                        break;
                                    case '3':
                                        $baja = "";
                                        $activo = "";
                                        $baja_temporal = "";
                                        $renuncia = "selected";
                                        $no_acepto = "";
                                        break;
                                    case '4':
                                        $baja = "";
                                        $activo = "";
                                        $baja_temporal = "";
                                        $renuncia = "";
                                        $no_acepto = "selected";
                                        break;
                                }
                                ?>
                                <option value="1" <?php echo $activo; ?>>Activo</option>
                                <option value="0" <?php echo $baja; ?>>Baja</option>
                                <option value="2" <?php echo $baja_temporal; ?>>Baja Temporal</option>
                                <option value="3" <?php echo $renuncia; ?>>Renuncia</option>
                                <option value="4" <?php echo $no_acepto; ?>>No Aceptó</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="control-group">
                        <label class="control-label">Comentarios<span class="required">*</span></label>
                        <div class="controls">
                            <textarea id="comentarios" name="comentarios" class="form-control"><?php echo $result->comentarios; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="hr-primary" />
            <div class="form-actions">
                <div class="span12">
                    <div class="span6 offset3">
                        <button type="button" id="form-submit" name="editarEmpleado" class="btn btn-success"><i class="fa fa-edit"></i> Editar</button>
                        <button id="form-cancel" type="button" class="btn btn-danger"><i class="fa fa-backward"></i> Regresar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal inmodal" id="modalDistrito" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
                <h4 class="modal-title">Departamento - Provincia - Distrito</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Departamentos</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled" id="regions-list"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Provincias</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled" id="provinces-list"></ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Distritos</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled" id="districts-list"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="aceptoDistrito" class="btn btn-info" data-dismiss="modal" aria-hidden="true">Aceptar</button>
                <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!-- Data picker -->
<script src="<?php echo base_url() ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/js/scripts/search.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#fecha_nacimiento").inputmask("d-m-y");
        $("#fecha_ingreso").inputmask("d-m-y");
        $("#fecha_salida").inputmask("d-m-y");
        $("#cod_empleado").inputmask("999999");
        $("#dni").inputmask("99999999");
        $("#telefono").inputmask("(099)99-99-99");
        $("#movil").inputmask("999999999");
        $('#aceptoDistrito').on('click', function () {
            var distritoSeleccionado = $("input[name='distrito']:checked").val();
            $("#distrito_2").val(distritoSeleccionado);
        });
        $('#formEmpleado').validate({
            rules: {
                cod_empleado: {required: true, minlength: 6, maxlength: 6},
                nombres: {required: true},
                apellidos: {required: true},
                fecha_ingreso: {required: true}
            },
            messages: {
                cod_empleado: {required: 'Campo Requerido.', minlength: "Minimo {0} digitos", maxlength: "Maximo {0} digitos", digits: "Solo digitos"},
                nombres: {required: 'Campo Requerido.'},
                apellidos: {required: 'Campo Requerido.'},
                fecha_ingreso: {required: 'Campo Requerido.'}
            }
        });
        $('#fecha_nacimiento').datepicker({
            format: "dd-mm-yyyy",
            separator: ' - ',
            todayBtn: true,
            language: "es",
            autoclose: true,
            todayHighlight: true
        });
        $('#fecha_ingreso').datepicker({
            format: "dd-mm-yyyy",
            separator: ' - ',
            todayBtn: true,
            language: "es",
            autoclose: true,
            todayHighlight: true
        });
        $('#fecha_salida').datepicker({
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
                title: "Editar Empleado",
                text: "¿Esta seguro que desea modificar esta informacion? ",
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
                title: "¿Esta seguro de cancelar la modificación?",
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
                    location.replace("<?php echo base_url() . 'empleados'; ?>");
                }
            });
        });
    });
</script>

