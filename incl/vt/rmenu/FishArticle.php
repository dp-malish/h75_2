<?php
/**
 * Created by PhpStorm.
 * User: Аватар
 * Date: 15.05.2018
 * Time: 01:42
 */

namespace incl\vt\Rmenu;
use lib\Def as Def;

class FishArticle extends \incl\vt\ViewArticle{

  function __construct(){
    Def\Opt::$main_content='fdg'.$this->viewText();
  }

  function viewList(){

  }


}