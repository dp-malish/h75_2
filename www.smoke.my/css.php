<?php
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$css=new lib\Css\Css(['smoke','css'],true);
$css->SendCss('smoke',['default_1_0','frame','color','slider','dws_pic','common','fontawesome',"pulse_btn",'menu_art','form']);