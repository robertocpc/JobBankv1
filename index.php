<?php
session_start();
$_SESSION['windows']=5;
include './header.php';
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <Script src="./jquery.js"></Script>
    <div id="showcase">
        <div class="container sub1">
            <div class="search" id="search">
            

            <h1 id="titulo">BOLSA DE TRABAJO</h1>
            
            <h1>Escuela Profesional de Ingeniería en Informática y Sistemas</h1>

            

            <center><h3>Universidad Nacional Jorge Basadre Grohmann</h3></center>
            <p></p><br><br><br><br><br><br>
            </div>
        </div>
        <div id="newsletter">
            <div class="container">
                <h1>¿Busca algún profesional..?</h1>
                <form action="search.php" name="buscar_form" id="buscar_form">
                    <input name="buscar" id="buscar" type="search" placeholder="Introdusca palabra clave">
                </form>
            </div>
        </div>


    </div>
    <script type="text/javascript">
    
   $(function(){
    $('#buscaar').focus();
    $('#buscar_form').submit(function(e){
        e.preventDefault();
    })

    $('#buscar').keyup(function(){
        var envio=$('#buscar').val();

        $('#search').html('<h1>Resultados de la búsqueda</h1>');
        //$('#resultados').html('<h2><img src="img/load.gif" width="20">Loading... </h2>');

    })
})

    
    </script>
</body>
</html>