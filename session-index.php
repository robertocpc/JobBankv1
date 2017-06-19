<?php
session_start();
$_SESSION['windows']=2;
include './header.php';
?>
        <div class="container">
            <!--div class="panel-inicio">
                <center><div class="izquierda"><img src="./img/profimage.png" height="165"></div>
                <label class="font">Roberto Carlos Pongo Condori</label><br>
                <label>Front-end Developer</label>
                </center>
                <ul>
                    <li><a href="./account/profile.php"><img src="./imglogo/user.png"></a></li>
                    <li><a href="./account/certificate.php"><img src="./imglogo/certificate.png"></a></li>
                    <li><a href="./account/special.php"><img src="./imglogo/school.png"></a></li>
                    <li><a href="./account/work.php"><img src="./imglogo/briefcase.png"></a></li>
                </ul>
            </div-->



            <div class="formulario">
                <!--nav class="tab_izquierda">
                    <ul>
                    <li><a href="./panel_inf.php" class="efx_button1">Información Personal</a></li>
                    <li><a href="./panel_cap.php" class="efx_button1">Capacitaciones</a></li>
                    <li><a href="./panel_esp.php" class="efx_button1">Especializaciones</a></li>
                    <li><a href="./panel_bdt.php" class="efx_button1">Bolsa de Trabajo</a></li>
                    </ul>
                </nav-->
                <div class="tab_izquierda shadow">
                    <button onclick="location.href = './session.php';" class="efex_button1">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Especializaciones</button><br>
                    <button onclick="location.href = './account/work.php';" class="efex_button1">Experiencia Laboral</button><br>
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