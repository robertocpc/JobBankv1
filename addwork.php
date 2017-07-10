<?php
session_start();
$_SESSION['page']=4;
require './log_header.php';
?>
                <div class="tab_derecha">
                    <div class="tab_panel shadow workexp edit-profile">
                        
                        <form  onload="doOnLoad();" name="regworkexp" id="regworkexp" action="./account/save-work.php" method="post">
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

                            <label>
                                <span class="stag">Localidad(Region)</span>
                                <input id="autocomplete" class="sinput" placeholder=""
                                onFocus="geolocate()" type="text" name="localidad">
                            </label><br><br>

                            <label for="wedireccion">
                                <span class="stag">Dirección:  </span>
                                <input id="wedireccion" class="sinput" type="text" name="direccion" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            
                            <label for="trabajo">
                                <span class="stag">Tipo de trabajo:  </span>
                                 <select class="efex-option shadow" name="trabajo" id="trabajo">
                                    <option value="0" selected>Presencial</option>
                                    <option value="1">Remoto</option>
                                </select> 
                                <br><br>
                            </label>

                           
                            <label for="box">
                                <span class="stag">Desde </span>
                                <input id="box" name="fecha" type="text" 
                                class="sinput datepicker" value=""   required >
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>

                            <span class="stag">Actualmente trabajo aqui: </span>
                            <label class="switch">
                            <input type="checkbox" name="checkwork" onchange="yesnoCheck()" id="yesCheck">
                            <div class="slider round"></div>
                            </label><br><br>
                            
                            <label for="box2" id="hidde">
                                <span class="stag">Hasta </span>
                                <input id="box2" name="fecha2" type="text" 
                                class="sinput datepicker" value="" required>
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


    <script src="./googlemap.js">    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>
   

    <script src="./scriptw.js"></script>
    <link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" 
    type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptdate.js"></script>
   

</html>