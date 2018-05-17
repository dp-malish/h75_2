<?php
/**Упрваление - рыбалка и закон - в рубрике "Полезно знать"*/
namespace incl\vt\lmenu\Polezno;
use lib\Def as Def;

class Zakon extends \incl\vt\Def\ViewList{

  // $this->viewText('default_content','def_content_img');


  function __construct(){
    if(!isset(Def\Route::$uri_parts[1])){//$this->viewList();
    }elseif(isset(Def\Route::$uri_parts[1]) && !isset(Def\Route::$uri_parts[2])){
      if(Def\Validator::paternStrLink(Def\Route::$uri_parts[1])){
        if(Def\Validator::paternInt(Def\Route::$uri_parts[1])){//если цифра
          if(Def\Route::$uri_parts[1]==1){
            Def\Route::location301('/'.Def\Route::$uri_parts[0].'/');
          }else $this->viewList(Def\Route::$uri_parts[1]);
        }else{//если текст
          //$this->viewText();
        }
      }else Def\Route::$module404=true;
    }else Def\Route::$module404=true;
  }


}