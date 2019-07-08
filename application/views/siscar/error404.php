<!DOCTYPE html>
<html lang="es-PE">
<head><!-- <?php print(base_url("")) ?>   -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCAR | 404 Error</title>
    <link href="<?php print(base_url("assets/css/bootstrap.min.css")) ?>" rel="stylesheet">
    <link href="<?php print(base_url("assets/font-awesome/css/font-awesome.css")) ?>" rel="stylesheet">
    <link href="<?php print(base_url("assets/css/animate.css")) ?>" rel="stylesheet">
    <link href="<?php print(base_url("assets/css/style.css")) ?>" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="middle-box text-center animated fadeInDown">
        <h1>404</h1>
        <h3 class="font-bold">Pagina/URL no encontrada</h3>
        <div class="error-desc">
            Lo sentimos, pero la página/url que está buscando NO ha sido encontrada. 
            Prueba a comprobar la URL nuevamente, luego pulsa el botón de actualización en tu navegador o 
            intenta encontrar algo más en nuestra aplicación.
            <form class="form-inline m-t" role="form" action="<?php print(base_url()) ?>">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar...">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="<?php print(base_url("assets/js/jquery-2.1.1.js")) ?>"></script>
    <script src="<?php print(base_url("assets/js/bootstrap.min.js")) ?>"></script>
    <!-- URL BASE -->
    <script src="<?php print(base_url("assets/js/master/url_base.js")) ?>"></script> 
</body>
</html>
