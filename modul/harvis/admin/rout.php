<?php
namespace lib\Def;
try{if(Route::$count_uri_parts>3){throw new Exception();}else{
    //all_page
    require'../modul/'.Opt::$dir_name_site.'/admin/common/options.php';//тут выход - он первый
    require'../modul/'.Opt::$dir_name_site.'/admin/common/clear_cache.php';
    require'../modul/'.Opt::$dir_name_site.'/admin/common/sitemap.php';
    require'../modul/'.Opt::$dir_name_site.'/admin/common/img.php';

    if(!isset(Route::$uri_parts[1])){
        Opt::$main_content='<div class="fon_c"><h3>Настройки</h3>
<ul>
<li><a href="/'.Route::$uri_parts[0].'/общие-страницы/">Общие страницы</a></li>
<li><a href="/'.Route::$uri_parts[0].'/общие-страницы/?update">Общие страницы редактировать</a></li>
</ul>
<br>
<ul>
<li><a href="/'.Route::$uri_parts[0].'/статьи/">Статьи</a></li>
<li><a href="/'.Route::$uri_parts[0].'/статьи/?update">Статьи редактировать</a></li>
</ul>
<br>
<ul>
<li><a href="/'.Route::$uri_parts[0].'/галерея/">Галерея</a></li>

</ul>
</div>';
    }elseif(isset(Route::$uri_parts[1])&& !isset(Route::$uri_parts[2])){
        switch(Route::$uri_parts[1]){

            case 'картинки':include'../modul/'.Opt::$dir_name_site.'/admin/img/main.php';break;
            case 'картинки-изменить':include'../modul/'.Opt::$dir_name_site.'/admin/img/main.php';break;
            //*************************

            case 'общие-страницы':include'../modul/'.Opt::$dir_name_site.'/admin/section/def.php';break;
            case 'статьи':include'../modul/'.Opt::$dir_name_site.'/admin/section/article.php';break;
            case 'галерея':include'../modul/'.Opt::$dir_name_site.'/admin/section/gallery.php';break;

            default:Opt::$main_content.='Нет такой страницы )))';
        }
    }elseif(isset(Route::$uri_parts[2])&& !isset(Route::$uri_parts[3])){
        Opt::$main_content.='роут3';
    }
}}catch(Exception $e){Route::$module404=true;}