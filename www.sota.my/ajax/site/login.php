<?php
namespace lib\Post;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();

if(Post::issetPostArr()){
    if(!empty($_POST['login'])){

        $user=new \lib\User\UserRole(['../../../cache_all/sota'],false);
        if($user->loginUserWithRole('mail','pass')){
            echo json_encode(['err'=>false,'answer'=>$user->answer]);
        }else{Post::answerErrJson();}
    }else echo $_SERVER['SERVER_NAME'];
    //-------------------------------------------------------------------
}else echo $_SERVER['SERVER_NAME'];