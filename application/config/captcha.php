<?php defined('BASEPATH') OR exit('No direct script access allowed');
$img_path=FCPATH."/assets/captcha_images/";
$config["configuracion"]=array(
    "word_lenght"=>5,
    "img_path"=>$img_path,
    "img_width"=>180,//ancho
    "img_height"=>60,//alto
    "img_id"=>"captchaId",
    "expiration"=>10,
    "font_size"=>20,
    "color"=>array(
        'backgroud'=>array(255,255,255),
        'border'=>array(255,255,255),
        'text'=>array(0,0,0),
        'grid'=>array(255,40,40))
);