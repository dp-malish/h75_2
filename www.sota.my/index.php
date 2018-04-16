<?php
namespace lib\Def;
/*
//$site=$_SERVER['SERVER_NAME'];$root=$_SERVER['DOCUMENT_ROOT'];
/*Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);*/
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();


//echo Opt::COOKIE_SALT;

/*

set_include_path(get_include_path().PATH_SEPARATOR.'../lib'.PATH_SEPARATOR.'../include/taimod'.PATH_SEPARATOR.'../lib/admin');spl_autoload_extensions("_class.php");spl_autoload_register();
$Cash=new Cache_File('../cache_all/taimod/');$bot=new UserAgent();
//if(!$bot->isBot()){include'../blocks/taimod/rek/google.php';}

$set='set';$setAdminCook='lena'.Data::DatePass();

if($_SERVER['REQUEST_URI']!='/'){$uri=htmlspecialchars($_SERVER['REQUEST_URI'],ENT_QUOTES);
    try{$uri=urldecode($uri);
        $url_path=parse_url($uri,PHP_URL_PATH);$uri_parts=explode('/',trim($url_path,'/'));$count_uri_parts=count($uri_parts);
        if($count_uri_parts>4){throw new Exception();}else{

            switch($uri_parts[0]){
                case $setAdminCook:$setAdminCook=new User();$setAdminCook->setCookieAdmin();$index=1;break;
                case $set:include'../modul/taimod/admin/main.php';break;
                case 'контакты':include'../modul/taimod/t/contacts.php';break;
                default:include'../modul/taimod/main.php';
            }
        }
    }catch(Exception $e){$module='404';}
}else{$index=1;}if($module=='404'){Route::modul404();}*/

//if($index){include'../modul/taimod/main.php';}


require '../blocks/sota/menu/burger.php';




require '../blocks/sota/common/head.php';

require '../blocks/sota/common/header.php';

require '../blocks/sota/common/l_col.php';

require '../blocks/sota/common/body.php';
require '../blocks/sota/common/footer.php';
