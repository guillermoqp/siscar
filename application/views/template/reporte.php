<!DOCTYPE html>
<html lang="es-PE">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php print(base_url("assets/img/logo_everis_ico.png")); ?>">
    <title><?php print($this->config->item("nombreSistema")) ?> | <?php print(isset($nombrePagina)?$nombrePagina:"--") ?></title>
    <link href="<?php print(base_url("assets/css/bootstrap.min.css")) ?>" rel="stylesheet">
    <link href="<?php print(base_url("assets/font-awesome/css/font-awesome.css")) ?>" rel="stylesheet">
    <link href="<?php print(base_url("assets/css/animate.css")) ?>" rel="stylesheet">
    <link href="<?php print(base_url("assets/css/style.css")) ?>" rel="stylesheet">
    <script src="<?php print(base_url("assets/js/jquery-2.1.1.js")) ?>"></script>
    <script src="<?php print(base_url("assets/js/bootstrap.min.js")) ?>"></script>
    <script src="<?php print(base_url("assets/js/plugins/metisMenu/jquery.metisMenu.js")) ?>"></script>
    <script src="<?php print(base_url("assets/js/plugins/slimscroll/jquery.slimscroll.min.js")) ?>"></script>
    <script src="<?php print(base_url("assets/js/inspinia.js")) ?>"></script>
    <script src="<?php print(base_url("assets/js/plugins/pace/pace.min.js")) ?>"></script>
    <script src="<?php print(base_url("assets/js/plugins/slimscroll/jquery.slimscroll.min.js")) ?>"></script>
</head>
<body class="gray-bg">
    <div class="passwordBox animated fadeInDown">
        <div class="row">
            <?php if(isset($view)){ $this->load->view($view); } ?>  
        </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            <?php print($this->config->item("nombreSistema")) ?>
        </div>
        <div class="col-md-6 text-right">
            <strong>Copyright | <?php print($this->config->item("codigoSistema")) ?> © <?php print($this->config->item("anio")) ?></strong>
        </div>
    </div>
    </div>
</body>
<!-- URL BASE -->
<script src="<?php print(base_url("assets/js/master/url_base.js")) ?>"></script>
</html>