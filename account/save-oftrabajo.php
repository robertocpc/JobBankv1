<?php
session_Start();
include '../db.php';
echo $ofnombre=$_POST['ofnombre']; 
echo $ofempresa=$_POST['ofempresa'];
echo $ofubicacion=$_POST['ofubicacion'];
echo $ofemail=$_POST['ofemail'];
echo $oftelf=$_POST['oftelf'];
echo $tipem=$_POST['tipem'];
echo $tippos=$_POST['tippos'];
if(!isset($tippos))
   $tippos='NULL';

echo $inputpos=$_POST['inputpos'];
echo $ofurl=$_POST['ofurl'];
echo $fechalim=$_POST['fechalim'];

$sorderdate = explode('/', $fechalim);
$smonth = $sorderdate[1];
$sday   = $sorderdate[0];
$syear  = $sorderdate[2];

$date=$syear."-".$smonth."-".$sday;

echo $ofcan=$_POST['ofcan'];
echo $ofidioma=$_POST['ofidioma'];
echo $oftimin=$_POST['oftimin'];
echo $oflic=$_POST['oflic'];
if(!isset($oflic))
   $oflic='NULL';

echo $ofdisv=$_POST['ofdisv'];
echo $ofdisr=$_POST['ofdisr'];
echo $ofdescrip=$_POST['ofdescrip'];

echo $currentdate=date('Y-m-d');
echo "      ";
echo $query="INSERT INTO tbl_oftrabajo (disponible,col_ofnombre,col_empresa,col_ubicacion,
col_emailcon,col_telfcon,col_tipoempleo,col_tipopost,col_emdi,col_url,
col_fechalim,col_cantvacantes,col_idiomas,col_tiempoexp,col_liconducir,
col_dispviaje,col_dispresid,col_fechapub,col_descripcion) 
VALUES (1,'$ofnombre','$ofempresa','$ofubicacion','$ofemail','$oftelf','$tipem',
'$tippos','$inputpos','$ofurl','$date','$ofcan','$ofidioma','$oftimin',$oflic,
'$ofdisv','$ofdisr','$currentdate','$ofdescrip') ";
$mysqli-> query($query);

?>