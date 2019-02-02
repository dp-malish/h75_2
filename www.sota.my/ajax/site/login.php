<?php
namespace lib\Post;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../../../');spl_autoload_register();

use lib\Def;
use lib\User\UserRole;

if(Post::issetPostArr()){
    $user=new \lib\User\UserRole(['../../../cache_all/sota'],false);
    if(!empty($_POST['login'])){//вход на сайт
        if($user->loginUserWithRole('mail','pass')){
            echo json_encode(['err'=>false,'answer'=>$user->answer]);
        }else{Post::answerErrJson();}
    }

    elseif(!empty($_POST['info_user'])){//вся инфа про извера
        $user->getRoleUser();
        if(Def\Opt::$live_user!=0 && Def\Opt::$live_user!=6){
            if(!empty($_POST['id'])){
                $id=Def\Validator::html_cod($_POST['id']);
                if(Def\Validator::paternInt($id)){
                    if($user->getUserInfo($id)){
                        echo json_encode([
                            'err'=>false,
                            'id'=>$user->answer_arr['user_id'],
                            'f'=>$user->answer_arr['lastname'],
                            'i'=>$user->answer_arr['firstname'],
                            'o'=>$user->answer_arr['patronymic'],

                            'tel'=>$user->answer_arr['tel'],
                            'tel2'=>$user->answer_arr['tel2'],
                            'mail'=>$user->answer_arr['email'],
                            'role'=>UserRole::$user_role_arr[($user->answer_arr['user_group_id']-1)]['name'],

                            'level'=>$user->answer_arr['level_star_client'],
                            'note'=>$user->answer_arr['note'],

                            'data'=>$user->answer_arr['date_added']

                        ]);
                    }
                }else{Def\Validator::$ErrorForm[]='0x0000001';Post::answerErrJson();}
            }else{Def\Validator::$ErrorForm[]='0x0000002';Post::answerErrJson();}
        }else{Def\Validator::$ErrorForm[]='Вход не выполнен!';Post::answerErrJson();}
    }

    elseif(!empty($_POST['add_update'])) {//добавить обновить клиента
        $user->getRoleUser();
        if(Def\Opt::$live_user !=0 && Def\Opt::$live_user != 6){
            if(Post::issetPostKey(['id','f','i','o','tel','tel2','mail','level','note'])){
                $id = Def\Validator::html_cod($_POST['id']);

                $mail=Def\Validator::html_cod($_POST['mail']);
                if($mail=='null')$mail='';

                $tel = Def\Validator::html_cod($_POST['tel']);
                if($tel=='null')$tel='';
                $tel2 = Def\Validator::html_cod($_POST['tel2']);
                if($tel2=='null')$tel2='';

                $f = Def\Validator::html_cod($_POST['f']);
                if($f=='null')$f='';
                $i = Def\Validator::html_cod($_POST['i']);
                if($i=='null')$i='';
                $o = Def\Validator::html_cod($_POST['o']);
                if($o=='null')$o='';

                $level = Def\Validator::html_cod($_POST['level']);
                if($level=='null')$level='';

                $note=Def\Validator::html_cod($_POST['note']);
                if($note=='null')$note='';

                if(Def\Validator::paternInt($id)){//если есть id то update инфу
                    if($user->updateUserInfo($id,$f,$i,$o,$tel,$tel2,$mail,$level,$note)){
                        echo json_encode(['err'=>false,'answer'=>$user->answer.$id]);
                    }else{Post::answerErrJson();}
                }else{//если нет id то добавить нового клиента
                    if($user->addUserInfo($f,$i,$o,$tel,$tel2,$mail,$note)){
                        echo json_encode(['err'=>false,'answer'=>$user->answer]);
                    }else{Post::answerErrJson();}
                }
            }else{Def\Validator::$ErrorForm[]='0x0000001';Post::answerErrJson();}
        }else{Def\Validator::$ErrorForm[]='Вход не выполнен!';Post::answerErrJson();}

    }

    else echo $_SERVER['SERVER_NAME'];
    //-------------------------------------------------------------------
}else echo $_SERVER['SERVER_NAME'];