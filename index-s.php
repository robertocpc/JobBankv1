<?php
session_start();
$_SESSION['windows']=5;
include './header.php';
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <Script src="./jquery.js"></Script>
    <div id="showcase white">
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
                    <input  name="search" id="search" type="text" placeholder="Busqueda de profesional por nombre o especialidad">
                    
                    <input  type="submit" class="buscar-submit" id="buscar" value="Buscar">
                    <br><label><span style="color:white">Ejemplo: Programador, Operador, Redes </span></label>
                
            </div>
        </div>
        <div class="container" id="cuadro-resultado" style="visibility:hidden">
            <div class="resultado shadow">
                <div id="busqueda"></div>
                <div id="result" ></div>
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
    })

    </script>
</body>
</html>