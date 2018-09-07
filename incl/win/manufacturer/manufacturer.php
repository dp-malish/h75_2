<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 06.09.2018
 * Time: 12:29
 */

namespace incl\win\Manufacturer;

use lib\Def as Def;
use lib\Post as Post;

class Manufacturer{

    function getManufacturer(){
        $res=Def\SQListatic::arrSQL_('SELECT * FROM manufacturer');
        return($res?$res:false);
    }

    static function updLaptop(){
        $err=false;
        if(Post\Post::issetPostKey(['id'])){


                /*$sms=Def\Validator::auditTextArea($_POST['sms'],'сообщение');
                if(!$sms){$err=true;}
                if(!$err){//добавить в БД
                    $ip=Def\Validator::getIp();
                    $DB=new Def\SQLi();
                    $sql='SELECT id FROM feedback WHERE captcha=? AND readed IS NULL';
                    $sql=$DB->realEscape($sql,Def\Validator::$captcha);
                    if($DB->intSQL($sql)!=''){//Ошибка капчи
                        $err=true;
                        Def\Validator::$ErrorForm[]='Не верно введена капча';
                    }else{
                        $sql='INSERT INTO feedback(captcha,name,mail,theme,text,ip,data)VALUES(?,?,?,?,?,?,?)';
                        $param=[Def\Validator::$captcha,$sms,$ip,time()];
                        $sql=$DB->realEscape($sql,$param);
                        if(!$DB->boolSQL($sql)){
                            $err=true;
                            Def\Validator::$ErrorForm[]='Ошибка соединения, повторите попытку позже...';}
                    }
                }*/

        }else{$err=true;}
        Def\Validator::$ErrorForm[]='Ошибка соединения, повторите попытку позже...';
        return($err)?false:true;
    }




}