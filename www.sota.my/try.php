<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 28.09.2018
 * Time: 21:19
 */

$role=5;
$menu=[

    'burger'=>[
        ['link'=>'сервис','title'=>'Сервис','def'=>true,'hiden'=>false,'role'=>[0,1,6]],
        ['link'=>'ремонт','title'=>'Ремонт','def'=>true,'hiden'=>false,'role'=>[1,2,3]],
        ['link'=>'сайты','title'=>'Сайты','def'=>true,'hiden'=>false,'role'=>[0,1]],
        ['link'=>'магазин','title'=>'Магазин','def'=>true,'hiden'=>false,'role'=>[0,1]],
        ['link'=>'контакты','title'=>'Контакты','def'=>true,'hiden'=>false,'role'=>[0,5]]
    ],

    'burger2'=>[
        ['link'=>'контакты5','title'=>'Контакты5','role'=>[0,5]],
        ['link'=>'контакты6','title'=>'Контакты6','role'=>[1,2,3]],
        ['link'=>'контакты7','title'=>'Контакты7','role'=>[0,5]],
        ['link'=>'контакты8','title'=>'Контакты8','role'=>[0,5]]
    ]


];

$menu2=[
    ['link'=>'контакты','title'=>'Контакты','role'=>[0,1]],
    ['link'=>'контакты2','title'=>'Контакты2','role'=>[1,2,3]],
    ['link'=>'контакты3','title'=>'Контакты3','role'=>[0,1]],
    ['link'=>'контакты4','title'=>'Контакты4','role'=>[0,5]]



];

foreach($menu as $k=>$v){

    echo $k.'<br>';

    foreach ($v as $item){




        foreach ( $item['role'] as $role_arr){
            if($role==$role_arr)
                echo '<br><br>*******'.$item['link'].'---'.$item['title'].'*******'.$role_arr.'<br><br>';
            //echo '===='.$key.'   '.$val. '<br>';
        }

    }



}
echo '<br><br><br><br>';
    //echo $k.'  '.$v;
print_r($menu);

echo '<br><br><br><br>';

print_r($menu['burger']);
//foreach($menu['burger'] as $item){ //$burger.='<li>'.$item['title'].'</li>';}
echo '<br><br><br><br>';
$rnd=random_int(10,99);
echo substr(uniqid(), -8,7).random_int(10,99).'----'.uniqid ();