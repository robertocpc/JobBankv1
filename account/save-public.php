<?php

session_start();
include '../db.php';

$titulo = $mysqli->escape_string($_POST['titulop']);
$editor = $mysqli->escape_string($_POST['editor']);
$autor = $mysqli->escape_string($_POST['autor']);
$urlp = $mysqli->escape_string($_POST['urlp']);
$desp = $mysqli->escape_string($_POST['desp']);

$sorderdate=$mysqli->escape_string($_POST['fecha']);

$sorderdate = explode('/', $sorderdate);
$smonth = $sorderdate[1];
$sday   = $sorderdate[0];
$syear  = $sorderdate[2];

$date=$syear."-".$smonth."-".$sday;

if($urlp!=''){
    if(substr($urlp, 0, 4)!='http'){
        $urlp="http://".$urlp;
    }
}

$mysqli->query("INSERT INTO tbl_publicacion(cod_alumno,col_titulo,col_editor,col_fecha,col_autor,
col_url,col_descrip)
VALUES('$_SESSION[cod]','$titulo','$editor','$date','$autor','$urlp','$desp')");



    header("location: ../addpublic.php");
