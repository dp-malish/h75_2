<?php
namespace lib\Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',0);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new Opt('burger');//Def opt

Cache_File::$cash=new Cache_File(['burger'],true);

if($_SERVER['REQUEST_URI']!='/'){
    if(Route::requestURI(3)){
        switch(Route::$uri_parts[0]){
            //case 'sota'.Data::DatePass():$AdminCook->setCookieAdmin();Route::$index=1;break;
              //case'bios-laptop':new \incl\win\Bios\Bios_laptop();break;
            //default:new \incl\sota\shop\DefShop();
            default:new \incl\burger\Index\IndexContent();;
        }
    }
}else{Route::$index=1;}if(Route::$module404){Route::modul404();}
if(Route::$index){new \incl\burger\Index\IndexContent();}

require '../blocks/burger/common/head.php';require '../blocks/burger/common/header.php';require '../blocks/burger/common/body.php';require '../blocks/burger/common/foot.php';