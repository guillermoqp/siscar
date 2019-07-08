<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
$autoload['packages'] = array();
$autoload['libraries'] = array("database","session","administrarpermisos","liderdominios","recaptcha");
$autoload['helper'] = array("url","form","captcha");
$autoload['config'] = array("recaptcha","captcha","ftp");
$autoload['language'] = array();
$autoload['model'] = array();