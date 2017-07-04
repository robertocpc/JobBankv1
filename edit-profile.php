<?php
session_start();
$_SESSION['page']=1;
require './log_header.php';
?>
                <div class="tab_derecha">
                    <div class="tab_panel shadow edit-profile">
                        <form  name="registration" id="registration" action="./account/save-profile.php" method="post">

                            <div class="tabizq">
                                <label for="username">
                                    <span class="stag">Nombre:</span>
                                    <?php 
                                    echo "<input name='nombre' id='username' type='text' class='sinput' value='".$_SESSION['user']."' required>";?>
                                    <ul class="input-requirements">
                                        <li>Debe contener almenos 2 caracteres</li>
                                        <li>Debe contener solo caracteres alfanuméricos</li>
                                    </ul>
                                </label>
                            </div>

                            <div class="tabizq">
                                <label for="apellido">    
                                    <span class="stag">Apellido:</span>
                                    <?php 
                                    echo"<input name='apellido' id='apellido' type='text' class='sinput' value='".$_SESSION['ape']."' required>"?>
                                    <ul class="input-requirements">
                                        <li>Debe contener almenos 2 caracteres</li>
                                        <li>Debe contener solo caracteres alfanuméricos</li>
                                    </ul>
                                </label>
                            </div>
                            <div class="tabizq">
                                <label for="email">
                                    <span class="stag">Email:</span>
                                    <?php echo "<input name='email' id='email' type='text' class='sinput' value='".$_SESSION['email']."' required>";?>
                                    <ul class="input-requirements">
                                        <li>Debe seguir este formato: name@email.dom</li>
                                    </ul>
                                </label>
                            </div>
                            <div class="tabizq">
                                <label for="telefono">
                                    <span class="stag">Teléfono:</span>
                                    <?php echo "<input name='telefono' id='telefono' type='text' class='sinput' value='".$_SESSION['telf']."' required>";?>
                                    <ul class="input-requirements">
                                        <li>Debe tener entre 3-15 dígitos</li>
                                        <li>Solo se aceptan caracteres numéricos</li>
                                    </ul>
                                </label>
                            </div>
                            <div class="tabizq">
                                 <label for="box">
                                    <span class="stag">Fecha de nacimiento: </span>
                                    <input id="box" name="fecha" type="text" class="sinput datepicker" value=""   required >
                                    <ul class="input-requirements">
                                        <li>Debe contener almenos 2 caracteres</li>
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
    <link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptdate.js"></script>
</html>