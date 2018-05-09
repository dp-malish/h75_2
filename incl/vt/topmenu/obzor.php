<?php
namespace incl\vt\topMenu;
use lib\Def as Def;
/**
 * Obzor вывод страниц
 */


class Obzor{

  function __construct(){

    Def\Opt::$main_content.='<div class="fon">rr8rr</div>';


  }


  static function GetContentNav($start=1,$msg=13){

    return 'sc';
    /*

    $sql='SELECT id,link,link_name,title,meta_d,meta_k,caption,
	img_s,img_alt_s,img_title_s,short_text
	FROM '.$table_name.' ORDER BY id DESC LIMIT '.$start.','.$msg;
    $result=$MySQLsel->QuerySelect($sql);
    if($result){while($res=mysql_fetch_array($result)){$i++;
      //$title=$res['title'].$title;
      $description.=$res['link_name'].', ';//добавить все
      $keywords.=$res['link_name'].', ';
      if($res['img_s']!=''){$img_s='<a href="/'.$uri_parts[0].'/'.$res['link'].'"><img class="fl five img_link" src="/img/obzor/dbjpg.php?id='.$res['img_s'].'" alt="'.$res['img_alt_s'].'" title="'.$res['img_title_s'].' - узнать подробнее..."></a>';}else{$img_s='';}

      $search_content.='<div class="fon"><article>'.$img_s.'<a href="/'.$uri_parts[0].'/'.$res['link'].'"><h4>'.$res['caption'].'</h4></a>'.$res['short_text'].'</article><div class="cl"></div></div>';
      //***конец
    }




    $description.='подробнее...';

    $keywords.='подробнее';
    */

  }

}