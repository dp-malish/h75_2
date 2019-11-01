<?php
namespace incl\smoke\Post;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();

if(FastOrder::issetPostArr()){
    if(!empty($_POST['fast_order'])){

        //\lib\Def\Validator::$ErrorForm[]='Error! Ваше сообщение не отправлено...';
        //Post::answerErrJson();
        //$xxx=CallBack::CallBackFun();

        //echo json_encode(['err'=>false,'answer'=>'Спасибо! Мы Вам перезвоним в ближайшее время...']);

        if(FastOrder::FastOrderFun(\incl\smoke\Def\OptSmoke::MAIL_WARNING)){
            echo json_encode(['err'=>false,'answer'=>'Спасибо! Мы Вам перезвоним в ближайшее время...']);
        }else{FastOrder::answerErrJson();}

    }else echo $_SERVER['SERVER_NAME'];
    //-------------------------------------------------------------------
}else echo $_SERVER['SERVER_NAME'];