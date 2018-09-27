<?php
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$css=new lib\Css\Css(['sota','css'],true);
$css->SendCss('sota',['frame','slider','common','color','form','menu']);