<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" type="text/css"> 
    <!--script src="./dhtmlx.css"></script-->
<script src="jquery-3.2.1.min.js"></script>
<?php
session_start();

include './db.php';
echo "
                    
                    <div class=' shadow'>
                        <div class='alignleft pic edit-profile'>
                            <form name='uploadform' action='./account/upload-image.php' id='uploadform' enctype='multipart/form-data' method='post'>                           
                                ";?>
                                <?php
                                    $result=$mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno='$_SESSION[cod]'");
                                    $user = $result->fetch_assoc();
                                    if(isset($user['col_imgperfil'])){
                                        echo "<img class='se-img-size' src='data:image/jpg;base64,".base64_encode($user['col_imgperfil'])."' height='200px' width='190px'>";
                                    }
                                    else{
                                        echo "<img class='se-img-size' src='./img/profimage.png' height='160px'>";
                                    }

                                echo "<br><label for='fileinput'>
                                    <img id='camera-mp' src='./img/camera.png'>
                                    <input id='fileinput' class='file' type='file' name='image'>
                                </label>
                                <input class='buttonefex1' type='submit' name='submit' value='subir'>
                            </form>
                        </div>
                        
                    </div>

                    <form  name='registration' id='registration' action='./account/save-profile.php' method='post'>
                            

                        <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Nombre: </span><br>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='nombre' id='username' type='text' class='btn-st1' value='".$user['col_nombre']."' required></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Apellido: </span><br>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='apellido' id='apellido' type='text' class='btn-st1' value='".$user['col_apellido']."' required></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Cabecera: </span><br>
                                 <span style='color: gray'>* Escriba sus principales especialidad, estas se tomarán como referencia para el motor de búsqueda</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='cabecera' id='cabecera' type='text' class='btn-st1' value='".$user['col_cabecera']."'></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Cargo Actual: </span><br>
                                 <span style='color: gray'>* Escriba los cargos que actualmente esta ejerciendo, estas se tomarán como referencia para el motor de búsqueda</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='posactual' id='posactual' type='text' class='btn-st1' value='".$user['col_posactual']."'></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Email: </span><br>
                                 <span style='color: gray'>* Ejemplo:  ejemplo@outlook.com</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='email' id='email' type='text' class='btn-st1' value='".$user['col_email']."' required></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Teléfono: </span><br>
                                 <span style='color: gray'>* Solo caracteres numéricos</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='telefono' id='telefono' type='text' class='btn-st1' value='".$user['col_telf']."' required></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Fecha de Nacimiento: </span><br>
                                 <span style='color: gray'>* Ejemplo: 02/08/2017</span>
                              </td>
                              <td style='width:65%;'>
                                 <input name='fecha' id='box' type='text' class='btn-st1' value='".$user['col_fechanac']."'  required>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Tipo Documento: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                 <input  class='btn-st1' id='numide' value='".$user['col_numide']."' disabled style='display:none;'>
                                 <input class='btn-st1' id='tipod' value='".$user['col_tipodoc']."' disabled style='display:none;'>
                                 <select class='efex-option shadow' name='tipodoc' id='tipodoc' onchange='change();'>
                                 ";
                                    
                                        echo "
                                                <option value='0' id='opt1'>DNI</option>
                                                <option value='1' id='opt2'>Pasaporte</option>
                                                <option value='2' id='opt3'>Carnet de Extranjeria</option>";
                                           
                                    echo "</select><input name='inputpost' class='btn-st1' id='inputpost' style='display:none;'>
                                    <br><br>

                                    
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Ciudad Actual: </span><br>
                                 <span style='color: gray'>* Ciudad en la que reside actualmente</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input id='autocomplete' class='btn-st1'  value='".$user['col_ciudadorigen']."' 
                                    onFocus='geolocate()' type='text' name='ciudadorigen'></span>
                              </td>
                           </tr>

                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Dirección: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='direccion' id='direccion' type='text' class='btn-st1' value='".$user['col_direccion']."'></span>
                              </td>
                           </tr>

                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Genero: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                    <input class='btn-st1' id='tipogen' value='".$user['col_genero']."' disabled style='display:none;'>
                                 <select class='efex-option shadow' name='genero' id='genero' >";
                                        echo "<option value='0' id='optg1'>Masculino</option>
                                                <option value='1' id='optg2'>Femenino</option>
                                                <option value='2' id='optg3' selected>Sin especificar</option>";
                                    
                                    echo "</select> 
                              </td>
                           </tr>
                           <tr>
                              <td>
                              </td>
                              <td>
                                 <input class='buttonefex1' type='submit' value='Guardar Cambios'>
                              </td>
                           </tr>    
                        </table>             

                        </form>
      ";
                

?><link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" type="text/css"> 
    <!--script src="./dhtmlx.css"></script-->

<script>
        function change(){
            if(document.getElementById('tipodoc').value==0&&document.getElementById('tipod').value==0){
                document.getElementById('inputpost').value=document.getElementById('numide').value;
            }
            else if(document.getElementById('tipodoc').value==1&&document.getElementById('tipod').value==1){
                document.getElementById('inputpost').value=document.getElementById('numide').value;
            }
            else if(document.getElementById('tipodoc').value==2&&document.getElementById('tipod').value==2){
                document.getElementById('inputpost').value=document.getElementById('numide').value;
            }
            else{
                document.getElementById('inputpost').value='';
            }
        }  

</script>

    
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./script.js"></script>
<script src="./scriptsession.js"></script>
 
<script src="./scriptdate.js"></script>

    <script src="./googlemap.js"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>