<?php

session_start();
include '../db.php';

$esnombre = $mysqli->escape_string($_POST['esnombre']);
$estitulo = $mysqli->escape_string($_POST['estitulo']);
$escamp = $mysqli->escape_string($_POST['escamp']);


$sorderdate=$mysqli->escape_string($_POST['fecha']);

$sorderdate = explode('/', $sorderdate);
$smonth = $sorderdate[1];
$sday   = $sorderdate[0];
$syear  = $sorderdate[2];

$datein=$syear."-".$smonth."-".$sday;

$forderdate=$mysqli->escape_string($_POST['fecha2']);

$forderdate = explode('/', $forderdate);
$fmonth = $forderdate[1];
$fday   = $forderdate[0];
$fyear  = $forderdate[2];

$datefn=$fyear."-".$fmonth."-".$fday;

if($checkwork==true)
    $curwork=1;
else
    $curwork=0; 

$sentence="INSERT INTO tbl_estudio (cod_alumno,col_school,col_grado,col_campest,col_fechain, col_fechafin)
VALUES('$_SESSION[cod]','$esnombre','$estitulo','$escamp','$datein','$datefn')";
$mysqli->query($sentence);



header("location: ../session-index-s.php");
