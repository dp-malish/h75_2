<?php
namespace lib\Def;
try{if(Route::$count_uri_parts>3){throw new Exception();}else{
    //all_page
    require'../modul/'.Opt::$dir_name_site.'/admin/common/options.php';//тут выход - он первый
    require'../modul/'.Opt::$dir_name_site.'/admin/common/img.php';
    require'../modul/'.Opt::$dir_name_site.'/admin/common/clear_cache.php';
    require'../modul/'.Opt::$dir_name_site.'/admin/common/sitemap.php';

    require'../modul/'.Opt::$dir_name_site.'/admin/common/download.php';

    if(!isset(Route::$uri_parts[1])){
      /*$DB=new SQLi();
      $res=$DB->arrSQL('SELECT id,data FROM feedback WHERE readed IS NULL');
      Opt::$main_content.='<div class="fon_c">';
      if($res){
        Opt::$main_content.='<ul class="nav_link">';
        foreach($res as $k=>$v){Opt::$main_content.='<li><a href="/'.$uri_parts[0].'/сообщение/'.$v['id'].'">Вам прислали сообщение в '.Data::IntToStrDateTime($v['data']).'</a></li>';}
        Opt::$main_content.='</ul>';
      }else Opt::$main_content.='<p>Уведомлений нет...</p>';
      Opt::$main_content.='</div>';*/

      Opt::$main_content.='<div class="fon_c"><h3>Настройки</h3>
<!--<ul>
<li><a href="/'.Route::$uri_parts[0].'/общие-страницы/">Общие страницы</a></li>
<li><a href="/'.Route::$uri_parts[0].'/общие-страницы/?update">Общие страницы редактировать</a></li>
</ul>
<br>
<ul>
<li><a href="/'.Route::$uri_parts[0].'/блог/">Блог</a></li>
<li><a href="/'.Route::$uri_parts[0].'/блог-редактировать/">Блог редактировать</a></li>
</ul>-->
</div>';



    }elseif(isset(Route::$uri_parts[1])&& !isset(Route::$uri_parts[2])){
        switch(Route::$uri_parts[1]){
            case 'картинки':include'../modul/'.Opt::$dir_name_site.'/admin/img/main.php';break;
            case 'картинки-пакетно':include'../modul/'.Opt::$dir_name_site.'/admin/img/main.php';break;
            case 'картинки-изменить':include'../modul/'.Opt::$dir_name_site.'/admin/img/main.php';break;
            //*************************

            case 'прошивальщики':include'../modul/'.Opt::$dir_name_site.'/admin/download/firmware.php';break;


            //case 'общие-страницы':include'../modul/'.$dir_site.'/admin/section/blog_def.php';break;
            //case 'блог':include'../modul/'.$dir_site.'/admin/section/blog.php';break;
            //case 'блог-редактировать':include'../modul/'.$dir_site.'/admin/section/blog_links.php';break;
            //case 'статьи':include'../modul/'.$dir_site.'/admin/section/article.php';break;

            default:Opt::$main_content.='Нет такой страницы )))';
        }
    }elseif(isset(Route::$uri_parts[2])&& !isset(Route::$uri_parts[3])){
        switch(Route::$uri_parts[1]){
            //case'блог':include'../modul/'.$dir_site.'/admin/section/blog.php';break;
            //case'сообщение':include'../modul/'.Opt::$dir_name_site.'/admin/section/feedback.php';break;
            default:Opt::$main_content.='Нет такой странички )';
        }
    }
}}catch(Exception $e){Route::$module404='1';}