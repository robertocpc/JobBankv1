<?php
include './db.php';
include './header.php';
?>
        <div class="container">
        
            <div class="formulario">
                
                <div class="tab_izquierda shadow">
                    <button onclick="location.href = './session.php';" class="efex_button1 selected">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Especializaciones</button><br>
                    <button onclick="location.href = './work.php';" class="efex_button1">Experiencia Laboral</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    <div class="tab_panel shadow">
                        <div class="alignleft pic edit-profile">
                            <form id="imagen" enctype="multipart/form-data" method="post">                           
                                <?php
                                    $result=$mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno='$_SESSION[cod]'");
                                    $user = $result->fetch_assoc();
                                    if(isset($user['col_imgperfil'])){
                                        echo "<img src='data:image/jpg;base64,".base64_encode($user['col_imgperfil'])."' height='160px'>";
                                    }
                                    else{
                                        echo "<img src='./img/profimage.png' height='160px'>";
                                    }
                                ?>
                                <label class="edit">
                                    <input id="imagenn" class="file" type="file" name="image" required>
                                    <ul class="input-requirements">
                                        <li>Debe contener almenos 2 caracteres</li>
                                    </ul>

                                </label><br>
                                <input class="buttonefex1" type="submit" name="submit" value="subir" onclick="showFileSize()">
                            </form>
                        </div>
                        <div class="alignleft">
                            <label><span class="stag">Nombre:</span></label>
                            <?php echo"<label><span class='sinput'>".$_SESSION['user']."</span></label>";?>
                           <li><a href="./edit-profile.php"><img src="./imglogo/edit-interface-sign.png" height="24px"></a></li>
                        </div>
                        <div class="alignleft"label>    
                            <label><span class="stag">Apellido:</span></label>
                            <?php echo"<label><span class='sinput'>".$_SESSION['ape']."</span></label> ";?>
                        </div>
                        <div class="alignleft">
                            <label><span class="stag">Email:</span></label>
                            <?php echo"<label><span class='sinput'>".$_SESSION['email']."</span></label>";?>
                        </div>
                        <div class="alignleft">
                            <label ><span class="stag">Telefono:</span></label>
                            <?php echo"<label ><span class='sinput'>".$_SESSION['telf']."</span></label>";?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script type="text/javascript">


function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}

function showFileSize() {
    var input, file;

    // (Can't use `typeof FileReader === "function"` because apparently
    // it comes back as "object" on some browsers. So just see if it's there
    // at all.)
    if (!window.FileReader) {
        bodyAppend("p", "The file API isn't supported on this browser yet.");
        return;
    }

    input = document.getElementById('imagenn');
    if (!input) {
        bodyAppend("p", "Um, couldn't find the fileinput element.");
    }
    else if (!input.files) {
        bodyAppend("p", "This browser doesn't seem to support the `files` property of file inputs.");
    }
    else if (!input.files[0]) {
        bodyAppend("p", "Please select a file before clicking 'Load'");
    }
    else {
        file = input.files[0];
        bodyAppend("p", "File " + file.name + " is " + file.size + " bytes in size");
    }
}

function bodyAppend(tagName, innerHTML) {
    var elm;

    elm = document.createElement(tagName);
    elm.innerHTML = innerHTML;
    document.body.appendChild(elm);
}
</script>
</html>