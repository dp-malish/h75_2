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
echo Data::IntToStrMap(1156789789);

echo '<br>';

$xxx= new Tryclass();

echo $xxx->Starter();

echo '<br>555';

$yyy=new \lib\Sitemap\Sitemap();

echo $yyy->Starter().'__________<br><br><br>';

$zx=new \vendor\My\Lib1\MyLib1();

echo $zx->Dfg();

//*******************************
//exteds

$papa=new \vendor\My\Lib1\MyLib2();

echo $papa->Dfg().'<br>'.$papa->Papa().'<br>';
//*******************************


$son=new \lib\Childe\Son();

echo $son->Papa();

echo $son->Starter();

