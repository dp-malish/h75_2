<?php
/**Def статью показать*/

namespace incl\burger\Index;
use lib\Def as Def;
use incl\win\Def\Template;

class IndexContent{

    private $title='';
    private $description='';

  function __construct(){

      new Template();




    if(!isset(Def\Route::$uri_parts[1])){
      //$this->viewText('def_content','default_img');
    }else Def\Route::$module404=true;
  }

}