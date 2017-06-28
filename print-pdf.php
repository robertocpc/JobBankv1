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
    // Title
    $this->Cell(80,20,'Reporte: Experiencia Laboral',0,0,'C');
    // Line break
    $this->Ln(20);
}

function improvedTable($header){
    $w = array(10,45, 45, 25, 25,40);
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
$header = array('N','Cargo', 'Empresa', 'Desde', 'Hasta','Direccion');



$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->ImprovedTable($header);
$pdf->SetFont('Times','',12);

$sql = $mysqli->query("SELECT * FROM tbl_workexp WHERE cod_alumno='$_SESSION[cod]'");
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


$pdf->multicell(45,6,$row['col_cargo'],0, 'L');

$ver=$pdf->GetY();
$max=$ver;
//echo $ver."   ";

$pdf->setY($oldy);
$pdf->setX(10);
$pdf->multicell(10,6,$i+1,0,'L');
$pdf->setY($oldy);
$pdf->setX(65);
$pdf->multicell(45,6,$row['col_empresa'], 3,'L');
 
$aux=$pdf->GetY();
if($aux>$ver){
    $max=$aux;
}

$pdf->setY($oldy);
$pdf->setX(110);
$pdf->multicell(25,6,$row['col_idia']."/".$row['col_imes']."/".$row['col_ianio'],3,'L');

$aux=$pdf->GetY();
if($aux>$ver){
    $max=$aux;
}


if($row['col_actualtrab']!=1){$today=$row['col_fdia']."/".$row['col_fmes']."/".$row['col_fanio'];}else{$today='Actualidad';}

$pdf->setY($oldy);
$pdf->setX(135);


$pdf->multicell(25,6,$today,0,'L');

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
$pdf->multicell(45,3+$max-$oldy,'',1,'L');
$pdf->setY($oldy);
$pdf->setX(65);
$pdf->multicell(45,3+$max-$oldy,'',1,'L');
$pdf->setY($oldy);
$pdf->setX(110);
$pdf->multicell(25,3+$max-$oldy,'',1,'L');
$pdf->setY($oldy);
$pdf->setX(135);
$pdf->multicell(25,3+$max-$oldy,'',1,'L');
$pdf->setY($oldy);
$pdf->setX(160);
$pdf->multicell(40,3+$max-$oldy,'',1,'L');

$pdf->Ln();
$oldy=$max+3;
}

$pdf->Output();
?>