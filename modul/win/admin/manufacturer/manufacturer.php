<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 06.09.2018
 * Time: 12:30
 */
namespace lib\Def;

use incl\win\Manufacturer as Manufactur;

Opt::$main_content.='<div class="fon_c"><h3>Производители</h3>';

$manufactur=new Manufactur\Manufacturer();

$res=$manufactur->getManufacturer();

foreach($res as $k=>$v){
    Opt::$main_content.='<div class="fon_c" data-man_id="' . $v['manufacturer_id'] . '" data-man_name="' . $v['name'] . '" data-man_laptop="'.$v['laptop'].'">

    <div class="'.($v['laptop']?'on':'off').'" onClick="onManufacturer(this)">' .($v['laptop']?'on':'off').'</div>
    
    <div class="manufacturer_name">'.$v['name'].'</div>'.$v['sort_order'].'
     
     <div class="'.($v['laptop']?'on':'off').'" onClick="onManufacturer(this)">' .($v['laptop']?'on':'off').'</div>
     '.($v['laptop']?'Вкл.':'Выкл').'
    
    <div class="cl"></div>
    </div>';
}

Opt::$main_content.='<script type="application/javascript">
// onClick="getManufacturer(this)"
function getManufacturer(el){
  alert(el.dataset.man_id+el.dataset.man_name);
}
function onManufacturer(el){
    var mDiv=el.parentNode;
    //mDiv.removeChild(el);
  alert(mDiv.dataset.man_id)
}

</script>';

Opt::$main_content.='</div>';
//Opt::$main_content.=$manufactur->getManufacturer();