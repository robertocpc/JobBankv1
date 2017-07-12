<?php
session_start();
$_SESSION['windows']=5;
$id=$_REQUEST['id'];
include './db.php';
include './header.php';
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <Script src="./jquery.js"></Script>
    <div id="showcase" class="white" >
      
        <div class="buscador shadow">
            <div class="font-blue"></div>
            <div class="container">
                    <input onkeypress="runScript(event)" name="search" id="search" type="text"
                     placeholder="Busqueda de profesional por nombre o especialidad"
                     value="<?php echo $searchq?>">
                    
                    <input  type="submit" class="buttonefex1 buscar" id="buscar" value="Buscar">
                    <br><label><span style="color:white">Ejemplo: Programador, Operador, Redes </span></label>
                
            </div>
        </div>
        <div class="container" id="cuadro-resultado">
            <div class="resultado shadow">
                <div id="result" >
                    <div class="preview-left">
                                <?php
                                    $result=$mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno='$id'");
                                    $user = $result->fetch_assoc();
                                    if(isset($user['col_imgperfil'])){
                                        echo "<img class='se-img-size' src='data:image/jpg;base64,".base64_encode($user['col_imgperfil'])."' height='200px' width='190px'>";
                                    }
                                    else{
                                        echo "<img class='se-img-size' src='./img/profimage.png' height='160px'>";
                                    }
                                ?>
                    </div>
                    <div class="preview-right">
                        <span style="font-size:28px"><?php echo $user['col_nombre']?></span>
                        <hr>
                        <span style="font-size:20px;color: #;"><?php echo $user['col_ciudadorigen']?></span>
                    </div>
   
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
    })

    </script>
</body>
</html>