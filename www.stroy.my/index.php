<?php
namespace lib\Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();

$Opt=new Opt('stroy');//Def opt
Cache_File::$cash=new Cache_File(['stroy'],true);

//$bot=new UserAgent();
//if(!$bot->isBot()){include'../blocks/taimod/rek/google.php';}

$AdminCook=new \lib\user\User();
$Opt::$loginAdmin=$AdminCook->loginAdmin();

if($_SERVER['REQUEST_URI']!='/'){
    if(Route::requestURI(2)) {
        switch (Route::$uri_parts[0]){
             case 'stroy'.Data::DatePass():$AdminCook->setCookieAdmin();Route::$index=1;break;
             case $Opt::$setting:include '../modul/stroy/admin/main.php';break;
             case 'контакты':include '../modul/stroy/contacts.php';break;
             default:new \incl\stroy\Def\DefContent();
        }
    }
}else{Route::$index=1;}if(Route::$module404){Route::modul404();}
if(Route::$index){include '../modul/stroy/index.php';}

require'../blocks/stroy/menu/l_menu.php';

require'../blocks/stroy/menu/r_menu.php';
require'../blocks/stroy/common/head.php';
require'../blocks/stroy/common/header.php';
require'../blocks/stroy/menu/burger.php';
require'../blocks/stroy/common/l_col.php';require'../blocks/stroy/common/body.php';require'../blocks/stroy/common/footer.php';