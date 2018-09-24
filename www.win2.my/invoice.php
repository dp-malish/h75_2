<?php
/**
 * Created by PhpStorm.
 * User: Дом
 * Date: 20.09.2018
 * Time: 0:48
 */

Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new \lib\Def\Opt('win');//Def opt

//define('FPDF_FONTPATH','../fpdf181/font/');

require( '../fpdf181/fpdf.php' );

$pdf = new FPDF();
// добавляем шрифт ариал
$pdf->AddFont('Arial','','arial.php');
// устанавливаем шрифт Ариал
//$pdf->SetFont('Arial');
$pdf->SetFont('Arial','',12);
$pdf->AddPage();

$doc_num=7;
$doc_num_date='31 серпня 2018 р.';

$spd='Фізична особа-підприємець Баранов Олександр Євгенович';
$spd_bank='П/р 978987798798';
$spd_adress='Mariupol';
$spd_inn='777';

$kontr_agent='Firma';
$kontr_agent_bank='П/р 978987798798 $kontr_agent_bank';
$kontr_agent_adress='Mariupol';
$kontr_agent_inn='888';

$pdf->SetLineWidth(0.5);
$pdf->SetFontSize(16);

$txt='Рахунок на сплату № '.$doc_num.' від '.$doc_num_date;
$txt=iconv( 'utf-8','windows-1251',$txt);
$pdf->Cell(190,9,$txt,"B");


//постачальник
$pdf->SetLineWidth(0.5);
$pdf->SetXY(10,23);
$pdf->SetFontSize(12);
$pdf->Cell(190,28,'',1);
//левый квадрат
$pdf->SetLineWidth(0.5);
$pdf->SetXY(10,23);
$txt='Постачальник:';
$txt=iconv( 'utf-8','windows-1251',$txt);
$pdf->Cell(33,28,$txt,1,1,'C',false);

//правый квадрат
//1 стр
$pdf->SetLineWidth(0.5);
$pdf->SetXY(43,23);
// Arial bold 14
$pdf->AddFont('ArialBold','','ArialBold.php');

$txt=iconv( 'utf-8','windows-1251',$spd);
$pdf->Cell(157,7,$txt,1,1,'L',false);

//2 стр
$pdf->AddFont('Arial','','arial.php');

$pdf->SetLineWidth(0.5);
$pdf->SetXY(43,30);
// Arial 12
$pdf->SetFont('Arial','',10);

$txt=iconv( 'utf-8','windows-1251',$spd_bank);
$pdf->Cell(157,7,$txt,1,1,'L',false);

//3 стр
$pdf->SetLineWidth(0.5);
$pdf->SetXY(43,37);
// Arial 12
$pdf->SetFont('Arial','',10);

$txt=iconv( 'utf-8','windows-1251',$spd_adress);
$pdf->Cell(157,7,$txt,1,1,'L',false);


//4 стр
$pdf->SetLineWidth(0.5);
$pdf->SetXY(43,44);
// Arial 12
$pdf->SetFont('Arial','',10);

$txt=iconv( 'utf-8','windows-1251',$spd_inn);
$pdf->Cell(157,7,$txt,1,1,'L',false);
//*************************
//*************************
//*************************
//*************************
//постачальник
$pdf->SetLineWidth(0.5);
$pdf->SetXY(10,53);
$pdf->SetFontSize(12);
$pdf->Cell(190,28,'',1);
//левый квадрат
$pdf->SetLineWidth(0.5);
$pdf->SetXY(10,53);
$txt='Покупець:';
$txt=iconv( 'utf-8','windows-1251',$txt);
$pdf->Cell(33,28,$txt,1,1,'C',false);

//правый квадрат
//1 стр
$pdf->SetLineWidth(0.5);
$pdf->SetXY(43,53);
// Arial bold 14
$pdf->AddFont('ArialBold','','ArialBold.php');

$txt=iconv( 'utf-8','windows-1251',$kontr_agent);
$pdf->Cell(157,7,$txt,1,1,'L',false);

//2 стр
$pdf->AddFont('Arial','','arial.php');

$pdf->SetLineWidth(0.5);
$pdf->SetXY(43,60);
// Arial 12
$pdf->SetFont('Arial','',10);

$txt=iconv( 'utf-8','windows-1251',$kontr_agent_bank);
$pdf->Cell(157,7,$txt,1,1,'L',false);

//3 стр
$pdf->SetLineWidth(0.5);
$pdf->SetXY(43,67);
// Arial 12
$pdf->SetFont('Arial','',10);

$txt=iconv( 'utf-8','windows-1251',$kontr_agent_adress);
$pdf->Cell(157,7,$txt,1,1,'L',false);

//4 стр
$pdf->SetLineWidth(0.5);
$pdf->SetXY(43,74);
// Arial 12
$pdf->SetFont('Arial','',10);

$txt=iconv( 'utf-8','windows-1251',$kontr_agent_inn);
$pdf->Cell(157,7,$txt,1,1,'L',false);

//*************************
//*************************


$pdf->SetXY(10,77);
$txt='Договір:';
$txt=iconv( 'utf-8','windows-1251',$txt);
$pdf->Cell(33,28,$txt,false,1,'C',false);
//*************************
//*************************
//1 столбец
$pdf->SetLineWidth(0.5);
$pdf->SetXY(43,74);
// Arial 12
$pdf->SetFont('Arial','',10);

$txt=iconv( 'utf-8','windows-1251',$kontr_agent_inn);
$pdf->Cell(157,7,$txt,1,1,'L',false);




$pdf->Output();