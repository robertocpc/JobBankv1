<?php
session_start();
$_SESSION['windows']=2;
include './header.php';
?>
        <div class="container">
            <div class="formulario">
                <div class="tab_izquierda shadow">
                    <button onclick="location.href = './session.php';" class="efex_button1">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Especializaciones</button><br>
                    <button onclick="location.href = './work.php';" class="efex_button1">Experiencia Laboral</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    <div class="tab_panel shadow">
                        <center>
                            <?php echo"<h2>Bienvenido de vuelta ".$_SESSION['user']." </h2>";?>
                        </center>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>