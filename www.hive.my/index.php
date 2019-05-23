<?php
/**
 * Created by PhpStorm.
 * User: Аватар
 * Date: 16.03.2018
 * Time: 00:39
 */
namespace lib\Def;
//namespace tryname;

set_include_path('../'/*.PATH_SEPARATOR.'../../vendor'.PATH_SEPARATOR.'../lib/sitemap'*/);
//spl_autoload_extensions(".php");
spl_autoload_register();



echo 'f*******/*/*/*';

//echo Data::IntToStrMap(1156789789);
echo Data::IntToStrMap(1596989789);
echo '<br>';
echo '<br>';
echo Data::StrDateTimeToInt("2019-05-23 21:45:59");

echo '<br>';
echo '<br>';

$xxx= new Tryclass();

echo $xxx->Starter();

echo '<br>555';
