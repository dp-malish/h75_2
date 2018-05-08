<?php
/**
 * Отображать водоёмы на главной
 */
namespace incl\vt\Index;
use lib\Def as Def;
class Vodoemi extends Def\Gzip{

  function __construct(){

    header("Content-type: text/html; charset=UTF-8");

    $this->dir='../../'.$this->dir.'vt/vodoemi/';

    $main_content=$this->IsSetCacheFileTime(604800,'index.html');
    if(!$main_content){
      $DB=new Def\SQLi();
      $res=$DB->arrSQL('SELECT id,base_name,coordinats,contacts FROM vodoemi');
      if($res){
        $main_content='<script type="text/javascript">map.style.minHeight="250px";map.style.maxHeight="650px";ymaps.ready(init);var myMap,myPlacemark;function init(){';
        $placemark='';
        foreach($res as $key=>$val){
          if(!isset($coordinats)){$coordinats=$val['coordinats'];}
          $base_name=mb_convert_case($val['base_name'],MB_CASE_LOWER,"UTF-8");
          ($val['contacts']!=''?$contacts=$val['contacts']:$contacts='не указаны');
          $placemark.='myPlacemark=new ymaps.Placemark(['.$val['coordinats'].'],{hintContent:\''.$val['base_name'].'\',balloonContentHeader:\''.$val['base_name'].'\',balloonContent:\'<a href="/водоёмы/'.$val['id'].'-'.str_replace(" ","-",$base_name).'">узнать подробнее</a>\',balloonContentFooter:\'Контакты: '.$contacts.'\'});myMap.geoObjects.add(myPlacemark);';
          $map='myMap=new ymaps.Map(\'map\',{center:['.$coordinats.'],zoom:8,controls:[\'rulerControl\',\'fullscreenControl\',\'zoomControl\',\'typeSelector\']});';
        }
        $main_content.=$map.$placemark.'}</script>';
      }
        $this->StartCache();
        echo $main_content;
        $this->StopCache('index.html');
    }
      header('Cache-Control: public, max-age=604800');$this->SendGzip($main_content);
  }
}