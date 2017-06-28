<?php

session_start();
include '../db.php';

$cargo = $mysqli->escape_string($_POST['cargo']);
$empresa = $mysqli->escape_string($_POST['empresa']);
$direccion = $mysqli->escape_string($_POST['direccion']);


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

$mysqli->query("UPDATE tbl_workexp SET col_cargo='$cargo', col_empresa='$empresa',
 col_direccion='$direccion', col_ianio='$syear',col_actualtrab='$curwork' ,col_imes='$smonth',col_idia='$sday', 
 col_fanio='$fyear', col_fmes='$fmonth',col_fdia='$fday' WHERE cod_workexp='$_SESSION[workexpid]'");



    header("location: ../work.php");
