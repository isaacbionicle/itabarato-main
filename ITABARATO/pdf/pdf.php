<?php
include("fpdf.php");
$pdf=new FPDF("L","pt","A4");
$pdf->AddPage();
$pdf->SetFont("Times","",14);
$pdf->SetTextColor(255,255,255);
$pdf->SetFillColor(0, 250, 0);
$pdf->Cell(30,46,"Adios mundo",1,0,"L","true");
$pdf->SetDrawColor(0,0,250);
$pdf->Line(0,60,900,60);

$pdf->AddPage();
$pdf->SetXY(100,300);
$pdf->Cell(0,16,"Hola mundo",1,0,"L");


$pdf->AddPage();
$pdf->Image("no-disponible.jpg",0,0,300,250,"jpg","https://www.google.es/");
$pdf->SetFont("Times","",25);
$pdf->SetDrawColor(0,0,0);
$pdf->SetXY(310,20);
$pdf->Cell(0,26,"Hola mundo",1,1,"C");
$pdf->SetFont("Times","",15);
$pdf->SetXY(310,90);
$pdf->Cell(0,46,"Hola mundo",1,2,"L");

$pdf->SetFont("Times","",15);

$pdf->Cell(0,16,"Hola Manola",1,0,"L");
$pdf->Output("pagina.pdf","I");
?>