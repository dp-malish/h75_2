<?php
/**Def статью показать*/

namespace incl\harvis\Def;
use lib\Def as Def;

class DefContent extends ViewArticle{

  function __construct(){
    if(!isset(Def\Route::$uri_parts[1])){
      $this->viewText('default_content','default_img');
    }else Def\Route::$module404=true;
  }

}