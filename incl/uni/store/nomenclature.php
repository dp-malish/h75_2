<?php
namespace incl\uni\Store;

use lib\Def as Def;
use incl\uni\Def as UniDef;

class Nomenclature{

 function __construct($action='insert'){
     if($action=='insert'){
         $this->NomInsert();
     }
 }

 function NomInsert(){

     Def\Opt::$main_content.=Def\Cache_File::$cash->SendHTML('../model/uni/store/FormAddNomenklature.php');

     Def\Opt::$main_content.='insert';

 }


}