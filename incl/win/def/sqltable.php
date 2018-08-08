<?php
/**Таблица по работе с картинками из БД*/
namespace incl\win\Def;

class SqlTable extends \lib\Img\SqlTableDef{
    const IMG=[
      ['def_content_img','Общие','/img/site/dbpic.php?id='],

        ['everything_interesting_img','Пример','/img/everything_interesting/dbpic.php?id=']

    ];
    static function getImgDirTable($table_name,$arr_img=self::IMG){
      return parent::getImgDirTable($table_name,$arr_img);
    }

}