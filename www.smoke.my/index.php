<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 13.09.2019
 * Time: 20:57
 */
namespace lib\Def;
use incl\smoke\Def As DefSmoke;
use function PHPSTORM_META\elementType;

Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);

set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
//$Opt=new Opt('smoke');//Def opt
$Opt=new DefSmoke\OptSmoke('smoke');//Def opt


$AdminCook=new \lib\user\User();

if($_SERVER['REQUEST_URI']!='/'){
    if(Route::requestURI(3)){
        switch(Route::$uri_parts[0]){
            case 'smoke'.Data::DatePass():$AdminCook->setCookieAdmin();Route::$index=1;break;
            //case $Opt::$setting:include'../modul/sota/admin/main.php';break;

            case 'mobilesmoke-fast-order-in-ukraine':include'../modul/smoke/fast_order_ms.php';break;

            case 'mobilesmoke':include'../modul/smoke/last_fb.php';break;

            case 'humidifier':include'../modul/smoke/lp_humidifier.php';break;
            case 'humidifier-fb':include'../modul/smoke/lp_humidifier_2.php';break;

            case 'landing':include'../modul/smoke/landing.php';break;


            //default:new \incl\sota\shop\DefShop();
            default:Route::$module404=true;
        }
    }
}else{Route::$index=1;}if(Route::$module404){Route::modul404();}

if(Route::$index){include'../modul/smoke/main_sopt.php';}



//$Opt::$slider=false;

//Шрифт по умолчанию
$Opt::$css_down.='<link rel="stylesheet" type="text/css" href="/css/fontawesome.php">';


//require '../blocks/smoke/menu/top_menu.php';

if($Opt::$body_column==3){
    require '../blocks/smoke/common/head.php';
    require '../blocks/smoke/common/header.php';
    require '../blocks/smoke/common/l_col.php';
    require '../blocks/smoke/common/body.php';
    require '../blocks/smoke/common/footer.php';
}elseif($Opt::$body_column==1){
    require '../blocks/smoke/common/head.php';
    require '../blocks/smoke/common/header.php';
    echo Opt::$main_content;//include '../blocks/smoke/common/body_col_1.php';
    require '../blocks/smoke/common/footer.php';
}elseif($Opt::$body_column==NULL){
    echo Opt::$main_content;
}
