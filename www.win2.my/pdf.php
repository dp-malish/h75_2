<?php
/**
 * Created by PhpStorm.
 * User: Аватар
 * Date: 09.08.2017
 * Time: 00:12
 */
//namespace lib\Def;
Error_Reporting(E_ALL & ~E_NOTICE);ini_set('display_errors',1);
set_include_path(get_include_path().PATH_SEPARATOR.'../');spl_autoload_register();
$Opt=new \lib\Def\Opt('win');//Def opt

//define('FPDF_FONTPATH','/Library/WebServer/Documents/derby/font/');

require( '../fpdf181/fpdf.php' );

$pdf = new FPDF();
$pdf->SetFont('Arial','',12);
$pdf->AddPage();

$pdf->SetAuthor("Collis and Cyan Ta'eed"); 
$pdf->SetTitle("How to be a Rockstar Freelancer"); 
$pdf->SetSubject("Freelancing"); 
$pdf->SetKeywords("Freelance Brand Project Contract Marketing Clients"); 
$pdf->SetCreator("EnvatoEdit");

$pdf->SetLineWidth(1);
$pdf->SetFillColor(136, 196, 184); 
$pdf->SetTextColor(255,45,165);
$pdf->Cell(35,10,"Hello World".'2+8',"TLB");

$pdf->Ln(50);
//$this->SetX(367); 
    //$this->Cell(100, 20, "Total", 1); 
    //$this->Cell(100, 20, '$$$$$$$', 1, 1, 'R'); 

$message = "Thank you for ordering at the Nettuts+ online store. Our policy is to ship your materials within two business days of purchase. On all orders over $20.00, we offer free 2-3 day shipping. If you haven't received your items in 3 busines days, let us know and we'll reimburse you 5%.\n\nWe hope you enjoy the items you have purchased. If you have any questions, you can email us at the following email address:"; 
$pdf->MultiCell(0, 15, $message);
//$pdf->Ln(3);
$pdf->SetY(100);
$pdf->SetX(100);
$pdf->SetFont('Arial', 'U', 12); 
$pdf->SetTextColor(1, 162, 232); 
 
$pdf->Write(25, "store@nettuts.com", "mailto:example@example.com");


$pdf->SetXY(0,-30); 
    $pdf->Cell(0, 20, "Thank you for shopping at Nettuts+!", 'T', 0, 'C');
	
$pdf->Line(35,35 , 150, 170);



$pdf->Ln(150);
// Set font
$pdf->SetFont('Arial','B',16);
// Move to 8 cm to the right
$pdf->Cell(10);
// Centered text in a framed 20*10 mm cell and line break
$pdf->Cell(20,10,'Title',1,1,'C',true);


$pdf->Output();
