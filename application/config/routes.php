<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$route["translate_uri_dashes"]=FALSE;
$route["default_controller"]="siscar";
$route["404_override"]="siscar/error404";
/*      LOGIN       */
$route["login"]="siscar/login";
$route["autoCompleteUsuario"]="siscar/autoCompleteUsuario";
$route["loginFenix"]="siscar/loginFenix";
$route["loginSiscar"]="siscar/loginSiscar";
$route["actualizarCaptcha"]="siscar/actualizarCaptcha";
/* $route["captcha/(:param)"]="siscar/configCaptcha/$1"; */
/*    SESSION EXPIRADA          */
$route["session_expired"]="siscar/session_expired";
$route["sesion_expirada"]="siscar/check_session";
/*   RECUPERACION DE PASSWORD         */
$route["forgot_password"]="siscar/forgot_password";
$route["new_password/(:num)"]="siscar/new_password/$1";
/*   EXCLUIR EMPLEADOS         */
$route["empleados/excluir/(:num)"]="empleados/excluir/$1";
/*   MANEJAR EL REGISTRO DE NUEVO SEGUIMIENTO       */
$route["demanda/seguimiento_adicionar/(:num)"]="demanda/seguimiento_adicionar/$1";
/*      RUTAS DEL MASTER       */
$route["miCuenta"]="siscar/miCuenta";
$route["salir"]="siscar/salir";
$route["actualizarSesion"]="siscar/actualizarSesion";
$route["session_expired"]="siscar/session_expired";
$route["backup"]="siscar/backup";
/* End of file routes.php */
/* Location: ./application/config/routes.php */