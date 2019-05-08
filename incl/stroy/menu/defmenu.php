<?php
/**
 * Date: 07.05.2019
 * menu 1 = верхнее меню (о-нас)
 * menu 2 = левое меню капитальный-ремонт-квартир
 * menu 3 = правое меню (иконки работ)
 * menu 4 = левое меню География работ (Ремонт кровли)
 */

namespace incl\stroy\Menu;
use lib\Def as Def;

class DefMenu extends Def\Opt{

    private $l_menu_def='<div class="l_menu"><div class="l_menu_title">Ремонт квартир</div><nav><ul>
<li><a href="/капитальный-ремонт-квартир">Капитальный ремонт</a></li>
</ul></nav></div>
<div class="l_menu"><div class="l_menu_title">Ремонт квартир и домов</div>
</div>';
    /*
    <nav>
        <ul>
            <li><a href="">Косметический ремонт</a></li>
            <li><a href="">Капитальный ремонт</a></li>
            <li><a href="">Комплексный ремонт</a></li>
        </ul>
    </nav>
    <nav>
        <ul>
            <li><a href="">Демонтажные работы</a></li>
            <li><a href="">Кладка стен / перегородок</a></li>
            <li><a href="">Малярные работы</a></li>
            <li><a href="">Монтаж гипсокартона</a></li>
            <li><a href="">и т.д.</a></li>
        </ul>
    </nav>*/

    private $r_menu_def='<div class="r_menu"><nav><div class="r_menu_btn"><a href="/кровельные-работы"><img src="/img/site/pic.php?i=krovlya" alt="Кровельные работы" title="Кровельные работы"><div class="down_title">Кровельные работы</div></a></div><div class="r_menu_btn"><a href="/фасадные-работы-в-украине"><img src="/img/site/pic.php?i=fasad" alt="Фасадные работы" title="Фасадные работы"><div class="down_title">Фасадные работы</div></a></div></nav></div>';
    /*
            <div class="r_menu_btn">
                <a href="">
                    <img src="/img/site/pic.php?i=stroy" alt="Строительные работы" title="Строительные работы">
                    <div class="down_title">Строительные работы</div>
                </a>
            </div>

            <div class="r_menu_btn">
                <a href="">
                    <img src="/img/site/pic.php?i=otdelka" alt="Отделочные работы" title="Отделочные работы">
                    <div class="down_title">Отделочные работы</div>
                </a>
            </div>

            <div class="r_menu_btn">
                <a href="">
                    <img src="/img/site/pic.php?i=kompleks" alt="Комплексные работы" title="Комплексные работы">
                    <div class="down_title">Комплексные работы</div>
                </a>
            </div>

            <div class="r_menu_btn">
                <a href="">
                    <img src="/img/site/pic.php?i=doma" alt="Строительство домов" title="Строительство домов">
                    <div class="down_title">Строительство домов</div>
                </a>
            </div>

            <div class="r_menu_btn">
                <a href="">
                    <img src="/img/site/pic.php?i=uteplenie" alt="Утепление фасадов" title="Утепление фасадов">
                    <div class="down_title">Утепление фасадов</div>
                </a>
            </div>
    */

    private $l_menu_town='<div class="l_menu"><div class="l_menu_title">География работ</div><nav><ul>
<li><a href="/ремонт-кровли">Ремонт кровли</a></li>
</ul></nav></div>';

    /**
     * DefMenu constructor.
     * @param $index_menu integer
     * @param $heading text
     * @param $category text
     */

    function __construct($index_menu=0,$heading=NULL,$category=NULL){
        switch($index_menu){
            case 0:$this->menu_0_def_menu();break;//меню по умолчанию
            case 1||2:$this->menu_0_def_menu();break;//верхнее меню (о-нас) и левое меню капитальный-ремонт-квартир
            case 3:$this->menu_0_def_menu();break;//правое меню (иконки работ)
            case 4:$this->menu_4_work_town();break;//левое меню (города)
        }
    }
    private function menu_0_def_menu(){//меню по умолчанию
        Def\Opt::$l_content.=$this->l_menu_def.$this->l_menu_town;
        Def\Opt::$r_content.=$this->r_menu_def;
    }
    private function menu_4_work_town(){//левое меню (города)

    }
}