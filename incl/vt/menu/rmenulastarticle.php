<?php
/**
 * Правое меню
 * Последние статьи
 */
namespace incl\vt\Menu;
use lib\Def as Def;
class RMenuLastArticle{

  static function getContent(){
    if(!is_null(Def\Cache_File::$cash)){
      $f='common/last_article.html';
      $last_article=Def\Cache_File::$cash->IsSetCacheFile($f);
      if($last_article=='0'){
        Def\Cache_File::$cash->StartCache();
        $res=Def\SQListatic::arrSQL_('SELECT links,title,level,data FROM zzz_article ORDER BY id DESC LIMIT 5');
        $last_article='<div class="fon"><div class="fon_head"><h4>Последние статьи:</h4></div><table class="forum_user">';
        foreach($res as $k=>$v){
          $res_date_m=substr($v["data"], 4, 4);
          $res_date_d=substr($v["data"], 8, 2);
          $res_date_y=substr($v["data"], 2, 2);
          $res_date=$res_date_d.$res_date_m.$res_date_y.'г';
          $last_article.='<tr><td class="td_linc align-left"><a href="/article/'.$v["links"].'">'.$v["title"].'</a></td><td class="td_date align-center">'.$res_date.'</td></tr>';
        }
        $last_article.='</table></div>';
        echo $last_article;
        Def\Cache_File::$cash->StopCache($f);
      }
      return $last_article;
    }else return '';
  }
}