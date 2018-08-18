<?php
/***Гдавный класс работы с биосом*/

namespace incl\win\Bios;
use lib\Def as Def;

class Bios{

    private $manuf_laptop_arr;//производители ноутбуков (массив)

    function __construct(){

        $cache_arr=new Def\Cache_Arr(['win'],true);

        $this->manuf_laptop_arr=$cache_arr->getCacheAssocArr('manufacturer_laptop','manufacturer WHERE laptop IS TRUE');



        Def\Opt::$main_content.='<div class="fon_c">bios'.$this->manuf_laptop_arr[1]['name'].'</div>';

    }



}