<?php
namespace lib\Def;

use lib\User as User;

if(Opt::$live_user==0){Route::$module404=true;}else{
    switch(Route::$uri_parts[1]){

        case'exit':User\UserRole::exitUser();break;

        case'менеджер': Opt::$l_content_up.=\blocks\sota\Menu\L_menu::getMenu(3);break;





        default:Route::$module404=true;

    }
}
