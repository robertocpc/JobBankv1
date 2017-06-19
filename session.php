<?php
include './header.php';
?>
        <div class="container">
        
            <div class="formulario">
                
                <div class="tab_izquierda shadow">
                    <button onclick="location.href = './session.php';" class="efex_button1 selected">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Especializaciones</button><br>
                    <button onclick="location.href = './account/work.php';" class="efex_button1">Experiencia Laboral</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    <div class="tab_panel shadow">
                        <div class="alignleft">
                            <form method="POST" enctype="multipart/form-data">                           
                                <img src="./img/profimage.png" height="160px">
                                <label class="edit" onclick="myFunction()">
                                    <input class="file" type="file" title="files" name="image">
                                </label><br>
                                <input class="buttonefex1" type="submit" name="submit" value="subir">
                            </form>
                        </div>
                        <div class="alignleft">
                            <label class="tagg">Nombre:</label>
                            <?php echo"<label class='tagtext'>".$_SESSION['user']."</label>";?>
                           <li><a href="./edit-profile.php"><img src="./imglogo/edit-interface-sign.png" height="24px"></a></li>
                        </div>
                        <div class="alignleft">    
                            <label class="tagg">Apellido:</label>
                            <?php echo"<label class='tagtext'>".$_SESSION['ape']."</label> ";?>
                        </div>
                        <div class="alignleft">
                            <label class="tagg">Email:</label>
                            <?php echo"<label class='tagtext'>".$_SESSION['email']."</label>";?>
                        </div>
                        <div class="alignleft">
                            <label class="tagg">Telefono:</label>
                            <?php echo"<label class='tagtext'>".$_SESSION['telf']."</label>";?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script>
// When the user clicks on div, open the popup
function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
</html>