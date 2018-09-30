<?php
namespace lib\Def;
/*
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);*/

set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();

$Opt=new Opt('sota');//Def opt


Cache_File::$cash=new Cache_File(['sota'],true);


if($_SERVER['REQUEST_URI']!='/'){
    if(Route::requestURI(3)){
        $setAdminCook='sota'.Data::DatePass();
        switch(Route::$uri_parts[0]){
            case $setAdminCook:
                $AdminCook=new \lib\user\User();$AdminCook->setCookieAdmin();Route::$index=1;break;
            case $Opt::$setting:include'../modul/win/admin/main.php';break;

            //case'bios-laptop':new \incl\win\Bios\Bios_laptop();break;



            default:new \incl\win\Def\DefContent();
        }
    }
}else{Route::$index=1;}if(Route::$module404){Route::modul404();}
if(Route::$index){include'../modul/win/main.php';}


require '../blocks/sota/menu/burger.php';




require '../blocks/sota/common/head.php';

require '../blocks/sota/common/header.php';

require '../blocks/sota/common/l_col.php';

require '../blocks/sota/common/body.php';
require '../blocks/sota/common/footer.php';
