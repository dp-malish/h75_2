<?php
/**
 * Created by PhpStorm.
 * User: Аватар
 * Date: 09.08.2017
 * Time: 00:12
 */

//define('FPDF_FONTPATH','/Library/WebServer/Documents/derby/font/');

require( '../fpdf181/fpdf.php' );

$pdf = new FPDF();
$pdf->SetFont('Arial','',52);
$pdf->AddPage();
$pdf->Cell(20,10,"Hello World2+5!",55);
$pdf->Output();
