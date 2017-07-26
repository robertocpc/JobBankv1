<?php
//$host = 'mysql.hostinger.es';
//$user = 'u264771524_root';
//$db = 'u264771524_iswk';

$pass = '4kegezvc';

$host='127.0.0.1';
$user='root';
$db='ISWork';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
$acentos = $mysqli->query("SET NAMES 'utf8'");
