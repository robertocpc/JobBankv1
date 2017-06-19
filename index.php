<?php
session_start();
$_SESSION['windows']=5;
include './header.php';
?>
    <div id="showcase">
        <div class="container sub1">
            <h1>Escuela Profesional de Ingeniería en Informática y Sistemas</h1>
            <center><h3>Universidad Nacional Jorge Basadre Grohmann</h3></center>
            <p></p>
        </div>
        <div id="newsletter">
            <div class="container">
                <h1>¿Busca algún profesional..?</h1>
                <form action="search.php">
                    <input type="search" placeholder="Introdusca palabra clave">
                    <input type="submit" class="button_1" value="Buscar"></input>
                </form>
            </div>
        </div>
    </div>
</body>
</html>