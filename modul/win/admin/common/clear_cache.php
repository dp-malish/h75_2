<?php
namespace lib\Def;
if(isset($_GET['clearcss'])){
    $clearcss=' ('.Cache_File::$cash->clearGroupFile('css/','tmp').')';
}elseif(isset($_GET['clearindex'])){
    $clearindex=' ('.Cache_File::$cash->clearGroupFile('common/').')';
}
Opt::$l_content_up.='<div class="l_menu"><div class="l_menu_title">Очистить кеш</div><ul>
<li><a href="?clearcss">css'.$clearcss.'</a></li>
<!--<li><a href="?clearindex">Общие файлы'.$clearindex.'</a></li>-->
</ul></div>';