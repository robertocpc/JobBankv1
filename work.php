<?php
include './db.php';
include './header.php';
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
                    <div class="tab_panel shadow workexp edit-profile">
                        
                        <form  name="regworkexp" id="regworkexp" action="./account/save-work.php" method="post">
                            <label class="title">Añadir Experiencia Laboral : </label><br>
                            <label for="wecargo">
                                <span class="stag">Cargo:  </span>
                                <input id="wecargo" name="wecargo" 
                                class="sinput" type="text" name="cargo" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                        
                            </label>
                            <label for="weempresa">
                                <span class="stag">Empresa/Institución:  </span>
                                <input id="weempresa" name="weempresa" class="sinput" type="text" name="empresa" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            <label for="wedireccion">
                                <span class="stag">Dirección:  </span>
                                <input id="wedireccion" name="direccion" class="sinput" type="text" name="direccion" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            <p id="demo"></p>
                            <label>
                                <span class="stag">Desde: <?php $mydate=getdate(date("U"));
                                $year=$mydate[year]; $month=date('m', strtotime('0 month'));?></span>
                            </label>
                            <select  id="ianio" class="ssinput" name="ianio" placeholder="Mes">
                                <?php
                                
                                $res=mysqli_query($mysqli,"select * from tbl_anio");
                                echo "<option value='' disabled selected>Año</option>";
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
                                $res=mysqli_query($mysqli,"select * from tbl_meses");
                                echo "<option value='' disabled selected>Mes</option>";
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
                                echo "<option value='' disabled selected>Año</option>";
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
                                $res=mysqli_query($mysqli,"select * from tbl_meses");
                                echo "<option value='' disabled selected>Mes</option>";
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
                    <div class="tab_panel workexp shadow slist">
                        <label class="title">Listado :</label><br><br>
                        <?php
                        
                            $i=1;
                            $result = $mysqli->query("SELECT * FROM tbl_workexp WHERE cod_alumno='$_SESSION[cod]'");
                            $user = $result->fetch_assoc();
                            if($result->num_rows==0)
                            {
                                echo "<label><span class='slist'>No añadio ninguna experiencia laboral</span></label>";
                            }
                            else
                            {   
                                $sql = $mysqli->query("SELECT * FROM tbl_workexp WHERE cod_alumno='$_SESSION[cod]'");
              
                            while( $row = $sql->fetch_assoc())
                                {
                                echo "<div class='left'><label><span class='slist'>".$i++." Cargo:  ".$row['col_cargo']."</span></label><br>
                                <label><span class='slist'>   Empresa:  ".$row['col_empresa']."</span></label><br><br></div>
                                <div class='right'>
                                <li><a class='workexp-eliminar' href='./workexp-edit.php?id=".$row['cod_workexp']."'><img src='./imglogo/edit-interface-sign.png' height='19px'></a></li>
                                <li><a class='workexp-eliminar' href='./account/workexp-delete.php?id=".$row['cod_workexp']."'><img src='./imglogo/delete.png' height='19px'></a></li>
                                </div>"; 
                                }
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script src="./scriptw.js"></script>
    <script 

    document.getElementsByName('ianio')[0].onchange = function() {
     if (this.value=='blank') alert('Select something !');
}
    ></script>
   

</html>