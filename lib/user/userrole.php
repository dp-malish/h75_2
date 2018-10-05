<?php
/**
 * User with role
 * Date: 01.10.2018
 *
 *
 *
 *
 */

namespace lib\User;

use lib\Def as Def;
use lib\Post\Post;

class UserRole extends Def\Cache_Arr{

    public $answer;

    private $user_role_arr;//Массив ролей пользователей

    private $cookie_role='cru_int';//Имя куки роли цифра
    private $cookie_user_id='cui_int';//Имя куки № пользователя цифра
    private $cookie_user_pass='cup_str';//Имя куки пароль пользователя str
    private $cookie_user_ses='cus_str';//Имя куки сесии пльзователя





    public function __construct($dir=[],$add=false){
        parent::__construct($dir, $add);
        //Массив ролей пользователей берём
        $this->user_role_arr=$this->getCacheAssocArr('user_role', 'user_group');
    }



    public function getRoleUser(){//Взять роль юзера из куки
        $role=Def\Validator::issetCookie($this->cookie_role);
        if($role){
            $cookie_user_id=Def\Validator::issetCookie($this->cookie_user_id);
            if($cookie_user_id){
                $cookie_user_pass=Def\Validator::issetCookie($this->cookie_user_pass);
                if($cookie_user_pass){
                    $cookie_user_ses=Def\Validator::issetCookie($this->cookie_user_ses);
                    if($cookie_user_ses){
                        $ses=$this->md5UserSesCookie($role,$cookie_user_id,$cookie_user_pass);
                        if($ses==$cookie_user_ses){Def\Opt::$live_user=$role;}else Def\Opt::$live_user=0;
                    }else Def\Opt::$live_user=0;
                }else Def\Opt::$live_user=0;
            }else Def\Opt::$live_user=0;
        }else Def\Opt::$live_user=0;
    }


    //*******************************
    //*******************************
    private function md5UserSesCookie($role,$cookie_user_id,$cookie_user_pass){
        return md5(md5($role.$cookie_user_id.Def\Opt::COOKIE_SALT.Def\Validator::getIp()).$cookie_user_pass);
    }
    private function md5UserPassCookie($id_user,$role_user,$salt_user,$pass_user){
        return md5(md5($id_user.$role_user.$salt_user).Def\Opt::COOKIE_SALT.Def\Validator::getIp().$pass_user);
    }
    //*******************************
    //*******************************





    public function loginUserWithRole($post_mail,$post_pass){//post массив переменные

        if(Post::issetPostKey([$post_mail,$post_pass])){
            $post_mail=Def\Validator::auditMail($_POST[$post_mail]);
            if($post_mail){
                $post_pass=Def\Validator::html_cod($_POST[$post_pass]);
                if($post_pass){

                    //поиск в БД
                    $DB=new Def\SQLi();
                    $res=$DB->strSQL('SELECT user_id,user_group_id,salt,password FROM user WHERE email='.$DB->realEscapeStr($post_mail));
                    if($res['password']==$post_pass){

                        //temp
                        $this->answer=1;


                        Def\Cookie::setCookie($this->cookie_role,$res['user_group_id'],27000000);
                        Def\Cookie::setCookie($this->cookie_user_id,$res['user_id'],27000000);
                        $pass=$this->md5UserPassCookie($res['user_id'],$res['user_group_id'],$res['salt'],$res['password']);
                        Def\Cookie::setCookie($this->cookie_user_pass,$pass,27000000);
                        Def\Cookie::setCookie($this->cookie_user_ses,$this->md5UserSesCookie($res['user_group_id'],$res['user_id'],$pass),27000000);
                        Def\Opt::$live_user=$res['user_group_id'];

                    }else $this->answer='Неверное имя или пароль...';
                }else Def\Validator::$ErrorForm[]='Запрещённые символы в поле - пароль...';
            }
        }else Def\Validator::$ErrorForm[]='Бредовый запрос...';
        return(empty(Def\Validator::$ErrorForm)?true:false);
    }
}