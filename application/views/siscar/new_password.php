<?php if (isset($_SESSION['usuario_id']) ) { session_destroy(); } ?>
<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php print($this->config->item("nombreSistema")) ?></title>
        <link rel="shortcut icon" href="<?php print(base_url("assets/img/logo_everis_ico.png")) ?>">
        <link href="<?php print(base_url("assets/css/bootstrap.min.css")) ?>" rel="stylesheet">
        <link href="<?php print(base_url("assets/font-awesome/css/font-awesome.css")) ?>" rel="stylesheet">
        <link href="<?php print(base_url("assets/css/animate.css")) ?>" rel="stylesheet">
        <link href="<?php print(base_url("assets/css/style.css")) ?>" rel="stylesheet">
        <link href="<?php print(base_url("assets/css/login.css")) ?>" rel="stylesheet">
        <!-- sweetAlert. -->
        <link rel="stylesheet" href="<?php print(base_url("assets/js/plugins/sweetalert/sweetalert2.css")) ?>" rel="stylesheet" type="text/css">
        <script src="<?php print(base_url("assets/js/plugins/sweetalert/sweetalert2.min.js")) ?>"></script>
    </head>
    <body class="gray-bg">
        <div id="bg">
            <img src="<?php print(base_url("assets/img/fondo.jpg")) ?>" alt="">
        </div>
        <div class="middle-box text-center loginscreen  animated fadeInDown">
            <div>
                <div class="control-group normal_text">
                    <h3><?php print($this->config->item("codigoSistema")) ?></h3>
                </div>
                <h3><?php print($this->config->item("nombreSistema")) ?></h3>
                <strong><h2>Re-establecimiento de Contraseña</h2></strong><br>
                <?php if (validation_errors()) : ?>
                    <h3>Ocurrio un Error:</h3>
                    <p><?php print(validation_errors()) ?></p>
                <?php endif; ?>
                <?php if (isset($submit_success)) : ?>
                    <h3>Email Enviado:</h3>
                    <p>Se envio un Email al email ingresado.</p>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error') != null) { ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h2><?php print($this->session->flashdata('error')) ?></h2>
                        <a href="<?php print(base_url("forgot_password")) ?>" class="btn btn-danger btn-block"><i class="fa fa-backward"></i> Regresar</a>
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('success') != null) { ?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h2><?php print($this->session->flashdata('success')) ?></h2>
                        
                    </div>
                <?php } ?>
                <?php if (!isset($error)) { ?>
                    <form class="form-vertical" method="POST" id="formPassword">
                        <div class="control-group normal_text">
                            <h3><?php print($this->config->item("codigoSistema")) ?></h3>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Usuario Registrado:</label>
                            <input type="text" value="<?php print((isset($datos)) ? $datos['username'] : '') ?>" maxlength="100" size="50" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Email Registrado:</label>
                            <input type="email" name="email" id="email" value="<?php print((isset($datos)) ? $datos['email'] : set_value('email', '')) ?>" maxlength="100" size="50" class="form-control" readonly="">
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="control-label" for="password">Nueva Contraseña:</label>
                                <div class="controls">
                                    <input class="form-control" type="password" name="password1" id="password1" value="<?php set_value('password1', '') ?>">
                                    <p class="help-block">Ingrese Nueva Contraseña...</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="control-group">
                                <label class="control-label" for="password">Escriba otra vez contraseña nueva:</label>
                                <div class="controls">
                                    <input class="form-control" type="password" name="password2" id="password2" value="<?php set_value('password2', '') ?>">
                                    <p class="help-block">Confirme Nueva Contraseña...</p>
                                </div>
                            </div>
                        </div>
                        <?php print(form_hidden("code",$datos['fsw'])) ?>
                        <div class="form-actions" style="text-align: center">
                            <button type="submit" name="confirmar_cambio_password" class="btn btn-primary btn-block"/><i class="fa fa-check"></i> Confirmar Cambio</button>
                        </div><br><br>
                        <div class="control-label">
                            <a href="<?php print(base_url("login")) ?>" class="btn btn-danger btn-block">Ya tengo una Cuenta.</a>
                        </div>
                    </form>
                <?php } ?>
                <p class="m-t">
                    <strong>Copyright | <?php print($this->config->item("codigoSistema")) ?> © <?php print($this->config->item("anio")) ?></strong>
                </p>
            </div>
        </div>
        <!-- Mainly scripts -->
        <script src="<?php print(base_url("assets/js/jquery-2.1.1.js")) ?>"></script>
        <script src="<?php print(base_url("assets/js/bootstrap.min.js")) ?>"></script>
        <script src="<?php print(base_url("assets/js/validate.js")) ?>"></script>
        <script src="<?php print(base_url("assets/js/plugins/metisMenu/jquery.metisMenu.js")) ?>"></script>
        <script src="<?php print(base_url("assets/js/plugins/slimscroll/jquery.slimscroll.min.js")) ?>"></script>
        <!-- URL BASE -->
        <script src="<?php print(base_url("assets/js/master/url_base.js")) ?>"></script> 
        <script type="text/javascript">
            $(document).ready(function () {
                $('#password').focus();
                $('#formPassword').validate({
                    rules: {
                        password1: {required: true},
                        password2: {required: true},
                        password2: {equalTo: "#password1"}
                    },
                    messages: {
                        password1: {required: 'Campo Requerido.'},
                        password2: {required: 'Campo Requerido.'},
                        password2: {equalTo: 'Las Contraseñas no concuerdan.'}
                    }
                });
            });
        </script>
    </body>
</html>