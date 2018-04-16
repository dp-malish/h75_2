<?php
/**
 * Проверкка неоходимости сжимать файл перед отправкой
 */
namespace lib\Def;
class Gzip extends Cache_File{
    protected function SendGzip($f){//Проверкка неоходимости сжимать файл перед отправкой
        $gzip=Validator::html_cod($_SERVER["HTTP_ACCEPT_ENCODING"]);
        if(strpos($gzip,'x-gzip')!==false)$encoding='x-gzip';
        else if(strpos($gzip,'gzip')!==false)$encoding='gzip';else $encoding=false;
        if($encoding){$l_str=strlen($f);
            if($l_str>2048){header('Content-Encoding: '.$encoding);echo("\x1f\x8b\x08\x00\x00\x00\x00\x00");$f=gzcompress($f,3);
        }}echo $f;
    }
}