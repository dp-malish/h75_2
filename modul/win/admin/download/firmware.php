<?php
namespace lib\Def;
use lib\Download as DL;
if(\lib\Post\Post::issetPostArr()){
    $Download=new DL\Download();
    $DownloadTable='incl\\'.\lib\Def\Opt::$dir_name_site.'\def\DownloadTable';
    Opt::$main_content.='<div class="fon_c"><p>'.($Download->saveFileDB($DownloadTable::DOWNLOAD_DB['firmware'][1],true)?'Запись в БД №'.$Download->last_id:'Всё плохо!!!').'</p></div>';
}
if(Route::$uri_parts[1]=='прошивальщики'){
    Opt::$main_content.='<div class="fon_c"><h3>Добавить прошивальщик</h3>'.Cache_File::$cash->SendHTML('../model/download/form/AddZipFile.php').'</div>';}