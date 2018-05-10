<?php
namespace lib\Def;


//Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();


new Opt('vt');//Def opt
Cache_File::$cash=new Cache_File(['vt'],true);

$set='set';$setAdminCook='vt'.Data::DatePass();

new \incl\vt\user\Authentication();


$js_common='async ';//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

if($_SERVER['REQUEST_URI']!='/'){

    if(Route::requestURI(3)) {
        switch(Route::$uri_parts[0]){
          case $setAdminCook:
              $setAdminCook=new \lib\user\User();$setAdminCook->setCookieAdmin();Route::$index=1;break;
          case $set:include'../modul/vt/admin/main.php';break;

          //top_menu
          case 'news':new  \incl\vt\topMenu\News();break;
          //case 'article':include $root.'/blocks/top_menu/article.php';break;
          case 'contacts':include'../modul/vt/top_menu/contacts.php';break;
          case 'about':include'../modul/vt/top_menu/about.php';break;
          case 'обзор':new \incl\vt\topMenu\Obzor();break;



          default:Route::$module404=true;
              //header('Location: http://vt-fishing.com.ua');exit;
        }
    }
}else{Route::$index=1;}

if(Route::$module404){Route::modul404();}

require '../blocks/vt/block/main_slyder.php';

if(Route::$index){include'../modul/vt/top_menu/main.php';}

//left - all stranici
require'../blocks/vt/menu/l_menu.php';
require'../blocks/vt/block/google_adsense.php';

//right - all stranici
require'../blocks/vt/menu/fish_menu.php';

Opt::$r_content.=\incl\vt\Menu\RMenuLastArticle::getContent().\incl\vt\Menu\RMNewUser::getContent(Opt::$live_user);
//body
require'../blocks/vt/head.php';require'../blocks/vt/header.php';require'../blocks/vt/l_column.php';require'../blocks/vt/r_column.php';require'../blocks/vt/copyright.php';