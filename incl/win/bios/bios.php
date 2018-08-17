<?php
/***Гдавный класс работы с биосом*/

namespace incl\win\Bios;
use lib\Def as Def;

class Bios{


    function __construct(){


        $cache_arr=new Def\Cache_Arr(['win'],true);


        $cache_arr->getContentCache();






        Def\Opt::$main_content.='<div class="fon_c">bios</div>';

    }



}