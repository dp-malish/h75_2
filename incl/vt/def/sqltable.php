<?php
/**Таблица по работе с картинками из БД*/
namespace incl\vt\Def;

class SqlTable extends \lib\Img\SqlTableDef{
    const IMG=[
      ['def_content_img','Общие','/img/site/pic.php?id='],


        ['everything_wise_advice_img','Обо всём - Мудрые советы','/img/everything_wise_advice/dbpic.php?id='],
        ['everything_interesting_img','Обо всём интересном','/img/everything_interesting/dbpic.php?id=']

    ];
    static function getImgDirTable($table_name){
      return parent::getImgDirTable($table_name,self::IMG);
    }

}