<?php
/**Def статью показать*/

namespace incl\burger\Index;
use lib\Def as Def;
use incl\burger\Def as BurDef;
//use incl\burger\Def\Template;

class IndexContent{



    private $title=[
        'ru'=>'Барин Бургер - Бесплатная доставка еды домой и в офис - бургерная с доставкой по Мариуполю - пицца и бургер',
        'uk'=>'Барін Бургер - Безкоштовна доставка їжі додому і в офіс - Бургерна з доставкою по Маріуполю - піца і бургер'];
    private $description=[
        'ru'=>'Бургерная Барин Бургер в Мариуполе. Доставка вкусной пиццы и бургеров. Бесплатная доставка по Мариуполю.',
        'uk'=>'Бургерна Барін Бургер у Маріуполі. Доставка смачної піци та бургерів. Безкоштовна доставка по Маріуполю.'];

  function __construct(){

      $lng=new BurDef\Template();

      $DB=new Def\SQLi();
      $res=$DB->arrSQL('SELECT id,category,link_turn,cap_'.Def\Opt::$lang.',img,img_alt_'.Def\Opt::$lang.',
      img_title_'.Def\Opt::$lang.',short_text_'.Def\Opt::$lang.',kind,price,hit FROM food ORDER BY category');

      $burger_txt='';

      if($res){
          $burger_txt='<div class="tile dwfe maxw">';

          foreach($res as $k=>$v){

              if($v['img']!=''){$img='<img src="'.BurDef\SqlTable::getImgDirTable('food_img').$v['img'].'" alt="'.$v['img_alt_'.Def\Opt::$lang].'" title="'.$v['img_title_'.Def\Opt::$lang].'">';}else{$img='';}

              $burger_txt.='<div class="unit" data-id="'.$v['id'].'" data-price="'.$v['price'].'">
                    <div class="unit_img">'.$img.'</div>';
              if($v['hit']){$burger_txt.='<div class="unit_hit"></div>';}

              ///если бургер шаблон
              $burger_txt.='<div class="unit_kind_bur">'.$v['kind'].' г</div>';
              $burger_txt.='<div class="unit_capt">'.$v['cap_'.Def\Opt::$lang].'</div>';
              $burger_txt.='<div class="unit_hint">'.$v['short_text_'.Def\Opt::$lang].'</div>';
              $burger_txt.='<div class="unit_price">'.$v['price'].' ₴</div>';
              //$v['category']
              $burger_txt.='</div>';

          }

          $burger_txt.='</div>';
      }else{Def\Route::$module404=true;}




      (Def\Opt::$lang_alternate!=''?Def\Opt::$lang_alternate_link='<link rel="alternate" hreflang="'.Def\Opt::$lang_alternate.'" href="'.Def\Opt::$protocol.Def\Opt::$site.'/'.(Def\Opt::$lang_alternate!='ru'?Def\Opt::$lang_alternate.'/':'').'">':'');

      Def\Opt::$title=$this->title[Def\Opt::$lang];
      Def\Opt::$description=$this->description[Def\Opt::$lang];

      Def\Opt::$main_content.='<div id="burger-section"><h2>'.$lng::$caption_burger[Def\Opt::$lang].'</h2></div>'.$burger_txt;



      Def\Opt::$main_content.='<div id="pizza-section"><h2>'.$lng::$caption_pizza[Def\Opt::$lang].'</h2></div><br><br><br><br><br><br><br><br>';


      Def\Opt::$main_content.='<div id="nuggets-section"><h2>'.$lng::$caption_nuggets[Def\Opt::$lang].'</h2></div><br><br><br><br><br><br><br><br>';

      Def\Opt::$main_content.='<div id="beverages-section"><h2>'.$lng::$caption_beverages[Def\Opt::$lang].'</h2></div><br><br><br><br><br><br><br><br>';

      //$this->viewText('def_content','default_img');




  }

}