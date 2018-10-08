<?php
namespace lib\Def;

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
if(Opt::$live_user==0){Route::$module404=true;}else{
    switch(Route::$uri_parts[1]){

        case'exit':User\UserRole::exitUser();break;

        case'менеджер':$role=[1,2,3,4,7,'validUser'=>false];
            foreach($role as $v){if($v==Opt::$live_user)$role['validUser']=true;}
            if($role['validUser']){
            Opt::$l_content_up.=\blocks\sota\Menu\L_menu::getMenu(3);
            $manager=new \incl\sota\manager\Manager();
            Opt::$main_content.=$manager->routManager();
            }else{Opt::$main_content_up='Хрень';}
            break;





        default:Route::$module404=true;

    }
}
