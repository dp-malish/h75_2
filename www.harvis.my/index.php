<?php
namespace lib\Def;

//Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();

$Opt=new Opt('harvis');//Def opt
Cache_File::$cash=new Cache_File(['harvis'],true);

$AdminCook=new \lib\user\User();

if($_SERVER['REQUEST_URI']!='/'){
    if(Route::requestURI(4)){
        $uri_parts0_id=explode('-',Route::$uri_parts[0],2);
        if(isset($uri_parts0_id[0]) && !isset($uri_parts0_id[1])){
            switch(Route::$uri_parts[0]){
                case 'katrin'.Data::DatePass():$AdminCook->setCookieAdmin();Route::$index=1;break;
                case Opt::$setting:include'../modul/harvis/admin/main.php';break;
                case'статьи':new \incl\harvis\topMenu\Article();break;
                default:new \incl\harvis\Def\DefContent();
            }
        }if(isset($uri_parts0_id[0]) && isset($uri_parts0_id[1])){
            switch($uri_parts0_id[0]){
                case'галерея':include'../modul/harvis/l/gallery.php';break;
                default:new \incl\harvis\Def\DefContent();
            }
        }
    }
}//else{Route::$index=1;}if(Route::$module404){Route::modul404();}




if(Route::$index){include'../modul/harvis/main.php';}
require'../blocks/harvis/common/block/slider.php';require'../blocks/harvis/menu/lmenu.php';require'../blocks/harvis/common/head_com.php';require'../blocks/harvis/common/befor_header.php';require'../blocks/harvis/common/header.php';require'../blocks/harvis/common/after_header.php';require'../blocks/harvis/common/left_column.php';require'../blocks/harvis/common/body_one.php';require'../blocks/harvis/common/foot.php';