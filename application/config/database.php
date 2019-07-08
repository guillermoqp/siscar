<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$active_group="default";
$query_builder=TRUE;
$active_record=TRUE;
//EN WINDOWS - CONEXION A MYSQL BD PRINCIPAL
$db["default"] = array(
    "hostname"=>"127.0.0.1",
    "username"=>"root",
    "password"=>"123456",
    "database"=>"siscar",
    "dbdriver"=>"mysqli",
    "dbprefix"=>"",
    "pconnect"=>TRUE,
    "db_debug"=>TRUE,
    "cache_on"=>TRUE,
    "cachedir"=>"",
    "char_set"=>"utf8",
    "dbcollat"=>"utf8_general_ci",
    "swap_pre"=>"",
    "autoinit"=>TRUE,
    "stricton"=>FALSE
);
/* End of file database.php */
/* Location: ./application/config/database.php */