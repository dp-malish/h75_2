<?php
namespace lib\Def;
use lib\Get as Get;

/*
*Входной параметр для языка $_GET['lng']
*Входной параметр для языка cookie 'lng'
*/



class Language{
    function __construct($get=true,$lngDB=''){

        if($get){
            $this->takeGetLng();

        }else{
            //e3w

        }


        if($lngDB==''){
            $cookie=Validator::issetCookie('lng');
            if($cookie){//если есть куки языка
                Opt::$lang=$cookie;
            }else{//если нет куков языка
                $lng=substr(Validator::html_cod($_SERVER['HTTP_ACCEPT_LANGUAGE']), 0, 2);
                if($lng!=''){
                    Opt::$lang=$lng;
                    Cookie::setCookie('lng',Opt::$lang);
                }
            }
        }else{
            Opt::$lang=$lngDB;
            Cookie::setCookie('lng',Opt::$lang);
        }
    }
    protected function takeGetLng(){
        if(Get\Get::issetGetArr()){
            if (Get\Get::issetGetKey(['lng'])){
                return Opt::$lang=Validator::html_cod($_GET['lng']);
            }else return false;
        }else return false;
    }
    protected function takeCookieLng(){
        $cookie=Validator::issetCookie('lng');
        if($cookie){//если есть куки языка
            Opt::$lang=$cookie;
        }else{//если нет куков языка
            $lng=substr(Validator::html_cod($_SERVER['HTTP_ACCEPT_LANGUAGE']), 0, 2);
            if($lng!=''){
                Opt::$lang=$lng;
                Cookie::setCookie('lng',$lng);
            }
        }
    }
    static function setLanguageManually($lng='ru'){
        Opt::$lang=$lng;
        Cookie::setCookie('lng',$lng);
    }

}