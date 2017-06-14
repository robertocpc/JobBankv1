<?php
session_start();
echo "Hola Mundo";
echo $_SESSION['message'];
session_destroy();
?>