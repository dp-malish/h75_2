<?php
/**
 * БИОС для ноутбука admin
 */
namespace lib\Def;
use incl\win\Manufacturer as Manufactur;

Opt::$main_content.='<div class="fon_c"><h3>БИОС для ноутбука</h3>';


$manufactur=new Manufactur\Manufacturer();

$res=$manufactur->getManufacturerDB();


foreach($res as $k=>$v){
    Opt::$main_content.='<div class="fon_c" data-man_id="' . $v['manufacturer_id'] . '" data-man_name="' . $v['name'] . '" data-man_laptop="'.$v['laptop'].'">
   
    <div class="manufacturer_name">'.$v['name'].'</div>
     
    <div class="'.($v['laptop']?'on':'off').' manufacturer_laptop" onClick="onManufacturer(this)">ноут</div>
    
    <div class="cl"></div>
    </div>';
}
















Opt::$main_content.='</div>';