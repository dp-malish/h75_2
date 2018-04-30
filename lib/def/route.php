<?php
namespace lib\Def;
class Route{
    static function location($uri=null){
        if(Opt::$site===''){new Opt();}
        if(!is_null($uri))Opt::$site.=$uri;
        header('Location: '.Opt::$protocol.Opt::$site);
        exit;
    }
    public static function modul404($uri=null){
        header("HTTP/1.0 404 Not Found");/*header("Status: 404 Not Found");*/
      Opt::$title='Извините, страница не найдена';
      Opt::$main_content='<h4>'.Opt::$title.'</h4><p>Пожалуйста, убедитесь, что ссылка указанна правильно!</p><script type="text/javascript">setTimeout(\'location.replace("/")\', 13000);</script>';
    }
}