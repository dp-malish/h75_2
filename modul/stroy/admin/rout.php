<?php
try{if($count_uri_parts>3){throw new Exception();}else{
    //all_page
    require'../modul/'.$dir_site.'/admin/common/options.php';//тут выход - он первый
    require'../modul/'.$dir_site.'/admin/common/img.php';
    /*require'../modul/'.$dir_site.'/admin/common/clear_cache.php';
    require'../modul/'.$dir_site.'/admin/common/sitemap.php';*/

    if(!isset($uri_parts[1])){
        /*$DB=new SQLi();
        $res=$DB->arrSQL('SELECT id,data FROM feedback WHERE readed IS NULL');
        $main_content.='<div class="fon_c">';
        if($res){
            $main_content.='<ul class="nav_link">';
            foreach($res as $k=>$v){$main_content.='<li><a href="/'.$uri_parts[0].'/сообщение/'.$v['id'].'">Вам прислали сообщение в '.Data::IntToStrDateTime($v['data']).'</a></li>';}
            $main_content.='</ul>';
        }else $main_content.='Уведомлений нет...';
        $main_content.='</div>';*/

        \lib\Def\Opt::$main_content.='<div class="fon_c"><h3>Настройки</h3>
<!--<ul>
<li><a href="/'.$uri_parts[0].'/общие-страницы/">Общие страницы</a></li>
<li><a href="/'.$uri_parts[0].'/общие-страницы/?update">Общие страницы редактировать</a></li>
</ul>
<br>
<ul>
<li><a href="/'.$uri_parts[0].'/блог/">Блог</a></li>
<li><a href="/'.$uri_parts[0].'/блог-редактировать/">Блог редактировать</a></li>
</ul>-->
</div>';



    }elseif(isset($uri_parts[1])&& !isset($uri_parts[2])){
        switch($uri_parts[1]){
            case 'картинки':include'../modul/'.$dir_site.'/admin/img/main.php';break;
            case 'картинки-пакетно':include'../modul/'.$dir_site.'/admin/img/main.php';break;
            case 'картинки-изменить':include'../modul/'.$dir_site.'/admin/img/main.php';break;
            //*************************

            //case 'общие-страницы':include'../modul/'.$dir_site.'/admin/section/blog_def.php';break;
            //case 'блог':include'../modul/'.$dir_site.'/admin/section/blog.php';break;
            //case 'блог-редактировать':include'../modul/'.$dir_site.'/admin/section/blog_links.php';break;
            //case 'статьи':include'../modul/'.$dir_site.'/admin/section/article.php';break;

            default:\lib\Def\Opt::$main_content.='Нет такой страницы )))';
        }
    }elseif(isset($uri_parts[2])&& !isset($uri_parts[3])){
        switch($uri_parts[1]){
            case'блог':include'../modul/'.$dir_site.'/admin/section/blog.php';break;
            case'сообщение':include'../modul/'.$dir_site.'/admin/section/feedback.php';break;
            default:\lib\Def\Opt::$main_content.='Нет такой странички )';
        }
    }
}}catch(Exception $e){$module='404';}