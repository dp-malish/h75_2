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


        }else{$err=true;}
        return($err)?false:true;
    }



}