<?php
namespace lib\Def;
use incl\win\Def\Template;

Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new Opt('win');//Def opt

Cache_File::$cash=new Cache_File(['win'],true);

$bot=new UserAgent();

//if(!$bot->isBot()){include'../blocks/win/rek/google.php';}

new Template();

if($_SERVER['REQUEST_URI']!='/'){
    if(Route::requestURI(3)){
        $setAdminCook='win'.Data::DatePass();$set='set';
        switch(Route::$uri_parts[0]){
            case $setAdminCook:
                $AdminCook=new \lib\user\User();$AdminCook->setCookieAdmin();Route::$index=1;break;
            case $set:include'../modul/win/admin/main.php';break;

            case'bios-laptop':new \incl\win\Bios\Bios_laptop();break;



            default:new \incl\win\Def\DefContent();
        }
    }
}else{Route::$index=1;}if(Route::$module404){Route::modul404();}
if(Route::$index){include'../modul/win/main.php';}

//left - all stranici
require'../blocks/win/menu/l/remont_'.$Opt::$lang.'.php';
//right - all stranici
require '../blocks/win/menu/r/web_'.$Opt::$lang.'.php';
//require'../blocks/win/menu/r/dop_mat.php';

require'../blocks/win/common/head.php';require '../blocks/win/common/b_header.php';require'../blocks/win/common/header.php';require '../blocks/win/common/a_header.php';require '../blocks/win/common/l_column.php';require'../blocks/win/common/body_two_ext.php';require '../blocks/win/common/b_footer.php';require'../blocks/win/common/foot.php';