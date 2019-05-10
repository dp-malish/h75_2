<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 08.05.2019
 * Time: 16:30
 */

namespace incl\stroy\Geography;
use lib\Def as Def;

class Roof{

    private $msg=3;
    private $table_name='def_content';

    private $title='Статьи Харвис';
    private $description='Статьи Харвис. ';
    private $keywords='Харвис';


    function __construct(){
        if(!isset(Def\Route::$uri_parts[1])){
            $this->viewList();
        }elseif(isset(Def\Route::$uri_parts[1]) && !isset(Def\Route::$uri_parts[2])){
            if(Def\Validator::paternStrLink(Def\Route::$uri_parts[1])){
                if(Def\Validator::paternInt(Def\Route::$uri_parts[1])){//если цифра
                    if(Def\Route::$uri_parts[1]==1){
                        Def\Route::location301('/'.Def\Route::$uri_parts[0].'/');
                    }else $this->viewList(Def\Route::$uri_parts[1]);
                }else{//если текст
                    $this->viewText();}
            }else Def\Route::$module404=true;
        }else Def\Route::$module404=true;
    }

    private function viewList($start=1){
        Def\Str_navigation::navigation(Def\Route::$uri_parts[0],$this->table_name,$start,$this->msg,true);
        Def\Opt::$main_content.='<section><h2>Статьи</h2>'.Def\Str_navigation::$navigation.'<div class="cl"></div>'.$this->viewListContent($start).'<div class="cl"></div>'.Def\Str_navigation::$navigation.'</section>';
    }


}