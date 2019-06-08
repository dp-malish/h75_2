<?php
namespace lib\Js;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../');spl_autoload_register();
$f=new Js();
$f->SendJsArr(['../../js/jq1_11_2.js','../../js/jquery_colorbox_min1_6_4.js','../../js/sota/common_jq.js']);