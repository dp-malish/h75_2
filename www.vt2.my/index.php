<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 02.05.2018
 * Time: 13:01
 */
namespace lib\Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();


$Opt=new Opt('vt');//Def opt
$Cash=new Cache_File(['vt'],true);


$set='set';$setAdminCook='vt'.Data::DatePass();

if($_SERVER['REQUEST_URI']!='/'){

    if(Route::requestURI(3)) {
        switch(Route::$uri_parts[0]){
            case $setAdminCook:
                $setAdminCook=new \lib\User\User();$setAdminCook->setCookieAdmin();Route::$index=1;
                break;
            case $set:
                include '../modul/vt/admin/main.php';
                break;
            default:header('Location: http://vt-fishing.com.ua');exit;
        }
    }
}else{Route::$index=1;}

if(Route::$module404){Route::modul404();}
if(Route::$index){
    Opt::$main_content='Начальная страница'.Route::$uri_parts[0];
    echo 'Начальная страница: '.Route::$uri_parts[0];
}


echo $Opt::$main_content;