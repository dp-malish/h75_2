<?php
/**Def статью показать*/

namespace incl\win\Def;
use lib\Def as Def;

class DefContent extends ViewArticle{

  function __construct(){
    if(!isset(Def\Route::$uri_parts[1])){
      $this->viewText('default_content','def_content_img');
    }else Def\Route::$module404=true;
  }

}