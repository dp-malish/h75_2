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

define('FPDF_FONTPATH','../fpdf181/font/');

require( '../fpdf181/fpdf.php' );

$pdf = new FPDF();
// добавляем шрифт ариал
$pdf->AddFont('Arial','','arial.php');
// устанавливаем шрифт Ариал
$pdf->SetFont('Arial');
//$pdf->SetFont('Arial','',12);
$pdf->AddPage();


$pdf->SetLineWidth(0.5);
$pdf->SetFillColor(5, 255, 184);
//$pdf->SetTextColor(255,45,165);
$pdf->SetFontSize(16);

$txt='Рахунок на оплату № 1 від 30 серпня 2018 р.';

$txt = iconv( 'utf-8','utf-8//IGNORE', $txt);

$pdf->Cell(190,10,$txt,"BT");


















$pdf->Output();