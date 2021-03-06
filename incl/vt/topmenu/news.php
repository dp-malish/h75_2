<?php
namespace incl\vt\topMenu;
use lib\Def as Def;
/**
 * Класс отвечает полностью за новости
 */
class News{
  private $msg=3;
  private $table_name='news';

  private $title='Новости рыбалова - Новости с водоёмов';
  private $description='Новости рыбалки. Рыбалка. Новости с водоемов...';
  private $keywords='новости, рыбалка, новости с водоёмов';


  function __construct(){
    if(!isset(Def\Route::$uri_parts[1])){
      $this->viewList();
    }elseif(isset(Def\Route::$uri_parts[1]) && !isset(Def\Route::$uri_parts[2])){
      if(Def\Validator::paternStrLink(Def\Route::$uri_parts[1])){
        if(Def\Validator::paternInt(Def\Route::$uri_parts[1])){//если цифра
          if(Def\Route::$uri_parts[1]==1){
            Def\Route::location301('/'.Def\Route::$uri_parts[0].'/');
          }else $this->viewList(Def\Route::$uri_parts[1]);
        }else{//если текст
          $this->viewText();}
      }else Def\Route::$module404=true;
    }else Def\Route::$module404=true;
  }

  private function viewList($start=1){
    Def\Str_navigation::navigation(Def\Route::$uri_parts[0],$this->table_name,$start,$this->msg,true);
    Def\Opt::$main_content.='<section><h2>Новости рыбалова</h2>'.Def\Str_navigation::$navigation.'<div class="cl"></div>'.$this->viewListContent($start).'<div class="cl"></div>'.Def\Str_navigation::$navigation.'</section>';
  }


  private function viewListContent($start=1){
    $res=Def\SQListatic::arrSQL_('SELECT id,link,title,meta_d,meta_k,caption,data,
	img_s,img_alt_s,img_title_s,short_text FROM '.$this->table_name.' ORDER BY id DESC LIMIT '.Def\Str_navigation::$start_nav.','.$this->msg);
    if($res){
      $content='';
      foreach($res as $k=>$v){
        if($v['img_s']!=''){$img_s='<a href="/'.Def\Route::$uri_parts[0].'/'.$v['link'].'"><img class="fl five img_link" src="/img/news/pic.php?id='.$v['img_s'].'" alt="'.$v['img_alt_s'].'" title="'.$v['img_title_s'].' - узнать подробнее..."></a>';}else{$img_s='';}
        $this->description.=$v['title'].', ';//добавить все

        $content.='<div class="fon_c"><article><a href="/'.Def\Route::$uri_parts[0].'/'.$v['link'].'"><h4 class="ac">'.$v['caption'].'</h4></a><div><div class="fr b">Дата публикации: <time>'.$v["data"].'</time></div><div class="cl"></div>'.$img_s.$v['short_text'].'</article><div class="cl"></div></div>';
      }
      if($start!=1)$this->title.=' страница '.$start;
      Def\Opt::$title=$this->title;
      Def\Opt::$description=$this->description.='подробнее...';
      Def\Opt::$keywords=$this->keywords;

      return $content;
    }else Def\Route::$module404=true;
  }

  private function viewText(){
  $DB=new Def\SQLi();
  $res=$DB->strSQL('SELECT link,title,meta_d,meta_k,caption,img,img_alt,img_title,full_text FROM '.$this->table_name.' WHERE link='.$DB->realEscapeStr(Def\Route::$uri_parts[1]));
  if($res['title']!=''){
    Def\Opt::$title=$res['title'];
    Def\Opt::$description='Обзор рыболовных аксессуаров вместе с школой рыболова. '.$res['meta_d'];
    Def\Opt::$keywords=$res['meta_k'];
    if($res['img']!=''){$img='<img class="fl five img_link" src="/img/news/pic.php?id='.$res['img'].'" alt="'.$res['img_alt'].'" title="'.$res['img_title'].'">';}else{$img='';}
    Def\Opt::$main_content.='<section><div class="fon_c"><article><h3>'.$res['caption'].'</h3><div class="cl"></div><p><a href="/'.Def\Route::$uri_parts[0].'/" onclick="button_back(\'news/\');return false;" rel="nofollow">&#9668;&mdash;</a><br></p>'.$img.$res['full_text'].'<p><a href="/'.Def\Route::$uri_parts[0].'/" onclick="button_back(\'news/\');return false;" rel="nofollow">&#9668;&mdash; Вернуться к меню обзоров</a></p></article><div class="cl"></div></div></section>';
  }else{Def\Route::$module404=true;}
}
}