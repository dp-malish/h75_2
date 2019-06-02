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

      Def\Opt::$css='<link rel="stylesheet" type="text/css" href="/shop.css">
';

      $DB=new Def\SQLi();

      //$sql='SELECT heading,category,link,model,model_short,    image,manufacturer_id,short_text FROM nomenclature WHERE nomenclature_id='.$DB->realEscapeStr($id);


      $sql='SELECT heading,category,link,model,model_short,    image,manufacturer_id,short_text FROM nomenclature WHERE nomenclature_id='.$DB->realEscapeStr($id);

      $res=$DB->strSQL($sql);

      if($res['link']==$link){
          if($res['model_short']!='')$res['model_short']=' ('.$res['model_short'].')';

          Def\Opt::$title='Купить '.$res['model'].$res['model_short'].' в Мариуполе и Украине. Лучшая цена $, доставка ✈, гарантия ☑. Характеристики '.$res['model'].$res['model_short'].'.';

          Def\Opt::$description='Купить '.$res['model'].$res['model_short'].'. Низкие цены на продукцию со склада в Мариуполе. Заказывай на сайте ⭐ забирай сегодня! ☑ Оперативная доставка ✈ по всей территории Украины';


          if($res['image']!=''){

              $img='<div class="m_img"><div class="m_img_l">';

              $img_arr=Def\Route::textSeparator($res['image'],',');

              $temp_img='';

              foreach($img_arr as $v){
                  $temp_img.='<div class="m_img_l_i"><img class="" src="/img/shop/dbpic.php?id='.$v.'" alt="No image"></div>';
              }
              $img.=$temp_img.'<div class="cl"></div></div>';

              $img.='<div class="m_img_c">';
              $img.=$img_arr[0].' ============  ';
              $img.='</div>';

              $img.='<div class="cl"></div></div>';

          }else{
              $img='<img class="fl five img_link" src="/img/shop/dbpic.php?i=no_image&ep=1" alt="No image">';
          }



          /*if($res['img']!=''){$img='<img class="fl five img_link" src="'.SqlTable::getImgDirTable($table_name_img).$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">';}else{$img='';}*/


//Заглавие
          Def\Opt::$main_content.='<div class="fon_c"><h3 class="ar">'.$res['model'].$res['model_short'].'</h3><div class="cl"></div>';
//Картинки
          Def\Opt::$main_content.=$img;
//.Производитель
          Def\Opt::$main_content.='<br>'.$this->manufacturer[$res['manufacturer_id']]['name'];

          Def\Opt::$main_content.=Def\Validator::html_decod($res['short_text']);

          Def\Opt::$main_content.='<div class="cl"></div></div>';

//*******************************************************************
//*******************************************************************
//*******************************************************************
          $sql='SELECT spec_name.specifications_name,nom_spec.value, nom_spec.important FROM nomenclature_specifications AS nom_spec 
                LEFT JOIN specifications_name AS spec_name ON nom_spec.specifications_name_id=spec_name.id 
                WHERE nom_spec.nomenclature_id='.$DB->realEscapeStr($id);
          $res=$DB->arrSQL($sql);
          if($res){
              Def\Opt::$main_content.='<div class="fon_c">';

              $temp_nom_spec='';

              foreach($res as $v){
                  if($v['important'])$temp_nom_spec.='<p>'.$v['specifications_name'].'  --   '.$v['value'].'</p>';
                  Def\Opt::$main_content .= '<p>'.$v['specifications_name'].'  --   '.$v['value'].'</p>';
              }
              if($temp_nom_spec)Def\Opt::$main_content .='<div class="fon_c">Основные характеристики: '.$temp_nom_spec.'<div class="cl"></div></div>';

              Def\Opt::$main_content.='<div class="cl"></div></div>';
          }
//*******************************************************************
//*******************************************************************
//*******************************************************************

      }

      //print_r($this->manufacturer);

      Def\Opt::$r_content=''.$this->manufacturer[2]["name"];
      //берём массив производителей
      //$this->manuf_laptop_arr=$cache_arr->getCacheAssocArr('manufacturer_laptop','manufacturer WHERE laptop IS TRUE');
  }





}