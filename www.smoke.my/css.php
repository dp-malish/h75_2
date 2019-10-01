<?php
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$css=new lib\Css\Css(['smoke','css'],true);
$css->SendCss('smoke',['frame','color','slider','dws_pic','common','form','pulse_btn'/*'fontawesome','menu_art'*/]);