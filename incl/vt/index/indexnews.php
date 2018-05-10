<?php
/**
 * Выдать новости на главной странице
 */
namespace incl\vt\Index;
use lib\Def as Def;

class IndexNews{

  static function getContent(){
    if(!is_null(Def\Cache_File::$cash)){
      $f='common/index_news.html';
      $index_news=Def\Cache_File::$cash->IsSetCacheFile($f);
      if($index_news=='0'){
        Def\Cache_File::$cash->StartCache();
        $res=Def\SQListatic::arrSQL_('SELECT link,caption,index_text,data FROM news ORDER BY id DESC LIMIT 1');
        $index_news='<div class="fon"><div class="fon_head"><h4>Последние новости:</h4></div>';
        foreach($res as $k=>$v){
          $res_date_m=substr($v["data"],4,4);
          $res_date_d=substr($v["data"],8,2);
          $res_date_y=substr($v["data"],2,2);
          $res_date=$res_date_d.$res_date_m.$res_date_y.'г';
          $index_news.='<div class="ind_news"><div><h4 class="ac">'.$v["caption"].'</h4>'.$v["index_text"].'</div><div class="cl"></div>
<div>&nbsp;&nbsp;&nbsp;<a href="/news/'.$v["link"].'">Узнать подробнее...</a><div class="ind_news_data align-center fr">'.$res_date.'</div></div></div><div class="cl"></div>';
        }
        $index_news.='</div>';
        echo $index_news;
        Def\Cache_File::$cash->StopCache($f);
      }
      return $index_news;
    }else return '';
  }
}