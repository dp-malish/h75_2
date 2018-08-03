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

            //r_menu
            case 'fish':new \incl\vt\Rmenu\FishArticle();break;

            //l_menu
            case 'рыбалка-и-закон':new \incl\vt\lmenu\Polezno\Zakon();break;


            //default:new \incl\win\Def\DefContent();
            //Route::$module404=true;
            //header('Location: http://vt-fishing.com.ua');exit;
        }
    }
}else{Route::$index=1;}

if(Route::$module404){Route::modul404();}

if(Route::$index){include'../modul/win/main.php';}


//left - all stranici
require'../blocks/win/menu/l/remont.php';
//right - all stranici
require'../blocks/win/menu/r/web.php';
//require'../blocks/win/menu/r/dop_mat.php';

require'../blocks/win/common/head.php';
require '../blocks/win/common/b_header.php';
require'../blocks/win/common/header.php';
require '../blocks/win/common/a_header.php';

require '../blocks/win/common/l_column.php';

require'../blocks/win/common/body_two_ext.php';

require '../blocks/win/common/b_footer.php';

require'../blocks/win/common/foot.php';