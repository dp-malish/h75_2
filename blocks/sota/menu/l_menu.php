<?php
namespace blocks\sota\Menu;
use lib\Def as Def;
use lib\User as User;
/**
 * 0 - без входа
 * 1 - я
 * 2 - директор
 * 3 - бухгалтер
 * 4 - менеджер
 * 5 - продавец
 * 6 - клиент
 * 7 - SU
 * INSERT INTO `user_group` (`user_group_id`, `name`, `permission`) VALUES
(1, 'Admin', NULL),
(2, 'Director', NULL),
(3, 'Accountant', NULL),
(4, 'Manager', NULL),
(5, 'Seller', NULL),
(6, 'Client', NULL),
(7, 'SU', NULL);
 */
class L_menu{

   static $l_menu_arr=[

'Manager'=>[
['link'=>'карта-клиента','title'=>'Карта киента','hiden'=>false,'role'=>[1,2,4,5,7]],
['link'=>'сервис','title'=>'Сервис','hiden'=>false,'role'=>[1,2,3,4,5,7]],

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
    <div class="l_menu_title">'.User\UserRole::$user_role_arr[$user_role]['name'].'</div>
    <nav>
        <ul>';
        foreach(self::$l_menu_arr[User\UserRole::$user_role_arr[$user_role]['name']] as $v){
            foreach($v['role']as $value){
                if($value==Def\Opt::$live_user)$l_menu.='<li><a href="/'.Def\Route::$uri_parts[0].'/'.Def\Route::$uri_parts[1].'/'.$v['link'].'">'.$v['title'].'</a></li>';
            }
        }
        $l_menu.='</ul>
    </nav>
</div>';
        return $l_menu;
    }


}