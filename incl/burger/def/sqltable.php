<?php
/**Таблица по работе с картинками из БД*/
namespace incl\burger\Def;

class SqlTable extends \lib\Img\SqlTableDef{
    const IMG=[
      ['food_img','Плитка','/img/tile/dbpic.php?id=']
    ];
    static function getImgDirTable($table_name,$arr_img=self::IMG){
      return parent::getImgDirTable($table_name,$arr_img);
    }

}