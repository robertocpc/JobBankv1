<?php
session_start();
include '../db.php';

    $imagen=addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $mysqli->query("UPDATE tbl_egresado SET col_imgperfil='$imagen' WHERE cod_alumno='$_SESSION[cod]'");

    header ("location: ../session.php");
?>