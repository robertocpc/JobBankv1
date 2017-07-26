<?php
include '../db.php';

if(isset($_POST['post'])){
   echo"ddfg";
   $myfile="./editor.txt";
   file_exists($myfile) or die('no existe');
   echo $newData=nl2br(htmlspecialchars($_POST['post']));
   file_put_contents('./editor.txt', "Holaaa");
   $handle=fopen("/var/www/html/JobBankv1/account/editor.txt","a+") or die("no puede abrir");
   fwrite($handle,$newData);
   fclose($handle);
}

//header("location: ../session-admi.php");

?>