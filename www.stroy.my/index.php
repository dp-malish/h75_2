<?php
namespace lib\Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();


$Opt=new Opt('stroy');//Def opt
$Cash=new Cache_File(['stroy'],true);


//$bot=new UserAgent();
//if(!$bot->isBot()){include'../blocks/taimod/rek/google.php';}

$set='set';$setAdminCook='stroy'.Data::DatePass();

if($_SERVER['REQUEST_URI']!='/'){$uri=htmlspecialchars($_SERVER['REQUEST_URI'],ENT_QUOTES);
    try{$uri=urldecode($uri);
        $url_path=parse_url($uri,PHP_URL_PATH);$uri_parts=explode('/',trim($url_path,'/'));$count_uri_parts=count($uri_parts);
        if($count_uri_parts>4){throw new Exception();}else{
            switch($uri_parts[0]){
                case $setAdminCook:
                  $setAdminCook=new \lib\User\User();$setAdminCook->setCookieAdmin();
                  $index=1;break;
                case $set:include'../modul/stroy/admin/main.php';break;
                case 'контакты':include'../modul/stroy/contacts.php';break;
                default:include '../modul/stroy/main.php';
            }
        }
    }catch(Exception $e){$module='404';}
}else{$index=1;}

if($module=='404'){Route::modul404();}
if($index){include '../modul/stroy/index.php';}



require'../blocks/stroy/menu/l_menu.php';

require'../blocks/stroy/menu/r_menu.php';
require'../blocks/stroy/common/head.php';
require'../blocks/stroy/common/header.php';
require'../blocks/stroy/menu/burger.php';
require'../blocks/stroy/common/l_col.php';
require'../blocks/stroy/common/body.php';
require'../blocks/stroy/common/footer.php';