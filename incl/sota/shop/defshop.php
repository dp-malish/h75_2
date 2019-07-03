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

      Def\Opt::$css='<link rel="stylesheet" type="text/css" href="/shop.css">';
      Def\Opt::$css.='<link rel="stylesheet" type="text/css" href="/colorbox.css">';
      Def\Opt::$jscript='<script async src="/js/jq.php" type="text/javascript"></script>';

      $DB=new Def\SQLi();

      $id_DB=$DB->realEscapeStr($id);

      $res=$DB->strSQL('SELECT n.nomenclature_id,n.heading,n.category,n.link,n.model,n.model_short,    n.stock_status_id,n.image,n.manufacturer_id,n.short_text,n.markup,       MAX(p.price_usd) AS price
FROM nomenclature AS n RIGHT JOIN product AS p ON n.nomenclature_id=p.nomenclature_id
WHERE n.nomenclature_id='.$id_DB.' AND p.price_usd_sell IS NULL;');

      if($res['link']==$link){
          $model_short=($res['model_short']!=''?' ('.$res['model_short'].')':'');

          Def\Opt::$title='Купить '.$res['model'].$model_short.' в Мариуполе и Украине. Лучшая цена $, доставка ✈, гарантия ☑. Характеристики '.$res['model'].$model_short.'.';

          Def\Opt::$description='Купить '.$res['model'].$model_short.'. Низкие цены на продукцию со склада в Мариуполе. Заказывай на сайте ⭐ забирай сегодня! ☑ Оперативная доставка ✈ по всей территории Украины';




//*********************************************************
          $l_img_col='';
          if($res['image']!=''){
              $l_img_col.='<div class="m_img_l">';
              $img_arr=Def\Route::textSeparator($res['image'],',');
              $temp_img='';
              foreach($img_arr as $v){
                  $temp_img.='<div class="m_img_l_i"><img class="br colorbox" data-some-colorbox="/img/shop/dbpic.php?id='.$v.'" src="/img/shop/dbpic.php?id='.$v.'" alt="'.$res['model'].'"></div>';
              }
              $l_img_col.=$temp_img.'<div class="cl"></div></div>';
              $pic='<img id="m_main_img" class="br colorbox" src="/img/shop/dbpic.php?id='.$img_arr[0].'" alt="'.$res['model'].'">';
          }else{$pic='<img class="fl five br" src="/img/shop/dbpic.php?i=no_image&ep=1" alt="No image">';}
//*************
          $r_img_col='<div class="m_img_c_r">';

          if($res['stock_status_id']){
              $r_img_col.='<div class="m_price_old">'.$res['price']*$res['markup'].'$</div>';
              $r_img_col.='<div class="m_price">'.$res['price']*$res['stock_status_id'].'$</div>';
          }else{
              $r_img_col.='<div class="m_price">'.$res['price']*$res['markup'].'$</div>';
          }




          $r_img_col.='<div class="m_btn_buy">Купить</div>

<div class="ac">Производитель: '.$this->manufacturer[$res['manufacturer_id']]['name'].'</div>

</div>';
          //Вывод блока картинок
          $img='<div class="m_img rel">'.$l_img_col.'<div class="m_img_c rel">'.$r_img_col.'<div class="m_img_c_m ac rel five_">'.$pic.'</div></div><div class="cl"></div></div>';

//*********************************************************


//*******************************************************************
//*******************************************************************
//*******************************************************************

          $res_spec=$DB->arrSQL('SELECT spec_name.specifications_name,nom_spec.value, nom_spec.important FROM nomenclature_specifications AS nom_spec 
                LEFT JOIN specifications_name AS spec_name ON nom_spec.specifications_name_id=spec_name.id 
                WHERE nom_spec.nomenclature_id='.$id_DB);
          if($res_spec){
              Def\Opt::$main_content.='<div class="fon_c"><div class="b m_spec">Характеристики '.$model_short.'</div>';

              $nom_spec='Основные характеистики:';
              $all_spec='Все характеристики:';

              foreach($res_spec as $v){
                  if($v['important'])$nom_spec.='<p>'.$v['specifications_name'].'  --   '.$v['value'].'</p>';
                  else $all_spec.='<p>'.$v['specifications_name'].'  --   '.$v['value'].'</p>';
              }
              if($nom_spec)Def\Opt::$main_content .=$nom_spec.$all_spec;

              Def\Opt::$main_content.='<div class="cl"></div></div>';
          }
//*******************************************************************
//*******************************************************************
//*******************************************************************










//Заглавие
          Def\Opt::$main_content.='<div class="fon"><h3 class="">'.$res['model'].'<br>'.$model_short.'</h3><div class="cl"></div>';

          //************* Код товара *************\\
          $kod=strlen($res['nomenclature_id']);
          if($kod==1)$kod='0000';
          elseif($kod==2)$kod='000';
          elseif($kod==3)$kod='00';
          elseif($kod==4)$kod='0';
          Def\Opt::$main_content.='<div class="m_divisor">Код товара #'.$kod.$res['nomenclature_id'].' > Описание > Характеристики</div>';
          //************* Код товара *************\\
//Картинки
          Def\Opt::$main_content.=$img;
//Меню товара
          Def\Opt::$main_content.='<div class="m_divisor_b">Описание > Характеристики</div>';


          Def\Opt::$main_content.='<div class="fon_c"><div class="b m_spec">Описание товара</div><h4>'.$res['model'].'</h4>'.Def\Validator::html_decod($res['short_text']).'</div>';

          Def\Opt::$main_content.='<div class="cl"></div></div>';



      }

      //print_r($this->manufacturer);

      Def\Opt::$r_content=''.$this->manufacturer[2]["name"];
      //берём массив производителей
      //$this->manuf_laptop_arr=$cache_arr->getCacheAssocArr('manufacturer_laptop','manufacturer WHERE laptop IS TRUE');
  }





}