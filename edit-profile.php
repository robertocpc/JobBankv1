<?php
session_start();
include './header.php';
?>
        <div class="container">
            <div class="formulario">
                <div class="tab_izquierda shadow">
                    <button onclick="location.href = './session.php';" class="efex_button1 selected">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Especializaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Experiencia Laboral</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    <div class="tab_panel shadow">
                        <form  name="registration" id="registration" action="./account/save-profile.php" method="post">

                            <div class="tabizq">
                                <label for="username">
                                    <span class="tagg">Nombre:</span>
                                    <?php 
                                    echo "<input name='nombre' id='username' type='text' class='tagtext' value='".$_SESSION['user']."' required>";?>
                                    <ul class="input-requirements">
                                        <li>Debe contener almenos 2 caracteres</li>
                                        <li>Debe contener solo caracteres alfanuméricos</li>
                                    </ul>
                                </label>
                            </div>

                            <div class="tabizq">
                                <label for="apellido">    
                                    <span class="tagg">Apellido:</span>
                                    <?php echo"<input name='apellido' id='apellido' type='text' class='tagtext' value='".$_SESSION['ape']."' required>"?>
                                    <ul class="input-requirements">
                                        <li>Debe contener almenos 2 caracteres</li>
                                        <li>Debe contener solo caracteres alfanuméricos</li>
                                    </ul>
                                </label>
                            </div>
                            <div class="tabizq">
                                <label for="email">
                                    <span class="tagg">Email:</span>
                                    <?php echo "<input name='email' id='email' type='text' class='tagtext' value='".$_SESSION['email']."' required>";?>
                                    <ul class="input-requirements">
                                        <li>Debe seguir este formato: name@email.dom</li>
                                    </ul>
                                </label>
                            </div>
                            <div class="tabizq">
                                <label for="telefono">
                                    <span class="tagg">Teléfono:</span>
                                    <?php echo "<input name='telefono' id='telefono' type='text' class='tagtext' value='".$_SESSION['telf']."' required>";?>
                                    <ul class="input-requirements">
                                        <li>Debe tener entre 3-15 dígitos</li>
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