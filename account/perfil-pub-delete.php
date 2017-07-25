<?php

    include '../db.php';
    $id=$_REQUEST['id'];
    $mysqli->query("DELETE FROM tbl_publicacion WHERE cod_publicacion='$id'");
    header("location: ../session-index-s.php");
?>