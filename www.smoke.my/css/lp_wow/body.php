<?php
namespace lib\Css;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();
$css=new Css(['..','..','..','cache_all','smoke','css'],false);
$css->SendCssSelect('smoke/lp_wow','body_lp_wow',['default','lp','dexter_menu_lite','wow','lp2','lp3'],2);