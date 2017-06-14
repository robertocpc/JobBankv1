<?php
include './header.php';
?>
        <div class="container">
            <div class="formulario">
                <div class="tab_izquierda">
                    <button onclick="location.href = './index.php';" class="efex_button1">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Especializaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    <div class="tab_panel">
                        <center>
                            <img src="./img/profimage.png" height="160px">
                            <form method="POST" enctype="multipart/form-data">                           
                                    <label class="buttonefex1"><input class="file" type="file" title="files" name="image">Custom</label>
                                    <input class="buttonefex1" type="submit" name="submit" value="upload">
                            </form>
                        </center>
                    </div>
                    <div class="tab_panel padd">
                        <form  name="registration" id="registration" action="saveprofile.php" method="post">

                            <div class="tabizq">
                                <label for="username">
                                    <span class="tagg">Nombre:</span>
                                    <input id="username" type="text" class="tagtext" placeholder="Roberto Carlos" required>
                                    <ul class="input-requirements">
                                        <li>Debe contener almenos 2 caracteres</li>
                                        <li>Debe contener solo caracteres alfanuméricos</li>
                                    </ul>
                                </label>
                            </div>

                            <div class="tabizq">
                                <label for="apellido">    
                                    <span class="tagg">Apellido:</span>
                                    <input id="apellido" type="text" class="tagtext" placeholder="Pongo Condori" required>
                                    <ul class="input-requirements">
                                        <li>Debe contener almenos 2 caracteres</li>
                                        <li>Debe contener solo caracteres alfanuméricos</li>
                                    </ul>
                                </label>
                            </div>
                            <div class="tabizq">
                                <label for="email">
                                    <span class="tagg">Email:</span>
                                    <input id="email" type="text" class="tagtext" placeholder="roberto.crlp@hotmail.com" required>
                                    <ul class="input-requirements">
                                        <li>Debe seguir este formato: name@email.dom</li>
                                    </ul>
                                </label>
                            </div>
                            <div class="tabizq">
                                <label for="telefono">
                                    <span class="tagg">Teléfono:</span>
                                    <input id="telefono" type="text" class="tagtext" placeholder="990024953" required>
                                    <ul class="input-requirements">
                                        <li>Debe tener entre 3015 dígitos</li>
                                        <li>Solo se aceptan caracteres numéricos</li>
                                    </ul>
                                </label>
                            </div>
                            <input class="buttonefex1" type="submit" value="Guardar Cambios">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="./script.js"></script>
</html>