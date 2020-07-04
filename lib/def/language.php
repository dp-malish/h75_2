<?php
namespace lib\Def;
class Language{
    function __construct($lngDB=''){
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
}