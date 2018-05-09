<?php
namespace lib\Def;
class Route{
    static public $module404=false;

    static public $uri_parts=[];//массив
    static public $count_uri_parts=0;

    static public $index=0;

    static function location($uri=null){
        if(Opt::$site===''){new Opt();}
        if(!is_null($uri))Opt::$site.=$uri;
        header('Location: '.Opt::$protocol.Opt::$site);
        exit;
    }
    static function location301($uri=null){
      if(Opt::$site===''){new Opt();}
      if(!is_null($uri))Opt::$site.=$uri;
      header('HTTP/1.1 301 Moved Permanently');
      header('Location: '.Opt::$protocol.Opt::$site);
      exit;
    }
    static function modul404(){
      header("HTTP/1.0 404 Not Found");/*header("Status: 404 Not Found");*/
      Opt::$title='Извините, страница не найдена';
      Opt::$main_content='<h4>'.Opt::$title.'</h4><p>Пожалуйста, убедитесь, что ссылка указанна правильно!</p><script type="text/javascript">setTimeout(\'location.replace("/")\', 13000);</script>';
    }
    //***************************
    static function requestURI($count_uri_parts_max=4){
        $uri=htmlspecialchars($_SERVER['REQUEST_URI'],ENT_QUOTES);
        try{
            $uri=urldecode($uri);
            $url_path=parse_url($uri,PHP_URL_PATH);
            self::$uri_parts=explode('/',trim($url_path,'/'));
            self::$count_uri_parts=count(self::$uri_parts);
            if(self::$count_uri_parts>$count_uri_parts_max){
                self::$module404=true;return false;
            }else return true;
        }catch(Exception $e){self::$module404=true;return false;}
    }
}