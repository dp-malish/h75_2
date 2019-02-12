<?php
set_include_path('../../../lib');spl_autoload_extensions('_class.php');spl_autoload_register();

$map=new SiteMap();$DB=new SQLi();
$file=str_replace(__DIR__.'\\','',str_replace(__DIR__.'/','',__FILE__));
$file=substr($file,0,-4);

$map->StartCache();
echo $map->StartSiteMap();


$def_con=$DB->arrSQL('SELECT link,data FROM article');
foreach($def_con as $it=>$v){echo $map->DBUrlMap('статьи/'.$v['link'],$v['data'],'monthly','0.5');}

echo $map->EndSiteMap();
$map->StopCache($file.'.xml');
Route::location('/'.$file.'.xml');