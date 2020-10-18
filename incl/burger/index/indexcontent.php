<?php
/**Def статью показать*/

namespace incl\burger\Index;
use lib\Def as Def;
use incl\burger\Def\Template;

class IndexContent{

    private $title=[
        'ru'=>'Барин Бургер - Бесплатная доставка еды домой и в офис - бургерная с доставкой по Мариуполю - пицца и бургер',
        'uk'=>'Барін Бургер - Безкоштовна доставка їжі додому і в офіс - Бургерна з доставкою по Маріуполю - піца і бургер'];
    private $description=[
        'ru'=>'Бургерная Барин Бургер в Мариуполе. Доставка вкусной пиццы и бургеров. Бесплатная доставка по Мариуполю.',
        'uk'=>'Бургерна Барін Бургер у Маріуполі. Доставка смачної піци та бургерів. Безкоштовна доставка по Маріуполю.'];

  function __construct(){

      $lng=new Template();

      (Def\Opt::$lang_alternate!=''?Def\Opt::$lang_alternate_link='<link rel="alternate" hreflang="'.Def\Opt::$lang_alternate.'" href="'.Def\Opt::$protocol.Def\Opt::$site.'/">':'');

      Def\Opt::$title=$this->title[Def\Opt::$lang];
      Def\Opt::$description=$this->description[Def\Opt::$lang];

      Def\Opt::$main_content.='<div id="burger-section"><h2>'.$lng::$caption_burger[Def\Opt::$lang].'</h2></div><br><br><br><br><br><br><br><br>';



      Def\Opt::$main_content.='<div id="pizza-section"><h2>'.$lng::$caption_pizza[Def\Opt::$lang].'</h2></div><br><br><br><br><br><br><br><br>';


      Def\Opt::$main_content.='<div id="nuggets-section"><h2>'.$lng::$caption_nuggets[Def\Opt::$lang].'</h2></div><br><br><br><br><br><br><br><br>';

      Def\Opt::$main_content.='<div id="beverages-section"><h2>'.$lng::$caption_beverages[Def\Opt::$lang].'</h2></div><br><br><br><br><br><br><br><br>';

      //$this->viewText('def_content','default_img');




  }

}