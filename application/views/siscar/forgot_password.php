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
    </head>
    <body class="gray-bg">
        <div id="bg">
            <img src="<?php print(base_url("assets/img/fondo2.jpg")) ?>" alt="">
        </div>
        <div class="middle-box text-center loginscreen  animated fadeInDown">
            <div>
                <form  class="form-vertical" method="post" id="formLogin">
                    <?php if (validation_errors()) : ?>
                        <h3>Ocurrio un Error:</h3>
                        <p><?php echo validation_errors(); ?></p>
                    <?php endif; ?>
                    <?php if (isset($submit_success)) : ?>
                        <h3>Email Enviado:</h3>
                        <p>Se envio un Email al email ingresado.</p>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error') != null) { ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('success') != null) { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php } ?>
                    <div class="control-group normal_text">
                        <h3><?php print($this->config->item("codigoSistema")) ?></h3>
                    </div>
                    <h3><?php print($this->config->item("nombreSistema")) ?></h3>
                    <h2 class="login-box-msg"><strong>Ingrese su direccion de Email registrada en el Sistema, para la obtencion de una nueva Contraseña.</strong></h2><br>
                    <div class="form-group">
                        <input type="email" name="email" id="email" value="<?php set_value('email', '') ?>" maxlength="100" size="50" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-actions" style="text-align: center">
                        <button type="submit" class="btn btn-primary btn-block"/><i class="fa fa-envelope-o"></i> Aceptar</button>
                    </div><br><br>
                    <div class="control-label">
                        <a href="<?php print(base_url("login")) ?>" class="btn btn-danger btn-block"><i class="fa fa-arrow-left"></i> Ya tengo una Cuenta.</a>
                    </div>
                </form>
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
        <script type="text/javascript">
            $(document).ready(function () {
                $('#email').focus();
                $("#formLogin").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        email: {required: 'Campo Requerido.', email: "No es una direccion de email valida."}
                    }
                });
            });
        </script>
        <!-- URL BASE -->
        <script src="<?php print(base_url("assets/js/master/url_base.js")) ?>"></script>  
    </body>
</html>