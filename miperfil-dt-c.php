<?php
session_start();

include './db.php';
$result = $mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno='$_SESSION[cod]'");
$user = $result->fetch_assoc();
echo "
                    
                    <form  name='registration' id='registration' action='./account/save-profile.php' method='post'>
                            

                        <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                           <tr>
                              <td style='width:35%;padding-top:20px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Código: </span><br>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='nombre' id='username' type='text' class='btn-st1' value='".$user['cod_alumno']."' disabled></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:20px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Facultad: </span><br>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='apellido' id='apellido' type='text' class='btn-st1' value='"."FAIN"."' disabled></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:20px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Escuela: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='cabecera' id='cabecera' type='text' class='btn-st1' value='"."ESIS"."' disabled></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:20px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Año de Ingreso: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='posactual' id='posactual' type='text' class='btn-st1' value='".$user['col_fechaing']."' disabled></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:20px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Promedio: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='email' id='email' type='text' class='btn-st1' value='".$user['col_promedio']."' disabled></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:20px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Nombre de Tesis: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='telefono' id='telefono' type='text' class='btn-st1' value='".$user['col_tesis']."' disabled></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:20px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Código de Tesis: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                 <input name='fecha' id='box' type='text' class='btn-st1' value='".$user['cod_tesis']."'  disabled>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:20px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>URL Tesis: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input id='autocomplete' class='btn-st1'  value='".$user['col_urltesis']."' 
                                    onFocus='geolocate()' type='text' name='ciudadorigen' disabled></span>
                              </td>
                           </tr>
                        </table>             

                        </form>
      ";
                

?>