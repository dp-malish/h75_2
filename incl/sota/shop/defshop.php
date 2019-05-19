<?php
/**Def статью показать*/

namespace incl\sota\Shop;
use lib\Def as Def;
use incl\sota\Def as DefCont;

class DefShop extends DefCont\DefContent{

  private $cache_arr;//для работы с кешем массивов JSON (Экземпляр класса)

  protected $manufacturer;//Массив производителей JSON

  function __construct(){
    if(!isset(Def\Route::$uri_parts[1])){
        //для работы с кешем массивов JSON
        $this->cache_arr=new Def\Cache_Arr(['sota'],true);

        //берём или создаём массив производителей
        $this->manufacturer=$this->cache_arr->getCacheAssocArrID('manufacturer','manufacturer','manufacturer_id');


        $singleRequestURI=Def\Route::textSeparator(Def\Route::$uri_parts[0],'-');
        if(Def\Validator::paternInt($singleRequestURI[0])){
            //если цифра
            if(Def\Opt::$lang=='ru'){
                $this->ruProductShow();

            }

        }else{//не цифра
            $this->viewText('def_content','default_img');
        }
    }else Def\Route::$module404=true;
  }


  private function ruProductShow(){

      print_r($this->manufacturer);

      Def\Opt::$r_content=''.$this->manufacturer[3]["name"];
      //берём массив производителей
      //$this->manuf_laptop_arr=$cache_arr->getCacheAssocArr('manufacturer_laptop','manufacturer WHERE laptop IS TRUE');
  }





}