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
                    <button onclick="location.href = './account/work.php';" class="efex_button1 selected">Experiencia Laboral</button><br>
                            
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    <div class="tab_panel shadow">
                        <label class="title">Añadir Experiencia Laboral : </label><br>
                        <label><span>Cargo:  </span><input type="text" name="cargo"></label><br>
                        <label><span>Empresa/Institución:  </span><input type="text" name="empresa"></label><br>
                        <label><span>Dirección:  </span><input type="text" name="direccion"></label><br>
                        <label><span>Desde: <?php $mydate=getdate(date("U"));
$year=$mydate[year]; $month=date('m', strtotime('0 month'));?></span></label>
                        <select name="country" onChange="change_country()" placeholder="Mes">
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
                        <select name="country" onChange="change_country()" placeholder="Mes">
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
                        <label><span>Hasta: </span></label>
                        <select name="country" onChange="change_country()" placeholder="Mes">
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
                        <select name="country" onChange="change_country()" placeholder="Mes">
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
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>