<?php
namespace lib\Def;
//use incl\win\Def\Template;

/*
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);*/

set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new Opt('burger');//Def opt

Cache_File::$cash=new Cache_File(['burger'],true);




if($_SERVER['REQUEST_URI']!='/'){
    if(Route::requestURI(3)){
        switch(Route::$uri_parts[0]){
            //case 'sota'.Data::DatePass():$AdminCook->setCookieAdmin();Route::$index=1;break;
            case $Opt::$setting:include'../modul/sota/admin/main.php';break;

            case 'cabinet':include'../modul/sota/cabinet.php';break;

            //case'bios-laptop':new \incl\win\Bios\Bios_laptop();break;

            default:new \incl\sota\shop\DefShop();
        }
    }
}else{Route::$index=1;}if(Route::$module404){Route::modul404();}
if(Route::$index){new \incl\burger\Index\IndexContent();}


//require '../blocks/sota/menu/burger.php';




require '../blocks/burger/common/head.php';
require '../blocks/burger/common/header.php';
require '../blocks/burger/common/body.php';
require '../blocks/burger/common/foot.php';