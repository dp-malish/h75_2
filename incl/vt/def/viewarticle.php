<?php
/**Вывести статью одиночную*/

namespace incl\vt\Def;
use lib\Def as Def;

class ViewArticle{

  protected $sql='';

  //abstract function viewList();

  protected function viewText($table_name,$table_name_img,$uri_part=0,$button_back=''){
    $DB=new Def\SQLi();
    $res=$DB->strSQL('SELECT link,title,meta_d,meta_k,caption,img,img_alt,img_title,full_text FROM '.$table_name.' WHERE link='.$DB->realEscapeStr(Def\Route::$uri_parts[$uri_part]));
    if($res['title']!=''){
      Def\Opt::$title=$res['title'];
      Def\Opt::$description=$res['meta_d'];
      Def\Opt::$keywords=$res['meta_k'];

      if($res['img']!=''){$img='<img class="fl five img_link" src="'.SqlTable::getImgDirTable($table_name_img).$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">';}else{$img='';}


      if($button_back!=''){
        $button_back='<p><a href="/'.Def\Route::$uri_parts[0].'/" onclick="button_back(\'обзор/\');return false;" rel="nofollow">&#9668;&mdash;</a><br></p>';


      }




      Def\Opt::$main_content.='<section><div class="fon_c"><article><h3>'.$res['caption'].'</h3><div class="cl"></div>'.$button_back.$img.$res['full_text'].'<p><a href="/'.Def\Route::$uri_parts[0].'/" onclick="button_back(\'обзор/\');return false;" rel="nofollow">&#9668;&mdash; Вернуться к меню обзоров</a></p></article><div class="cl"></div></div></section>';
    }else{Def\Route::$module404=true;}
  }




}