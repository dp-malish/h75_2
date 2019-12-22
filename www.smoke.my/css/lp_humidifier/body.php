<?php
namespace lib\Css;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();
$css=new Css(['..','..','..','cache_all','smoke','css'],false);
$css->SendCssSelect('smoke/lp_humidifier','body_lp_humidifier',['default','dexter_menu_lite','lp','wow','lp2','lp3','lp4','lp5','form','lp6'],2);