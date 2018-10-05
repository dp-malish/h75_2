<?php
namespace lib\Def;

use lib\User as User;

if(Opt::$live_user==0){Route::$module404=true;}else{
    switch(Route::$uri_parts[1]){

        case'exit':User\UserRole::exitUser();break;





        default:Route::$module404=true;

    }

    Opt::$l_content_up.='<br>'.Opt::$live_user.'cabinet<br>';

}
