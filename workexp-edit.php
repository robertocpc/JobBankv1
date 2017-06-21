<?php
include './db.php';
include './header.php';

    $id=$_REQUEST['id'];
    $_SESSION['workexpid']=$id;
    $result = $mysqli->query("SELECT * FROM tbl_workexp WHERE cod_workexp='$id'");
    $user = $result->fetch_assoc();
?>
        <div class="container">
        
            <div class="formulario">
                
                <div class="tab_izquierda shadow">
                    <button onclick="location.href = './session.php';" class="efex_button1">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Especializaciones</button><br>
                    <button onclick="location.href = './work.php';" class="efex_button1 selected">Experiencia Laboral</button><br>
                            
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    <div class="tab_panel shadow workexp">
                        <form action="./account/edit-work.php" method="post">
                            <label class="title">Añadir Experiencia Laboral : </label><br>
                            <label><span class="stag">Cargo:  </span></label><input class="sinput" type="text" name="cargo" value="<?php echo $user['col_cargo']; ?>"><br>
                            <label><span class="stag">Empresa/Institución:  </span><input class="sinput" type="text" name="empresa" value="<?php echo $user['col_empresa']; ?>"></label><br>
                            <label><span class="stag">Dirección:  </span><input class="sinput" type="text" name="direccion" value="<?php echo $user['col_direccion']; ?>"></label><br>
                            <label><span class="stag">Desde: <?php $mydate=getdate(date("U"));
    $year=$mydate[year]; $month=date('m', strtotime('0 month'));?></span></label>
                            <select  class="ssinput" name="ianio" placeholder="Mes">
                                <?php
                                
                                $res=mysqli_query($mysqli,"select * from tbl_anio");
                                $ianio = $mysqli->query("SELECT * FROM tbl_anio WHERE cod_anio='$user[col_ianio]'");
                                $row1 = $ianio->fetch_assoc();
                                echo "<option value='".$user['col_ianio']."' selected>".$row1['col_anio']."</option>";
                                while($row=mysqli_fetch_array($res))
                                {
                                    ?>
                                    <option value="<?php echo $row["cod_anio"];?>"><?php echo $row["col_anio"]; ?></option>
                                    <?php
                                }
                            ?>
                            </select>
                            <select class="ssinput" name="imes" placeholder="Mes">
                                <?php
                                $imes = $mysqli->query("SELECT * FROM tbl_meses WHERE cod_meses='$user[col_imes]'");
                                $row2 = $imes->fetch_assoc();
                                echo "<option value='".$user['col_imes']."' selected>".$row2['col_meses']."</option>";
                                
                                
                                $res=mysqli_query($mysqli,"select * from tbl_meses");
                                
                                while($row=mysqli_fetch_array($res))
                                {
                                    ?>
                                    <option value="<?php echo $row["cod_meses"];?>"><?php echo $row["col_meses"]; ?></option>
                                    <?php
                                }
                            ?>
                            </select><br>
                            <label><span class="stag">Hasta: </span></label>
                            <select class="ssinput" name="fanio" placeholder="Mes">
                                <?php
                                
                                $res=mysqli_query($mysqli,"select * from tbl_anio");
                                $ianio = $mysqli->query("SELECT * FROM tbl_anio WHERE cod_anio='$user[col_fanio]'");
                                $row3 = $ianio->fetch_assoc();
                                echo "<option value='".$user['col_fanio']."' selected>".$row3['col_anio']."</option>";
                                while($row=mysqli_fetch_array($res))
                                {
                                    ?>
                                    <option value="<?php echo $row["cod_anio"];?>"><?php echo $row["col_anio"]; ?></option>
                                    <?php
                                }
                            ?>
                            </select>
                            <select class="ssinput" name="fmes" placeholder="Mes">
                                <?php
                                $imes = $mysqli->query("SELECT * FROM tbl_meses WHERE cod_meses='$user[col_fmes]'");
                                $row4 = $imes->fetch_assoc();
                                echo "<option value='".$user['col_fmes']."' selected>".$row4['col_meses']."</option>";
                                                               
                                $res=mysqli_query($mysqli,"select * from tbl_meses");
                                while($row=mysqli_fetch_array($res))
                                {
                                    ?>
                                    <option value="<?php echo $row["cod_meses"];?>"><?php echo $row["col_meses"]; ?></option>
                                    <?php
                                }
                            ?>
                            </select><br>
                            <input class="buttonefex1" type="submit" value="Guardar Cambios">
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </body>
   

</html>