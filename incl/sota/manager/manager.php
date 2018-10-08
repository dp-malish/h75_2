<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 08.10.2018
 * Time: 13:20
 */

namespace incl\sota\manager;
use lib\Def as Def;

class Manager{

    //function __construct($uri_parts){    }

    function routManager(){

        if(Def\Route::$count_uri_parts==2){
            //ltajkn
            return 'lta22223';
        }else{
            return Def\Route::$uri_parts[2];
        }

    }

    function defManager(){
        return '';
    }

}