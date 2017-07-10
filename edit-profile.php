<?php
session_start();
$_SESSION['page']=1;
require './log_header.php';
$result = $mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno='$_SESSION[cod]'");
$user = $result->fetch_assoc();
?>
                <div class="tab_derecha">
                    <div class="tab_panel shadow edit-profile">
                        <form  name="registration" id="registration" action="./account/save-profile.php" method="post">
                            <input class="buttonefex1 right width-size" value="Volver" onclick="goBack();" >
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
                                <label for="cabecera">
                                    <span class="stag">*Cabecera:</span>
                                    <?php echo "<input name='cabecera' id='cabecera' type='text' class='sinput' value='".$user['col_cabecera']."'>";?>
                                    <ul class="input-requirements">
                                        <li>Debe seguir este formato: name@email.dom</li>
                                    </ul>
                                </label>
                            </div>
                            <div class="tabizq">
                                <label for="posactual">
                                    <span class="stag">*Posicion Actual:</span>
                                    <?php echo "<input name='posactual' id='posactual' type='text' class='sinput' value='".$user['col_posactual']."'>";?>
                                    <ul class="input-requirements">
                                        <li>Debe seguir este formato: name@email.dom</li>
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
                                    <span class="stag">Fecha de nacimiento </span>
                                    
                                    <?php echo "<input name='fecha' id='box' type='text' class='sinput' value='".$user['col_fechanac']."' required>";?>
                                    <ul class="input-requirements">
                                        <li>Debe contener almenos 2 caracteres</li>
                                    </ul>
                                </label>
                            </div>

                            <div class="tabizq">
                                <label for="tipodoc">
                                    <span class="stag">Tipo de documento:  </span>
                                    <select class="efex-option shadow" name="tipodoc" id="tipodoc" onchange="change();">
                                    <?php
                                        
                                        switch ($user['col_tipodoc']) {
                                            case 0:
                                                echo "
                                                <option value='0' id='opt1' selected>DNI</option>
                                                <option value='1' id='opt2'>Pasaporte</option>
                                                <option value='2' id='opt3'>Carnet de Extranjeria</option>";
                                                break;
                                            case 1:
                                                echo "<option value='' disabled>Opciones</option>
                                                <option value='0' id='opt1'>DNI</option>
                                                <option value='1' id='opt2' selected>Pasaporte</option>
                                                <option value='2' id='opt3'>Carnet de E(xtranjeria</option>";
                                                break;
                                            case 2:
                                                echo "<option value='' disabled>Opciones</option>
                                                <option value='0' id='opt1'>DNI</option>
                                                <option value='1' id='opt2'>Pasaporte</option>
                                                <option value='2' id='opt3' selected>Carnet de Extranjeria</option>";
                                                break;
                                            default:
                                                echo "<option value='' disabled>Opciones</option>
                                                <option value='0' id='opt1' selected>DNI</option>
                                                <option value='1' id='opt2'>Pasaporte</option>
                                                <option value='2' id='opt3'>Carnet de Extranjeria</option>";
                                                break;
                                            }
                                        ;?>    
                                    </select> 
                                    <br><br>

                                    <span class="stag" style="color:white">d </span>
                                    <input id="cod-doc" value="<?php echo $user['col_tipodoc']; ?>" hidden="true">
                                    <input id="numide" value="<?php echo $user['col_numide']?>" hidden="true">
                                    <input id="dni" name="dni" type="text" class="sinput datepicker" placeholder="DNI" style="display:none">
                                    <input id="pasaporte" name="pasaporte" type="text" class="sinput datepicker" style="display:none" placeholder="Pasaporte">
                                    <input id="carnet" name="carnet" type="text" class="sinput datepicker" style="display:none" placeholder="Carnet de extranjeria">
                                </label>
                            </div>
                            <br>

                            <div class="tabizq">
                                <label for="autocomplete">
                                    <span class="stag" >Ciudad de origen (provincia/departamento/pais)</span>
                                    <input id="autocomplete" class="sinput" placeholder=""
                                    value="<?php echo $user['col_ciudadorigen']?>" 
                                    onFocus="geolocate()" type="text" name="ciudadorigen">
                                </label><br><br>
                            </div>

                            <div class="tabizq">
                                <label for="direccion">
                                    <span class="stag">Direccion:</span>
                                    <?php echo "<input name='direccion' id='direccion' type='text' class='sinput' value='".$user['col_direccion']."'>";?>
                                    <ul class="input-requirements">
                                        <li>Debe tener entre 3-15 dígitos</li>
                                        <li>Solo se aceptan caracteres numéricos</li>
                                    </ul>
                                </label>
                            </div>

                            <div class="tabizq">
                                <label for="genero">
                                    <span class="stag">Genero:  </span>
                                    <select class="efex-option shadow" name="genero" id="genero" onchange="change();">
                                    <?php 
                                        switch ($user['col_genero']) {
                                            case 0:
                                                echo "<option value='0' selected>Masculino</option>
                                                <option value='1'>Femenino</option>
                                                <option value='2'>Sin especificar</option>";
                                                break;
                                            case 1:
                                                echo "<option value='0'>Masculino</option>
                                                <option value='1' selected>Femenino</option>
                                                <option value='2'>Sin especificar</option>";
                                                break;
                                            case 2:
                                                echo "<option value='0'>Masculino</option>
                                                <option value='1'>Femenino</option>
                                                <option value='2' selected>Sin especificar</option>";
                                                break;
                                            default:
                                                echo "<option value='' disabled selected>Seleccione...</option>
                                                <option value='0'>Masculino</option>
                                                <option value='1'>Femenino</option>
                                                <option value='2'>Sin especificar</option>";
                                                break;
                                        }
                                    ?>
                                    </select> 
                                    <br><br>
                                </label>
                            </div>
                            <br>

                            <div id="title" class="tabizq">
                            </div>

                            <input class="buttonefex1" type="submit" value="Guardar Cambios">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">

    function goBack() {
        window.history.back();
    }
    
    function change(){
        var selectbox=document.getElementById("tipodoc").value;
        if(document.getElementById("opt1").selected==true){
            if(document.getElementById("cod-doc").value==0)
                document.getElementById("dni").value=document.getElementById("numide").value;
            document.getElementById("dni").style.display="inline";
            document.getElementById("pasaporte").style.display="none";
            document.getElementById("carnet").style.display="none";
            //document.getElementById("pasaporte").value="";
            //document.getElementById("carnet").value="";
            document.getElementById("dni").required=true;
            document.getElementById("pasaporte").required=false;
            document.getElementById("carnet").required=false;
        }
        else if(document.getElementById("opt2").selected==true){
            if(document.getElementById("cod-doc").value==1)
                document.getElementById("pasaporte").value=document.getElementById("numide").value;
            document.getElementById("dni").style.display="none";
            document.getElementById("pasaporte").style.display="inline";
            document.getElementById("carnet").style.display="none";
            //document.getElementById("dni").value="";
            //document.getElementById("carnet").value="";
            document.getElementById("dni").required=false;
            document.getElementById("pasaporte").required=true;
            document.getElementById("carnet").required=false;
        }
        else if(document.getElementById("opt3").selected==true){
            if(document.getElementById("cod-doc").value==2)
                document.getElementById("carnet").value=document.getElementById("numide").value;
            document.getElementById("dni").style.display="none";
            document.getElementById("pasaporte").style.display="none";
            document.getElementById("carnet").style.display="inline";
            //document.getElementById("dni").value="";
            //document.getElementById("pasaporte").value="";
            document.getElementById("dni").required=false;
            document.getElementById("pasaporte").required=false;
            document.getElementById("carnet").required=true;
        }else{
            
        }
    }
    
    </script>
    <script src="./googlemap.js"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>

    <script src="./script.js"></script>
    <link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" type="text/css"> 
    <!--script src="./dhtmlx.css"></script-->
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptdate.js"></script>
</html>