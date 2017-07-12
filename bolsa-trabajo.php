<?php
session_start();
$_SESSION['page']=2;
require './log_header.php';
?>
                <div class="tab_derecha">
                    <div class="tab_panel shadow">

                        <div class="move-search">
                            <input  name="search" id="search-admin" type="text"
                            placeholder="Busqueda de profesional por nombre o especialidad"
                            value="<?php echo $searchq?>">
                            <input  type="submit" class="buscar-admin " id="buscar" value="Buscar">
                            <input onclick="location.href = './add-trabajo.php';" type="submit" class="add-trabajo " id="buscar" value="Añadir Trabajo">
                        </div>

                        <div class=" " id="cuadro-resultado">
                            <div class="resultado shadow">
                                <div id="busqueda"></div>
                                <div id="result" >

                        
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <Script src="./jquery.js"></Script>
     <script type="text/javascript">
    
    
    
    </script>
    
    
</html>