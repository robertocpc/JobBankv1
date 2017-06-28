<?php

session_start();
include '../db.php';

$cargo = $mysqli->escape_string($_POST['cargo']);
$empresa = $mysqli->escape_string($_POST['empresa']);
$direccion = $mysqli->escape_string($_POST['direccion']);
$checkwork = $mysqli->escape_string($_POST['checkwork']);
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

if($checkwork==true)
    $curwork=1;
else
    $curwork=0; 


$mysqli->query("INSERT INTO tbl_estudio (cod_alumno,col_school,col_grado,col_campest,col_cursando,col_idia,
col_imes,col_ianio, col_fdia,col_fmes,col_fanio)
VALUES('$_SESSION[cod]','$cargo','$empresa','$direccion','$cursoanio','$sday','$smonth','$syear','$fday','$fmonth','$fyear')");



    header("location: ../listestudio.php");
