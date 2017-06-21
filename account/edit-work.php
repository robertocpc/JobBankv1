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


$mysqli->query("UPDATE tbl_workexp SET col_cargo='$cargo', col_empresa='$empresa',
 col_direccion='$direccion', col_ianio='$ianio', col_imes='$imes', 
 col_fanio='$fanio', col_fmes='$fmes' WHERE cod_workexp='$_SESSION[workexpid]'");



    header("location: ../work.php");
