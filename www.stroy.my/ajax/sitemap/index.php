<?php
namespace lib\Sitemap;
use lib\Def as Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();
$map=new SiteMap();
$map->CreateIndexSiteMap();
if(isset($_GET['view']))Def\Route::location('/sitemap.xml');