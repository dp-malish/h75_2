<?php
/**
 * Created by PhpStorm.
 * User: Аватар
 * Date: 04.05.2018
 * Time: 02:42
 */
namespace incl\vt\Menu;
use lib\Def as Def;

class RMNewUser{

  static function getContent($live_user){
    if(!is_null(Def\Cache_File::$cash)){
      $f='common/new_user'.$live_user.'.html';
      $new_user=Def\Cache_File::$cash->IsSetCacheFile($f);
      if($new_user=='0'){
        Def\Cache_File::$cash->StartCache();
        $res=Def\SQListatic::arrSQL_('SELECT userid,username,joindate,usergroupid,displaygroupid FROM user ORDER BY userid DESC LIMIT 7');
        $new_user='<div class="fon"><div class="fon_head"><h4>Новые пользователи:</h4></div><table class="forum_user">';
        foreach($res as $k=>$v){
          $res_date=date(DATE_ATOM,$v["joindate"]);
          $res_date_m=substr($res_date,4,4);
          $res_date_d=substr($res_date,8,2);
          $res_date_y=substr($res_date,2,2);
          $res_date=$res_date_d.$res_date_m.$res_date_y.'г';
          if($live_user==1){
            $new_user.='<tr><td class="td_linc"><a href="http://forum.vt-fishing.com.ua/members/user-'.$v["userid"].'/" target="_blank">'.$v["username"].'</a></td><td class="td_date  align-center">'.$res_date.'</td></tr>';
          }else{
            $new_user.='<tr><td class="td_linc">'.$v["username"].'</td><td class="td_date  align-center">'.$res_date.'</td></tr>';
          }
        }
        $new_user.='</table></div>';
        echo $new_user;
        Def\Cache_File::$cash->StopCache($f);
      }
      return $new_user;
    }else return '';
  }

}