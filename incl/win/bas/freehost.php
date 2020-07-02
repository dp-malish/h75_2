<?php
/**
 * Класс для работыс бесплатными хостами
 * Date: 02.07.2020
 * Time: 20:45
 */

namespace incl\win\Bas;

use lib\Def as Def;
use lib\Post\Post;


class FreeHost extends Post{


    static function freewebhostingarea(){$err=false;

        if(self::issetPostKey(['mail','login','pass'])){
            $mail=Def\Validator::auditMail($_POST['mail']);
            if(!$mail){$err=true;}
            $login=Def\Validator::auditText($_POST['login'],'login');
            if(!$login){$err=true;}
            $pass=Def\Validator::auditText($_POST['pass'],'pass');
            if(!$pass){$err=true;}
            if(!$err){//добавить в БД
                $ip=Def\Validator::getIp();
                $DB=new Def\SQLi();
                $sql='INSERT INTO freewebhostingarea(mail,login,pass,ip)VALUES(?,?,?,?)';
                $sql=$DB->realEscape($sql,[$mail,$login,$pass,$ip]);
                if(!$DB->boolSQL($sql)){$err=true;
                    Def\Validator::$ErrorForm[]='Ошибка соединения, повторите попытку позже...';
                }
            }
        }else{$err=true;}
        return($err)?false:true;
    }



}