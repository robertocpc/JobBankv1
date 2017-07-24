<?php

session_start();
include '../db.php';

$pubtitulo = $mysqli->escape_string($_POST['pubtitulo']);
$pubeditorial = $mysqli->escape_string($_POST['pubeditorial']);

$puburl = $mysqli->escape_string($_POST['puburl']);
$pubdescrip = $mysqli->escape_string($_POST['pubdescrip']);

$sorderdate=$mysqli->escape_string($_POST['fecha']);

$sorderdate = explode('/', $sorderdate);
$smonth = $sorderdate[1];
$sday   = $sorderdate[0];
$syear  = $sorderdate[2];

$date=$syear."-".$smonth."-".$sday;

if($puburl!=''){
    if(substr($puburl, 0, 4)!='http'){
        $puburl="http://".$puburl;
    }
}
$sentence="INSERT INTO tbl_publicacion(cod_alumno,col_titulo,col_editor,col_fecha,
col_url,col_descrip)
VALUES('$_SESSION[cod]','$pubtitulo','$pubeditorial','$date','$puburl','$pubdescrip')";
$mysqli->query($sentence);



    header("location: ../session-index-s.php");
