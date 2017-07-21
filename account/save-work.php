<?php

session_start();
include '../db.php';

echo $cargo = $mysqli->escape_string($_POST['esnombre']);
echo $empresa = $mysqli->escape_string($_POST['estitulo']);
echo $expdir = $mysqli->escape_string($_POST['expdir']);
echo $ubicacion = $mysqli->escape_string($_POST['escamp']);
echo $trabajo = $mysqli->escape_string($_POST['trabajo']);

echo $sorderdate=$mysqli->escape_string($_POST['fecha']);

$sorderdate = explode('/', $sorderdate);
$smonth = $sorderdate[1];
$sday   = $sorderdate[0];
$syear  = $sorderdate[2];

echo $datein=$syear."-".$smonth."-".$sday;

echo $actual=$mysqli->escape_string($_POST['actual']);
if($actual==0){
    $forderdate=$mysqli->escape_string($_POST['fecha2']);

    $forderdate = explode('/', $forderdate);
    $fmonth = $forderdate[1];
    $fday   = $forderdate[0];
    $fyear  = $forderdate[2];

    echo $datefn=$fyear."-".$fmonth."-".$fday;
}
else{
    echo $datefn=date("Y-m-d");
}

echo $sentence="INSERT INTO tbl_workexp(cod_alumno,col_cargo,col_empresa,col_ubicacion,col_direccion,col_tipotrabajo,col_fechain,
col_actualtrab, col_fechafin)
VALUES('$_SESSION[cod]','$cargo','$empresa','$ubicacion','$expdir','$trabajo','$datein','$actual','$datefn')";
$mysqli->query($sentence);



    header("location: ../session-index-s.php");
