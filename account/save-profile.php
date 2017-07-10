<?php
/* Database connection settings */
/* User login process, checks if user exists and password is correct */
session_start();
include '../db.php';

$nombre = $mysqli->escape_string($_POST['nombre']);
$apellido = $mysqli->escape_string($_POST['apellido']);
$email = $mysqli->escape_string($_POST['email']);
$telefono = $mysqli->escape_string($_POST['telefono']);
$sorderdate=$mysqli->escape_string($_POST['fecha']);

$sorderdate = explode('/', $sorderdate);
$smonth = $sorderdate[1];
$sday   = $sorderdate[0];
$syear  = $sorderdate[2];

$date=$syear."-".$smonth."-".$sday;

$_SESSION['user']=$nombre;
$_SESSION['ape']=$apellido;
$_SESSION['email']=$email;
$_SESSION['telf']=$telefono;

$tipodoc=$mysqli->escape_string($_POST['tipodoc']);

switch ($tipodoc) {
    case 0:
        $numide=$mysqli->escape_string($_POST['dni']);
        break;
    case 1:
        $numide=$mysqli->escape_string($_POST['pasaporte']);
        break;
    case 2:
        $numide=$mysqli->escape_string($_POST['carnet']);
        break;
}

echo $numide;
$ciudadorigen=$mysqli->escape_string($_POST['ciudadorigen']);
//$ciudadactual=$mysqli->escape_string($_POST['ciudadactual']);
$genero=$mysqli->escape_string($_POST['genero']);
$direccion=$mysqli->escape_string($_POST['direccion']);
$cabecera=$mysqli->escape_string($_POST['cabecera']);
$posactual=$mysqli->escape_string($_POST['posactual']);
$result = $mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno='$_SESSION[cod]'");
$user = $result->fetch_assoc();
if ( $result->num_rows == 0 ){ // User doesn't exist
    $mysqli->query("INSERT INTO tbl_egresado(cod_alumno,psw_alumno,col_nombre,col_apellido,col_email,col_telf,
    col_fechanac,col_tipodoc,col_numide,col_ciudadorigen,col_genero,'col_direccion','col_cabecera','col_posactual')
    VALUES('$_SESSION[cod]','$_SESSION[pass]','$nombre','$apellido','$email','$telefono',
    '$date','$tipodoc','$numide','$ciudadorigen','$genero','$direccion','$cabecera','posactual')");
    echo "CASO 1";
}else{
    $mysqli->query("UPDATE tbl_egresado SET  col_nombre='$nombre', col_apellido='$apellido', 
    col_email='$email',col_telf='$telefono',col_fechanac='$date',col_tipodoc='$tipodoc',
    col_numide='$numide',col_ciudadorigen='$ciudadorigen',col_genero='$genero',col_direccion='$direccion',
    col_cabecera='$cabecera',col_posactual='$posactual' 
    WHERE cod_alumno='$_SESSION[cod]'");
    echo "CASO 2";
}


    header("location: ../session.php");
