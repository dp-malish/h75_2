<?php
namespace lib\Css;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();
$css=new Css(['..','..','..','cache_all','smoke','css'],false);
$css->SendCssSelect('smoke/lp_humidifier_2','body_lp_humidifier_2',['default','common','dexter_menu_lite','lp','lp2','lp4','lp5video','lp7','lp8'],2);