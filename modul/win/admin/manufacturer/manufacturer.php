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
   
    <div class="manufacturer_name">'.$v['name'].'</div>
    
    <div class="manufacturer_order">'.$v['sort_order'].'</div>
     
    <div class="'.($v['laptop']?'on':'off').' manufacturer_laptop" onClick="onManufacturer(this)">ноут</div>
    
    <div class="cl"></div>
    </div>';
}

Opt::$main_content.='<script type="application/javascript">

function onManufacturer(el){
    
    var mDiv=el.parentNode;
    
    var sendurl="id="+mDiv.dataset.man_id+"&laptop=";
    
    if(mDiv.dataset.man_laptop==1){
        el.classList.remove("on");
        el.classList.add("off");
        mDiv.dataset.man_laptop=0;        
    }else{
        el.classList.remove("off");
        el.classList.add("on");        
        mDiv.dataset.man_laptop=1;
    }
    sendurl+=mDiv.dataset.man_laptop;   
    ajaxPostSend(sendurl,answerLaptop,true,true,"/ajax/admin/manufacturer.php");
}
function answerLaptop(arr){alert(arr.answer);}


</script>';

Opt::$main_content.='</div>';
//Opt::$main_content.=$manufactur->getManufacturer();