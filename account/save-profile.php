<?php
/* Database connection settings */
/* User login process, checks if user exists and password is correct */
session_start();
include '../db.php';

$nombre = $mysqli->escape_string($_POST['nombre']);
$apellido = $mysqli->escape_string($_POST['apellido']);
$email = $mysqli->escape_string($_POST['email']);
$telefono = $mysqli->escape_string($_POST['telefono']);

$_SESSION['user']=$nombre;
$_SESSION['ape']=$apellido;
$_SESSION['email']=$email;
$_SESSION['telf']=$telefono;

$result = $mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno='$_SESSION[cod]'");
$user = $result->fetch_assoc();
if ( $result->num_rows == 0 ){ // User doesn't exist
    $mysqli->query("INSERT INTO tbl_egresado(cod_alumno,psw_alumno,col_nombre,col_apellido,col_email,col_telf)
    VALUES('$_SESSION[cod]','$_SESSION[pass]','$nombre','$apellido','$email')");
    echo "CASO 1";
}else{
    $mysqli->query("UPDATE tbl_egresado SET  col_nombre='$nombre', col_apellido='$apellido', 
    col_email='$email',col_telf='$telefono'  WHERE cod_alumno='$_SESSION[cod]'");
    echo "CASO 2";
}


    header("location: ../session.php");
