<?php
namespace lib\Js;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../');spl_autoload_register();
$f=new Js();
$f->SendJs('../../js/config.js');