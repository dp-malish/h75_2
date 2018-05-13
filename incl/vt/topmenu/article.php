<?php
/**Article вывод страниц*/
namespace incl\vt\topMenu;
use lib\Def as Def;
class Article{
  private $msg=3;
  private $table_name='zzz_article';

  private $title='Статьи о рыбалке';
  private $description='Статьи о рыбалке. Для начинающих рыбаков и профессионалов. ';
  private $keywords='Статьи о рыбалке, статьи';

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
    Def\Opt::$main_content.='<section><h2>Статьи</h2>'.Def\Str_navigation::$navigation.'<div class="cl"></div>'.$this->viewListContent($start).'<div class="cl"></div>'.Def\Str_navigation::$navigation.'</section>';
  }

  private function viewListContent($start=1){
    $res=Def\SQListatic::arrSQL_('SELECT links,title,caption,level,data,short_text FROM '.$this->table_name.' ORDER BY id DESC LIMIT '.Def\Str_navigation::$start_nav.','.$this->msg);
    if($res){
      $content='';
      foreach($res as $k=>$v){
        $this->description.=$v['title'].', ';//добавить все
        $content.='<div class="fon_c"><article><a href="/'.Def\Route::$uri_parts[0].'/'.$v['links'].'"><h3 class="ac">'.$v['caption'].'</h3></a><div class="rel"><div class="fl data">Сложность материала: <div class="level '.$v["level"].'"></div></div><div class="fr data">Дата публикации: <time>'.$v["data"].'</time></div></div><div class="cl"></div>
<div class="text_article">'.$v['short_text'].'</div><div class="to_link"><a href="/article/'.$v["links"].'">Читать подробнее</a></div></article><div class="cl"></div></div>';
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
    $res=$DB->strSQL('SELECT links,meta_d,meta_k,title,caption,level,data,full_text FROM '.$this->table_name.' WHERE links='.$DB->realEscapeStr(Def\Route::$uri_parts[1]));
    if($res['title']!=''){
      Def\Opt::$title=$res['title'];
      Def\Opt::$description=$res['meta_d'];
      Def\Opt::$keywords=$res['meta_k'];
      Def\Opt::$main_content.='<section><div class="fon_c"><article><h3>'.$res['caption'].'</h3><div class="cl"></div><p><a href="/'.Def\Route::$uri_parts[0].'/" onclick="button_back(\'article/\');return false;" rel="nofollow">&#9668;&mdash;</a><br></p><div class="rel"><div class="fl data">Сложность материала: <div class="level '.$res["level"].'"></div></div><div class="fr data">Дата публикации: '.$res["data"].'</div></div><div class="cl"></div>'.$res['full_text'].'<p><a href="/'.Def\Route::$uri_parts[0].'/" onclick="button_back(\'article/\');return false;" rel="nofollow">&#9668;&mdash; Вернуться к меню обзоров</a></p></article><div class="cl"></div></div></section>';
    }else{Def\Route::$module404=true;}
  }
}