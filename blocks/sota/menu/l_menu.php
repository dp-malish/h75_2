<?php
namespace blocks\sota\Menu;
use lib\Def as Def;
use lib\User as User;

class L_menu{

   static $l_menu_arr=[

'Manager'=>[
['link'=>'сервис','title'=>'Сервис','def'=>true,'hiden'=>false,'role'=>[1,6,7]],
['link'=>'ремонт','title'=>'Ремонт','def'=>true,'hiden'=>false,'role'=>[1,2,3,4,5,6,7]],
['link'=>'сайты','title'=>'Сайты','def'=>true,'hiden'=>false,'role'=>[1,6,7]],
['link'=>'магазин','title'=>'Магазин','def'=>true,'hiden'=>false,'role'=>[1,2,3,4,5,6,7]],
['link'=>'контакты','title'=>'Контакты','def'=>true,'hiden'=>false,'role'=>[4,5,6]],

['link'=>'сделай-сам','title'=>'Сделай сам','def'=>true,'hiden'=>false,'role'=>[1,6,7]],

['link'=>'директор','title'=>'Директор','def'=>false,'hiden'=>true,'role'=>[1,2,7]],
['link'=>'бухгалтер','title'=>'Бухгалтер','def'=>false,'hiden'=>true,'role'=>[1,3,7]],
['link'=>'менеджер','title'=>'Менеджер','def'=>false,'hiden'=>true,'role'=>[1,4,7]],
['link'=>'продавец','title'=>'Продавец','def'=>false,'hiden'=>true,'role'=>[1,5,7]]
],

'main_menu'=>[
['link'=>'заказы','title'=>'Заказы','def'=>false,'hiden'=>false,'role'=>[1,2,3,4,5,6,7]],
['link'=>'директор','title'=>'Директор','def'=>false,'hiden'=>true,'role'=>[1,2,7]],
['link'=>'бухгалтер','title'=>'Бухгалтер','def'=>false,'hiden'=>true,'role'=>[1,3,7]],
['link'=>'менеджер','title'=>'Менеджер','def'=>false,'hiden'=>true,'role'=>[1,4,7]],
['link'=>'продавец','title'=>'Продавец','def'=>false,'hiden'=>true,'role'=>[1,5,7]],


['link'=>'exit','title'=>'Выход','def'=>false,'hiden'=>false,'role'=>[1,2,3,4,5,6,7]]
]
];
    static function getMenu($user_role){

        $user=User\UserRole::$user_role_arr[$user_role]['name'].'<br><br><br>';


        Def\Opt::$l_content=$user;

        $l_menu='
<div class="l_menu">
    <div class="l_menu_title">Математика</div>
    <nav>
        <ul>
            <li><a href="/математика/соседи-числа/">Соседи числа</a></li>
            <li><a href="/математика/сложение/">Сложение</a></li>
            <li><a href="/математика/вычитание/">Вычитание</a></li>
        </ul>
    </nav>
</div>';
    }


}