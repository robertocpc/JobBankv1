<?php

    include '../db.php';
    $id=$_REQUEST['id'];
    $mysqli->query("DELETE FROM tbl_estudio WHERE cod_estudio='$id'");
    header("location: ../session-index-s.php");
?>