<?php
/**
 * Статистика форума на индекс странице
 */
namespace incl\vt\Index;
use lib\Def as Def;

class StatForum extends Def\Gzip{

  function __construct(){
    header("Content-type: text/txt; charset=UTF-8");
    $sql="SELECT thread.threadid AS link_main, thread.title AS link_main_title,
thread.lastposter AS user_name,thread.lastposterid AS user_id,
thread.lastpost AS last_date,
thread.forumid AS forum_id,
thread.replycount AS answer,
thread.views AS views,
forum.title AS forum
FROM thread LEFT OUTER JOIN forum ON thread.forumid = forum.forumid
WHERE thread.forumid NOT IN (0) AND thread.visible = 1 AND thread.lastpostid > 0 ORDER BY thread.lastpost DESC LIMIT 8";
    $main_content='<div class="fon stat_forum"><div class="fon_head"><h4>Последние сообщения форума:</h4></div><table class="ac"><tr><td>Тема</td><td>Дата</td><td>Автор</td><td>Отв.</td><td>Просм.</td><td>Форум</td></tr>';
    $DB=new Def\SQLi();
    $res=$DB->arrSQL($sql);
    foreach($res as $k=>$v){
      if(iconv_strlen($v["link_main_title"],'UTF-8')>28){
      $res_forum_tema=mb_substr($v["link_main_title"],0,27,'utf-8');$res_forum_tema.='...';
      }else{$res_forum_tema=$v["link_main_title"];}
      $res_date=date(DATE_ATOM,$v["last_date"]);
      $res_date_m=substr($res_date,4,3);$res_date_d=substr($res_date,8,2);$res_date_h=substr($res_date,11,5);
      $res_date=$res_date_d.$res_date_m.', '.$res_date_h;
      if(iconv_strlen($v["forum"],'UTF-8')>22){
        $res_forum=mb_substr($v["forum"],0,21,'utf-8');$res_forum.='...';
      }else{$res_forum=$v["forum"];}
      $main_content.='<tr><td><a href="http://forum.vt-fishing.com.ua/showthread.php?t='.$v["link_main"].'" title="'.$v["link_main_title"].'" target="_blank">'.$res_forum_tema.'</a></td><td>'.$res_date.'</td><td><a href="http://forum.vt-fishing.com.ua/members/user-'.$v["user_id"].'/" target="_blank">'.$v["user_name"].'</a></td><td>'.$v["answer"].'</td><td>'.$v["views"].'</td><td><a href="http://forum.vt-fishing.com.ua/forumdisplay.php?f='.$v["forum_id"].'" title="'.$v["forum"].'" target="_blank">'.$res_forum.'</a></td></tr>';
    }
    $main_content.='</table></div>';
    $this->SendGzip($main_content);
  }
}