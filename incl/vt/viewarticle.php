<?php
/**
 * Created by PhpStorm.
 * User: Аватар
 * Date: 15.05.2018
 * Time: 01:13
 */

namespace incl\Vt;
use lib\Def as Def;

abstract class ViewArticle{

  protected $sql='';

  abstract function viewList();

  protected function viewText(){

    return 'viewText';

  }




}