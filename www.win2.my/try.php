<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 18.08.2018
 * Time: 0:26
 */


Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new \lib\Def\Opt('win');//


/*$pdf=new lib\printer\pdf\White_Reporting\Invoice();

$pdf->getPdf();*/

$spd='Фізична особа-підприємець Баранов Олександр Євгенович';
$spd_bank='П/р 978987798798';
$spd_adress='Mariupol';
$spd_inn='777';

$kontr_agent='Firma';
$kontr_agent_bank='П/р 978987798798 $kontr_agent_bank';
$kontr_agent_adress='Mariupol';
$kontr_agent_inn='888';


$perechen=[
    ['Виїзд до обладнення','2','100.33'],
    ['Виїзд до обладнення2','1','1200']
];

lib\printer\pdf\White_Reporting\Invoice::getPdf(7,'31 серпня 2018 р.',$spd,$spd_bank,$spd_adress,$spd_inn,$kontr_agent);