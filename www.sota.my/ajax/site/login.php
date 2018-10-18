<?php
namespace lib\Post;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();

use lib\Def as Def;

if(Post::issetPostArr()){
    $user=new \lib\User\UserRole(['../../../cache_all/sota'],false);
    if(!empty($_POST['login'])){
        if($user->loginUserWithRole('mail','pass')){
            echo json_encode(['err'=>false,'answer'=>$user->answer]);
        }else{Post::answerErrJson();}
    }elseif(!empty($_POST['info_user'])){
        $user->getRoleUser();
        if(Def\Opt::$live_user!=0 && Def\Opt::$live_user!=6){
            if(!empty($_POST['id'])){

                ///////////////////1111111!!!!!!

                //$id=Def\Validator::html_cod();

                $user->getUserInfo(2);

                echo json_encode(['err'=>false,'id'=>$user->answer_arr['user_id'],'mail'=>$user->answer_arr['email']]);
            }


        }else{Def\Validator::$ErrorForm[]='Вход не выполнен!';Post::answerErrJson();}
    }else echo $_SERVER['SERVER_NAME'];
    //-------------------------------------------------------------------
}else echo $_SERVER['SERVER_NAME'];