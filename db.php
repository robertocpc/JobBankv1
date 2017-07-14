<?php
//$host = 'mysql.hostinger.es';
//$user = 'u264771524_root';
$pass = '4kegezvc';
//$db = 'u264771524_iswk';


$host='127.0.0.1';
$user='root';
$db='ISWork';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$acentos = $mysqli->query("SET NAMES 'utf8'");
