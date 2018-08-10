<?php
if(isset($_GET['exit'])){$user->loginAdminFormExit();}
\lib\Def\Opt::$l_content_up.='<div class="l_menu"><div class="l_menu_title">Настройки</div><ul><li><a href="/'.\lib\Def\Route::$uri_parts[0].'/">Меню настройки</a></li><li><a href="?exit">Выход</a></li></ul></div>';