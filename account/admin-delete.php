<?php

    include '../db.php';
    $id=$_REQUEST['id'];
    $mysqli->query("DELETE FROM tbl_egresado WHERE cod_alumno='$id'");
    header("location: ../session-admi.php");
?>