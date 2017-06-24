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
                            <form action="./account/upload-image.php" id="uploadform" enctype="multipart/form-data" method="post">                           
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
                                <label class="edit" for="fileinput">
                                    <input id="fileinput" class="file" type="file" name="image" onchange="show(this)" required>
                                    <ul class="input-requirements">
                                        <li>Debe contener almenos 2 caracteres</li>
                                    </ul>

                                </label><br>
                                <input class="buttonefex1" type="submit" name="submit" value="subir">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">


    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }

    function showFileSize() {
    var input, file;

    if (!window.FileReader) {
        alert("The file API isn't supported on this browser yet.");
        return;
    }

    input = document.getElementById('fileinput');
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
         

        file = input.files[0]; console.log(file);
        //bodyAppend("p", "File " + file.name + " is " + file.size + " bytes in size");
        if(file.size>1000){
            bodyAppend("p","Es demasiado");
        }
        else{
            bodyAppend("p","Suficiente");
        }
    }
}
function bodyAppend(tagName, innerHTML) {
    var elm;

    elm = document.createElement(tagName);
    elm.innerHTML = innerHTML;
    document.body.appendChild(elm);
}
function show(input) {
        debugger;
        var validExtensions = ['jpg','png','jpeg']; //array of valid extensions
        var fileName = input.files[0].name;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        var sign;

        

        if ($.inArray(fileNameExt, validExtensions) == -1) {
            input.type = ''
            input.type = 'file'
            $('#user_img').attr('src',"");
            alert("Only these file types are accepted : "+validExtensions.join(', '));
        }
        else
        {
        if (input.files && input.files[0]) {
            var filerdr = new FileReader();
            filerdr.onload = function (e) {
                $('#user_img').attr('src', e.target.result);
            }
            filerdr.readAsDataURL(input.files[0]);
            showFileSize();
        }
        }
    }


</script>
</html>