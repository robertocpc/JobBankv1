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
            
            <h1>Escuela Profesional de Ingeniería en Informática y Sistemas</h1>

            

            <center><h3>Universidad Nacional Jorge Basadre Grohmann</h3></center>
            <p></p><br><br><br><br><br><br>
            </div>
        </div>
        <div id="newsletter">
            <div class="container">
                <h1>¿Busca algún profesional..?</h1>
                <form action="search.php" name="buscar_form" id="search_form">
                    <input name="search" id="search" type="text" placeholder="Introdusca palabra clave">
                </form>
            </div>
        </div>
            <div id="result"></div>


    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    
   $(document).ready(function(){
    $('#search').focus();
    $('#search_form').submit(function(e){
        e.preventDefault();
    })

    $('#search').keyup(function(){
        var txt=$('#search').val();

        $('#title').html('<h3>Resultados de la búsqueda</h3>');
        if(txt==''){
            $('#result').html('<h3>dfsdfsdf</h3>');
        }
        else{
            $('#result').html('<h3>dfsdfsdf</h3>');
            $.ajax({
            type: 'POST',
            url: './fetch.php',
            data: {'search':txt},
            success: function(resp){
                $('#result').html(resp);
            }
            })
            /*
            $.ajax({
                url:"./fetch.php",
                method: "post",
                data: {search:txt},
                dataType: "text",
                success:function(data){
                    $('$result').html(data);
                }
            })*/
        }

        //$('#resultados').html('<h2><img src="img/load.gif" width="20">Loading... </h2>');

    })
})

    
    </script>
</body>
</html>