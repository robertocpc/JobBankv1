<?php
session_start();
$_SESSION['page']=2;
require './log_header.php';
$result = $mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno='$_SESSION[cod]'");
$user = $result->fetch_assoc();
?>
                <div class="tab_derecha">
                    <div class="tab_panel shadow edit-profile">
                        <div  name="registration" id="registration" >
                            <button onclick="location.href = './account/actualizar-inf-car.php';" class="buttonefex1 right">Actualizar</button><br>
                            <div class="tabizq">
                                <label for="username">
                                    <span class="stag">Codigo:</span>
                                    <?php 
                                    //echo "<input name='' id='username' type='text' class='sinput' value='".$user['cod_alumno']."' required>";?>
                                    <span class="sinput"><?php echo $user['cod_alumno']?></span>
                                    
                                </label>
                            </div>
                            <br><br><br>
                            <div class="tabizq">
                                <label for="apellido">    
                                    <span class="stag">Facultad:</span>
                                    <?php 
                                    //echo"<input name='apellido' id='apellido' type='text' class='sinput' value='".$_SESSION['ape']."' required>"?>
                                    <span class="sinput">FAIN</span>
                                </label>
                            </div>
                            <br><br>
                            <div class="tabizq">
                                <label for="email">
                                    <span class="stag">Escuela:</span>
                                    <?php //echo "<input name='email' id='email' type='text' class='sinput' value='".$_SESSION['email']."' required>";?>
                                    <span class="sinput">ESIS</span>
                                </label>
                            </div>
                            <br><br>

                            <div class="tabizq">
                                 <label for="box">
                                    <span class="stag">Desde: </span>
                                    
                                    <?php //echo "<input name='fecha' id='box' type='text' class='sinput' value='".$user['col_fechanac']."' required>";?>
                                    <span class="sinput"><?php if($user['col_fechaing']==''){
                                        echo 'No especificado';
                                    }else{echo $user['col_fechaing'];} ?></span>
                                </label>
                            </div>
                            <br><br>
                            

                            <div class="tabizq">
                                 <label for="box2">
                                    <span class="stag">Hasta: </span>
                                    <?php //echo "<input name='fecha2' id='box2' type='text' class='sinput' value='".$user['col_fechanac']."' required>";?>
                                    <span class="sinput"><?php if($user['col_fechafin']==''){
                                        echo 'No especificado';
                                    }else{echo $user['col_fechafin'];} ?></span>
                                </label>
                            </div>
                            <br><br>

                            <div class="tabizq">
                                 <label for="box">
                                    <span class="stag">Promedio: </span>
                                    
                                    <?php //echo "<input name='fecha' id='box' type='text' class='sinput' value='".$user['col_fechanac']."' required>";?>
                                    <span class="sinput"><?php if($user['col_promedio']==''){
                                        echo 'No especificado';
                                    }else{echo $user['col_promedio'];} ?></span>
                                </label>
                            </div>
                            <br><br>

                            <div class="tabizq">
                                <label for="email">
                                    <span class="stag">Nombre de Tesis:</span>
                                    <?php //echo "<input name='email' id='email' type='text' class='sinput' value='".$_SESSION['email']."' required>";?>
                                    <span class="sinput"><?php if($user['col_tesis']==''){
                                        echo 'No especificado';
                                    }else{echo $user['col_tesis'];}  ?></span>
                                </label>
                            </div>
                            <br><br>
                            
                            <div class="tabizq">
                                <label for="email">
                                    <span class="stag">Código de Tesis:</span>
                                    <?php //echo "<input name='email' id='email' type='text' class='sinput' value='".$_SESSION['email']."' required>";?>
                                    <span class="sinput"><?php if($user['cod_tesis']==''){
                                        echo 'No especificado';
                                    }else{echo $user['cod_tesis'];} ?></span>
                                </label>
                            </div>
                            <br><br>

                            <div class="tabizq">
                                <label for="email">
                                    <span class="stag">URL de Tesis:</span>
                                    <?php //echo "<input name='email' id='email' type='text' class='sinput' value='".$_SESSION['email']."' required>";?>
                                    <span class="sinput"><?php if($user['col_urltesis']==''){
                                        echo 'No especificado';
                                    }else{echo $user['col_urltesis'];} ?></span>
                                </label>
                            </div>
                            <br><br>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">

    
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