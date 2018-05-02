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

require '../blocks/vt/block/main_slyder.php';
if(Route::$index){

  //include '../blocks/vt/index_news.php';
  include '../modul/vt/top_menu/main.php';
}





//left - all stranici
require '../blocks/vt/menu/l_menu.php';

require'../blocks/vt/block/google_adsense.php';

//right - all stranici
require '../blocks/vt/menu/fish_menu.php';
//require $root.'/blocks/common/block/last_article.php';
//require $root.'/blocks/common/block/new_user'.($live_user==1?'_link':'').'.php';
//body
require '../blocks/vt/head.php';
require '../blocks/vt/header.php';
require '../blocks/vt/l_column.php';
require '../blocks/vt/r_column.php';
require '../blocks/vt/copyright.php';
