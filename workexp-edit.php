<?php
session_start();
$_SESSION['page']=4;
require './log_header.php';

    $id=$_REQUEST['id'];
    $_SESSION['workexpid']=$id;
    $result = $mysqli->query("SELECT * FROM tbl_workexp WHERE cod_workexp='$id'");
    $user = $result->fetch_assoc();


?>
                <div class="tab_derecha">
                    <div class="tab_panel shadow workexp edit-profile">
                        
                        <form  onload="doOnLoad();" name="regworkexp" id="regworkexp" action="./account/edit-work.php" method="post">
                            <label class="title">Añadir Experiencia Laboral : </label><br>
                            <label for="wecargo">
                                <span class="stag">Cargo:  </span>
                                <input id="wecargo"class="sinput" type="text" name="cargo" value="<?php echo $user['col_cargo']?>" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                        
                            </label>
                            <label for="weempresa">
                                <span class="stag">Empresa/Institución:  </span>
                                <input id="weempresa" class="sinput" type="text" name="empresa" value="<?php echo $user['col_empresa']?>" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            <label for="wedireccion">
                                <span class="stag">Dirección:  </span>
                                <input id="wedireccion" class="sinput" type="text" name="direccion" value="<?php echo $user['col_direccion']?>" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            
                           
                            <label for="box">
                                <span class="stag">Desde </span>
                                <input id="box" name="fecha" type="text" 
                                class="sinput datepicker" value="<?php if($user['col_idia']<10)
                                {echo "0".$user['col_idia'];}
                                else{echo $user['col_idia'];}echo "/";if($user['col_imes']<10)
                                {echo "0".$user['col_imes'];}
                                else{echo $user['col_imes'];}echo "/".$user['col_ianio'];?>"  required >
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>

                            <span>Actualmente trabajo aqui: </span>
                            <label class="switch">
                            <input type="checkbox"  name="checkwork" onchange="yesnoCheck()" id="yesCheck">
                            <div class="slider round"></div>
                            </label><br><br>
                            
                            <label for="box2" id="hidde">
                                <span class="stag">Hasta </span>
                                <input id="box2" name="fecha2" type="date" 
                                class="sinput datepicker" value="<?php  if($user['col_actualtrab']!=1){if($user['col_fdia']<10)
                                {echo "0".$user['col_fdia'];}
                                else{echo $user['col_fdia'];}echo "/";if($user['col_fmes']<10)
                                {echo "0".$user['col_fmes'];}
                                else{echo $user['col_fmes'];}echo "/".$user['col_fanio'];}else{$currentDateTime = date('d/m/Y');echo $currentDateTime;}?>" required>
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

   
var d = myCalendar.getDate(true);
alert(d); // "2013-03-01"

       

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
        document.getElementById('hidde').style.display = 'none';
        document.getElementById('box2').value = today;
    }
    else {
    document.getElementById('hidde').style.display = '';
    document.getElementById('box2').value = '';
    }
}

function pruebass()
{
    var d = myCalendar.getDate(true);

    alert(d);

}

    </script>

    <script src="./scriptw.js"></script>
    <link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" 
    type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptdate.js"></script>
   

</html>