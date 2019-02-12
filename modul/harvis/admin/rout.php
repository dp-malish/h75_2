<?php
try{if($count_uri_parts>3){throw new Exception();}else{
    //all_page
    require'../modul/'.$dir_site.'/admin/common/options.php';//тут выход - он первый
    require'../modul/'.$dir_site.'/admin/common/clear_cache.php';
    require'../modul/'.$dir_site.'/admin/common/sitemap.php';
    require'../modul/'.$dir_site.'/admin/common/img.php';

    if(!isset($uri_parts[1])){
        $main_content='<div class="fon_c"><h3>Настройки</h3>
<ul>
<li><a href="/'.$uri_parts[0].'/общие-страницы/">Общие страницы</a></li>
<li><a href="/'.$uri_parts[0].'/общие-страницы/?update">Общие страницы редактировать</a></li>
</ul>
<br>
<ul>
<li><a href="/'.$uri_parts[0].'/статьи/">Статьи</a></li>
<li><a href="/'.$uri_parts[0].'/статьи/?update">Статьи редактировать</a></li>
</ul>
<br>
<ul>
<li><a href="/'.$uri_parts[0].'/галерея/">Галерея</a></li>
<!--<li><a href="/'.$uri_parts[0].'/статьи/?update">Статьи редактировать</a></li>-->
</ul>
</div>';
    }elseif(isset($uri_parts[1])&& !isset($uri_parts[2])){
        switch($uri_parts[1]){

            case 'картинки':include'../modul/'.$dir_site.'/admin/img/main.php';break;
            case 'картинки-изменить':include'../modul/'.$dir_site.'/admin/img/main.php';break;
            //*************************

            case 'общие-страницы':include'../modul/'.$dir_site.'/admin/section/def.php';break;
            case 'статьи':include'../modul/'.$dir_site.'/admin/section/article.php';break;
            case 'галерея':include'../modul/'.$dir_site.'/admin/section/gallery.php';break;

            default:$main_content.='Нет такой страницы )))';
        }
    }elseif(isset($uri_parts[2])&& !isset($uri_parts[3])){
        $main_content.='роут3';
    }
}}catch(Exception $e){$module='404';}