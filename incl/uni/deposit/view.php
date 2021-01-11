<?php

namespace incl\uni\Deposit;

use lib\Def as Def;
use incl\uni\Def as UniDef;

class View{

    function __construct(){





        Def\Opt::$main_content.=UniDef\OptUni::CURRENCY[0][0];

        $DB=new Def\SQLi();
        $res=$DB->strSQL('SELECT bank,target FROM depoosit WHERE link='.$DB->realEscapeStr(Def\Route::$uri_parts[$uri_part]));





    }


public function Info(){


}


}