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


        $singleRequestURI=Def\Route::textSeparator(Def\Route::$uri_parts[0],'-',2);

        if(Def\Validator::paternInt($singleRequestURI[0])){
            //если цифра
            if(Def\Opt::$lang=='ru'){
                $this->ruProductShow($singleRequestURI[0],$singleRequestURI[1]);

            }

        }else{//не цифра
            $this->viewText('def_content','default_img');
        }
    }else Def\Route::$module404=true;
  }


  private function ruProductShow($id,$link){

      $DB=new Def\SQLi();

      $sql='SELECT heading,category,link,model,model_short,    image FROM nomenclature'.' WHERE nomenclature_id='.$DB->realEscapeStr($id);

      $res=$DB->strSQL($sql);

      if($res['link']==$link){
          if($res['model_short']!='')$res['model_short']=' ('.$res['model_short'].')';

          Def\Opt::$title='Купить '.$res['model'].$res['model_short'].' в Мариуполе и Украине. Лучшая цена $, доставка ✈, гарантия ☑. Характеристики '.$res['model'].$res['model_short'].'.';

          Def\Opt::$description='Купить '.$res['model'].$res['model_short'].'. Низкие цены на продукцию со склада в Мариуполе. Заказывай на сайте ⭐ забирай сегодня! ☑ Оперативная доставка ✈ по всей территории Украины';


          if($res['image']!=''){
              $img=Def\Route::textSeparator($res['image'],',');

              $temp_img='';

              foreach($img as $v){
                  $temp_img.='<p>'.$v.' ++++'.($v+777).'</p>';
              }

              $img=$img[0].' ============  '.  $temp_img;


          }else{
              $img='<img class="fl five img_link" src="/img/shop/dbpic.php?i=no_image&ep=1" alt="No image">';
          }



          /*if($res['img']!=''){$img='<img class="fl five img_link" src="'.SqlTable::getImgDirTable($table_name_img).$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">';}else{$img='';}*/



          Def\Opt::$main_content.='<section><div class="fon_c"><article><h3 class="ar">'.$res['model'].$res['model_short'].'</h3><div class="cl"></div>'.$img.

              Def\Validator::html_decod($res['image']).

              '<p>'.'</p></article><div class="cl"></div></div></section>';




      }

      //print_r($this->manufacturer);

      Def\Opt::$r_content=''.$this->manufacturer[3]["name"];
      //берём массив производителей
      //$this->manuf_laptop_arr=$cache_arr->getCacheAssocArr('manufacturer_laptop','manufacturer WHERE laptop IS TRUE');
  }





}