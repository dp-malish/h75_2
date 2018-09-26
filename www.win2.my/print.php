<?php

$txt='';
$x=3614.47;


$kop=number_format($x- floor($x),2);
$kop=mb_strcut($kop,2);
$x=intval($x);


if($x>=1000 && $x<2000){$txt.='одна тисяча ';$x-=1000;}
elseif($x>=2000 && $x<3000){$txt.='дві тисячі ';$x-=2000;}
elseif($x>=3000 && $x<4000){$txt.='три тисячі ';$x-=3000;}



if($x>=900 && $x<1000){$txt.='дев\'ятсот ';$x-=900;}
elseif($x>=800 && $x<900){$txt.='вісімсот ';$x-=800;}
elseif($x>=700 && $x<800){$txt.='сімсот ';$x-=700;}
elseif($x>=600 && $x<700){$txt.='шістсот ';$x-=600;}
elseif($x>=500 && $x<600){$txt.='п\'ятсот ';$x-=500;}
elseif($x>=400 && $x<500){$txt.='чотириста ';$x-=400;}
elseif($x>=300 && $x<400){$txt.='триста ';$x-=300;}
elseif($x>=200 && $x<300){$txt.='двісті ';$x-=200;}
elseif($x>=100 && $x<200){$txt.='сто ';$x-=100;}

if($x>=90 && $x<100){$txt.='дев\'яносто ';$x-=90;}
elseif($x>=80 && $x<90){$txt.='вісімдесят ';$x-=80;}
elseif($x>=70 && $x<80){$txt.='сімдесят ';$x-=70;}
elseif($x>=60 && $x<70){$txt.='шістдесят ';$x-=60;}
elseif($x>=50 && $x<60){$txt.='п\'ятдесят ';$x-=50;}
elseif($x>=40 && $x<50){$txt.='сорок ';$x-=40;}
elseif($x>=30 && $x<40){$txt.='тридцять ';$x-=30;}
elseif($x>=20 && $x<30){$txt.='двадцять ';$x-=20;}

if($x>=1 && $x<20){
    if($x==1){$txt.='один ';}
    elseif($x==2){$txt.='два ';}
    elseif($x==3){$txt.='три ';}
    elseif($x==4){$txt.='чотири ';}
    elseif($x==5){$txt.='п\'ять ';}
    elseif($x==6){$txt.='шість ';}
    elseif($x==7){$txt.='сім ';}
    elseif($x==8){$txt.='вісім ';}
    elseif($x==9){$txt.='дев\'ять ';}
    elseif($x==10){$txt.='десять ';}
    elseif($x==11){$txt.='одинадцять ';}
    elseif($x==12){$txt.='дванадцять ';}
    elseif($x==13){$txt.='тринадцять ';}
    elseif($x==14){$txt.='чотирнадцять ';}
    elseif($x==15){$txt.='п\'тнадцять ';}
    elseif($x==16){$txt.='шістнадцять ';}
    elseif($x==17){$txt.='сімнадцять ';}
    elseif($x==18){$txt.='вісімнадцять ';}
    elseif($x==19){$txt.='дев\'ятнадцять ';}
}


$first = mb_substr($txt,0,1, 'UTF-8');
$first = mb_strtoupper($first, 'UTF-8');
$txt=mb_strcut($txt,2);
$txt=$first.$txt;

echo $txt.'гривень '.$kop.' коп.';