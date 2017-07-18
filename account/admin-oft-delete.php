<?php
$id=$_REQUEST['id'];

include '../db.php';

echo $query=("DELETE FROM tbl_oftrabajo WHERE cod_oftrabajo=$id");
$mysqli->query($query);
//$mysqli->query("DELETE FROM tbl_oftrabajo WHERE cod_oftrabajo=$id");

