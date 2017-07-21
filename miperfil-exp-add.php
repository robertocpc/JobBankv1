<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" type="text/css"> 
    <!--script src="./dhtmlx.css"></script-->
<script src="jquery-3.2.1.min.js"></script>
<?php
session_start();

include './db.php';
echo "
                    
                    

                    <form  name='registration' id='registration' action='./account/save-work.php' method='post'>
                            

                        <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Cargo: </span><br>
                                 <span style='color: gray'>* Ej: Gerente de la Oficina de Tecnologías de Comunicación</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='esnombre' id='esnombre' type='text' class='btn-st1' required></span>
                              </td>
                           </tr>
                           
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Centro de Trabajo: </span><br>
                                 <span style='color: gray'>* Indique el centro de trabajo en el que laboró</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='estitulo' id='estitulo' type='text' class='btn-st1' ></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Ubicacion(Region): </span><br>
                                 <span style='color: gray'>* Indique la ubicación del centro de trabajo. Ejemplo: Tacna, Perú</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='escamp' id='escamp' type='text' class='btn-st1' required></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Dirección: </span><br>
                                 <span style='color: gray'>* Indique la dirección del centro de trabajo(opcional)</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='expdir' id='expdir' type='text' class='btn-st1' ></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Tipo de Trabajo: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                    <input class='btn-st1' id='tipot' value='".$user['col_tipotrabajo']."'  disabled style='display:none;'>
                                 <select class='efex-option shadow' name='trabajo' id='trabajo'>
                                       <option value='0' id='optt1' selected>Presencial</option>
                                       <option value='1' id='optt2'>Remoto</option>
                                 </select> 
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Fecha de Inicio: </span><br>
                                 <span style='color: gray'>* Ejemplo: 02/08/2017</span>
                              </td>
                              <td style='width:65%;'>
                                 <input name='fecha' id='box' type='text' class='btn-st1'   required>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Trabajo aquí acualmente: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                    <input class='btn-st1' id='tipota' value='".$user['col_actualtrab']."' disabled style='display:none;'>
                                 <select class='efex-option shadow' name='actual' id='actual' onchange='change();'>
                                       <option value='0' id='opta2' selected>No</option>
                                       <option value='1' id='opta1'>SI</option>
                                 </select> 
                              </td>
                           </tr>
                           
                           <tr style='display:table-row' style='display:none' id='fechafn'>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Fecha de Culminación: </span><br>
                                 <span style='color: gray'>* Ejemplo: 02/08/2017</span>
                              </td>
                              <td style='width:65%;'>
                                 <input name='fecha2' id='box2' type='text' class='btn-st1' disabled  required>
                              </td>
                           </tr>
                           
                           <tr>
                              <td>
                              </td>
                              <td>
                                 <input class='buttonefex1' type='submit' value='Guardar Cambios'>
                              </td>
                           </tr>    
                        </table>             

                        </form>
      ";
                

?><link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" type="text/css"> 
    <!--script src="./dhtmlx.css"></script-->

<script>
        function change(){
            if(document.getElementById('opta1').selected==true){
               document.getElementById('fechafn').style.display='none';
               document.getElementById('box2').required=false;
            }
            if(document.getElementById('opta2').selected==true){
               document.getElementById('fechafn').style.display='table-row';
               document.getElementById('box2').required=true;
            }
        }  
   $(document).ready(function(){
		
   })

</script>

    
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./script-exp.js"></script>
<script src="./scriptsession.js"></script>
 
<script src="./scriptdate.js"></script>

    <script src="./googlemap.js"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>