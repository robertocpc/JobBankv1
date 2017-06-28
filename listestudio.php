<?php
include './db.php';
include './header.php';
?>
        <div class="container">
        
            <div class="formulario">
                
                <div class="tab_izquierda shadow">
                    <button onclick="location.href = './session.php';" class="efex_button1">Información Personal</button><br>
                    <button onclick="location.href = './index.php';" class="efex_button1">Capacitaciones</button><br>
                    <button onclick="location.href = './addesp.php';" class="efex_button1 selected">Especializaciones</button><br>
                    <button onclick="location.href = './work.php';" class="efex_button1">Experiencia Laboral</button><br>
                            
                    <button onclick="location.href = './index.php';" class="efex_button1">Bolsa de Trabajo</button>
                </div>
                <div class="tab_derecha">
                    
                    <div class="tab_panel workexp shadow slist">
                        <label class="title">Listado :</label>
                        <a href="./addesp.php" class="buttonefex1 addbt"><img src="./imglogo/add.png" height="11px">  Añadir</a>
                        <a href="./print-pdf-estudio.php?id=<?php echo $_SESSION['cod'];?>" class="buttonefex1 addbt"> Generar PDF</a>
                        <br><br>
                        <?php
                        
                            $i=1;
                            $result = $mysqli->query("SELECT * FROM tbl_estudio WHERE cod_alumno='$_SESSION[cod]'");
                            $user = $result->fetch_assoc();
                            if($result->num_rows==0)
                            {
                                echo "<label><span class='slist'>No añadio ningun estudio</span></label>";
                            }
                            else
                            {   
                                $sql = $mysqli->query("SELECT * FROM tbl_estudio WHERE cod_alumno='$_SESSION[cod]'");
              
                            while( $row = $sql->fetch_assoc())
                                {
                                echo "<div class='left'><label><span class='slist'>".$i++." Institución/Universidad:  ".$row['col_school']."</span></label><br>
                                <label><span class='slist'>   Grado:  ".$row['col_grado']."</span></label>
                                <label><span class='slist'>   Campo de Estudio:  ".$row['col_campest']."</span></label>
                                <label><span class='slist'>   Año/Cursando:  ".$row['col_cursando']."</span></label>
                                <label><span class='slist'>   Desde:  ";if($row['col_idia']<10)
                                {echo "0".$row['col_idia'];}
                                else{echo $row['col_idia'];}echo "/";if($row['col_imes']<10)
                                {echo "0".$row['col_imes'];}
                                else{echo $row['col_imes'];}echo "/".$row['col_ianio'];echo "   hasta:   ";
                                if($row['col_fdia']<10)
                                {echo "0".$row['col_fdia'];}
                                else{echo $row['col_fdia'];}echo "/";if($row['col_fmes']<10)
                                {echo "0".$row['col_fmes'];}
                                else{echo $row['col_fmes'];}echo "/".$row['col_fanio'];echo "  </span></label><br><br><br></div>
                                <div class='right'>
                                <li><a class='workexp-eliminar' href='./estudio-edit.php?id=".$row['cod_estudio']."'><img src='./imglogo/edit-interface-sign.png' height='19px'></a></li>
                                <li><a class='workexp-eliminar' href='./account/estudio-delete.php?id=".$row['cod_estudio']."'><img src='./imglogo/delete.png' height='19px'></a></li>
                                </div>"; 
                                }
                            }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script>

   
var d = myCalendar.getDate(true);
alert(d); // "2013-03-01"

       

function yesnoCheck() {
    var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();

	if(dd<10) {
		dd = '0'+dd
	} 

	if(mm<10) {
		mm = '0'+mm
	} 

	today = dd + '/' + mm + '/' + yyyy;
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('hidde').style.display = 'none';
        document.getElementById('box2').value = today;
    }
    else {
    document.getElementById('hidde').style.display = '';
    document.getElementById('box2').value = '';
    }
}

function pruebass()
{
    var d = myCalendar.getDate(true);

    alert(d);

}

    </script>

    <script src="./scriptw.js"></script>
    <link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" 
    type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptdate.js"></script>
   

</html>