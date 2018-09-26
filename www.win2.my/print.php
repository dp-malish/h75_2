<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 26.09.2018
 * Time: 11:15
 */
$txt='';
$x=651;

if($x>=900 && $x<1000){$txt.='дев\'ятсот ';$x-=900;}
elseif($x>=800 && $x<900){$txt.='вісімсот ';$x-=800;}
elseif($x>=700 && $x<800){$txt.='сімсот ';$x-=700;}
elseif($x>=600 && $x<700){$txt.='шістсот ';$x-=600;}
elseif($x>=500 && $x<600){$txt.='п\'ятсот ';$x-=500;}
elseif($x>=400 && $x<500){$txt.='чотириста ';$x-=400;}
elseif($x>=300 && $x<400){$txt.='триста ';$x-=300;}
elseif($x>=200 && $x<300){$txt.='двісті ';$x-=200;}
elseif($x>=100 && $x<200){$txt.='сто ';$x-=100;}

$first = mb_substr($txt,0,1, 'UTF-8');
$first = mb_strtoupper($first, 'UTF-8');
//$last = mb_strtolower($last, 'UTF-8');


echo $txt.'  -  '.$x.$first;