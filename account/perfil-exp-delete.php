<?php

    include '../db.php';
    $id=$_REQUEST['id'];
    $mysqli->query("DELETE FROM tbl_workexp WHERE cod_workexp='$id'");
    header("location: ../session-index-s.php");
?>