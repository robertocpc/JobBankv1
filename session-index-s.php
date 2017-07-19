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
                <div class="tag-ad" id="miperfil">
                    <span>Mi Perfil</span>
                </div>
            </div>
        
            
        <div id="cuadroresultado" style='float:left;width:100%;'>
        </div>


    </div>
    </body>
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
            document.getElementById('egresado').style.backgroundColor="#0177B1";
            document.getElementById('egresado').style.borderBottom="2px solid white";
            document.getElementById('egresado').style.color="white";
            document.getElementById('egresado').style.fontWeight="bold";

            document.getElementById('ofertas').style.backgroundColor="";
            document.getElementById('ofertas').style.borderBottom="";
            document.getElementById('ofertas').style.color="";
            document.getElementById('ofertas').style.fontWeight=""; 

            document.getElementById('miperfil').style.backgroundColor="";
            document.getElementById('miperfil').style.borderBottom="";
            document.getElementById('miperfil').style.color="";
            document.getElementById('miperfil').style.fontWeight="";     
        })
        $('#ofertas').click(function(){
            $('#cuadroresultado').load("./oftrabajo-us.php");
            document.getElementById('ofertas').style.backgroundColor="#0177B1";
            document.getElementById('ofertas').style.borderBottom="2px solid white";
            document.getElementById('ofertas').style.color="white";
            document.getElementById('ofertas').style.fontWeight="bold";

            document.getElementById('egresado').style.backgroundColor="";
            document.getElementById('egresado').style.borderBottom="";
            document.getElementById('egresado').style.color="";
            document.getElementById('egresado').style.fontWeight="";

            document.getElementById('miperfil').style.backgroundColor="";
            document.getElementById('miperfil').style.borderBottom="";
            document.getElementById('miperfil').style.color="";
            document.getElementById('miperfil').style.fontWeight="";    
        })
        $('#miperfil').click(function(){
            $('#cuadroresultado').load("./miperfil.php");
            document.getElementById('miperfil').style.backgroundColor="#0177B1";
            document.getElementById('miperfil').style.borderBottom="2px solid white";
            document.getElementById('miperfil').style.color="white";
            document.getElementById('miperfil').style.fontWeight="bold";

            document.getElementById('egresado').style.backgroundColor="";
            document.getElementById('egresado').style.borderBottom="";
            document.getElementById('egresado').style.color="";
            document.getElementById('egresado').style.fontWeight="";

            document.getElementById('ofertas').style.backgroundColor="";
            document.getElementById('ofertas').style.borderBottom="";
            document.getElementById('ofertas').style.color="";
            document.getElementById('ofertas').style.fontWeight="";    
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