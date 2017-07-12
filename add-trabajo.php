<?php
session_start();
$_SESSION['page']=5;
require './log_header.php';
?>
                <div class="tab_derecha">
                    <div class="tab_panel shadow workexp edit-profile">
                        
                        <form  onload="doOnLoad();" name="publicform" id="publicform" action="./account/save-public.php" method="post">
                            <label class="title">Añadir Trabajo : </label><br>
                            <span class="stag" style="font-size:12px">Los campos con (*) a lado son opcionales</span><br><br><br>
                            <label for="nombre">
                                <span class="stag">Titulo del empleo:  </span>
                                <input id=" nombre" class="sinput" type="text" name="nombre" required>
                            </label><br><br> 

                            <label for="empresa">
                                <span class="stag">Empresa:  </span>
                                <input id="editor" class="sinput" type="text" name="editor">
                            </label><br><br> 
                            
                            <label for="ubicacion">
                                <span class="stag">Ubicacion: </span>
                                <input id="box" name="ubicacion" type="text" 
                                class="sinput datepicker" value="">
                            </label><br><br> 

                             <label for="asd">
                                <span class="stag">Tipo de Empleo: </span>
                                <select class="efex-option shadow"name="tipoempleo" id="tipoempleo" >
                                <option value='0' id='opt1' selected>Tiempo Completo</option>
                                <option value='1' id='opt2'>Medio Tiempo</option>
                                <option value='2' id='opt3'>Temporal</option>";
                                <option value='3' id='opt3'>Por Contrato</option>";
                                <option value='4' id='opt3'>Becas/Prácticas</option>";
                                <option value='5' id='opt3'>Comisión</option>";
                                <option value='5' id='opt3'>Indefinido</option>";
                                </select>
                                               
                            </label><br><br> 

                            <label for="asd">
                                <span class="stag">Tipo de Postulación: </span>
                                <select class="efex-option shadow"name="tipopost" id="tipopost" onchange="changepost()" >
                                    <option value='0' id='optt1' selected>Por Email</option>
                                    <option value='1' id='optt2'>En Persona</option>
                                </select><br><br>
                                <span style="color:white">s</span><input id="email" name="email" type="text" class="sinput datepicker" placeholder="Email">
                                <span style="color:white">s</span><input id="lugar" name="lugar" type="text" class="sinput datepicker" placeholder="Lugar de presentación">
                            </label><br><br> 
                            
                            <label for="asd">
                                <span class="stag">Email: </span>
                                <input id="box" name="fecha" type="text" 
                                class="sinput datepicker" value="">
                            </label><br><br> 

                            <label for="urlp">
                                <span class="stag">*URL:  </span>
                                <input id="urlp" class="sinput" type="text" name="urlp">
                            </label><br><br> 
                            

                            <label for="desp">
                                <span class="stag">Descripción:  </span>
                                <textarea id="desp" type="text" name="desp"></textarea>
                            </label> <br><br>   

                            <label for="box">
                                <span class="stag">Fecha limite de contratación: </span>
                                <input id="box" name="fecha" type="text" 
                                class="sinput datepicker" value="" >
                                
                            </label><br><br>

                            <label for="box">
                                <span class="stag">Cantidad de Vacantes: </span>
                                <input id="box" name="fecha" type="text" 
                                class="sinput datepicker" value="" >
                                
                            </label>  <br><br>  

                            <label for="box">
                                <span class="stag">Educación Minima: </span>
                                <input id="box" name="fecha" type="text" class="sinput datepicker" value="">
                            </label><br><br>

                            <label for="box">
                                <span class="stag">Años de experiencia: </span>
                                <input id="box" name="fecha" type="text" class="sinput datepicker" value="">
                            </label><br><br>

                            <label for="box">
                                <span class="stag">Idioma(s): </span>
                                <input id="box" name="fecha" type="text" class="sinput datepicker" value="">
                            </label><br><br>

                            <label for="box">
                                <span class="stag">Licencia de Conducir: </span>
                                <input id="box" name="fecha" type="text" class="sinput datepicker" value="">
                            </label><br><br>

                            <label for="box">
                                <span class="stag">Disponibilidad de viajar: </span>
                                <input id="box" name="fecha" type="text" class="sinput datepicker" value="">
                            </label><br><br>

                            <label for="box">
                                <span class="stag">Disponibilidad de Cambio de Residencia: </span>
                                <input id="box" name="fecha" type="text" class="sinput datepicker" value="">
                            </label><br><br>
                            
                            <input class="buttonefex1" type="submit" name="submit" value="Guardar Cambios">
                        </form>

                     </div>
                    
                </div>
            </div>
        </div>
    </body>

    <script type="text/javascript">
   
    function changepost(){
        var selectbox=document.getElementById("tipoesp").value;
        if(document.getElementById("optt1").selected==true){
            document.getElementById("email").style.display="inline";
            document.getElementById("lugar").style.display="none";
        }
        else if(document.getElementById("optt2").selected==true){
            document.getElementById("email").style.display="none";
            document.getElementById("lugar").style.display="inline";
        }
    }

    </script>

    <script src="./scriptpublic.js"></script>
    <link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptdate.js"></script>
   

</html>