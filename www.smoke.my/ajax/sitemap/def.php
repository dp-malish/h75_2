<?php
namespace lib\Sitemap;
use lib\Def as Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();
$xml='def.xml';
$map=new SiteMap();$DB=new Def\SQLi();

$map->StartCache();
echo $map->StartSiteMap();

echo $map->StaticFileMap('../modul/smoke/main.php','','monthly','0.5');
//echo $map->StaticFileMap('../modul/stroy/contacts.php','контакты','monthly','0.5');

/*$res=$DB->arrSQL('SELECT link,data FROM def_content WHERE menu=1');
foreach($res as $k=>$v){echo $map->DBUrlMap($v['link'],Def\Data::IntToStrMap($v['data']),'monthly');}*/

echo $map->EndSiteMap();
$map->StopCache($xml);

if(isset($_GET['view']))Def\Route::location('/'.$xml);