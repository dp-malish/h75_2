<?php
/**
 * БИОС для ноутбука admin
 */
namespace lib\Def;
use incl\win\Manufacturer as Manufactur;

Opt::$main_content.='<div class="fon_c"><h3>БИОС для ноутбука</h3>';


$manufactur=new Manufactur\Manufacturer();

$res=$manufactur->getManufacturerDB();

$man_select='<select onchange="changeManufacturBiosLaptop(this)"><option value="">Выбрать</option>';
foreach($res as $k=>$v){
    $man_select.='<option value="'.$v['manufacturer_id'].'">'.$v['name'].'</option>';
    $manufacturer_arr[$v['manufacturer_id']]=$v['name'];
}$man_select.='<select>';

Opt::$main_content.='<div class="fon_c">
<div id="bios_laptop_manufacturer" class="bios_salat bios_25" data-bios_laptop_manufacturer="">'.$man_select.'</div>
<div id="bios_laptop_link" class="bios_salat bios_25" data-bios_laptop_link="">link</div>
<div id="bios_laptop_model" class="bios_salat bios_25" data-bios_laptop_model="" onclick="modelBiosLaptop()">model</div>
<div id="bios_laptop_save" class="static_data" data-bios_laptop_save="" onclick="submitBiosLaptop()">Добавить</div>
<div class="cl"></div></div>
<script type="application/javascript">
function changeManufacturBiosLaptop(e){e.parentNode.dataset.bios_laptop_manufacturer=e.options[e.selectedIndex].value;}

function modelBiosLaptop(){
  var res = prompt("Модель ноутбука", "");
  if(res){var str=str_to_link(res);
  
  bios_laptop_model.dataset.bios_laptop_model=res;
  bios_laptop_model.innerText=res;
  
  bios_laptop_link.dataset.bios_laptop_link=str;
  bios_laptop_link.innerText=str;}
}

function submitBiosLaptop(){
  
    
    //bios_laptop_manufacturer.dataset.bios_laptop_manufacturer+bios_laptop_link.dataset.bios_laptop_link+bios_laptop_model.dataset.bios_laptop_model;
    
    alert("submitBiosLaptop - "+bios_laptop_manufacturer.dataset.bios_laptop_manufacturer+bios_laptop_link.dataset.bios_laptop_link+bios_laptop_model.dataset.bios_laptop_model);
}


function str_to_link(str){
                var str=str.toLowerCase();
                str=str.replace(/ /ig,\'-\');
                str=str.replace(/---/ig,\'-\');
                str=str.replace(/--/ig,\'-\');
                str=str.replace(/,/ig,"");
                str=str.replace(/\./ig,"");
                str=str.replace(/\?/ig,"");
                str=str.replace(/!/ig,"");
                str=str.replace(/\//ig,"");
                str=str.replace(/\"/ig,"");
                
                str=str.replace(/\(/ig,\'\');
                str=str.replace(/\)/ig,"");
                str=str.replace(/;/ig,"");
                str=str.replace(/:/ig,"");

                str=str.replace(/а/ig,\'a\');
                str=str.replace(/б/ig,\'b\');
                str=str.replace(/в/ig,\'v\');
                str=str.replace(/г/ig,\'g\');
                str=str.replace(/д/ig,\'d\');
                str=str.replace(/е/ig,\'e\');
                str=str.replace(/ё/ig,\'yo\');
                str=str.replace(/ж/ig,\'zh\');
                str=str.replace(/з/ig,\'z\');
                str=str.replace(/и/ig,\'i\');
                str=str.replace(/й/ig,\'j\');
                str=str.replace(/к/ig,\'k\');
                str=str.replace(/л/ig,\'l\');
                str=str.replace(/м/ig,\'m\');
                str=str.replace(/н/ig,\'n\');
                str=str.replace(/о/ig,\'o\');
                str=str.replace(/п/ig,\'p\');
                str=str.replace(/р/ig,\'r\');
                str=str.replace(/с/ig,\'s\');
                str=str.replace(/т/ig,\'t\');
                str=str.replace(/у/ig,\'u\');
                str=str.replace(/ф/ig,\'f\');
               	str=str.replace(/х/ig,\'h\');
                str=str.replace(/ц/ig,\'c\');
                str=str.replace(/ч/ig,\'ch\');
                str=str.replace(/ш/ig,\'sh\');
                str=str.replace(/щ/ig,\'shh\');
                str=str.replace(/ъ/ig,\'\');
                str=str.replace(/ы/ig,\'y\');
                str=str.replace(/ь/ig,\'\');
                str=str.replace(/э/ig,\'e\');
                str=str.replace(/ю/ig,\'yu\');
                str=str.replace(/я/ig,\'ya\');
                return str;
                }

</script>
';

$res=SQListatic::arrSQL_('SELECT * FROM bios_laptop ORDER BY id DESC');

foreach($res as $k=>$v){
    Opt::$main_content.='<div class="fon_c" data-bios_lap_id="'.$v['id'].'">';

    Opt::$main_content.='<div class="'.($v['status']?'on':'off').'" onClick="">'.($v['status']?'on':'off').'</div>';
    Opt::$main_content.='<div class="static_data">'.$v['id'].'</div>';
    Opt::$main_content.='<div class="static_data">'.$manufacturer_arr[$v['manufacturer_id']].'</div>';
    Opt::$main_content.='<div class="bios_salat bios_25">'.$v['link'].'</div>';
    Opt::$main_content.='<div class="bios_salat bios_25">'.$v['model'].'</div>';

    Opt::$main_content.='<div class="cl"></div></div>';
}


Opt::$main_content.='</div>';