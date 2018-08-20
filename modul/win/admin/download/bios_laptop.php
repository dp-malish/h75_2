<?php
namespace lib\Def;
use incl\win\Def as DLTable;

if(\lib\Post\Post::issetPostArr()){
    if(\lib\Post\Post::issetPostKey(['dbt','send','send'])){
        $dbt=Validator::html_cod($_POST['dbt']);
        if(Validator::paternInt($dbt)){
            $Download=new DLTable\DownloadTable();
            $dbt=$Download->getTableNameDBforID($dbt);
            Opt::$main_content.='<div class="fon_c"><p>'.($Download->saveFileDB($dbt,true)?'Запись в БД №'.$Download->last_id:'Всё плохо!!!').'</p></div>';
        }
    }
}

if(Route::$uri_parts[1]=='download'){
    Opt::$main_content.='<div class="fon_c"><h3>Добавить файл в загрузку</h3>'.Cache_File::$cash->SendHTML('../model/download/form/AddDownloadFile.php').'</div>';}