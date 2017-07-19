<?php
session_Start();
include '../db.php';
 echo $ofnombre=$_POST['ofnombre']; 
 echo $ofapellido=$_POST['ofapellido'];
 echo $ofusername=$_POST['ofusername'];
 echo $ofpassword=$_POST['ofpassword'];
 
 echo $query="INSERT INTO tbl_egresado (col_nombre,col_apellido,cod_alumno,psw_alumno)
VALUES ('$ofnombre','$ofapellido','$ofusername','$ofpassword')";
$mysqli-> query($query);

?>