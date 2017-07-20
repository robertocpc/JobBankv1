<?php
session_start();
$_SESSION['page']=3;
require './log_header.php';
?>
                <div class='tab_derecha'>
                    <div class='tab_panel shadow workexp edit-profile'>
                        
                        <form  name='estudioform' id='regworkexp' action='./account/save-estudio.php' method='post'>
                            <label class='title'>Añadir Estudios : </label><br>
                            <label for='wecargo'>
                                <span class='stag'>Instituto/Universidad:  </span>
                                <input id='wecargo'class='sinput' type='text' name='cargo' required>
                                <ul class='input-requirements'>
                                    <li>Debe contener almenos 3 a 70 caracteres</li>
                                </ul>
                        
                            </label>
                            <label for='weempresa'>
                                <span class='stag'>Grado:  </span>
                                <input id='weempresa' class='sinput' type='text' name='empresa' required>
                                <ul class='input-requirements'>
                                    <li>Ejemplo: Doctor/Licenciado</li>
                                </ul>
                            </label>
                            <label for='wedireccion'>
                                <span class='stag'>Campo de estudio:  </span>
                                <input id='wedireccion' class='sinput' type='text' name='direccion' required>
                                <ul class='input-requirements'>
                                    <li>Indique el campo de estudio al cual se oriente</li>
                                </ul>
                            </label>

                            <label for='cursoanio'>
                                <span class='stag'>Año cursando:  </span>
                                <input id='cursoanio' class='sinput' type='text' name='cursoanio' required>
                                <ul class='input-requirements'>
                                    <li>Ejemplo 1er año/7mo ciclo</li>
                                </ul>
                            </label>
                            
                           
                            <span class='stag'>Click en el boton si termino sus estudios: </span>
                            <label class='switch'>
                            <input type='checkbox' name='checkwork' onchange='yesnoCheck()' id='yesCheck'>
                            <div class='slider round'></div>
                            </label><br><br>
                            
                            <label for='box'>
                                <span class='stag'>Desde </span>
                                <input id='box' name='fecha' type='text' 
                                class='sinput datepicker' value='' required>
                                <ul class='input-requirements'>
                                    <li>Fecha Inválida - No debe exceder a la fecha actual</li>
                                </ul>
                            </label>

                            <label for='box2' id='hidde'>
                                <span class='stag'>Hasta </span>
                                <input id='box2' name='fecha2' type='text' 
                                class='sinput datepicker' value='' required>
                                <ul class='input-requirements'>
                                    <li>Fecha Inválida</li>
                                    <li>La fecha final no debe ser inferior a la fecha de inicio</li>
                                </ul>
                            </label>
                            
                                <br>


                            <input class='buttonefex1' type='submit' name='submit' value='Guardar Cambios'>
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
        document.getElementById('cursoanio').value = 'Termino';
        
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

    <script src='./scriptestudio.js'></script>
    <link rel='stylesheet' href='http://cdn.dhtmlx.com/edge/dhtmlx.css' 
    type='text/css'> 
<script src='./codebase/dhtmlxcalendar.js'></script>
<script src='./scriptdate.js'></script>
   

</html>