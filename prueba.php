<?php echo "<div class='buscador shadow'>
            	<div class='container searchbar'>
                    <input name='search' id='search' type='text'
                     placeholder='Busqueda de profesional por nombre o especialidad'
                     value='".$searchq."'>
                    
                    <input  type='submit' class='buscar-submit' id='buscar' value='Buscar'>
						  
                    <br><label><span style='color:white'>Ejemplo: <a   class='ref' data-code='Programador' style='cursor:pointer;'>Programador</a>,
                     <a  class='ref' data-code='Operador' style='cursor:pointer;'> Operador</a>  </span></label>
                
						</div>
				</div>
        <div class='container shadow'>
            <div id='contegre'>
                <div class='show-right'>
                    <label style='font-size:14px;' id='cab-filtro'>Filtro por:</label><br><Br>
                    <div class='dropdown'>
                        <div class='dropdownfiltro' id='keyword'>
                            <span class='spans' style='font-weigth:bold;'>Palabras Claves:</span>
							<span><img id='arrowdown'src='./img/arrow-down.png'></span>
							<span><img id='arrowup' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords' id='keywords'>
                                <input class='filtro-input' type='text' name='nombre' id='ddnombre' placeholder='Nombre/Apellido'>
                                <input class='filtro-input' type='text' name='titulo' id='ddtitulo' placeholder='Titulo'>
                                <input class='filtro-input' type='text' name='compania' id='ddcompania' placeholder='Compañia'>
                                <input class='filtro-input' type='text' name='uni' id='dduni' placeholder='Instituto/Universidad'>
                            </div>
                        <div class='dropdownfiltro' id='ubicacion'>
                            <span class='spans' style='font-weigth:bold;'>Ubicación:</span>
							<span><img id='arrowdown1'src='./img/arrow-down.png'></span>
							<span><img id='arrowup1' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords' id='ubicaciones'>
                                <p><input type='checkbox' id='ubtest1' value='Tacna'/><label for='ubtest1'>Tacna</label></p>
                                <p><input type='checkbox' id='ubtest2' value='Lima'/><label for='ubtest2'>Lima</label></p>
                                <p><input type='checkbox' id='ubtest3' value='Arequipa'/><label for='ubtest3'>Arequipa</label></p>
                                <div  id='agrelugar' style='margin-left:26px;'><span class='spans'>Agregar</span>
                                <input id='autocomplete' class='filtro-input' placeholder='Lugar '
                                    onFocus='geolocate()' type='text' name='lugar'>
                                </div>
                                
                            </div>
                        <div class='dropdownfiltro' id='empactual'>
                            <span class='spans' style='font-weigth:bold;'>Empresas en las que labora:</span>
							<span><img id='arrowdown2'src='./img/arrow-down.png'></span>
							<span><img id='arrowup2' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords' id='empactuals'>
                                <p><input type='checkbox' id='emtest1' value='Southern Copper Corporation'/><label for='emtest1'>Southern Copper Corporation</label></p>
                                <p><input type='checkbox' id='emtest2' value='Electrosur' /><label for='emtest2'>Electrosur</label></p>
                                <p><input type='checkbox' id='emtest3' value='EPS'/><label for='emtest3'>EPS</label></p>
                                <div id='agreempac' style='margin-left:26px;'><span class='spans'>Agregar</span>
                                <input class='filtro-input' placeholder='Escriba el nombre de una empresa' type='text' name='empac' id='inputempac'>
                                </div>
                                
                            </div>
                        <div class='dropdownfiltro' id='emppas'>
                            <span class='spans' style='font-weigth:bold;'>Empresas en las que trabajó:</span>
							<span><img id='arrowdown3'src='./img/arrow-down.png'></span>
							<span><img id='arrowup3' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords' id='emppass'>
                                <p><input type='checkbox' id='eptest1' value='Southern Copper Corporation'/><label for='eptest1'>Southern Copper Corporation</label></p>
                                <p><input type='checkbox' id='eptest2' value='Electrosur'/><label for='eptest2'>Electrosur</label></p>
                                <p><input type='checkbox' id='eptest3' value='EPS'/><label for='eptest3'>EPS</label></p>
                                <div  id='agreemppas' style='margin-left:26px;'><span class='spans'>Agregar</span>
                                <input class='filtro-input' placeholder='Escriba el nombre de una empresa' type='text' name='emppas' id='inputemppas'>
                                </div>
                                
                            </div>
                        <div class='dropdownfiltro' id='idioma'>
                            <span class='spans' style='font-weigth:bold;'>Idiomas:</span>
							<span><img id='arrowdown4'src='./img/arrow-down.png'></span>
							<span><img id='arrowup4' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords' id='idiomas'>
                                <p><input type='checkbox' id='idtest1' value='ingles' /><label for='idtest1'>Inglés</label></p>
                                <p><input type='checkbox' id='idtest2' value='portugues'/><label for='idtest2'>Portugués</label></p>
                                <p><input type='checkbox' id='idtest3' value='frances'/><label for='idtest3'>Francés</label></p>
                                <div  id='agreid' style='margin-left:26px;'><span class='spans'>Agregar</span>
                                <input class='filtro-input' placeholder='Idioma' type='text' name='idioma' id='inputid'>
                                </div>
                                
                            </div>
                    </div>
                </div>
                <div class='resultado shadow'>
                    <div id='result' >
					";
					


    echo "        
                </div>
            </div>
        </div>


    </div>
					";
					?>
<script>
	function goBack() {
    window.history.back();
}
</script>
<script src='./filtro.js'></script>
 <script src="./googlemap.js">    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>