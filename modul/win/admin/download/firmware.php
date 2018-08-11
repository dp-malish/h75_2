<?php
namespace lib\Def;
use lib\Download as DL;


if(Route::$uri_parts[1]=='прошивальщики'){
    Opt::$main_content.='<div class="fon_c"><h3>Добавить прошивальщик</h3>'.Cache_File::$cash->SendHTML('../model/download/form/AddZipFile.php').'</div>';
}elseif(Route::$uri_parts[1]=='прошивальщики-изменить'){
    Opt::$main_content.='<div class="fon_c"><h3>Добавить рисуноки (пакетно)</h3>'.Cache_File::$cash->SendHTML('../model/admin/AddImgExt.php').'</div>';
}

