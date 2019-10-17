<?php
namespace incl\smoke\Post;
use lib\Def as Def;
use lib\Post as Post;
use lib\Mail as Mail;
class FastOrder extends Post\Post{

    static function FastOrderFun($to){$err=false;

       if(self::issetPostKey(['name','tel','town','npost','color'])){
           $name=Def\Validator::auditFIO($_POST['name']);
           if(!$name){$err=true;}
           $tel=Def\Validator::auditText($_POST['tel'],'телефон',13);
           if(!$tel){$err=true;}
           $town=Def\Validator::auditText($_POST['town'],'город',33);
           if(!$town){$err=true;}
           $npost=Def\Validator::html_cod($_POST['npost']);
           $npost_err=Def\Validator::paternInt($npost);
           if(!$npost_err){$err=true;Def\Validator::$ErrorForm[]='Новая почта - число';}
           $color=Def\Validator::auditText($_POST['color'],'цвет',20);
           if(!$color){$err=true;}

           if(!$err){//добавить в БД
               $ip=Def\Validator::getIp();
               $DB=new Def\SQLi();
               $sql='INSERT INTO order_fast(username,tel,town,npost,color,ip)VALUES(?,?,?,?,?,?)';
               $param=[$name,$tel,$town,$npost,$color,$ip];
               $sql=$DB->realEscape($sql,$param);
               if(!$DB->boolSQL($sql)){
                   $err=true;
                   Def\Validator::$ErrorForm[]='Ошибка соединения, повторите попытку позже...';
               }else{
                   //if(!mail('win@i.ua','Call Me',$name.'\n '.$tel.'\n '.$ip.'\n '.$town.'\n '.$npost.'\n '.$color))
                   if(!Mail\Mail::sendMail($to,'Автоответчик <admin@'.$_SERVER['SERVER_NAME'].'>','Заказ','ФИО '.$name.'<br>Тел. '.$tel.'<br>ip adress: '.$ip.'<br>Город: '.$town.'<br> '.$npost.'<br>Цвет: '.$color)){
                      Def\Validator::$ErrorForm[]='Ошибка оповещёния...';
                   }
               }
           }
        }else{$err=true;}
        return($err)?false:true;
    }
}