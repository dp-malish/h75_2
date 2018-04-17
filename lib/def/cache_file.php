<?php
/*
 * construct $dir два вида каталог8а
 * при $add=false заменяет $dir
 * при $add=екгу прибавляет к $dir путь
 */
namespace lib\Def;
class Cache_File{

    protected $dir='../cache_all/';

function __construct($dir=[],$add=false){
    if(!empty($dir)){
        if($add){
            foreach($dir as $v){$this->dir=$this->dir.$v.'/';}
        }else $this->dir=$dir;
    }else{
        if($add){
            foreach($dir as $v){$this->dir=$this->dir.$v.'/';}
        }else $this->dir=$dir;
    }
}

function IsSetCacheFile($cache_file){$cache_file=$this->dir.$cache_file;
if(file_exists($cache_file))return file_get_contents($cache_file);else return 0;}
function IsSetCacheFileTime($cache_time,$cache_file){
$cache_file=$this->dir.$cache_file;
if(file_exists($cache_file)){
if((time()-$cache_time)< filemtime($cache_file)){
return file_get_contents($cache_file);}else{return 0;}
}else{return 0;}
}
//------------------------------
function StartCache(){ob_start();}
function StopCache($cache_file){//Происходит запись в файл
$cache_file=$this->dir.$cache_file;
$handle=fopen($cache_file,'w');
fwrite($handle,ob_get_contents());fclose($handle);ob_end_clean();}
function StopCacheWithOut($cache_file){//Происходит запись в файл с отправкой
$cache_file=$this->dir.$cache_file;
$handle=fopen($cache_file,'w');
fwrite($handle,ob_get_contents());fclose($handle);ob_end_flush();}
//-------------------------------
function SendHTML($f){//Отправка файла в буфер без записи
    ob_start();include $f;$f=ob_get_contents();ob_end_clean();return $f;}
function SendHTMLext($f,$params){$f=file_get_contents($f);$l=strlen('#?');$offset=0;
	foreach($params as $v){
	$pos=strpos($f,'#?',$offset);
	$f=substr_replace($f,$v,$pos,$l);
	$offset=$pos+strlen($v);}return $f;
}
function SendHTMLextPlus($f,$params){ob_start();include $f;$f=ob_get_contents();ob_end_clean();
	$l=strlen('#?');$offset=0;
	foreach($params as $v){$pos=strpos($f,'#?',$offset);$f=substr_replace($f,$v,$pos,$l);$offset=$pos+strlen($v);}return $f;
}
//-------------------------------
function clearGroupFile($dir,$ext_file='html'){//Очистить кеш на диске
    return count(array_map("unlink",glob($this->dir.$dir.'*'.$ext_file)));}
}