<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 30.06.2020
 * Time: 10:47
 */

namespace lib\Def;

use incl\win\Bas\FreeHost;

use lib\Post As Post;

Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new Opt('win');//Def opt

Cache_File::$cash=new Cache_File(['win'],true);

$bot=new UserAgent();

//if(!$bot->isBot()){include'../blocks/win/rek/google.php';}


if(Post\Post::issetPostArr()){
    if(!empty($_POST['freewebhostingarea'])){

        if(FreeHost::freewebhostingarea()){
            echo "Сюда можно/нужно вставить задержку";//json_encode(['err'=>false,'answer'=>'Спасибо! Ваше сообщение отправлено...']);
        }else{
            //Post\Post::answerErrJson();
            echo "0";//.Validator::$ErrorForm[0];
        }
    }else echo $_SERVER['SERVER_NAME'];
    //-------------------------------------------------------------------
}else

Route::location301();

    //echo $_SERVER['SERVER_NAME'];
/*

<form method="post">
    <input type="hidden" name="freewebhostingarea" value="1">
    <input type="email" name="mail" value="winteh@i.ua">
    <input type="text" name="login" value="host.com.ua">
    <input type="password" name="pass" value="123456789dfSA">
    <input type="submit">
</form>*/