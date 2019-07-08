<!-- Autocomplete  -->
<link href="<?php print(base_url("assets/js/plugins/jquery-ui/jquery-ui.css")) ?>" rel="stylesheet"/>
<!-- Text spinners style -->
<link href="<?php print(base_url("assets/css/plugins/textSpinners/spinners.css")) ?>" rel="stylesheet"/>
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Registro de Usuarios</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <form id="formUsuario" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <div class="control-group">
                <label for="nombre" class="control-label">Nombres<span class="required">*</span></label>
                <div class="controls">
                    <input class="form-control" id="nombre" type="text" name="nombre" />
                </div>
            </div>
            <div class="control-group">
                <label for="usuario" class="control-label">Nombre Usuario<span class="required">*</span></label>
                <div class="controls">
                    <input class="form-control" id="username" type="text" name="username"/>
                </div>
            </div>
            <div class="control-group" id="pwd-container1">
                <label for="password" class="control-label">Password<span class="required">*</span></label>
                <div class="controls">
                    <input class="form-control" id="password" type="password" name="password"/>
                    Tipo de Password: <div class="pwstrength_viewport_progress"></div>
                </div>
            </div>
            <div class="control-group">
                <label for="email" class="control-label">Email <span class="required">*</span></label>
                <div class="controls">
                    <input class="form-control" id="email_formato" type="email" name="email"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Estado*</label>
                <div class="controls">
                    <select class="form-control m-b" name="estado" id="estado">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label  class="control-label">Permisos<span class="required">*</span></label>
                <div class="controls">
                    <select class="form-control m-b" name="id_permiso" id="id_permiso">
                        <?php foreach ($permisos as $p) { print('<option value="'.$p->id_permiso.'">'.$p->nombre.'</option>'); }?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label for="exampleInputFile">Imagen Usuario:</label><br>
                <input type="file" name="foto" id="foto">
                <?php echo form_error("foto"); ?>
            </div>
            <div class="control-group">
                <label class="control-label">¿Es un Empleado?</label>
                <div class="controls">
                    <input class="form-control" id="id_empleado" type="hidden" name="id_empleado"/>
                    <input class="form-control" id="empleado" type="text" name="empleado"/>
                </div>
            </div>
            <hr class="hr-primary" />
            <div class="form-actions">
                <div class="span12">
                    <div class="span6 offset3">
                        <button type="button" id="form-submit" name="agregarUsuario" class="btn btn-success"><i class="fa fa-edit"></i> Agregar</button>
                        <button id="form-cancel" type="button" class="btn btn-danger"><i class="fa fa-backward"></i> Cancelar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?php print(base_url("assets/js/validate.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/jquery-ui/jquery-ui.js")) ?>"></script>
<!-- Password meter -->
<script src="<?php print(base_url("assets/js/plugins/pwstrength/pwstrength-bootstrap.min.js")) ?>"></script>
<script src="<?php print(base_url("assets/js/plugins/pwstrength/zxcvbn.js")) ?>"></script>
<script type="text/javascript">
$(document).ready(function () {
    var options1 = {};
    options1.ui = {
        container: "#pwd-container1",
        showVerdictsInsideProgressBar: true,
        viewports: {
            progress: ".pwstrength_viewport_progress"
        }
    };
    options1.common = {
        debug: false
    };
    $('#password').pwstrength(options1);
    $('#formUsuario').validate({
        rules: {
            nombre: {required: true},
            usuario: {required: true},
            email_formato: {required: true , email: true},
            password: {required: true},
            estado: {required: true},
            username :  {required: true}
        },
        messages: {
            nombre: {required: 'Campo Requerido.'},
            usuario: {required: 'Campo Requerido.'},
            email_formato: {
                required: 'Campo Requerido.',
                email: {
                    message: "Email no Valido."
                }
            },
            password: {required: 'Campo Requerido.'},
            estado: {required: 'Campo Requerido.'},
            username: {required: 'Campo Requerido.'}
        }
    });
    $("#empleado").autocomplete(
    {
        source: "<?php print(base_url("usuarios/autoCompleteEmpleado")) ?>",
        minLength: 1,
        select: function (event, ui)
        {
            $("#empleado").val(ui.item.label);
            $("#id_empleado").val(ui.item.id_empleado);
        }
    });
    $('#form-submit').on('click', function () {
        var boton_submit = this;
        swal({
            title: "Registrar Usuario",
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
            title: "Esta seguro de cancelar el registro",
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
                var url="<?php print(base_url("usuarios")) ?>";
                location.replace(url);
            }
        });
    });                
});
</script>