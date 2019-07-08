<!-- <?php print(base_url("")) ?> -->
<!DOCTYPE html>
<html lang="es-PE">
    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>SISCAR | Centro de Alto Rendimiento - Trujillo</title>
        <style type="text/css">
            * {
                margin: 0;
                padding: 0;
                font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                box-sizing: border-box;
                font-size: 14px;
            }
            img {
                max-width: 100%;
            }
            body {
                -webkit-font-smoothing: antialiased;
                -webkit-text-size-adjust: none;
                width: 100% !important;
                height: 100%;
                line-height: 1.6;
            }
            table td {
                vertical-align: top;
            }
            body {
                background-color: #f6f6f6;
            }
            .body-wrap {
                background-color: #f6f6f6;
                width: 100%;
            }
            .container {
                display: block !important;
                max-width: 600px !important;
                margin: 0 auto !important;
                /* makes it centered */
                clear: both !important;
            }
            .content {
                max-width: 600px;
                margin: 0 auto;
                display: block;
                padding: 20px;
            }
            .main {
                background: #fff;
                border: 1px solid #e9e9e9;
                border-radius: 3px;
            }
            .content-wrap {
                padding: 20px;
            }
            .content-block {
                padding: 0 0 20px;
            }
            .header {
                width: 100%;
                margin-bottom: 20px;
            }
            .footer {
                width: 100%;
                clear: both;
                color: #999;
                padding: 20px;
            }
            .footer a {
                color: #999;
            }
            .footer p, .footer a, .footer unsubscribe, .footer td {
                font-size: 12px;
            }
            h1, h2, h3 {
                font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
                color: #000;
                margin: 40px 0 0;
                line-height: 1.2;
                font-weight: 400;
            }
            h1 {
                font-size: 32px;
                font-weight: 500;
            }
            h2 {
                font-size: 24px;
            }
            h3 {
                font-size: 18px;
            }
            h4 {
                font-size: 14px;
                font-weight: 600;
            }
            p, ul, ol {
                margin-bottom: 10px;
                font-weight: normal;
            }
            p li, ul li, ol li {
                margin-left: 5px;
                list-style-position: inside;
            }
            a {
                color: #1ab394;
                text-decoration: underline;
            }
            .btn-primary {
                text-decoration: none;
                color: #FFF;
                background-color: #1ab394;
                border: solid #1ab394;
                border-width: 5px 10px;
                line-height: 2;
                font-weight: bold;
                text-align: center;
                cursor: pointer;
                display: inline-block;
                border-radius: 5px;
                text-transform: capitalize;
            }
            .last {
                margin-bottom: 0;
            }
            .first {
                margin-top: 0;
            }
            .aligncenter {
                text-align: center;
            }
            .alignright {
                text-align: right;
            }
            .alignleft {
                text-align: left;
            }
            .clear {
                clear: both;
            }
            .alert {
                font-size: 16px;
                color: #fff;
                font-weight: 500;
                padding: 20px;
                text-align: center;
                border-radius: 3px 3px 0 0;
            }
            .alert a {
                color: #fff;
                text-decoration: none;
                font-weight: 500;
                font-size: 16px;
            }
            .alert.alert-warning {
                background: #f8ac59;
            }
            .alert.alert-bad {
                background: #ed5565;
            }
            .alert.alert-good {
                background: #1ab394;
            }
            .invoice {
                margin: 40px auto;
                text-align: left;
                width: 80%;
            }
            .invoice td {
                padding: 5px 0;
            }
            .invoice .invoice-items {
                width: 100%;
            }
            .invoice .invoice-items td {
                border-top: #eee 1px solid;
            }
            .invoice .invoice-items .total td {
                border-top: 2px solid #333;
                border-bottom: 2px solid #333;
                font-weight: 700;
            }
            @media only screen and (max-width: 640px) {
                h1, h2, h3, h4 {
                    font-weight: 600 !important;
                    margin: 20px 0 5px !important;
                }

                h1 {
                    font-size: 22px !important;
                }

                h2 {
                    font-size: 18px !important;
                }

                h3 {
                    font-size: 16px !important;
                }

                .container {
                    width: 100% !important;
                }

                .content, .content-wrap {
                    padding: 10px !important;
                }

                .invoice {
                    width: 100% !important;
                }
            }
        </style>
    </head>
    <body>
        <table class="body-wrap">
            <tr>
                <td></td>
                <td class="container" width="600">
                    <div class="content">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="content-wrap">
                                    <table  cellpadding="0" cellspacing="0">
                                        <tr><td><img class="img-responsive" src="<?php print(base_url("assets/img/logo.png")) ?>"/></td></tr>
                                        <tr><td class="content-block"><h3> Estimado/a : <strong><?php print($usuario['nombre']) ?></strong></h3></td></tr>
                                        <tr><td class="content-block">Recibimos tu Solicitud de Reestablecimiento de Contraseña en SISCAR | Centro de Alto Rendimiento - Trujillo</td></tr>
                                        <tr>
                                            <td class="content-block">
                                                Hace poco  solicitaste el restablecimiento de tu cuenta en SISCAR | Centro de Alto Rendimiento - Trujillo, con el email: <strong><?php print($email) ?></strong> como tu cuenta email asociada a SISCAR | Centro de Alto Rendimiento - Trujillo
                                                Porfavor de clic en el siguiente enlace : <br><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="content-block aligncenter">
                                                <a href="<?php print($urlRestablecimiento) ?>" target="_blank" class="btn-primary">Reestablecimiento de contraseña en SISCAR | Centro de Alto Rendimiento - Trujillo.</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="content-block">
                                                <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">
                                                    <strong>¿Por qué has recibido este correo electrónico?</strong><br>
                                                    SISCAR | Centro de Alto Rendimiento - Trujillo, envia este correo de validación de cuenta cuando se registra una solicitud de re-establecimiento de contraseña.
                                                    Para poder cambiar la contraseña temporalmente y puedas cambiarla internamente
                                                    en el SISCAR | Centro de Alto Rendimiento - Trujillo y puedas disfrutar de los servicios que brinda nuesta Aplicación.<br>
                                                    Esperamos que disfrute de nuestro aplicativo y sea de su agrado, cualquier consulta puede enviar un email a : 
                                                    <a href="mailto:<?php print($emailAdmin) ?>" target="_blank"><?php print($emailAdmin) ?></a><br>
                                                    Atentamente.<br>
                                                    El Equipo de Desarrollo de SISCAR | Centro de Alto Rendimiento - Trujillo.<br>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <div class="footer">
                            <table width="100%">
                                <tr>
                                <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">
                                    SISCAR | Centro de Alto Rendimiento - Trujillo.
                                </span>
                                <td class="aligncenter content-block">
                                    ¿Recordaste tu Contraseña? : <a href="<?php print($rutaServer) ?>" style="text-decoration: underline; color: #999999; font-size: 12px; text-align: center;"> Ingresa al Sistema </a>.
                                </td>
                                </tr>
                            </table>
                        </div></div>
                </td>
                <td></td>
            </tr>
        </table>
    </body>
</html>
