<?php
include './header.php';
?>
        <div class="container">
            <div class="formulario">
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
                            <?php echo"<label class='tagtext'>".$_SESSION['telf']."</label>";?>
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