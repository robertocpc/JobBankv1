<?php
session_Start();
include '../db.php';
 $ofnombre=$_POST['ofnombre']; 
 $ofempresa=$_POST['ofempresa'];
 $ofubicacion=$_POST['ofubicacion'];
 $ofemail=$_POST['ofemail'];
 $oftelf=$_POST['oftelf'];
 $tipem=$_POST['tipem'];
 $tippos=$_POST['tippos'];
if(!isset($tippos))
   $tippos='NULL';

 $inputpos=$_POST['inputpos'];
 $ofurl=$_POST['ofurl'];
 $fechalim=$_POST['fechalim'];

$sorderdate = explode('/', $fechalim);
$smonth = $sorderdate[1];
$sday   = $sorderdate[0];
$syear  = $sorderdate[2];

$date=$syear."-".$smonth."-".$sday;

 $ofcan=$_POST['ofcan'];
if(!isset($ofcan)||$ofcan=='')
   $ofcan='NULL';

 $ofidioma=$_POST['ofidioma'];
 $oftimin=$_POST['oftimin'];
 $oflic=$_POST['oflic'];
if(!isset($oflic))
   $oflic='NULL';

 $ofdisv=$_POST['ofdisv'];
 $ofdisr=$_POST['ofdisr'];
 $ofdescrip=$_POST['ofdescrip'];

 $currentdate=date('Y-m-d');
 "      ";
 $query="INSERT INTO tbl_oftrabajo (disponible,col_ofnombre,col_empresa,col_ubicacion,
col_emailcon,col_telfcon,col_tipoempleo,col_tipopost,col_emdi,col_url,
col_fechalim,col_cantvacantes,col_idiomas,col_tiempoexp,col_liconducir,
col_dispviaje,col_dispresid,col_fechapub,col_descripcion) 
VALUES (1,'$ofnombre','$ofempresa','$ofubicacion','$ofemail','$oftelf','$tipem',
'$tippos','$inputpos','$ofurl','$date',$ofcan,'$ofidioma','$oftimin',$oflic,
'$ofdisv','$ofdisr','$currentdate','$ofdescrip') ";
$mysqli-> query($query);
header("location: ../session-admi.php");
?>