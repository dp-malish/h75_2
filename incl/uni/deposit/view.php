<?php

namespace incl\uni\Deposit;

use lib\Def as Def;
use incl\uni\Def as UniDef;

class View{

    function __construct(){
        Def\Opt::$main_content.=UniDef\OptUni::$currency[0][1];
    }


public function Info(){


}


}