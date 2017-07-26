<?php
   include './db.php';
	$n=$mysqli->query("SELECT MAX(cod_oftrabajo)+1 as col_max FROM tbl_oftrabajo");
	$user = $n->fetch_assoc();
   echo "

         <div class='add-oftrabajo'>
                  <span class='spans'>Registro de administradores : </span>
                  
                  <div class='line' style='width:100%;'><hr></div>
            <form id='oftrabajo' method='POST' action='./account/add-admin-user.php'>
               <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                  <tr>
                     <td style='width:35%;padding-top:15px;text-align:left;'>
                        <span style='margin-top:20px;' class='spans'>Nombres: </span><br>
                        <span style='color: gray'></span>
                     </td>
                     <td style='width:65%;'>
                        <span><input name='ofnombre' class='btn-st1' id='ofnombre' value='' placeholder='Nombres' required></span>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Apellido: </span><br>
                        <span style='color: gray'></span>
                     </td>
                     <td style='width:65%;'>
                        <input name='ofapellido' class='btn-st1' id='ofapellido' value='' placeholder='Apellidos' required>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Nombre de Usuario: </span><br>
                        <span style='color: gray'>* Debe comenzar con la palabra 'admin', y añadir 6 caracteres</span>
                     </td>
                     <td style='width:65%;'>
                        <input name='ofusername' class='btn-st1' id='ofusername' value='admin' placeholder='' required>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Contraseña: </span><br>
                        <span style='color: gray'>* Máximo 15 caracteres</span>
                     </td>
                     <td style='width:65%;'>
                        <input style='width:65%;' type='password' name='ofpassword' class='btn-st1' id='ofpassword'  required>
                     </td>
                  </tr>
                  
               </table>
               <input type='submit' class='buttonefex1' value='Guardar Cambios'>
            </form>
			</div>
     ";

    

?>

<script>
   $(document).ready(function(){
      
      $('#ofnombre').keyup(function(e) {
         var txt =document.getElementById('ofnombre');
         if(txt.value.length>80){
            return this.value = this.value.substring(0, 80);
         }
      })
      $('#ofapellido').keyup(function(e) {
         var txt =document.getElementById('ofapellido');
         if(txt.value.length>80){
            return this.value = this.value.substring(0, 80);
         }
      })
      $('#ofusername').keyup(function(e) {
         var txt =document.getElementById('ofusername');
         if(txt.value.length>=15){
            return this.value = this.value.substring(0, 15);
         }
      })
      /*$('#ofpassword').keypress(function(e) {
         var txt =document.getElementById('ofpassword');
         if(txt.value.length>=22){
            return this.value = this.value.substring(0, 22);
         }
      })*/
      
      $('#listadmin').click(function(){
            $('#cuadroresultado').load("./list-admin.php",function(){
                var txt =document.getElementById('ofusername');
                if(txt.value.length!=11){
                    txt.setCustomValidity('sdfsdfsdf');
                }
            });
        })
        
    


   

   })

   

</script>
<script src='./scriptadmin.js'></script>