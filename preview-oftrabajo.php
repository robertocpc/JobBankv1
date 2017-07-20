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
            <div class="container searchbar">
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

                    
                    <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                        <tr>
                            <td style='width:35%;padding-top:15px;text-align:left;'>
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
                            </td>
                            <td style='width:65%;font-size:14px;'>
                                <span style="font-size:28px"><?php echo $user['col_nombre']?></span>
                                <hr>
                                <span style="color: #;"><?php if(isset($user['col_posactual'])){
                                    echo $user['col_posactual'];
                                }else{
                                echo '';}
                                ?></span><br>
                                <span style="color: #;"><?php if(isset($user['col_cabecera'])){
                                    echo $user['col_cabecera'];
                                }else{
                                echo '';}
                                ?></span><br>
                                <span style="color: #;"><?php echo 'Reside en ';if(isset($user['col_ciudadorigen'])){
                                    echo $user['col_ciudadorigen'];
                                }else{
                                echo 'No disponible';}
                                ?></span><br>
                                <span style="color: #;"><?php echo 'Email: ';if(isset($user['col_email'])){
                                    echo $user['col_email'];
                                }else{
                                echo 'No disponible';}
                                ?></span><br>
                                <span style="color: #;"><?php echo 'Teléfono: ';if(isset($user['col_telf'])){
                                    echo $user['col_telf'];
                                }else{
                                echo 'No disponible';}
                                ?></span><br>
                                <span style="color: #;"><?php if(isset($user['col_idioma'])){
                                    echo "Idioma: ".$user['col_idioma'];
                                }else{
                                echo '';}
                                ?></span>    
                            </td>
                        </tr>
                    </table>

                    <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                        <tr>
                            
                            <td style='width:100%;font-size:14px;'>
                                <?php 
                                    $result=$mysqli->query("SELECT * FROM tbl_workexp WHERE cod_alumno='$id'");
                                    if($result->num_rows>0){
                                        echo "<span style='font-size:16px;color: #929292'>EXPERIENCIA LABORAL</span>
                                        <hr style='border-color: #929292'>";
                                        while($user=$result->fetch_assoc()){
                                            echo "<span style='font-size:14px;font-weight:bold;color: #464545;'>".strtoupper($user['col_cargo'])."</span><br>";
                                            echo "<span style='font-size:14px;color: #464545'>".$user['col_empresa']."</span><br>";
                                            if(isset($user['col_fechain'])||isset($user['col_fechafin'])){
                                                echo "<span style='font-size:14px;color: #464545'>".date("d/m/Y",strtotime($user['col_fechain']))." - "; 
                                                if($user['col_actualtrab']==1){
                                                    echo "Presente</span><br>";
                                                }
                                                else{
                                                    echo date("d/m/Y",strtotime($user['col_fechafin']))."</span><br>";
                                                }
                                            }
                                            echo "<br>";

                                        }
                                    }
                                ?>                  
                            </td>
                        </tr>
                        <tr>
                            <td style='width:100%;font-size:14px;'>
                                <?php 
                                    $result=$mysqli->query("SELECT * FROM tbl_estudio WHERE cod_alumno='$id'");
                                    if($result->num_rows>0){
                                        echo "<span style='font-size:16px;color: #929292'>ESTUDIOS</span>
                                        <hr style='border-color: #929292'>";
                                        while($user=$result->fetch_assoc()){
                                            echo "<span style='font-size:14px;font-weight:bold;color: #464545;'>".strtoupper($user['col_school'])."</span><br>";
                                            echo "<span style='font-size:14px;color: #464545'>".$user['col_grado']."</span><br>";
                                            if(isset($user['col_fechain'])||isset($user['col_fechafin'])){
                                                echo "<span style='font-size:14px;color: #464545'>".date("d/m/Y",strtotime($user['col_fechain']))." - "; 
                                                if(strtotime(date('Y-m-d'))-strtotime($user['col_fechafin'])<0){
                                                    echo date("d/m/Y",strtotime($user['col_fechafin']))."  Cursando</span><br>";
                                                }
                                                else{
                                                    echo date("d/m/Y",strtotime($user['col_fechafin']))."</span><br>";
                                                }
                                            }
                                            echo "<br>";

                                        }
                                    }
                                ?>                  
                            </td>
                        </tr>
                        <tr>
                            <td style='width:100%;font-size:14px;'>
                                <?php 
                                    $result=$mysqli->query("SELECT * FROM tbl_publicacion WHERE cod_alumno='$id'");
                                    if($result->num_rows>0){
                                        echo "<span style='font-size:16px;color: #929292'>PUBLICACIONES</span>
                                        <hr style='border-color: #929292'>";
                                        while($user=$result->fetch_assoc()){
                                            echo "<span style='font-size:14px;font-weight:bold;color:#464545;'>".strtoupper($user['col_titulo'])."</span>";
                                            if(isset($user['col_editor'])){
                                                echo "<span style='font-size:14px;font-weight:bold;'>".$user['col_editor']."</span><br>";
                                            }
                                            if(isset($user['col_fecha'])){
                                                echo "<span style='font-size:14px;color: #464545'>".date("d/m/Y",strtotime($user['col_fecha']))."</span><br>"; 
                                            }
                                            echo "<br>";

                                        }
                                    }
                                ?>                  
                            </td>
                        </tr>
                    </table>
   
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