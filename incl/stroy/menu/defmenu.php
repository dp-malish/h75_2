<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 07.05.2019
 * Time: 20:55
 * menu 1 = верхнее меню (о-нас)
 */

namespace incl\stroy\Menu;
use lib\Def as Def;

class DefMenu extends Def\Opt{
    /**
     * DefMenu constructor.
     * @param $index_menu integer
     */
    private $l_menu_def='<div class="l_menu"><div class="l_menu_title">Ремонт квартир</div><nav><ul>
<li><a href="/капитальный-ремонт-квартир">Капитальный ремонт</a></li>
</ul></nav></div>
<div class="l_menu"><div class="l_menu_title">Ремонт квартир и домов</div>
</div>';




    function __construct($index_menu=0,$heading=NULL,$category=NULL){

        switch($index_menu){

            case 0:$this->menu_0_def_menu();break;

            case 4:$this->menu_4_work_town();break;
        }



    }


    private function menu_0_def_menu(){
        Def\Opt::$l_content.=$this->l_menu_def;
    }


    private function menu_4_work_town(){

    }






}