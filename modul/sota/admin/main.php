<?php
namespace lib\Def;


if(!Opt::$loginAdmin){Route::$module404=true;}else{

    switch(Route::$uri_parts[1]){

        case'менеджер':\blocks\sota\Menu\L_menu::getMenu(3);break;





        //default:Route::$module404=true;

    }

    Opt::$l_content.=Opt::$live_user.'SET --******54645';

}