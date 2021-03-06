<?php
session_start();
$_SESSION['windows']=5;
include './header.php';
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <Script src="./jquery.js"></Script>
    <div id="showcase white">
        <div id='slider-p' style='float:left;width:100%'>
            <div style='width:40%;float:left;'>
                <img src='imglogo/left-arrow.png' onclick='change();' height='32' style='cursor:pointer;position:absolute;margin-top:30px;'>
                <h1 style='margin-left: 50px;'>Escuela Profesional de Ingeniería de Informática y Sistemas</h1>
            </div>
            <div style='width:60%;float:left;'>
                <img src='imglogo/right-arrow.png' height='32' style='margin-top:30px;float:right'>
                <h1 style='margin-right: 100px;'>Escuela Profesional de Ingeniería de Informática y Sistemas</h1>
            </div>
        </div>
        <div id="newsletter" style='float:left;width:80%'>
            <div class="font-blue"></div>
            <div class="container searchbar">
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
    function change(){
        $('#slider-p').fadeOut(3000);
        $('#slider-p').fadeIn('slow');
    }
    $(document).ready(function(){

        $('#buscar').click(function(){
            var name=document.getElementById("search").value;
            window.location = './fetch-s.php?search=' + name;
                
        })
        $('#search').keypress(function(e){
            if(e.which == 13) {
            var name=document.getElementById("search").value;
            name=encodeURIComponent(name);
            window.location = './fetch-s.php?search=' + name;
        }     
        })
    })

    </script>
</body>
</html>