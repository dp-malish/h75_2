<?php
namespace lib\Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();


$Opt=new Opt('win');//Def opt
$Cash=new Cache_File(['win'],true);


$bot=new UserAgent();

//if(!$bot->isBot()){include'../blocks/win/rek/google.php';}


if($_SERVER['REQUEST_URI']!='/'){

    if(Route::requestURI(3)){

        $set='set';$setAdminCook='win'.Data::DatePass();

        switch(Route::$uri_parts[0]){
            case $setAdminCook:
                $setAdminCook=new \lib\user\User();$setAdminCook->setCookieAdmin();Route::$index=1;break;
            //case $set:include'../modul/vt/admin/main.php';break;

            //top_menu
            case 'contacts':include'../modul/vt/top_menu/contacts.php';break;
            case 'about':include'../modul/vt/top_menu/about.php';break;
            case 'обзор':new \incl\vt\topMenu\Obzor();break;

            //right_menu
            case 'fish':new \incl\vt\Rmenu\FishArticle();break;

            //left_menu
            case 'рыбалка-и-закон':new \incl\vt\lmenu\Polezno\Zakon();break;


            default:new \incl\vt\Def\DefContent();
            //Route::$module404=true;
            //header('Location: http://vt-fishing.com.ua');exit;
        }
    }
}else{Route::$index=1;}

if(Route::$module404){Route::modul404();}

if(Route::$index){include'../modul/win/main.php';}


//left - all stranici
//require'../blocks/win/menu/l/remont.php';
//right - all stranici
//require'../blocks/win/menu/r/web.php';
//require'../blocks/win/menu/r/dop_mat.php';

require'../blocks/win/common/head.php';
require'../blocks/win/common/befor_header.php';
require'../blocks/win/common/header.php';

/*
require'../blocks/win/common/after_header.php';require'../blocks/win/common/left_column.php';
switch($column){
case'1':include'../blocks/win/common/body_one.php';break;
case'2':include'../blocks/win/common/body_two.php';break;
default:include'../blocks/win/common/body_two_ext.php';}
require'../blocks/win/common/befor_footer.php';*/

require'../blocks/win/common/foot.php';