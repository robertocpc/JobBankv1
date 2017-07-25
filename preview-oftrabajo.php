<?php
session_start();
$_SESSION['windows']=5;
 $id=$_REQUEST['id'];
include './db.php';
echo "
<table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>";
                        $result=$mysqli->query("SELECT * FROM tbl_oftrabajo WHERE cod_oftrabajo='$id'");
                        $user = $result->fetch_assoc();
                        echo "
                        <tr>
                           <td style='width:100%;font-size:14px;'>
                                <span style='font-size:28px'>".$user['col_ofnombre']."</span>
                                <hr>
                                <span style='color: #;'>".$user['col_empresa']."</span><br>
                                <span style='color: #;'>Fecha de Publicación".$user['col_fechapub']."</span>
                            </td>

                        </tr>
                        <tr>
                           <td style='width:100%;font-size:14px;'>
                                <span style='font-size:16px;border-bottom: 2px solid black;'>Datos Principales</span><br><br>";
                                
                                 if(isset($user['col_ubicacion']))
                                    echo "<span style='color: #;'>Ubicación: ".$user['col_ubicacion']."</span><br>";
                                 if(isset($user['col_emailcon']))
                                    echo "<span style='color: #;'>E-mail: ".$user['col_emailcon']."</span><br>";
                                 if(isset($user['col_telfcon']))
                                    echo "<span style='color: #;'>Teléfono: ".$user['col_telfcon']."</span><br>";
                                 if(isset($user['col_tipoempleo'])){
                                    echo "<span>Tipo de Empleo: "; 
                                    switch ($user['col_tipoempleo']) {
                                            case 0:
                                                echo "Tiempo Completo</span>";
                                                break;
                                            case 1:
                                                echo "Medio Tiempo</span>";
                                                break;
                                            case 2:
                                                echo "Temporal</span>";
                                                break;
                                            case 3:
                                                echo "Por Contrato</span>";
                                                break;
                                             case 4:
                                                echo "Becas/Practicas</span>";
                                                break;
                                             case 5:
                                                echo "Comisión</span>";
                                                break;
                                             case 6:
                                                echo "Indefinido</span>";
                                                break;
                                             default:
                                                echo"No definido</span>";
                                                break;
                                            }
                                    echo "<br>";
                                 }
                                 if(isset($user['col_tipopost'])){
                                    if($user['col_tipopost']==0)
                                       echo "<span style='color: #;'>Medio de postulación: E-mail - ".$user['col_emdi']."</span><br>";
                                    elseif($user['col_tipopost']==1)
                                       echo "<span style='color: #;'>Medio de postulación: Dirección - ".$user['col_emdi']."</span><br>";
                                 }
                                 if(isset($user['col_url'])){
                                    echo "<span>URL:  </span><a href='".addhttp($user['col_url'])."'>".$user['col_url']."</a><br>";
                                 }
                                 if(isset($user['col_fechalim'])){
                                    $sorderdate = explode('-', $user['col_fechalim']);
                                    $smonth = $sorderdate[1];
                                    $sday   = $sorderdate[2];
                                    $syear  = $sorderdate[0];

                                    $date=$sday."/".$smonth."/".$syear;
                                    echo "<span style='color: #;'>Fecha Límite de postulación: ".$date."</span><br>";
                                 }
                                 else{
                                    echo "<span style='color: #;'>Fecha Límite de postulación: No especificada</span><br>";
                                 }
                                 echo "<span style='color: #;'>Cantidad de Vacantes:   ";
                                 if(isset($user['col_cantvacantes'])){
                                    echo $user['col_cantvacantes']."</span><br>";
                                 }
                                 else{
                                    echo " No especificada</span><br>";
                                 }
                        echo "</tr>
                        <tr>
                           <td style='width:100%;font-size:14px;'>";
                                 echo "<span style='font-size:16px;border-bottom: 2px solid black;'>Requisitos :</span><br><br>";
                                 echo "<span style='font-size='14px'>Idiomas:  ";
                                 if(isset($user['col_idiomas'])){
                                    echo $user['col_idiomas']."</span><br>";
                                 }
                                 else{
                                    echo " No especificada</span><br>";
                                 }
                                 echo "<span style='color: #;'>Tiempo mínimo de experiencia:  ";
                                 if(isset($user['col_tiempoexp'])){
                                    echo $user['col_tiempoexp']."</span><br>";
                                 }
                                 else{
                                    echo " No especificada</span><br>";
                                 }
                                 echo "<span style='color: #;'>Licencia de Conducir:  ";
                                 if(isset($user['col_tiempoexp'])){
                                    echo $user['col_tiempoexp']."</span><br>";
                                 }
                                 else{
                                    echo " No especificada</span><br>";
                                 }
                                 echo "<span style='color: #;'>Disponibilidad para viajar:  ";
                                 if(isset($user['col_dispviaje'])){
                                     if($user['col_dispviaje']==1)
                                        echo "Si</span><br>";
                                    else
                                        echo "No</span><br>";
                                 }
                                 else{
                                    echo " No especificada</span><br>";
                                 }
                                 echo "<span style='color: #;'>Disponibilidad para cambio residencia:  ";
                                 if(isset($user['col_dispresid'])){
                                     if($user['col_dispresid']==1)
                                        echo "Si</span><br>";
                                    else
                                        echo "No</span><br>";
                                 }
                                 else{
                                    echo " No especificada</span><br>";
                                 }
                                 
                           echo "</td>

                        </tr>
                        <tr>
                           <td style='width:100%;font-size:14px;'>";
                                 echo "<span style='font-size:16px;border-bottom: 2px solid black;'>Descripción :</span><br><br>";
                                 echo "<span style='font-size='14px'>  ";
                                 if(isset($user['col_descripcion'])){
                                    echo $user['col_descripcion']."</span><br>";
                                 }
                                 else{
                                     echo "No hay descripciones para esta oferta laboral</span><br>";
                                 }
                                 
                           echo "</td>

                        </tr>
                        
                    </table>

";

function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

?>
