<?php
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
                <div class="tab_izquierda">
                    <button onclick="location.href = './session.php';" class="efex_button1 selected">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Especializaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Experiencia Laboral</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    <div class="tab_panel">
                        <center>
                            <img src="./img/profimage.png" height="160px">
                            <form method="POST" enctype="multipart/form-data">                           
                                    <label class="buttonefex1"><input class="file" type="file" title="files" name="image">Escoger Foto</label>
                                    <input class="buttonefex1" type="submit" name="submit" value="upload">
                            </form>
                        </center>
                    </div>
                    <div class="tab_panel padd">
                        <div class="tabizq">
                            <label class="tagg">Nombre:</label>
                            <?php echo"<label class='tagtext'>".$_SESSION['user']."</label>";?>
                        </div>
                        <div class="tabizq">    
                            <label class="tagg">Apellido:</label>
                            <?php echo"<label class='tagtext'>".$_SESSION['ape']."</label> ";?>
                        </div>
                        <div class="tabizq">
                            <label class="tagg">Email:</label>
                            <?php echo"<label class='tagtext'>".$_SESSION['email']."</label>";?>
                        </div>
                        <div class="tabizq">
                            <label class="tagg">Telefono:</label>
                            <?php echo"<label class='tagtext'>".$_SESSION['telf']."</label>";?>
                        </div>
                        <a class="buttonefex1" href="./edit-profile.php">Modificar</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>