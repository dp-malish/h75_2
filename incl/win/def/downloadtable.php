<?php
namespace incl\win\Def;

use lib\Def as Def;
use lib\Def\Opt;
use lib\Def\Validator;

class DownloadTable extends \lib\Download\Download{

    public $d_arr;//таблицы download (массив)

    function __construct(){
        $cache_arr=new Def\Cache_Arr(['win'],true);
        //берём массив производителей
        $this->d_arr=$cache_arr->getCacheAssocArr('d','d');
    }
/*
    const DOWNLOAD_DB=[
        'zzzzzz'=>['bios_laptop_asus','download_firmware___zzz','Прошивальщики_zzz'],
        'firmware'=>['firmware','download_firmware','Прошивальщики'],
        'bios_asus'=>['bios_asus','download_bios_asus','Биос Asus'],


        'are'=>['are','dload_fie','Прошивальщики'],
        'firmware2'=>['firmware2','download_firmware2','Прошивальщики2']
    ];*/
/**@param int $id - ввходной параметр
 * @return string DBName
 */
    function getTableNameDBforID($idTable){
        foreach($this->d_arr as $v){
            if($v['id']==$idTable)break;
        }
        return $v['db_table'];// тут будет имя БД
    }
    function getTableNameDBforAlias($alias){
        foreach($this->d_arr as $v){
            if($v['alias']==$alias)break;
        }
        return $v['db_table'];// тут будет имя БД
    }

    /*static function getTableDB($downloadArrKey){
        $keys=array_keys(self::DOWNLOAD_DB);
        return array_search($downloadArrKey,$keys);//тут будет цифра
    }*/

    //id - ссылки для скачивания
    //t  - номер таблицы из ф-ции getTableDB
    //ses- результат работы функции
    function genLinkDownload($id,$t){return md5($id.$t.Opt::SOLT.$t.$id.Validator::getIp());}
}