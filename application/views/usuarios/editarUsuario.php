<!-- Autocomplete  -->
<link href="<?php print(base_url("assets/js/plugins/jquery-ui/jquery-ui.css")) ?>" rel="stylesheet"/> 
<link href="<?php print(base_url("assets/css/plugins/dropzone/basic.css")) ?>" rel="stylesheet"/> 
<link href="<?php print(base_url("assets/css/plugins/dropzone/dropzone.css")) ?>" rel="stylesheet"/> 
<!-- Text spinners style -->
<link href="<?php print(base_url("assets/css/plugins/textSpinners/spinners.css")) ?>" rel="stylesheet"/> 
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Editar Usuario</h5>
        <div class="ibox-tools"></div>
    </div>
    <div class="ibox-content">
        <form id="formUsuario" class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <div class="control-group">
                <?php print(form_hidden("id_usuario",$result->id_usuario)) ?>
                <label for="nombre" class="control-label">Nombres<span class="required">*</span></label>
                <div class="controls">
                    <input class="form-control" id="nombre" type="text" name="nombre" value="<?php print($result->nombre) ?>"/>
                </div>
            </div>
            <div class="control-group">
                <label for="usuario" class="control-label">Nombre Usuario<span class="required">*</span></label>
                <div class="controls">
                    <input  class="form-control" id="username" type="text" name="username" value="<?php print($result->username) ?>"  />
                </div>
            </div>
            <div class="control-group">
                <label for="password" class="control-label">Password</label>
                <div class="controls">
                    <input class="form-control" id="password" type="password" name="password" value=""  placeholder="No insertar si no desea cambiar."  />
                    <i class="icon-exclamation-sign tip-top" title="No insertar si no desea cambiar."></i>
                    Tipo de Password: <div class="pwstrength_viewport_progress"></div>
                </div>
            </div>
            <div class="control-group">
                <label for="email" class="control-label">Email <span class="required">*</span></label>
                <div class="controls">
                    <input  class="form-control" id="email" type="text" name="email" value="<?php print($result->email) ?>"  />
                </div>
            </div>
            <div class="control-group">
                <label  class="control-label">Estado*</label>
                <div class="controls">
                    <select class="form-control m-b" name="estado" id="estado">
                        <option value="1" <?php print(($result->estado==1)?"selected":"") ?>>Activo</option>
                        <option value="0" <?php print(($result->estado==0)?"selected":"") ?>>Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label  class="control-label">Permisos<span class="required">*</span></label>
                <div class="controls">
                    <select class="form-control m-b" name="id_permiso" id="id_permiso">
                        <?php foreach ($permisos as $p) { ?>
                            <option value="<?php print($p->id_permiso) ?>" <?php print(($p->id_permiso==$result->fk_permiso)?"selected":"") ?>><?php print($p->nombre) ?></option>
                        <?php } ?>   
                    </select>
                </div>
            </div>
             <div class="control-group">
                <label for="exampleInputFile">Imagen Usuario:</label><br>
                <?php if (isset($result->id_usuario)) { ?>
                    <img src="<?php echo base_url() . $result->foto; ?>" alt="Foto Usuario" width="100" height="100"/><br><br>
                <?php } ?>
                <input type="file" name="foto" id="foto" <?php echo (isset($result->id_usuario)) ? '' : 'required'; ?>>
                <?php echo form_error('foto'); ?>
            </div>
            <hr class="hr-primary" />
            <div class="form-actions">
                <div class="span12">
                    <div class="span6 offset3">
                        <button type="submit" name="editarUsuario" class="btn btn-success"><i class="fa fa-edit"></i> Editar</button>
                        <a href="<?php echo base_url() ?>usuarios" class="btn btn-danger"><i class="fa fa-backward"></i> Regresar</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script  src="<?php print(base_url("assets/js/validate.js")) ?>"></script>
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
            estado: {required: true}
        },
        messages: {
            nombre: {required: 'Campo Requerido.'},
            estado: {required: 'Campo Requerido.'},
        }
    });
});
</script>


