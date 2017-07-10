<?php
session_start();
$_SESSION['page']=1;
require './log_header.php';
?>
                <div class="tab_derecha">
                    <div class="tab_panel shadow">

                        <div class="container">
                            <input name="search" id="search" type="text" placeholder="Busqueda de profesional por nombre o especialidad">
                            <select id="select-op"  class="efex-option busca-option" onchange="cambio();">
                                <option id="nombre" selected>Nombre</option>
                                <option id="especialidad" >Especialidad</option>
                            </select>
                        </div>

                        <div class="container admin" id="cuadro-resultado" style="visibility:hidden">
                            <div class="resultado">
                                <div id="busqueda"></div>
                                <div id="result"></div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <Script src="./jquery.js"></Script>
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
                url: './fetch-admi.php',
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
    
    
</html>