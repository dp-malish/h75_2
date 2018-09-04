<?php
namespace lib\Sitemap;
use lib\Def as Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();
$xml='def.xml';
$map=new SiteMap();$DB=new Def\SQLi();

$map->StartCache();
echo $map->StartSiteMap();

echo $map->StaticFileMap('../incl/win/bios/bios_laptop.php','bios-laptop/','monthly','0.5');
//echo $map->StaticFileMap('../modul/stroy/contacts.php','контакты','monthly','0.5');

//$cache_arr=new Def\Cache_Arr(['win'],true);
//берём массив производителей
//$manuf_laptop_arr=$cache_arr->getCacheAssocArr('manufacturer_laptop','manufacturer WHERE laptop IS TRUE');

$manuf_laptop_arr=$DB->arrSQL('SELECT * FROM manufacturer WHERE laptop IS TRUE');
foreach($manuf_laptop_arr as $k=>$v){
    echo $map->DBUrlMap($v['link'],date ('Y-m-d'),'monthly');
}

/*$res=$DB->arrSQL('SELECT link,data FROM default_content WHERE menu<3');
//foreach($res as $k=>$v){echo $map->DBUrlMap($v['link'],Def\Data::IntToStrMap($v['data']),'monthly');}
foreach($res as $k=>$v){echo $map->DBUrlMap($v['link'],$v['data'],'monthly');}*/

echo $map->EndSiteMap();
$map->StopCache($xml);

if(isset($_GET['view']))Def\Route::location('/'.$xml);