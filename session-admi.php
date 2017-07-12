<?php
session_start();
$_SESSION['windows']=5;
$searchq=$_REQUEST['search'];
include './header.php';
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <Script src="./jquery.js"></Script>
    
    <div id="showcase" class="white" >
            <div class="font-blue">
                <div class="tag-ad" id="egresado">
                    <span>Egresados</span>
                </div>
                <div class="tag-ad" id="ofertas">
                    <span>Ofertas Laborales</span>
                </div>
                <div class="tag-ad" id="becas">
                    <span>Becas</span>
                </div>
            </div>
      
        <div id="cuadroresultado">
        <!--div class="buscador shadow">
            <div class="container">
                    <input onkeypress="runScript(event)" name="search" id="search" type="text"
                     placeholder="Busqueda de profesional por nombre o especialidad"
                     value="<?php echo $searchq?>">
                    
                    <input  type="submit" class="buscar-submit" id="buscar" value="Buscar">
                    <br><label><span style="color:white;">Ejemplo: Programador, Operador, Redes </span></label>
                
            </div>
        </div>
        <div class="container shadow">
            <div id="contegre">
                <div class="show-right">
                    <label style="font-size:14px;" id="cab-filtro">Filtro por:</label><br><Br>
                    <div class="dropdown">
                        <div class="dropdownfiltro" id="keyword">
                            <span class="spans" style="font-weigth:bold;">Palabras Claves:</span>
                        </div>
                            <div class="dropdown-keywords" id="keywords">
                                <input class="filtro-input" type="text" name="nombre" id="ddnombre" placeholder="Nombre">
                                <input class="filtro-input" type="text" name="apellido" id="ddapellido" placeholder="Apellido">
                                <input class="filtro-input" type="text" name="titulo" id="ddtitulo" placeholder="Titulo">
                                <input class="filtro-input" type="text" name="compania" id="ddcompania" placeholder="Compañia">
                                <input class="filtro-input" type="text" name="uni" id="dduni" placeholder="Instituto/Universidad">
                            </div>
                        <div class="dropdownfiltro" id="ubicacion">
                            <span class="spans" style="font-weigth:bold;">Ubicación:</span>
                        </div>
                            <div class="dropdown-keywords" id="ubicaciones">
                                <p><input type="checkbox" id="test1" /><label for="test1">Tacna</label></p>
                                <p><input type="checkbox" id="test2" /><label for="test1">Lima</label></p>
                                <p><input type="checkbox" id="test3" /><label for="test1">Arequipa</label></p>
                                <div  id="agrelugar" style="margin-left:26px;"><span class="spans">Agregar</span>
                                <input id="autocomplete" class="filtro-input" placeholder="Lugar "
                                    onFocus="geolocate()" type="text" name="lugar" id="inputlugar">
                                </div>
                                
                            </div>
                        <div class="dropdownfiltro" id="empactual">
                            <span class="spans" style="font-weigth:bold;">Empresas en la que trabajan actualmente:</span>
                        </div>
                            <div class="dropdown-keywords" id="empactuals">
                                <p><input type="checkbox" id="test1" /><label for="test1">Southern</label></p>
                                <p><input type="checkbox" id="test2" /><label for="test1">Electrosur</label></p>
                                <p><input type="checkbox" id="test3" /><label for="test1">EPS</label></p>
                                <div id="agreempac" style="margin-left:26px;"><span class="spans">Agregar</span>
                                <input class="filtro-input" placeholder="Escriba el nombre de una empresa" type="text" name="empac" id="inputempac">
                                </div>
                                
                            </div>
                        <div class="dropdownfiltro" id="emppas">
                            <span class="spans" style="font-weigth:bold;">Empresas en la que trabajó:</span>
                        </div>
                            <div class="dropdown-keywords" id="emppass">
                                <p><input type="checkbox" id="test1" /><label for="test1">Southern</label></p>
                                <p><input type="checkbox" id="test2" /><label for="test1">Electrosur</label></p>
                                <p><input type="checkbox" id="test3" /><label for="test1">EPS</label></p>
                                <div  id="agreemppas" style="margin-left:26px;"><span class="spans">Agregar</span>
                                <input class="filtro-input" placeholder="Escriba el nombre de una empresa" type="text" name="emppas" id="inputemppas">
                                </div>
                                
                            </div>
                        <div class="dropdownfiltro" id="idioma">
                            <span class="spans" style="font-weigth:bold;">Idiomas:</span>
                        </div>
                            <div class="dropdown-keywords" id="idiomas">
                                <p><input type="checkbox" id="test1" /><label for="test1">Inglés</label></p>
                                <p><input type="checkbox" id="test2" /><label for="test1">Portugués</label></p>
                                <p><input type="checkbox" id="test3" /><label for="test1">Francés</label></p>
                                <div  id="agreid" style="margin-left:26px;"><span class="spans">Agregar</span>
                                <input class="filtro-input" placeholder="Idioma" type="text" name="idioma" id="inputid">
                                </div>
                                
                            </div>
                    </div>
                </div>
                <div-- class="resultado shadow">
                    <div id="result" -->


   
                    <!--/div>
            
                </div>
            </div-->
        </div>


    </div>
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
    <script>
     $(document).ready(function(){
        $('#buscar').click(function(){
            var name=document.getElementById("search").value;
            window.location = './fetch-s.php?search=' + name;
                
        })
        $('#search').keypress(function(e){
            if(e.which == 13) {
            var name=document.getElementById("search").value;
            window.location = './fetch-s.php?search=' + name;
        }     
        })
        $('#keyword').click(function(){
            var val_height="160px"
            if(document.getElementById('keywords').style.height==val_height)
                document.getElementById('keywords').style.height = "0px";
            else
                document.getElementById('keywords').style.height = val_height;

        })
        $('#ubicacion').click(function(){
            var val_height="210px"
            if(document.getElementById('ubicaciones').style.height==val_height)
                document.getElementById('ubicaciones').style.height = "0px";
            else
                document.getElementById('ubicaciones').style.height = val_height;

        })
        $('#empactual').click(function(){
            var val_height="210px"
            if(document.getElementById('empactuals').style.height==val_height)
                document.getElementById('empactuals').style.height = "0px";
            else
                document.getElementById('empactuals').style.height = val_height;

        })
        $('#emppas').click(function(){
            var val_height="210px"
            if(document.getElementById('emppass').style.height==val_height)
                document.getElementById('emppass').style.height = "0px";
            else
                document.getElementById('emppass').style.height = val_height;

        })
        $('#idioma').click(function(){
            var val_height="200px";
            var name=document.getElementById('idiomas');
            if(document.getElementById('idiomas').style.height==val_height)
                document.getElementById('idiomas').style.height = "0px";
            else
                document.getElementById('idiomas').style.height = val_height;

        })
        $('#egresado').click(function(){
            $('#cuadroresultado').load("./prueba.php");
            /*var txt=$('#search').val();
            document.getElementById("cuadro-resultado").style.visibility="";
            document.getElementById("select-op").style.visibility="";


            $('#title').html('<h3>Resultados de la búsqueda</h3>');
            $.ajax({
            type: 'POST',
            url: './pr  ueba.php',
            data: {'search':txt},
            success: function(resp){
                $('#result').html(resp);
            }
            })*/
               
            
        })
    })
    window.onload = function() {
        $('#cuadroresultado').load("./prueba.php");
        document.getElementById('egresado').style.backgroundColor="#0177B1";
        document.getElementById('egresado').style.borderBottom="2px solid white";
        document.getElementById('egresado').style.color="white";
        document.getElementById('egresado').style.fontWeight="bold";
    }

    </script>
    <script src="./googlemap.js">    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>
</body>
</html>