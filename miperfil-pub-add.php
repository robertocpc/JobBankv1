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
                    
                    

                    <form  name='registration' id='registration' action='./account/save-public.php' method='post'>
                            

                        <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Título: </span><br>
                                 <span style='color: gray'>* Ej: Nombre de la publicación</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='pubtitulo' id='pubtitulo' type='text' class='btn-st1' required></span>
                              </td>
                           </tr>
                           
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Editorial: </span><br>
                                 <span style='color: gray'>* Ej. Octaedro</Octaedro></span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='pubeditorial' id='pubeditorial' type='text' class='btn-st1' required ></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>Fecha de Publicación: </span><br>
                                 <span style='color: gray'></span>
                              </td>
                              <td style='width:65%;'>
                                 <input name='fecha' id='box' type='text' class='btn-st1'   required>
                              </td>
                           </tr>
                           
                           <tr>
                              <td style='width:35%;padding-top:15px;text-align:left;'>
                                 <span style='margin-top:20px;' class='spans'>URL: </span><br>
                                 <span style='color: gray'>* Dirección web(opcional)</span>
                              </td>
                              <td style='width:65%;'>
                                 <span><input name='puburl' id='puburl' type='text' class='btn-st1' required></span>
                              </td>
                           </tr>
                           <tr>
                              <td style='width:35%;vertical-align:top;padding-top:15px;'>
                                 <span class='spans'>Descripción: </span><br>
                                 <span style='color: gray'>* Opcional</span>
                              </td>
                              <td style='width:65%;'>
                                 <textarea name='pubdescrip' id='pubdescrip' style='width:70%;height: 100px;border-radius:4px;border: 2px solid #ccc;resize:none;'></textarea>
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
<script src="./script-pub.js"></script>
<script src="./scriptsession.js"></script>
 
<script src="./scriptdate.js"></script>

    <script src="./googlemap.js"></script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>