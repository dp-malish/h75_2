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

    private $ves=['ru'=>'г','uk'=>'г'];
    private $vesH2O=['ru'=>'мл','uk'=>'мл'];
    private $sm=['ru'=>'см','uk'=>'см'];
    private $cool_drink=['ru'=>'Холодные напитки','uk'=>'Холодні напої'];
    private $hot_drink=['ru'=>'Горячие напитки','uk'=>'Гарячі напої'];

  function __construct(){
      $lng=new BurDef\Template();
      $DB=new Def\SQLi();
      $res=$DB->arrSQL('SELECT id,category,link_turn,cap_'.Def\Opt::$lang.',img,img_alt_'.Def\Opt::$lang.',
      img_title_'.Def\Opt::$lang.',short_text_'.Def\Opt::$lang.',kind,price,hit FROM food ORDER BY category');
      $burger_txt='';
      $pizza_txt='';
      $nuggets_txt='';
      $cool_drink_txt='';
      $hot_drink_txt='';
      if($res){//$v['category']
          foreach($res as $k=>$v){
              switch($v['category']){
                  case 1:$burger_txt.=$this->unitTemplates($v['img'],$v['img_alt_'.Def\Opt::$lang],$v['img_title_'.Def\Opt::$lang],$v['id'],$v['price'],$v['hit'],$v['kind'],$this->ves[Def\Opt::$lang],$v['cap_'.Def\Opt::$lang],$v['short_text_'.Def\Opt::$lang],'unit_2');
                  break;
                  case 2:
                      $kind=json_decode($v['kind']);
                      $pizza_txt.=$this->unitTemplatesKind2($v['img'],$v['img_alt_'.Def\Opt::$lang],$v['img_title_'.Def\Opt::$lang],$v['id'],$v['price'],$v['hit'],$kind,$this->sm[Def\Opt::$lang],$v['cap_'.Def\Opt::$lang],$v['short_text_'.Def\Opt::$lang]);
                  break;
                  case 3://naggets
                      $kind=json_decode($v['kind']);
                      if(is_array($kind)){
                      $nuggets_txt.=$this->unitTemplatesKind2($v['img'],$v['img_alt_'.Def\Opt::$lang],$v['img_title_'.Def\Opt::$lang],$v['id'],$v['price'],$v['hit'],$kind,$this->ves[Def\Opt::$lang],$v['cap_'.Def\Opt::$lang],$v['short_text_'.Def\Opt::$lang],'unit_1');
                      }else{$nuggets_txt.=$this->unitTemplates($v['img'],$v['img_alt_'.Def\Opt::$lang],$v['img_title_'.Def\Opt::$lang],$v['id'],$v['price'],$v['hit'],$v['kind'],$this->ves[Def\Opt::$lang],$v['cap_'.Def\Opt::$lang],$v['short_text_'.Def\Opt::$lang],'unit_1');}
                  break;

                  case 4://холодные напитки
                      $kind=json_decode($v['kind']);
                      $cool_drink_txt.=$this->unitTemplatesKind2($v['img'],$v['img_alt_'.Def\Opt::$lang],$v['img_title_'.Def\Opt::$lang],$v['id'],$v['price'],$v['hit'],$kind,$this->vesH2O[Def\Opt::$lang],$v['cap_'.Def\Opt::$lang],$v['short_text_'.Def\Opt::$lang],'unit_0');
                  break;

                  case 5://горячие напитки
                      $kind=json_decode($v['kind']);
                      $hot_drink_txt.=$this->unitTemplatesKind2($v['img'],$v['img_alt_'.Def\Opt::$lang],$v['img_title_'.Def\Opt::$lang],$v['id'],$v['price'],$v['hit'],$kind,$this->vesH2O[Def\Opt::$lang],$v['cap_'.Def\Opt::$lang],$v['short_text_'.Def\Opt::$lang],'unit_0');
              }
          }
      }else{Def\Route::$module404=true;}




      (Def\Opt::$lang_alternate!=''?Def\Opt::$lang_alternate_link='<link rel="alternate" hreflang="'.Def\Opt::$lang_alternate.'" href="'.Def\Opt::$protocol.Def\Opt::$site.'/'.(Def\Opt::$lang_alternate!='ru'?Def\Opt::$lang_alternate.'/':'').'">':'');

      Def\Opt::$title=$this->title[Def\Opt::$lang];
      Def\Opt::$description=$this->description[Def\Opt::$lang];

      Def\Opt::$main_content.='<div id="burger-section"><h2>'.$lng::$caption_burger[Def\Opt::$lang].'</h2></div><div class="tile dwfe maxw">'.$burger_txt.'</div>';

      Def\Opt::$main_content.='<div id="pizza-section"><h2>'.$lng::$caption_pizza[Def\Opt::$lang].'</h2></div><div class="tile dwfe maxw">'.$pizza_txt.'</div>';

      Def\Opt::$main_content.='<div id="nuggets-section"><h2>'.$lng::$caption_nuggets[Def\Opt::$lang].'</h2></div><div class="tile dwfe maxw">'.$nuggets_txt.'</div>';

      Def\Opt::$main_content.='<div id="beverages-section"><h2>'.$lng::$caption_beverages[Def\Opt::$lang].'</h2></div><h3>'.$this->cool_drink[Def\Opt::$lang].'</h3>
<div class="tile dwfe maxw">'.$cool_drink_txt.'</div>
<h3>'.$this->hot_drink[Def\Opt::$lang].'</h3>
<div class="tile dwfe maxw">'.$hot_drink_txt.'</div>


<script type="text/javascript">
    function selectUnit(el){
        //if(el.classList.contains("unit_kind_pizza_select")){} else{}
            var papa=el.parentNode;
            var arrDiv=papa.getElementsByTagName("div");
            arrDiv[0].classList.remove("unit_kind_pizza_select");
            arrDiv[1].classList.remove("unit_kind_pizza_select");
            el.classList.add("unit_kind_pizza_select");
            var id=papa.parentNode.dataset.id;
            papa.parentNode.dataset.price=el.dataset.price;
        document.getElementById("priceUnit"+id).innerHTML=el.dataset.price+" ₴";
    }
</script>


';
  }


  private function unitTemplates($img,$img_alt,$img_title,$id,$price,$hit,$kind,$kind_ext,$cap,$short_text,$unit_css='unit'){
      if($img!=''){$img='<img src="'.BurDef\SqlTable::getImgDirTable('food_img').$img.'" alt="'.$img_alt.'" title="'.$img_title.'">';}else{$img='';}
      $txt='<div class="'.$unit_css.'" data-id="'.$id.'" data-price="'.$price.'"><div class="unit_img">'.$img.'</div>';
      if($hit){$txt.='<div class="unit_hit"></div>';}
      ///если бургер шаблон
      $txt.='<div class="unit_kind_bur">'.$kind.' '.$kind_ext.'</div>';
      $txt.='<div class="unit_capt">'.$cap.'</div>';
      $txt.='<div class="unit_hint">'.$short_text.'</div>';
      $txt.='<div class="unit_price">'.$price.' ₴</div>';
      $txt.='</div>';
      return $txt;
  }

//вид как у пиццы
  private function unitTemplatesKind2($img,$img_alt,$img_title,$id,$price,$hit,$kind,$kind_ext,$cap,$short_text,$unit_css='unit'){
        if($img!=''){$img='<img src="'.BurDef\SqlTable::getImgDirTable('food_img').$img.'" alt="'.$img_alt.'" title="'.$img_title.'">';}else{$img='';}
        $arr_kind_count=count($kind);
        $price=json_decode($price);
        $kind_html='';
        for($i=0;$i<$arr_kind_count;$i++){
            $kind_html.='<div class="unit_kind_pizza'.($i==0?' unit_kind_pizza_select':'').'" onclick="selectUnit(this);" data-price="'.$price[$i].'">'.$kind[$i].'</div>';
        }
        $txt='<div class="'.$unit_css.'" data-id="'.$id.'" data-price="'.$price[0].'"><div class="unit_img">'.$img.'</div>';
        if($hit){$txt.='<div class="unit_hit"></div>';}
        $txt.='<div class="unit_kind"><span>'.$kind_ext.'</span>'.$kind_html.'</div>';;
        $txt.='<div class="unit_capt">'.$cap.'</div>';
        $txt.='<div class="unit_hint">'.$short_text.'</div>';
        $txt.='<div id="priceUnit'.$id.'" class="unit_price">'.$price[0].' ₴</div>';
        $txt.='</div>';
        return $txt;
    }

}