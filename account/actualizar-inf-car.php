<?php
session_start();
include '../db.php';

$result = $mysqli->query("SELECT * FROM tbl_oasa WHERE cod_alumno='$_SESSION[cod]'");
$user = $result->fetch_assoc();


$mysqli->query("UPDATE tbl_egresado SET  col_fechaing='$user[col_fechaing]',col_fechafin='$user[col_fechafin]',
    col_promedio='$user[col_promedio]',col_tesis='$user[col_tesis]',cod_tesis='$user[cod_tesis]',
    col_urltesis='$user[col_urltesis]'
    WHERE cod_alumno='$_SESSION[cod]'");
echo "bien";
    header("location: ../inf-carrera.php");

?>