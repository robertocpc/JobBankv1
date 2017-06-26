<?php
include './db.php';
include './header.php';
?>
        <div class="container">
        
            <div class="formulario">
                
                <div class="tab_izquierda shadow">
                    <button onclick="location.href = './session.php';" class="efex_button1">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Especializaciones</button><br>
                    <button onclick="location.href = './work.php';" class="efex_button1 selected">Experiencia Laboral</button><br>
                            
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    <div class="tab_panel shadow workexp edit-profile">
                        
                        <form  name="regworkexp" id="regworkexp" action="./account/save-work.php" method="post">
                            <label class="title">Añadir Experiencia Laboral : </label><br>
                            <label for="wecargo">
                                <span class="stag">Cargo:  </span>
                                <input id="wecargo"class="sinput" type="text" name="cargo" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                        
                            </label>
                            <label for="weempresa">
                                <span class="stag">Empresa/Institución:  </span>
                                <input id="weempresa" class="sinput" type="text" name="empresa" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            <label for="wedireccion">
                                <span class="stag">Dirección:  </span>
                                <input id="wedireccion" class="sinput" type="text" name="direccion" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            
                           
                            <label for="box">
                                <span class="stag">Desde </span>
                                <input id="box" name="fecha" type="date" class="sinput datepicker" onclick="pruebas()"  required >
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>

                            <span>Actualmente trabajo aqui: </span>
                            <label class="switch">
                            <input type="checkbox" onchange="yesnoCheck()" id="yesCheck">
                            <div class="slider round"></div>
                            </label><br><br>
                            
                            <label for="box2" id="hidde">
                                <span class="stag">Hasta </span>
                                <input id="box2" name="fecha2" type="date" class="sinput datepicker" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            
                                <br>
                            
                            

                            <input class="buttonefex1" type="submit" name="submit" value="Guardar Cambios">
                        </form>

                    </div>
                    <div class="tab_panel workexp shadow slist">
                        <label class="title">Listado :</label><br><br>
                        <?php
                        
                            $i=1;
                            $result = $mysqli->query("SELECT * FROM tbl_workexp WHERE cod_alumno='$_SESSION[cod]'");
                            $user = $result->fetch_assoc();
                            if($result->num_rows==0)
                            {
                                echo "<label><span class='slist'>No añadio ninguna experiencia laboral</span></label>";
                            }
                            else
                            {   
                                $sql = $mysqli->query("SELECT * FROM tbl_workexp WHERE cod_alumno='$_SESSION[cod]'");
              
                            while( $row = $sql->fetch_assoc())
                                {
                                echo "<div class='left'><label><span class='slist'>".$i++." Cargo:  ".$row['col_cargo']."</span></label><br>
                                <label><span class='slist'>   Empresa:  ".$row['col_empresa']."</span></label><br><br></div>
                                <div class='right'>
                                <li><a class='workexp-eliminar' href='./workexp-edit.php?id=".$row['cod_workexp']."'><img src='./imglogo/edit-interface-sign.png' height='19px'></a></li>
                                <li><a class='workexp-eliminar' href='./account/workexp-delete.php?id=".$row['cod_workexp']."'><img src='./imglogo/delete.png' height='19px'></a></li>
                                </div>"; 
                                }
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script>

     

var d = myCalendar.getDate(true);
alert(d); // "2013-03-01"

       

function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('hidde').style.display = 'none';
        document.getElementById('box2').value = d;
    }
    else {
    document.getElementById('hidde').style.display = '';
    document.getElementById('box2').value = '';
    }
}

function pruebass()
{
    var d = myCalendar.getDate(true);
    input[0].CustomValidation.checkInput();
    alert(d);

}

    </script>

    <script src="./scriptw.js"></script>
    <link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" 
    type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptdate.js"></script>
   

</html>