<?php
/***Гдавный класс работы с биосом*/
namespace incl\win\Bios;
use lib\Def as Def;

class Bios_laptop{

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
            if(!isset($uri_parts_1[1])){//Предпологается название производителя одним словом без тире
                $this->routUri1_Manufacture();
            }else{
                $this->routUri1_GetBios($uri_parts_1[0],$uri_parts_1[1]);
            }
        }else Def\Route::$module404=true;
    }

    private function getManufacturerId($val){
        $x=false;
        foreach($this->manuf_laptop_arr AS $v){
            if($v['name']==$val || mb_strtolower($v['name'],'UTF-8')==$val){
                $x=$v['manufacturer_id'];break;}
        }return $x;
    }
    private function getManufacturer($id){
        $x=false;
        foreach($this->manuf_laptop_arr AS $v){
            if($v['manufacturer_id']==$id){$x=$v['name'];break;}
        }return $x;
    }

    private function routUri0(){

        //Допилить title desc и т.д.!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

        Def\Opt::$main_content.='<div class="fon_c"><h3>БИОС для ноутбука</h3><p>Выбрать производителя:</p>';


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

        $id_manufactur=$this->getManufacturerId($manufactur);
        if($id_manufactur){
        $manufactur_name=$this->getManufacturer($id_manufactur);


        Def\Opt::$main_content.='<div class="fon_c"><h3>bios  -  '.$manufactur_name.'===='.$model.'</h3>';


        //SELECT f.id, f.link, f.manufacturer_id, f.model, s.model_motherboard, s.rev_motherboard, s.ver_bios, s.download_table, s.level, s.notes FROM bios_laptop f RIGHT JOIN bios_laptop_second s ON f.id = s.id_bios_laptop


        Def\Opt::$main_content.='id  -  '.$id_manufactur.'</div>';


        }else Def\Route::$module404=true;
    }

}