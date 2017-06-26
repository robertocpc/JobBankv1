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




$mysqli->query("INSERT INTO tbl_workexp(cod_alumno,col_cargo,col_empresa,col_direccion,col_idia,
col_imes,col_ianio,col_fdia,col_fmes,col_fanio)
VALUES('$_SESSION[cod]','$cargo','$empresa','$direccion','$sday','$smonth','$syear','$fday','$fmonth','$fyear')");



    header("location: ../work.php");
