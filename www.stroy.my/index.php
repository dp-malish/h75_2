<?php
namespace lib\Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();


//Def opt
$Opt=new Opt();




//$Cash=new Cache_File('../cache_all/taimod/');$bot=new UserAgent();
//if(!$bot->isBot()){include'../blocks/taimod/rek/google.php';}

//$set='set';$setAdminCook='lena'.Data::DatePass();

if($_SERVER['REQUEST_URI']!='/'){$uri=htmlspecialchars($_SERVER['REQUEST_URI'],ENT_QUOTES);
    try{$uri=urldecode($uri);
        $url_path=parse_url($uri,PHP_URL_PATH);$uri_parts=explode('/',trim($url_path,'/'));$count_uri_parts=count($uri_parts);
        if($count_uri_parts>4){throw new Exception();}else{

            switch($uri_parts[0]){
                /*case $setAdminCook:$setAdminCook=new User();$setAdminCook->setCookieAdmin();$index=1;break;
                case $set:include'../modul/taimod/admin/main.php';break;
                case 'контакты':include'../modul/taimod/t/contacts.php';break;*/
                default:include'../modul/stroy/main.php';
            }
        }
    }catch(Exception $e){$module='404';}
}else{$index=1;}

if($module=='404'){
    //Route::modul404();
}

if($index){include'../modul/stroy/main.php';}




//if($index){include $root.'/modul/main.php';}
//left-all
require'../blocks/stroy/menu/l_menu.php';
//require'../blocks/dp/menu/l/mat.php';require'../blocks/dp/menu/l/teach_slider.php';
//right-all
require'../blocks/stroy/menu/r_menu.php';


require'../blocks/stroy/common/head.php';

require'../blocks/stroy/common/header.php';
require'../blocks/stroy/menu/burger.php';

require'../blocks/stroy/common/l_col.php';
require'../blocks/stroy/common/body.php';

require'../blocks/stroy/common/footer.php';

