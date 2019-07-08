<?php // if (isset($_SESSION['usuario_id']) ) { session_destroy(); } ?>
<!DOCTYPE html>
<html lang="es-PE">
<head><!-- <?php print(base_url("")) ?> -->
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
        <!-- Switchery -->
        <link href="<?php print(base_url("assets/css/plugins/switchery/switchery.css")) ?>" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php print(base_url("assets/css/plugins/iCheck/custom.css")) ?>" rel="stylesheet">
    </head>
    <body class="gray-bg">
        <div id="bg">
            <img src="<?php print(base_url("assets/img/fondo2.jpg")) ?>" alt="">
        </div>
        <div class="middle-box text-center loginscreen  animated fadeInDown">
            <div>
                <div class="control-group normal_text">
                    <h3>
                        <!-- <img src="<?php print(base_url("assets/img/logo_everis.png")) ?>" alt="Logo"/> -->
                        <?php print($this->config->item("codigoSistema")) ?>
                    </h3>
                </div>
                <h3><?php print($this->config->item("nombreSistema")) ?></h3>
                <p>Inicie Sesion.</p>
                <form  class="form-vertical" id="formLogin">
                    <div class="form-group">
                        <input id="usuario" name="usuario" class="form-control" type="text" placeholder="Usuario"/>
                    </div>
                    <div class="form-group">
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <div class="checkbox i-checks"><h3><label><input type="checkbox" id="recordarme" name="recordarme"><i></i> Mantener Sesion.</label></h3></div>
                    </div>
                    <div class="form-group">
                        <?php if($metodoLoginAntiRobot!=null&&$metodoLoginAntiRobot==="R") { ?>
                        <div class="checkbox i-checks"><h3><?php print($widget) ?></h3></div>
                        <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                        <?php } 
                        if($metodoLoginAntiRobot!=null&&$metodoLoginAntiRobot==="C") {  ?>
                            <div id="captImg"><?php print($imagenCaptcha) ?></div>
                            <a href="#" id="refreshCaptcha" class="refreshCaptcha"><i class="fa fa-exchange fa-2x"></i></a>
                            <input class="form-control" type="text" id="captcha" name="captcha" placeholder="Ingrese Captcha"/>
                        <?php } ?>
                    </div>
                    <div class="form-actions" style="text-align: center">
                        <div id="progress-accesar" class='hide progress progress-info progress-striped active'>
                            <div class='bar' style='width: 100%'></div>
                        </div>
                        <button id="btn-accesar" class="btn btn-primary btn-block"/><i class="fa fa-arrow-right fa-2x"></i> Ingresar</button>
                    </div>  
                    <br><br>
                    <div class="ibox-content">
                        <input type="checkbox" id="tipo_login" class="js-switch" checked/>
                        <h3 id="desc_login">Login con Usuario de CTS</h3>
                    </div>
                    <br><br>
                    <div id="acceso_siscar" class="hide">
                        <a href="<?php print(base_url("forgot_password")) ?>" class="btn btn-danger btn-block">¿Olvidaste tu Contraseña?</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- Mainly scripts -->
        <script src="<?php print(base_url("assets/js/jquery-2.1.1.js")) ?>"></script>
        <script src="<?php print(base_url("assets/js/bootstrap.min.js")) ?>"></script>
        <script src="<?php print(base_url("assets/js/validate.js")) ?>"></script>
        <script src="<?php print(base_url("assets/js/plugins/metisMenu/jquery.metisMenu.js")) ?>"></script>
        <script src="<?php print(base_url("assets/js/plugins/slimscroll/jquery.slimscroll.min.js")) ?>"></script>
        <!-- iCheck -->
        <script src="<?php print(base_url("assets/js/plugins/iCheck/icheck.min.js")) ?>"></script>
        <!-- Switchery -->
        <script src="<?php print(base_url("assets/js/plugins/switchery/switchery.js")) ?>"></script>
        <!-- URL BASE -->
        <script src="<?php print(base_url("assets/js/master/url_base.js")) ?>"></script> 
        <!-- Accesos scripts -->
        <script src="<?php print(base_url("assets/js/scripts/accesos.js")) ?>"></script>
        <!-- Autocomplete  -->
        <link rel="stylesheet" href="<?php print(base_url("assets/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css")) ?>"/>
        <script type="text/javascript" src="<?php print(base_url("assets/jquery-ui/js/jquery-ui-1.9.2.custom.js")) ?>"></script>
        <!-- Toastr style -->
        <link href="<?php print(base_url("assets/css/plugins/toastr/toastr.min.css")) ?>" rel="stylesheet">
        <!-- Toastr script -->
        <script src="<?php print(base_url("assets/js/plugins/toastr/toastr.min.js")) ?>"></script>
        <?php if($metodoLoginAntiRobot!=null&&$metodoLoginAntiRobot=="R") { ?>
        <!-- Google ReCaptha   -->
        <?php print($scriptGoogleReCaptcha); } ?>
        <!-- SHA1 Jquery --> 
        <script src="<?php print(base_url("assets/js/scripts/jquery.sha1.js")) ?>"></script>
    </body>
    <script type="text/javascript">
    $(document).ready(function () {
        var changeCheckbox = document.querySelector('#tipo_login');
        changeCheckbox.onchange = function() {
            if(changeCheckbox.checked){ /* LOGIN CON CTS */
                $('#acceso_siscar').addClass('hide');
                toastr.success("Podra Ingresar con el Login de Usuario de <b><a target='_blank' href='https://cts.everis.int/launcher/login'>CTS</a></b>","INFO");
                $('#desc_login').html("Login con Usuario de CTS");
            }else{
                $('#acceso_siscar').removeClass('hide');
                toastr.info("Login con Usuarios SISCAR.","INFO");
                $('#desc_login').html("Login con Usuarios SISCAR.");
            }
        };
        <?php if($metodoLoginAntiRobot!=null&&$metodoLoginAntiRobot==="C") { ?>
        $("#refreshCaptcha").on("click",function(){
            $.get(url_base+"actualizarCaptcha",function(data){
                $("#captImg").html(data);
            });
        });
        <?php } ?>
        $("#formLogin").validate({
            ignore: ".ignore",
            rules: {
                usuario: {required: true},
                password: {required: true}
                <?php if($metodoLoginAntiRobot!=null&&$metodoLoginAntiRobot==="R") { ?>
                , hiddenRecaptcha: {
                    required: function () {
                        if (grecaptcha.getResponse()=='') {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
                <?php } if($metodoLoginAntiRobot!=null&&$metodoLoginAntiRobot==="C") { ?>
                , captcha: {required: true}
                <?php } ?>
            },
            messages: {
                usuario: {required: 'Campo Requerido.'},
                password: {required: 'Campo Requerido.'}
                <?php if($metodoLoginAntiRobot!=null&&$metodoLoginAntiRobot==="R") { ?>
                ,hiddenRecaptcha : {required: 'Campo Requerido.'}
                <?php } if($metodoLoginAntiRobot!=null&&$metodoLoginAntiRobot==="C") { ?>
                ,captcha : {required: 'Campo Requerido.'}
                <?php } ?>
            },
            submitHandler: function (form) {
                $('#btn-accesar').addClass('disabled');
                $('#progress-accesar').removeClass('hide');
                sweetAlert({
                    title: "",
                    text: "Validando datos, espere...",
                    imageUrl: url_imagen_cargando,
                    showConfirmButton: false,
                    allowOutsideClick: false
                }); 
                if(changeCheckbox.checked){ /* LOGIN CON FENIX */
                    login_fenix();
                }else{
                    login_siscar(form);
                }
                return false;
            }
        });
    });
    </script>
</html>