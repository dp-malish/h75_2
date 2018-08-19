<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 18.08.2018
 * Time: 0:26
 */


$er='[{"manufacturer_id":"1","image":null,"name":"Asus","sort_order":"0"},{"manufacturer_id":"2","image":null,"name":"Dell","sort_order":"0"}]';


$dfg=json_decode($er,true);

var_dump($dfg);

echo $dfg[0]["name"].'<br>'.'<br>'.'<br>'.'<br>'.'<br>';

foreach($dfg AS $v){
    echo $v['manufacturer_id'].'  '.mb_strtolower($v['name'],'UTF-8').'<br>';



}

print_r($dfg);



