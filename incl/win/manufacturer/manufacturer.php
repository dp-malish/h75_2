<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 06.09.2018
 * Time: 12:29
 */

namespace incl\win\Manufacturer;

use lib\Def as Def;

class Manufacturer{

    function getManufacturer(){
        $res=Def\SQListatic::arrSQL_('SELECT * FROM manufacturer');
        return($res?$res:false);
    }




}