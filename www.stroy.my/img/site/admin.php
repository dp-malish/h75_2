<?php
/*
 *!!!!!Изменить строку $Opt=new Def\Opt('???????');
 *
 *
*/
namespace lib\Img;
use lib\Def As Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path('../../../');spl_autoload_register();

$Opt=new Def\Opt('stroy');//Def opt

if(isset($_POST['t'])){//Взять все изо из выбранной таблицы
  $t=htmlspecialchars($_POST['t'],ENT_QUOTES);
  if(preg_match("/[0-9]+$/",$t)){
    $res=ImgExt::getMaxIdDir($t);
  if($res!==false){echo json_encode(['err'=>false,'dir'=>$res[0],'maxid'=>$res[1]]);}else{\lib\Post\Post::answerErrJson();}
}}elseif(isset($_POST['d'])){//Не нашёл где пользую
  $res=ImgExt::getMaxIdDirExt($_POST['d']);
  if($res!==false){echo json_encode(['err'=>false,'maxid'=>$res]);}else{\lib\Post\Post::answerErrJson();}
}