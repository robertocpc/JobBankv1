<?php
session_start();
$_SESSION['windows']=5;
include './header.php';
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <Script src="./jquery.js"></Script>
    <div id="showcase">
        <div class="container sub1">
            <div class="title" id="title">
            <h1 id="titulo">BOLSA DE TRABAJO</h1>     
            <!--h1>Escuela Profesional de Ingeniería en Informática y Sistemas</h1>
            <center><h3>Universidad Nacional Jorge Basadre Grohmann</h3></center>
            <p></p><br><br><br><br><br><br-->
            </div>
        </div>
        <div id="newsletter">
            <div class="font-blue"></div>
            <div class="container">
                <input name="search" id="search" type="text" placeholder="Busqueda de profesional por nombre o especialidad">
                <select id="select-op"  class="efex-option busca-option" onchange="cambio();">
                    <option id="nombre" selected>Nombre</option>
                    <option id="especialidad" >Especialidad</option>
                </select>
                <br><label><span style="color:white">Ejemplo: Programador, Operador, Redes </span></label>
            </div>
        </div>
        <div class="container" id="cuadro-resultado" style="visibility:hidden">
            <div class="resultado">
                <div id="busqueda"></div>
                <div id="result"></div>
            </div>
        </div>


    </div>
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
    
    <script type="text/javascript">
    
    function cambio(){
        
        var txt=$('#search').val();
        document.getElementById("cuadro-resultado").style.visibility="";
        document.getElementById("select-op").style.visibility="";


        $('#title').html('<h3>Resultados de la búsqueda</h3>');
        if(txt==''){
            $('#result').html('<h3>No hay profesionales que buscar</h3>');
        }


        else{
            //$('#busqueda').html('<h3>Resultados para '+txt+'</h3>');
            if(document.getElementById("nombre").selected==true){
                $.ajax({
                type: 'POST',
                url: './fetch.php',
                data: {'search':txt},
                success: function(resp){
                    $('#result').html(resp);
                }
                })
            }
            else if(document.getElementById("especialidad").selected==true){
                $.ajax({
                type: 'POST',
                url: './fetchesp.php',
                data: {'search':txt},
                success: function(resp){
                    $('#result').html(resp);
                }
                })
            }
        }
    
    }

   $(document).ready(function(){
    

    $('#search').keyup(function(){
        var txt=$('#search').val();
        document.getElementById("cuadro-resultado").style.visibility="";
        document.getElementById("select-op").style.visibility="";


        $('#title').html('<h3>Resultados de la búsqueda</h3>');
        if(txt==''){
            $('#result').html('<h3>No hay profesionales que buscar</h3>');
        }


        else{
            //$('#busqueda').html('<h3>Resultados para '+txt+'</h3>');
            if(document.getElementById("nombre").selected==true){
                $.ajax({
                type: 'POST',
                url: './fetch.php',
                data: {'search':txt},
                success: function(resp){
                    $('#result').html(resp);
                }
                })
            }
            else if(document.getElementById("especialidad").selected==true){
                $.ajax({
                type: 'POST',
                url: './fetchesp.php',
                data: {'search':txt},
                success: function(resp){
                    $('#result').html(resp);
                }
                })
            }
        }
    })
    })

    
    </script>
</body>
</html>