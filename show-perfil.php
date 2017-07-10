<?php
session_start();
include '../db.php';
require './log_header.php';

    $id=$_REQUEST['id'];
//    $_SESSION['workexpid']=$id;
?>
            
                <div class="tab_derecha">
                    <div class="tab_panel shadow">
                        <div class="alignleft pic edit-profile">
                            <form name="uploadform" action="./account/upload-image.php" id="uploadform" enctype="multipart/form-data" method="post">                           
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
                                <label class="edit" for="fileinput" title="Solo se admite imagenes .jpg .png">
                                    <input id="fileinput" class="file" type="file" name="image" required>
                                    

                                </label>
                                <input class="buttonefex1" type="submit" name="submit" value="subir">
                            </form>
                        </div>
                        <div class="alignleft">
                            <label><span class="stag">Nombre:</span></label>
                            <?php echo"<label><span class='sinput'>".$user['col_nombre']."</span></label>";?>
                           <li><a href="./edit-profile.php"><img src="./imglogo/edit-interface-sign.png" height="24px"></a></li>
                        </div>
                        <div class="alignleft"label>    
                            <label><span class="stag">Apellido:</span></label>
                            <?php echo"<label><span class='sinput'>".$user['col_apellido']."</span></label> ";?>
                        </div>
                        <div class="alignleft">
                            <label><span class="stag">Email:</span></label>
                            <?php echo"<label><span class='sinput'>".$user['col_email']."</span></label>";?>
                        </div>
                        <div class="alignleft">
                            <label ><span class="stag">Telefono:</span></label>
                            <?php echo"<label ><span class='sinput'>".$user['col_telf']."</span></label>";?>
                        </div>
                    </div>
                </div>