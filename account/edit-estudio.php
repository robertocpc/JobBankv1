<?php

session_start();
include '../db.php';

$cargo = $mysqli->escape_string($_POST['cargo']);
$empresa = $mysqli->escape_string($_POST['empresa']);
$direccion = $mysqli->escape_string($_POST['direccion']);
$cursoanio = $mysqli->escape_string($_POST['cursoanio']);


$sorderdate=$mysqli->escape_string($_POST['fecha']);

$sorderdate = explode('/', $sorderdate);
$smonth = $sorderdate[1];
$sday   = $sorderdate[0];
$syear  = $sorderdate[2];


$forderdate=$mysqli->escape_string($_POST['fecha2']);

$forderdate = explode('/', $forderdate);
$fmonth = $forderdate[1];
$fday   = $forderdate[0];
$fyear  = $forderdate[2];

$checkwork = $mysqli->escape_string($_POST['checkwork']);

if($checkwork==true)
    $curwork=1;
else
    $curwork=0; 

$mysqli->query("UPDATE tbl_estudio SET col_school='$cargo', col_grado='$empresa',
 col_campest='$direccion', col_cursando='$cursoanio',col_ianio='$syear' ,col_imes='$smonth',col_idia='$sday', 
 col_fanio='$fyear', col_fmes='$fmonth',col_fdia='$fday' WHERE cod_estudio='$_SESSION[estudio]'");



    header("location: ../listestudio.php");
