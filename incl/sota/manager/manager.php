<?php
/**
 * 0 - без входа
 * 1 - я
 * 2 - директор
 * 3 - бухгалтер
 * 4 - менеджер
 * 5 - продавец
 * 6 - клиент
 * 7 - SU
 */

namespace incl\sota\manager;
use lib\Def as Def;

class Manager{

    //function __construct($uri_parts){    }

    function routManager(){

        if(Def\Route::$count_uri_parts==2){
            return $this->defManager();
        }else{
            switch(Def\Route::$uri_parts[2]) {
                case'карта-клиента':return $this->clientMap();break;
                case'сервис':return $this->service();break;

                default:Def\Route::$module404=true;
            }
        }
        //Def\Route::$uri_parts[2];
    }

    private function defManager(){
        return 'Открытые заказы<br>и т.д...<br>';
    }

    private function clientMap(){

        Def\Opt::$jscript='<script async src="/js/user_role.js"></script>';

        $DB=new Def\SQLi();
        $res=$DB->arrSQL('SELECT user_id,email,tel,tel_2,user_group_id,firstname,lastname,patronymic FROM user /*WHERE user_group_id=6*/ ORDER BY user_id DESC');

        $text='<div class="fon five_">';

        $text.='<div class="dwfse fon_c five"><div class="link" onclick="addUserInfoNew()">ФИО +</div><div>Контакты</div></div>';
        foreach($res as $k=>$v){

            $text.='<div class="dwfse fon_c five">';

            $text.='<div class="field_fio ac link" onclick="getUserInfo('.$v['user_id'].')">'.$v['lastname'].'<br>'.$v['firstname'].'<br>'.$v['patronymic'].'</div>';

            $text.='<div class="field_contact ac">'.$v['tel'].'<br>'.$v['tel_2'].'<br>'.$v['email'].'</div>';


            $text.='</div>';
        }

        $text.='</div>';

        return $text;
    }
    private function service(){

        return 'service';
    }

}