<?php

session_start();
include '../db.php';

$cargo = $mysqli->escape_string($_POST['cargo']);
$empresa = $mysqli->escape_string($_POST['empresa']);
$direccion = $mysqli->escape_string($_POST['direccion']);
$ianio = $mysqli->escape_string($_POST['ianio']);
$imes = $mysqli->escape_string($_POST['imes']);
$fanio = $mysqli->escape_string($_POST['fanio']);
$fmes = $mysqli->escape_string($_POST['fmes']);


$mysqli->query("INSERT INTO tbl_workexp(cod_alumno,col_cargo,col_empresa,col_direccion,col_imes,col_ianio,col_fmes,col_fanio)
VALUES('$_SESSION[cod]','$cargo','$empresa','$direccion','$imes','$ianio','$fmes','$fanio')");



    header("location: ../work.php");
