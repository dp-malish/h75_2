<?php
namespace lib\Def;
use incl\win\Def as WinDef;
use lib\Download\Download;
use lib\Get as Get;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new Opt('win');//Def opt

if(Get\Get::issetGetArr()){
    if(Get\Get::issetGetKey(['id','t','ses'])){
        $id=Validator::html_cod($_GET['id']);
        $t=Validator::html_cod($_GET['t']);
        $ses=Validator::html_cod($_GET['ses']);
        if(Validator::paternInt($id) && Validator::paternInt($t)){
            $Down=new WinDef\DownloadTable();
            if($ses==$Down->genLinkDownload($id,$t)){//сравнить сессию и переменные из гет запроса
                $DBTable=$Down->getTableNameDBforID($t);//Взять имя ДБ
                if($DBTable){
                    Download::getFileDB($DBTable,$id);//Выдпть файл
                    //echo 'file<br>';
                }else echo '0x000004';
            }else echo '0x000003';
        }else echo '0x000002';
    }else echo '0x000001';
}else echo '0x000000';
//echo WinDef\DownloadTable::genLinkDownload($_GET['id'],$_GET['t']);