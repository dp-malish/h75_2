<?php
namespace lib\Post;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();

if(Post::issetPostArr()){
    if(!empty($_POST['call_me'])){

        //\lib\Def\Validator::$ErrorForm[]='Error! Ваше сообщение не отправлено...';
        //Post::answerErrJson();
        //$xxx=CallBack::CallBackFun();

        if(CallBack::CallBackFun(\incl\smoke\Def\OptSmoke::MAIL_WARNING)){
            echo json_encode(['err'=>false,'answer'=>'Спасибо! Мы Вам перезвоним в ближайшее время...']);
        }else{Post::answerErrJson();}

    }else echo $_SERVER['SERVER_NAME'];
    //-------------------------------------------------------------------
}else echo $_SERVER['SERVER_NAME'];