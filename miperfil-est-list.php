<?php
session_start();
   include './db.php';
	$n=$mysqli->query("SELECT * FROM tbl_estudio WHERE cod_alumno='$_SESSION[cod]'");
	
   echo "
      
         <div class='add-oftrabajo' style='border: 1.5px solid gray'>
                  <span class='spans'>Listado de Estudios : </span>
                  <div class='line' style='width:100%;'><hr></div>
            <form id='oftrabajo' method='POST' action='./account/add-admin-user.php'>
               <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                  <tr>
                     <td style='width:20%;text-align:left;'>
                        <span style='margin-top:20px;' class='spans'>Centro de Estudio</span><br>
                     </td>
                     <td style='width:20%;'>
                        <span style='margin-top:20px;' class='spans'>Titulo o Grado Profesional</span><br>
                     </td>
                     <td style='width:20%;'>
                        <span style='margin-top:20px;' class='spans'>Campo de Estudio</span><br>
                     </td>
                     <td style='width:15%;'>
                        <span style='margin-top:20px;' class='spans'>Fecha de Ingreso</span><br>
                     </td>
                     <td style='width:15%;'>
                        <span style='margin-top:20px;' class='spans'>Fecha de Culminación</span><br>
                     </td>
                     <td style='width:5%;'>
                        <span></span>
                     </td>
                  </tr>
                  ";
                  while($user=$n->fetch_assoc()){
                  ECHO "
                  <tr>
                     <td style='width:20%;padding-top:15px;text-align:left;'>
                        <span style='margin-top:20px;' class='spans'>".$user['col_school']." </span><br>
                        
                     </td>
                     <td style='width:20%;'>
                        <span style='margin-top:20px;' class='spans'>".$user['cod_grado']."</span><br>
                     </td>
                     <td style='width:20%;'>
                        <span style='margin-top:20px;' class='spans'>".$user['col_campest']."</span><br>
                     </td>
                     <td style='width:15%;'>
                        <span style='margin-top:20px;' class='spans'>".$user['col_fechain']."</span><br>
                     </td>
                     <td style='width:15%;'>
                        <span style='margin-top:20px;' class='spans'>".$user['col_fechafin']."</span><br>
                     </td>
                     <td style='width:5%;'>
                        <li style='list-style: none;
    text-decoration: none;' ><a class='workexp-eliminar' href='./account/perfil-est-delete.php?id=".$user['cod_estudio']."'><img src='./imglogo/delete.png' height='19px'></a></li>
                     </td>
                  </tr>
                  ";
                  }
                  ECHO "
                  
                  
               </table>
               
            </form>
			</div>
     ";
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

