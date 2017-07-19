<?php
session_start();
   include './db.php';
	$n=$mysqli->query("SELECT * FROM tbl_egresado WHERE cod_alumno LIKE 'admin%'");
	
   echo "
      <div class='container' > 
         <div class='add-oftrabajo shadow'>
                  <span class='spans'>Listado de administradores : </span>
                  <input id='listadmin' style='float:right;cursor:pointer;font-size:10px;width:100px;' type='text' class='buttonefex1' value='Añadir Admins'>
                  <div class='line' style='width:100%;'><hr></div>
            <form id='oftrabajo' method='POST' action='./account/add-admin-user.php'>
               <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                  <tr>
                     <td style='width:35%;text-align:left;'>
                        <span style='margin-top:20px;' class='spans'>NOMBRES Y APELLIDOS</span><br>
                     </td>
                     <td style='width:35%;'>
                        <span style='margin-top:20px;' class='spans'>USERNAME</span><br>
                     </td>
                     <td style='width:25%;'>
                        <span style='margin-top:20px;' class='spans'>PASSWORD</span><br>
                     </td>
                     <td style='width:5%;'>
                        <span></span>
                     </td>
                  </tr>
                  ";
                  while($user=$n->fetch_assoc()){
                  ECHO "
                  <tr>
                     <td style='width:35%;padding-top:15px;text-align:left;'>
                        <span style='margin-top:20px;' class='spans'>".$user['col_nombre']."  ".$user['col_apellido']." </span><br>
                        
                     </td>
                     <td style='width:35%;'>
                        <span style='margin-top:20px;' class='spans'>".$user['cod_alumno']."</span><br>
                     </td>
                     <td style='width:25%;'>
                        <span style='margin-top:20px;' class='spans'>".$user['psw_alumno']."</span><br>
                     </td>
                     <td style='width:5%;'>
                        <li style='list-style: none;
    text-decoration: none;' ><a class='workexp-eliminar' href='./account/admin-delete.php?id=".$user['cod_alumno']."'><img src='./imglogo/delete.png' height='19px'></a></li>
                     </td>
                  </tr>
                  ";
                  }
                  ECHO "
                  
                  
               </table>
               
            </form>
			</div>
      </div>";
?>
<script>
   $(document).ready(function(){
      
      $('#ofnombre').keypress(function(e) {
         var txt =document.getElementById('ofnombre');
         if(txt.value.length>80){
            return this.value = this.value.substring(0, 80);
         }
      })
      $('#ofapellido').keypress(function(e) {
         var txt =document.getElementById('ofapellido');
         if(txt.value.length>80){
            return this.value = this.value.substring(0, 80);
         }
      })
      $('#ofusername').keypress(function(e) {
         var txt =document.getElementById('ofusername');
         if(txt.value.length>=11){
            return this.value = this.value.substring(0, 11);
         }
      })
      $('#ofpassword').keypress(function(e) {
         var txt =document.getElementById('ofpassword');
         if(txt.value.length>=14){
            return this.value = this.value.substring(0, 14);
         }
      })
      $('#listadmin').click(function(){
            $('#cuadroresultado').load("./add-admin.php",function(){
                var txt =document.getElementById('ofusername');
                if(txt.value.length!=11){
                    txt.setCustomValidity('sdfsdfsdf');
                }
            });
        })


   

   })

   

</script>
<script src='./scriptadmin.js'></script>

