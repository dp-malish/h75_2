<?php
/**Def статью показать*/

namespace incl\stroy\Shop;
use lib\Def as Def;
use incl\stroy\Def as DefShop;

class DefContent extends DefShop\DefContent{

  function __construct(){
    if(!isset(Def\Route::$uri_parts[1])){



      $this->viewText('def_content','default_img');
    }else Def\Route::$module404=true;
  }

}