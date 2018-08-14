<?php
namespace incl\win\Def;

use lib\Def\Opt;
use lib\Def\Validator;

class DownloadTable extends \lib\Download\Download{

    const DOWNLOAD_DB=[
        'zzzzzz'=>['zzzzzz','download_firmware___zzz','Прошивальщики_zzz'],
        'firmware'=>['firmware','download_firmware','Прошивальщики'],
        'are'=>['are','dload_fie','Прошивальщики'],
        'firmware2'=>['firmware2','download_firmware2','Прошивальщики2']
    ];
/*ключ из массива DOWNLOAD_DB - ввходной параметр */
    static function getTableDB($downloadArrKey){
        $keys=array_keys(self::DOWNLOAD_DB);
        return array_search($downloadArrKey,$keys);//тут будет цифра
    }
    //id - ссылки для скачивания
    //t  - номер таблицы из ф-ции getTableDB
    //ses- результат работы функции
    static function genLinkDownload($id,$t){return md5($id.$t.Opt::SOLT.$t.$id.Validator::getIp());}
}