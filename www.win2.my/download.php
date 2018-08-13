<?php
namespace lib\Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new Opt('win');//Def opt

//Cache_File::$cash=new Cache_File(['win'],true);

$bot=new UserAgent();

//if(!$bot->isBot()){include'../blocks/win/rek/google.php';}

$DownloadTable='incl\\'.\lib\Def\Opt::$dir_name_site.'\def\DownloadTable';


$keys = array_keys($DownloadTable::DOWNLOAD_DB);
echo $keys[0],'<br>';
//echo $DownloadTable::DOWNLOAD_DB[0][0];


/*$key = array_search('Прошивальщики2',$DownloadTable::DOWNLOAD_DB[]);
echo $key;*/

// Обходим все элементы массива в цикле
foreach($DownloadTable::DOWNLOAD_DB as $key => $value) {
    // Если эллемент массива есть массив, то вызываем рекурсивно эту функцию
    //if (is_array($param)) {       search_key($searchKey, $param, $result);   }

    echo $key.'<br>';




}