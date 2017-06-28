<?php
include './db.php';
include './header.php';

$id=$_REQUEST['id'];
    $_SESSION['estudio']=$id;
    $result = $mysqli->query("SELECT * FROM tbl_estudio WHERE cod_estudio='$id'");
    $user = $result->fetch_assoc();

?>
        <div class="container">
        
            <div class="formulario">
                
                <div class="tab_izquierda shadow">
                    <button onclick="location.href = './session.php';" class="efex_button1">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './addesp.php';" class="efex_button1 selected">Especializaciones</button><br>
                    <button onclick="location.href = './work.php';" class="efex_button1">Experiencia Laboral</button><br>
                            
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    <div class="tab_panel shadow workexp edit-profile">
                        
                        <form  onload="doOnLoad();" name="estudioform" id="regworkexp" action="./account/edit-estudio.php" method="post">
                            <label class="title">Añadir Estudios : </label><br>
                            <label for="wecargo">
                                <span class="stag">Instituto/Universidad:  </span>
                                <input id="wecargo"class="sinput" type="text" name="cargo"
                                value="<?php echo $user['col_school']?>"  required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                        
                            </label>
                            <label for="weempresa">
                                <span class="stag">Grado:  </span>
                                <input id="weempresa" class="sinput" type="text" name="empresa"
                                value="<?php echo $user['col_grado']?>" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            <label for="wedireccion">
                                <span class="stag">Campo de estudio:  </span>
                                <input id="wedireccion" class="sinput" type="text" name="direccion"
                                value="<?php echo $user['col_campest']?>" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>

                            <label for="cursoanio">
                                <span class="stag">Año cursando:  </span>
                                <input id="cursoanio" class="sinput" type="text" name="cursoanio"
                                value="<?php echo $user['col_cursando']?>" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            
                           
                            <span class="stag">Click en el boton si termino sus estudios: </span>
                            <label class="switch">
                            <input type="checkbox" name="checkwork" onchange="yesnoCheck()" id="yesCheck">
                            <div class="slider round"></div>
                            </label><br><br>
                            
                            <label for="box">
                                <span class="stag">Desde </span>
                                <input id="box" name="fecha" type="date" 
                                class="sinput datepicker" value="<?php if($user['col_idia']<10)
                                {echo "0".$user['col_idia'];}
                                else{echo $user['col_idia'];}echo "/";if($user['col_imes']<10)
                                {echo "0".$user['col_imes'];}
                                else{echo $user['col_imes'];}echo "/".$user['col_ianio'];?>"  required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>

                            <label for="box2" id="hidde">
                                <span class="stag">Hasta </span>
                                <input id="box2" name="fecha2" type="date" 
                                class="sinput datepicker" value="<?php if($user['col_fdia']<10)
                                {echo "0".$user['col_fdia'];}
                                else{echo $user['col_fdia'];}echo "/";if($user['col_fmes']<10)
                                {echo "0".$user['col_fmes'];}
                                else{echo $user['col_fmes'];}echo "/".$user['col_fanio'];?>"  required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            
                                <br>


                            <input class="buttonefex1" type="submit" name="submit" value="Guardar Cambios">
                        </form>

                    </div>
                    
                </div>
            </div>
        </div>
    </body>

    <script>

   


function yesnoCheck() {
    var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();

	if(dd<10) {
		dd = '0'+dd
	} 

	if(mm<10) {
		mm = '0'+mm
	} 

	today = dd + '/' + mm + '/' + yyyy;
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('cursoanio').value = "Termino";
        
    }
    else {
    
    document.getElementById('cursoanio').value = '';
    }
}

function pruebass()
{
    var d = myCalendar.getDate(true);

    alert(d);

}

    </script>

    <script src="./scriptestudio.js"></script>
    <link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" 
    type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptdate.js"></script>
   

</html>