<?php
namespace lib\Def;

//Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);


set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
//set_include_path(get_include_path().PATH_SEPARATOR.'../lib'.PATH_SEPARATOR.'../include/harvis'.PATH_SEPARATOR.'../lib/admin');
/*spl_autoload_extensions("_class.php");
spl_autoload_register();*/

Cache_File::$cash=new Cache_File(['harvis'],true);

//$Cash=new Cache_File('../cache_all/harvis/');//$bot=new UserAgent();




if($_SERVER['REQUEST_URI']!='/'){$uri=htmlspecialchars($_SERVER['REQUEST_URI'],ENT_QUOTES);
    try{$uri=urldecode($uri);
        $url_path=parse_url($uri,PHP_URL_PATH);$uri_parts=explode('/',trim($url_path,'/'));$count_uri_parts=count($uri_parts);
        if($count_uri_parts>4){throw new Exception();}else{
            $uri_parts0_id=explode('-',$uri_parts[0],2);
            $count_uri0_parts=count($uri_parts0_id);
            if(isset($uri_parts0_id[0]) && !isset($uri_parts0_id[1])){
                $setAdminCook='katrin'.Data::DatePass();
                switch($uri_parts[0]){
                    case $setAdminCook:$setAdminCook=new User();$setAdminCook->setCookieAdmin();$index=true;break;
                    case'set':include'../modul/harvis/admin/main.php';break;
                    case'статьи':include'../modul/harvis/article.php';break;
                    default:include'../modul/harvis/def.php';
                }
            }
            if(isset($uri_parts0_id[0]) && isset($uri_parts0_id[1])){
                switch($uri_parts0_id[0]){
                    case'галерея':include'../modul/harvis/l/gallery.php';break;
                    default:include'../modul/harvis/def.php';
                }
            }
        }
    }catch(Exception $e){$module='404';}
}else{Route::$index=1;}if(Route::$module404){Route::modul404();}

if(Route::$index){include'../modul/harvis/main.php';}

require'../blocks/harvis/common/block/slider.php';
require'../blocks/harvis/menu/lmenu.php';

require'../blocks/harvis/common/head_com.php';require'../blocks/harvis/common/befor_header.php';require'../blocks/harvis/common/header.php';require'../blocks/harvis/common/after_header.php';require'../blocks/harvis/common/left_column.php';require'../blocks/harvis/common/body_one.php';require'../blocks/harvis/common/foot.php';