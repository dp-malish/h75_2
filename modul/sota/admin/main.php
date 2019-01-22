<?php
namespace lib\Def;


if(!Opt::$loginAdmin || Opt::$live_user==0){Route::$module404=true;}else{

    switch(Route::$uri_parts[1]){


        //для static $setting='set';//страница SU
        //!!!!!!!!!!!!!! сюда пилить только set
        case'менеджер': Opt::$l_content_up.=\blocks\sota\Menu\L_menu::getMenu(3);break;





        //default:Route::$module404=true;

    }

}