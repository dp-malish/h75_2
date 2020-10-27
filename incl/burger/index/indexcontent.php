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

    private $ves=[
        'ru'=>'гg',
        'uk'=>'г',
        ];

  function __construct(){

      $lng=new BurDef\Template();

      $DB=new Def\SQLi();
      $res=$DB->arrSQL('SELECT id,category,link_turn,cap_'.Def\Opt::$lang.',img,img_alt_'.Def\Opt::$lang.',
      img_title_'.Def\Opt::$lang.',short_text_'.Def\Opt::$lang.',kind,price,hit FROM food ORDER BY category');

      $burger_txt='';
      $nuggets_txt='';

      if($res){//$v['category']
          foreach($res as $k=>$v){
              switch($v['category']){
                  case 1:$burger_txt.=$this->unitTemplates($v['img'],$v['img_alt_'.Def\Opt::$lang],$v['img_title_'.Def\Opt::$lang],$v['id'],$v['price'],$v['hit'],$v['kind'],$this->ves[Def\Opt::$lang]);
              }
          }
      }else{Def\Route::$module404=true;}




      (Def\Opt::$lang_alternate!=''?Def\Opt::$lang_alternate_link='<link rel="alternate" hreflang="'.Def\Opt::$lang_alternate.'" href="'.Def\Opt::$protocol.Def\Opt::$site.'/'.(Def\Opt::$lang_alternate!='ru'?Def\Opt::$lang_alternate.'/':'').'">':'');

      Def\Opt::$title=$this->title[Def\Opt::$lang];
      Def\Opt::$description=$this->description[Def\Opt::$lang];

      Def\Opt::$main_content.='<div id="burger-section"><h2>'.$lng::$caption_burger[Def\Opt::$lang].'</h2></div><div class="tile dwfe maxw">'.$burger_txt.'</div>';

      Def\Opt::$main_content.='<div id="pizza-section"><h2>'.$lng::$caption_pizza[Def\Opt::$lang].'</h2></div><br><br><br><br><br><br><br><br>';

      Def\Opt::$main_content.='<div id="nuggets-section"><h2>'.$lng::$caption_nuggets[Def\Opt::$lang].'</h2></div><div class="tile dwfe maxw">'.$nuggets_txt.'</div>';

      Def\Opt::$main_content.='<div id="beverages-section"><h2>'.$lng::$caption_beverages[Def\Opt::$lang].'</h2></div><br><br><br><br><br><br><br><br>';
  }
  private function unitTemplates($img,$img_alt,$img_title,$id,$price,$hit,$kind,$kind_ext){
      if($img!=''){$img='<img src="'.BurDef\SqlTable::getImgDirTable('food_img').$img.'" alt="'.$img_alt.'" title="'.$img_title.'">';}else{$img='';}
      $txt='<div class="unit" data-id="'.$id.'" data-price="'.$price.'"><div class="unit_img">'.$img.'</div>';
      if($hit){$txt.='<div class="unit_hit"></div>';}
      ///если бургер шаблон
      $txt.='<div class="unit_kind_bur">'.$kind.' '.$kind_ext.'</div>';
      $txt.='<div class="unit_capt">'.$v['cap_'.Def\Opt::$lang].'</div>';
      $txt.='<div class="unit_hint">'.$v['short_text_'.Def\Opt::$lang].'</div>';
      $txt.='<div class="unit_price">'.$v['price'].' ₴</div>';
      $txt.='</div>';
      return $txt;
  }

}