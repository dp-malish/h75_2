<?php
/***Гдавный класс работы с биосом*/
namespace incl\win\Bios;
use lib\Def as Def;

class Bios{

    private $manuf_laptop_arr;//производители ноутбуков (массив)

    function __construct(){
        $cache_arr=new Def\Cache_Arr(['win'],true);
        //берём массив производителей
        $this->manuf_laptop_arr=$cache_arr->getCacheAssocArr('manufacturer_laptop','manufacturer WHERE laptop IS TRUE');
        //Маршрутизация биоса
        $this->routBios();
    }
    private function routBios(){//Маршрутизация биоса
        if(!isset(Def\Route::$uri_parts[1])){$this->routUri0();
        }elseif(!isset(Def\Route::$uri_parts[2])){
            $uri_parts_1=explode('-',trim(Def\Route::$uri_parts[1],' '),2);
            if(!isset($uri_parts_1[1])){
                $this->routUri1_Manufacture();
            }else{
                $this->routUri1_GetBios($uri_parts_1[0],$uri_parts_1[1]);
            }
        }else Def\Route::$module404=true;
    }
    private function getManufacturerId($val){
        foreach($this->manuf_laptop_arr AS $v){
            if($v['name']==$val || mb_strtolower($v['name'],'UTF-8')==$val)break;
        }return $v['manufacturer_id'];
    }
    private function getManufacturer($id){
        foreach($this->manuf_laptop_arr AS $v){
            if($v['manufacturer_id']==$id)break;
        }return $v['name'];
    }

    private function routUri0(){
        Def\Opt::$main_content.='<div class="fon_c"><h3>БИОС для ноутбука</h3><p>Выбрать производителя:</p>';
        //.$this->getManufacturerId('dell').

        Def\Opt::$main_content.='<ul class="nav_link">';
        foreach($this->manuf_laptop_arr AS $v){
            Def\Opt::$main_content.='<li><a href="'.mb_strtolower($v['name'],'UTF-8').'">'.$v['name'].'</a></li>';
        }
        Def\Opt::$main_content.='</ul>';

        Def\Opt::$main_content.='</div>';
    }

    private function routUri1_Manufacture(){
        $id=$this->getManufacturerId(Def\Route::$uri_parts[1]);
        if($id){
            $DB=new Def\SQLi();
            $res=$DB->arrSQL('SELECT link,manufacturer_id,model FROM bios_laptop WHERE manufacturer_id='.$id);
            if($res){
                Def\Opt::$main_content.='<div class="fon_c"><h3>БИОС для ноутбуков '.$this->getManufacturer($id).'</h3><ul class="nav_link">';
                foreach($res as $k=>$v){
                    Def\Opt::$main_content.='<li><a href="/'.Def\Route::$uri_parts[0].'/'.Def\Route::$uri_parts[1].'-'.$v['link'].'">'.Def\Route::$uri_parts[1].'-'.$v['model'].'</a></li>';
                }
                Def\Opt::$main_content.='</ul></div>';
            }else Def\Route::$module404=true;
        }else Def\Route::$module404=true;
    }

    private function routUri1_GetBios($manufactur,$model){
        Def\Opt::$main_content.='<div class="fon_c">bios  -  '.$manufactur.$model.'</div>';
        Def\Opt::$main_content.='<div class="fon_c">id  -  '.$this->getManufacturerId($manufactur).'</div>';
    }

}