<?php

session_start();
include '../db.php';

$cargo = $mysqli->escape_string($_POST['cargo']);
$empresa = $mysqli->escape_string($_POST['empresa']);
$direccion = $mysqli->escape_string($_POST['direccion']);
$checkwork = $mysqli->escape_string($_POST['checkwork']);
$trabajo = $mysqli->escape_string($_POST['trabajo']);

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


$mysqli->query("INSERT INTO tbl_workexp(cod_alumno,col_cargo,col_empresa,col_direccion,col_tipotrabajo,col_fechain,
col_actualtrab, col_fechafin)
VALUES('$_SESSION[cod]','$cargo','$empresa','$direccion','$trabajo','$datein','$curwork','$datefn')");



    header("location: ../work.php");
