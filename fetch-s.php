<?php
session_start();
$_SESSION['windows']=5;
$searchq=$_REQUEST['search'];
include './header.php';
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <Script src="./jquery.js"></Script>
    
    <div id="showcase" class="white" >
      
        <div class='buscador shadow'>
            <div class='container'>
                    <input onkeypress='runScript(event)' name='search' id='search' type='text'
                     placeholder='Busqueda de profesional por nombre o especialidad'
                     value='<?php echo $searchq;?>'>
                    
                    <input  type='submit' class='buscar-submit' id='buscar' value='Buscar'>
                    <br><label><span style='color:white;'>Ejemplo: Programador, Operador, Redes </span></label>
                
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
                            <span class='spans' style='font-weigth:bold;'>Empresas en la que labora:</span>
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
                            <span class='spans' style='font-weigth:bold;'>Empresas en la que trabajó:</span>
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

<?php
include './db.php';

    
    
    //$searchq=preg_replace("#[^0-9A-Za-z]#i","",$searchq);
    //$query="SELECT * FROM tbl_egresado WHERE ";
    if($searchq!=''){$query="SELECT * FROM tbl_egresado 
    WHERE MATCH (col_nombre, col_apellido) AGAINST ('  ";
    $i=0;
    $terms=explode(" ",$searchq);
    foreach($terms as $each){
        $i++;
        if($i==1){
            $querysel.=" $each ";            
        }
        else
            $querysel.=" $each";
            
    }
//    $query=$mysqli->query("SELECT * FROM tbl_egresado WHERE col_nombre LIKE '%searchq%'")
    $query;
    $querysel.="  ' in boolean mode) ";
    $query .=$querysel; 
    $querys=$mysqli->query($query);
    $nrows=$querys->num_rows;
    
    if($nrows>0){
        $output .="<table width='100%' style='font-size:13px;'>";
        while($row=$querys->fetch_assoc()){
            
            $estquery=$mysqli->query("SELECT GROUP_CONCAT(col_campest, '') as col_est 
            FROM tbl_estudio WHERE cod_alumno='$row[cod_alumno]' GROUP BY tbl_estudio.cod_alumno");
            $estrow=$estquery->fetch_assoc();
            $output.="<tr><th>";
            if(isset($row['col_imgperfil'])){
                $output.= "<img class='search-size' src='data:image/jpg;base64,".base64_encode($row['col_imgperfil'])."' height='200px' width='190px'>";
            }
            else{
                $output .= "<img class='search-size ' src='./img/profimage.png' height='160px'>";
            }
            $output .= "</th>
            <td width='90%'>
                <a class='result-a' href='./preview-perfil.php?id=".$row['cod_alumno']."'>".$row['col_apellido'].", ".$row['col_nombre']."</a><br>
                ";
            if(isset($estrow['col_est'])){$output.=" ".$estrow['col_est'];}
            else{$output.= " Ingeniero en Informática y Sistemas";}
            $output.=" <br>";
            $output.= $row['col_ciudadorigen']."<br></td>";
            $output.="</tr>";
        }
        $output .="</table>";
        echo $output;
    }
    else{
        $query="SELECT cod_alumno,col_nombre,col_imgperfil, col_apellido,col_cabecera,
        col_posactual,col_email,col_ciudadorigen 
        FROM tbl_egresado WHERE  ";
        $i=0;
        echo "parte 2";
        $terms=explode(" ",$searchq);
        foreach($terms as $each){
            $i++;
            if($i==1){
                $query.="col_nombre LIKE '%$each%' ";
                $query.=" OR col_apellido LIKE '%$each%'";
            }
            else
                $query.="OR col_nombre LIKE '%$each%'";
                $query.=" OR col_apellido LIKE '%$each%'";
        }
    //    $query=$mysqli->query("SELECT * FROM tbl_egresado WHERE col_nombre LIKE '%searchq%'")
        $querys=$mysqli->query($query);
        $nrows=$querys->num_rows;
        if($nrows>0){
            $output .="<table width='100%' style='font-size:13px;'>";
            while($row=$querys->fetch_assoc()){
                $output.="<tr><th>";
                if(isset($row['col_imgperfil'])){
                    $output.= "<img class='search-size' src='data:image/jpg;base64,".base64_encode($row['col_imgperfil'])."' height='200px' width='190px'>";
                }
                else{
                    $output .= "<img class='search-size ' src='./img/profimage.png' height='160px'>";
                }
                $output .= "</th>
                <td width='90%'>
                    <a class='result-a' href='./preview-perfil.php?id=".$row['cod_alumno']."'>".$row['col_apellido'].", ".$row['col_nombre']."</a><br>
                    Ingeniero en Informática y Sistemas<br>";
                $output.= $row['col_ciudadorigen']."<br></td>";
                $output.="</tr>";
            }
            $output .="</table>";
            echo $output;
        }
        else{
        echo "<center><img class='search' src='./img/search.png' height='160px'></center><br>
        <center><span>No se hallo resultado, por favor asegurese que escribio correctamente, 
        o intente con otro nombre o especialidad</span></center>";
    }
    }
    }
    else{
        echo "<center><img class='search' src='./img/search.png' height='160px'></center><br>
        <center><span>No se hallo resultado, por favor asegurese que escribio correctamente, 
        o intente con otro nombre o especialidad</span></center>";
    }
?>
   
</div>
            
            </div>
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
            var val_height="220px"
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
    })

    </script>
    <script src="./googlemap.js">    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>
</body>
</html>