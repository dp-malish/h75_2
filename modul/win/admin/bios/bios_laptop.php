<?php
/**
 * БИОС для ноутбука admin
 */
namespace lib\Def;
use incl\win\Manufacturer as Manufactur;

Opt::$main_content.='<div class="fon_c"><h3>БИОС для ноутбука</h3>';


$manufactur=new Manufactur\Manufacturer();

$res=$manufactur->getManufacturerDB();

$man_select='<select onchange="changeManufacturBiosLaptop()">';
foreach($res as $k=>$v){

    $man_select.='<option value="'.$v['manufacturer_id'].'">'.$v['name'].'</option>';


    $manufacturer_arr[$v['manufacturer_id']]=$v['name'];
}
$man_select.='<select>';

Opt::$main_content.='<div class="fon_c">
<div id="bios_laptop_manufacturer" class="static_data" data-bios_laptop_manufacturer="">'.$man_select.'</div>
<div id="bios_laptop_link" class="static_data" data-bios_laptop_link="">link</div>
<div id="bios_laptop_model" class="static_data" data-bios_laptop_model="" onclick="modelBiosLaptop()">model</div>
<div id="bios_laptop_save" class="static_data" data-bios_laptop_save="" onclick="submitBiosLaptop()">Добавить</div>
<div class="cl"></div></div>
<script type="application/javascript">

function submitBiosLaptop(){
  alert("submitBiosLaptop");
}

function modelBiosLaptop(){
  alert("modelBiosLaptop");
}

function changeManufacturBiosLaptop(){
  alert("changeManufacturBiosLaptop");
}

</script>
';



$res=SQListatic::arrSQL_('SELECT * FROM bios_laptop ORDER BY id DESC');

foreach($res as $k=>$v){
    Opt::$main_content.='<div class="fon_c" data-bios_lap_id="'.$v['id'].'">';


    Opt::$main_content.='<div class="'.($v['status']?'on':'off').'" onClick="">'.($v['status']?'on':'off').'</div>';
    Opt::$main_content.='<div class="static_data">'.$v['id'].'</div>';
    Opt::$main_content.='<div class="static_data">'.$manufacturer_arr[$v['manufacturer_id']].'</div>';
    Opt::$main_content.='<div class="static_data">'.$v['link'].'</div>';
    Opt::$main_content.='<div class="static_data">'.$v['model'].'</div>';


    Opt::$main_content.='<div class="cl"></div></div>';
}













Opt::$main_content.='</div>';