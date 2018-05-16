<?php
/**Ловля рыбы - выдать статьидля меню*/
namespace incl\vt\Rmenu;
use lib\Def as Def;

class FishArticle{
  function __construct(){
    if(!isset(Def\Route::$uri_parts[1])){Def\Route::$module404=true;
    }elseif(isset(Def\Route::$uri_parts[1]) && !isset(Def\Route::$uri_parts[2])){
      $this->viewText();}else Def\Route::$module404=true;
  }
  private function viewText(){
    $DB=new Def\SQLi();
    $res=$DB->strSQL('SELECT title,meta_d,meta_k,caption,left_part,main_part,right_part
FROM fish_article WHERE links_child='.$DB->realEscapeStr(Def\Route::$uri_parts[1]));
    if($res['title']!=''){
      Def\Opt::$title=$res['title'];
      Def\Opt::$description=$res['meta_d'];
      Def\Opt::$keywords=$res['meta_k'];
      Def\Opt::$main_content.='<section><div class="fon_c"><article><h3>'.$res['caption'].'</h3><br>'.$res['main_part'].'</article><div class="cl"></div></div></section>';
    }else{Def\Route::$module404=true;}
  }
}