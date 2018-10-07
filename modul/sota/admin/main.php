<?php
namespace lib\Def;


if(!Opt::$loginAdmin || Opt::$live_user==0){Route::$module404=true;}else{

    switch(Route::$uri_parts[1]){

        case'менеджер': Opt::$l_content_up.=\blocks\sota\Menu\L_menu::getMenu(3);break;





        //default:Route::$module404=true;

    }

}