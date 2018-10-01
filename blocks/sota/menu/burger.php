<?php
/**
 * 0 - без входа
 * 1 - я
 * 2 - директор
 * 3 - бухгалтер
 * 4 - менеджер
 * 5 - продавец
 * 6 - клиент
 * 7 - SU
 */
\lib\Def\Opt::$live_user=1;
$menu=[

    'burger'=>[
        ['link'=>'/сервис','title'=>'Сервис','def'=>true,'hiden'=>false,'role'=>[1,6,7]],
        ['link'=>'/ремонт','title'=>'Ремонт','def'=>true,'hiden'=>false,'role'=>[1,2,3,4,5,6,7]],
        ['link'=>'/сайты','title'=>'Сайты','def'=>true,'hiden'=>false,'role'=>[1,6,7]],
        ['link'=>'/магазин/','title'=>'Магазин','def'=>true,'hiden'=>false,'role'=>[1,2,3,4,5,6,7]],
        ['link'=>'/контакты','title'=>'Контакты','def'=>true,'hiden'=>false,'role'=>[4,5,6]],

        ['link'=>'/сделай-сам','title'=>'Сделай сам','def'=>true,'hiden'=>false,'role'=>[1,6,7]],

        ['link'=>'директор','title'=>'Директор','def'=>false,'hiden'=>true,'role'=>[1,2,7]],
        ['link'=>'бухгалтер','title'=>'Бухгалтер','def'=>false,'hiden'=>true,'role'=>[1,3,7]],
        ['link'=>'менеджер','title'=>'Менеджер','def'=>false,'hiden'=>true,'role'=>[1,4,7]],
        ['link'=>'продавец','title'=>'Продавец','def'=>false,'hiden'=>true,'role'=>[1,5,7]]
    ],

    'main_menu'=>[
        //['link'=>'/личный-кабинет','title'=>'Личный кабинет','def'=>true,'hiden'=>false,'role'=>[1,2,3,4,5,6]],
        ['link'=>'директор','title'=>'Директор','def'=>false,'hiden'=>true,'role'=>[1,2,7]],
        ['link'=>'бухгалтер','title'=>'Бухгалтер','def'=>false,'hiden'=>true,'role'=>[1,3,7]],
        ['link'=>'менеджер','title'=>'Менеджер','def'=>false,'hiden'=>true,'role'=>[1,4,7]],
        ['link'=>'продавец','title'=>'Продавец','def'=>false,'hiden'=>true,'role'=>[1,5,7]]
    ]


];

$burger='<div class="main_menu rel">
    <div id="burger" class="burger rel">
        <div>
            <div class="burger_line"></div><div class="burger_line"></div><div class="burger_line"></div>
        </div>
        <div id="burger_menu" class="burger_canvas">
            <nav><ul class="top_menu_m">';
if(\lib\Def\Opt::$live_user==0){
    foreach($menu['burger'] as $v){if($v['def'])$burger.='<li><a href="'.$v['link'].'">'.$v['title'].'</a></li>';}
}else{
    foreach($menu['burger'] as $v){
        foreach($v['role'] as $role){
            if($role==\lib\Def\Opt::$live_user)
                $burger.='<li><a href="/'.($v['hiden']?\lib\Def\Opt::$setting.'/':'').$v['link'].'">'.$v['title'].'</a></li>';
        }
    }
}
$burger.='</ul></nav>
        </div>
    </div>
    <div id="main_menu_pc">
        <nav>
            <ul class="top_menu_pc">
                <li><a href="/">Главная</a></li>

                <li><a href="сервис" class="top_menu_pc_down">Сервис</a>
                    <ul class="top_menu_pc_submenu">
                        <li><a href="">Чистка</a></li>
                        <li><a href="">Author</a></li>
                        <li><a href="">Archive</a></li>
                        <li><a href="">Tags</a></li>
                    </ul>
                </li>

                <li><a href="" class="top_menu_pc_down">Ремонт</a>
                    <ul class="top_menu_pc_submenu">
                        <li><a href="">Category</a></li>
                        <li><a href="">Author</a></li>
                        <li><a href="">Archive</a></li>
                        <li><a href="">Tags</a></li>
                    </ul>
                </li>

                <li><a href="" class="top_menu_pc_down">Сайты</a>
                    <ul class="top_menu_pc_submenu">
                        <li><a href="">Category</a></li>
                        <li><a href="">Author</a></li>
                        <li><a href="">Archive</a></li>
                        <li><a href="">Tags</a></li>
                    </ul>
                </li>
                <li><a href="">Магазин</a></li>
                <li><a href="">Контакты</a></li>';


if(\lib\Def\Opt::$live_user!=0){
    $burger.='<li><a href="/личный-кабинет" class="top_menu_pc_down">Кабинет</a><ul class="top_menu_pc_submenu">';
    foreach($menu['main_menu'] as $v){
        foreach($v['role'] as $role){
            if($role==\lib\Def\Opt::$live_user)
                $burger.='<li><a href="/'.($v['hiden']?\lib\Def\Opt::$setting.'/':'').$v['link'].'">'.$v['title'].'</a></li>';
        }
    }
    $burger.='</ul></li>';
}
            $burger.='</ul>
        </nav>
    </div>
    <div class="cl"></div>
</div>';