<?php
/**
 * User with role
 * Date: 01.10.2018
 *
 *
 *
 *
 */

namespace lib\user;

use lib\Def as Def;

class UserRole extends Def\Cache_Arr{

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
                        $ip=Def\Validator::getIp();
                        $ses=$this->md5UserSesCookie($role,$cookie_user_id,$cookie_user_pass,$ip);
                        if($ses==$cookie_user_ses){Def\Opt::$live_user=$role;}else Def\Opt::$live_user=0;
                    }else Def\Opt::$live_user=0;
                }else Def\Opt::$live_user=0;
            }else Def\Opt::$live_user=0;
        }else Def\Opt::$live_user=0;
    }


    //*******************************
    //*******************************
    private function md5UserSesCookie($role,$cookie_user_id,$cookie_user_pass,$ip){
        return md5(md5($role.$cookie_user_id.Def\Opt::COOKIE_SALT.$ip).$cookie_user_pass);
    }












    public function temp_fun(){
        //берём массив ролей пользователей
        return $this->user_role_arr;
    }
}