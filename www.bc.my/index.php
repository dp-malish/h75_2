<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 18.10.2020
 * Time: 23:16
 */

$arr=["32","jeijdio",8980,45.5];

$json_decode=json_encode($arr);
$json_decode2=serialize($arr);
$json_decode3=json_encode($arr);



echo $json_decode;
echo '<br><br><br>';
echo $json_decode2;
echo '<br><br><br>';
echo $json_decode3;
echo '<br><br><br>';

echo '<br><br><br>';