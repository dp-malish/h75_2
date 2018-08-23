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
/**@param int $id - ввходной параметр
 * @return string DBName
 */
    function getTableNameDBforID($idTable){$x=false;
        foreach($this->d_arr as $v){
            if($v['id']==$idTable){$x=$v['db_table'];break;}}
        return $x;//тут будет имя БД
    }
    function getTableNameDBforAlias($alias){$x=false;
        foreach($this->d_arr as $v){
            if($v['alias']==$alias){$x=$v['db_table'];break;}}
        return $x;//тут будет имя БД
    }
    //id - ссылки для скачивания
    //t  - номер таблицы из ф-ции getTableDB
    //ses- результат работы функции
    static function genLinkDownload($id,$t){return md5($id.$t.Opt::SOLT.$t.$id.Validator::getIp());}
}