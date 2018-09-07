<?php
namespace incl\win\Manufacturer;
use lib\Def as Def;
use lib\Post as Post;

class Manufacturer{

    function getManufacturerDB(){
        $res=Def\SQListatic::arrSQL_('SELECT * FROM manufacturer');
        return($res?$res:false);
    }

    static function updLaptop(){
        $err=false;
        if(Post\Post::issetPostKey(['id','laptop'])){
               $id=Def\Validator::html_cod($_POST['id']);
               $laptop=Def\Validator::html_cod($_POST['laptop']);
               if(Def\Validator::paternInt($id)&&Def\Validator::paternInt($laptop)){
                   $DB=new Def\SQLi();
                   $sql='UPDATE manufacturer SET laptop=? WHERE manufacturer_id=?';
                   $sql=$DB->realEscape($sql,[$laptop,$id]);
                   if(!$DB->boolSQL($sql)){$err=true;
                       Def\Validator::$ErrorForm[]='Ошибка соединения, повторите попытку позже...';}
               }else{$err=true;
                   Def\Validator::$ErrorForm[]='Ошибка передачи данных, повторите попытку позже...';}
        }else{$err=true;}
        Def\Validator::$ErrorForm[]='Ошибка соединения, повторите попытку позже...';
        return($err)?false:true;
    }
}