<?php
session_start();
include './db.php';
require('./fpdf/fpdf.php');

$casa=1;

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('./img/logo_50.png',15,6,60);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Move to the right
    $this->Cell(50);
    $this->Cell();
    // Title
    $this->Cell(80,20,'Reporte: Estudios/Especializacion',0,0,'C');
    // Line break
    $this->Ln(20);
}

function improvedTable($header){
    $w = array(10,40, 40, 35, 25,20,20);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    
       
    
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class

$pdf = new PDF();
$header = array('N','Ins/Uni', 'Grado','Campo de Estudio','Cursando', 'Desde', 'Hasta');



$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->ImprovedTable($header);
$pdf->SetFont('Times','',10);

$sql = $mysqli->query("SELECT * FROM tbl_estudio WHERE cod_alumno='$_SESSION[cod]'");
$i=0;
$pos=43;
$ver=37;
$oldy=37;
$max=43;
while($row = $sql->fetch_assoc())
{

$pdf->Ln();
$pdf->setY($oldy);
$pdf->setX(20);


$pdf->multicell(40,6,$row['col_school'],0, 'L');

$ver=$pdf->GetY();
$max=$ver;
//echo $ver."   ";

$pdf->setY($oldy);
$pdf->setX(10);
$pdf->multicell(10,6,$i+1,0,'L');
$pdf->setY($oldy);
$pdf->setX(60);
$pdf->multicell(40,6,$row['col_grado'], 3,'L');
 
$aux=$pdf->GetY();
if($aux>$ver){
    $max=$aux;
}
$pdf->setY($oldy);
$pdf->setX(100);
$pdf->multicell(35,6,$row['col_campest'], 3,'L');

$aux=$pdf->GetY();
if($aux>$ver){
    $max=$aux;
}
$pdf->setY($oldy);
$pdf->setX(135);
$pdf->multicell(25,6,$row['col_cursando'], 3,'L');

$aux=$pdf->GetY();
if($aux>$ver){
    $max=$aux;
}

$pdf->setY($oldy);
$pdf->setX(160);
$pdf->multicell(20,6,$row['col_idia']."/".$row['col_imes']."/".$row['col_ianio'],3,'L');

$aux=$pdf->GetY();
if($aux>$ver){
    $max=$aux;
}


if($row['col_actualtrab']!=1){$today=$row['col_fdia']."/".$row['col_fmes']."/".$row['col_fanio'];}else{$today='Actualidad';}

$pdf->setY($oldy);
$pdf->setX(180);


$pdf->multicell(20,6,$today,0,'L');

$aux=$pdf->GetY();
if($aux>$ver){
    $max=$aux;
}

$pdf->setY($oldy);
$pdf->setX(160);


$pdf->multicell(40,6,$row['col_direccion'],0,'L');

$aux=$pdf->GetY();
if($aux>$ver){
    $max=$aux;
}

$i++;

$pdf->setY($oldy);
$pdf->setX(10);
$pdf->multicell(10,3+$max-$oldy,'',1,'L');
$pdf->setY($oldy);
$pdf->setX(20);
$pdf->multicell(40,3+$max-$oldy,'',1,'L');
$pdf->setY($oldy);
$pdf->setX(60);
$pdf->multicell(40,3+$max-$oldy,'',1,'L');
$pdf->setY($oldy);
$pdf->setX(100);
$pdf->multicell(35,3+$max-$oldy,'',1,'L');
$pdf->setY($oldy);
$pdf->setX(135);
$pdf->multicell(25,3+$max-$oldy,'',1,'L');
$pdf->setY($oldy);
$pdf->setX(160);
$pdf->multicell(20,3+$max-$oldy,'',1,'L');
$pdf->setY($oldy);
$pdf->setX(180);
$pdf->multicell(20,3+$max-$oldy,'',1,'L');

$pdf->Ln();
$oldy=$max+3;
}

$pdf->Output();
?>