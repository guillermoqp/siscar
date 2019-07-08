<!DOCTYPE html>
<html lang="es-PE">
<head><!-- <?php print(base_url("")) ?> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCAR | Sesion Expirada</title>
    <link href="<?php print(base_url("assets/css/bootstrap.min.css")) ?>" rel="stylesheet">
    <link href="<?php print(base_url("assets/font-awesome/css/font-awesome.css")) ?>" rel="stylesheet">
    <link href="<?php print(base_url("assets/css/animate.css")) ?>" rel="stylesheet">
    <link href="<?php print(base_url("assets/css/style.css")) ?>" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="lock-word animated fadeInDown">
        <span class="first-word">Sesion</span><span>Terminada</span>
    </div>
    <div class="middle-box text-center lockscreen animated fadeInDown">
        <div>
            <?php if($this->session->flashdata("error")!=null&&strlen($this->session->flashdata("error"))>0){ ?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <?php print($this->session->flashdata('error')) ?>
                </div>
            <?php } ?>
            <div class="m-b-md">
                <?php if($this->session->userdata("foto")!="") { ?>
                    <img src="<?php print(base_url($this->session->userdata("foto"))) ?>" class="img-circle circle-border">
                <?php } else { ?>     
                    <img src="<?php print(base_url("assets/img/user.png")) ?>" class="img-circle circle-border">
                <?php }  ?>
            </div>
            <h2><?php print($this->session->userdata("nombre_usuario")) ?></h2>
            <h3><?php print($this->session->userdata("nombre_permiso")) ?></h3>
            <p>La sesion ha expirado. Si quiere continuar por favor vuelva a ingresar en SISCAR.</p>
            <form class="m-t" role="form" method="POST">
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="******" required="">
                </div>
                <button name="desbloquear" value="desbloquear" type="submit" class="btn btn-primary block full-width"> Desbloquear</button>
            </form>
            <a href="<?php print(base_url("login")) ?>">Volver al Login</a>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?php print(base_url("assets/js/jquery-2.1.1.js")) ?>"></script>
    <script src="<?php print(base_url("assets/js/bootstrap.min.js")) ?>"></script>
</body>
</html>