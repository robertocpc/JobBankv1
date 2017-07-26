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
                <h1 style='margin-left: 50px;color:white;padding-right:80px;'>Bolsa de Trabajo</h1>
                <p style='margin-left: 50px;color:white;padding-right:80px;'>Profesional Egresados de nuestra escuela</p>
                <p style='margin-left: 50px;color:white;text-align:justify;padding-right:80px;'>Encuentre los profesionales aptos para puesto que desea requerir. Realize su búsqueda por </p>
                <p></p>
            </div>
            <div style='width:60%;float:left;'>
                <img src='imglogo/esis-bg.jpg' height='320' style='float:right'>
            </div>
        </div>
        <div id="newsletter" style='float:left;width:80%'>
            <div class="font-blue"></div>
            <div class="container searchbar">
                    <input  name="search" id="search" type="text" placeholder="Busqueda de profesional por nombre o especialidad">
                    
                    <input  type="submit" class="buscar-submit" id="buscar" value="Buscar">
                    <br><label><span style="color:white">Ejemplo: <a   class='ref' data-code='Programador' style='cursor:pointer;'>Programador</a>,
                     <a  class='ref' data-code='Operador' style='cursor:pointer;'> Operador</a>  </span></label>
                
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
        $('.ref').click(function(){
            var txt=this.getAttribute("data-code");
            //var name=document.getElementById("search").value;
            window.location = './fetch-s.php?search=' + txt;
        })

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