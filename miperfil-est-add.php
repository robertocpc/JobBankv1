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
                    
                    

                    <form  name='registration' id='registration' action='./account/save-estudio.php' method='post'>
                            

                        <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Centro de Estudio: </span><br>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='esnombre' id='esnombre' type='text' class='btn-st1' required></span>
                                 <span style='color: gray'>* Ej: Instituto, Universidad ...</span>
                              </td>
                           </tr>
                           
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Título Profesional: </span><br>
                                 <span style='color: gray'>* Indique el título profesional. Ej: Doctor en Tecnologías de Información y Comunicación</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='estitulo' id='estitulo' type='text' class='btn-st1' ></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Campo de Estudio: </span><br>
                                 <span style='color: gray'>* Indique el campo de estudio al cual se oriente</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='escamp' id='escamp' type='text' class='btn-st1' ></span>
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
            if(document.getElementById('tipodoc').value==0&&document.getElementById('tipod').value==0){
                document.getElementById('inputpost').value=document.getElementById('numide').value;
            }
            else if(document.getElementById('tipodoc').value==1&&document.getElementById('tipod').value==1){
                document.getElementById('inputpost').value=document.getElementById('numide').value;
            }
            else if(document.getElementById('tipodoc').value==2&&document.getElementById('tipod').value==2){
                document.getElementById('inputpost').value=document.getElementById('numide').value;
            }
            else{
                document.getElementById('inputpost').value='';
            }
        }  

</script>

    
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptt.js"></script>
<script src="./scriptsession.js"></script>
 
<script src="./scriptdate.js"></script>

    <script src="./googlemap.js"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>