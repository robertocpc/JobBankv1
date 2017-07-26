<?php
session_start();
   include './db.php';
	$n=$mysqli->query("SELECT MAX(cod_oftrabajo)+1 as col_max FROM tbl_oftrabajo");
	$user = $n->fetch_assoc();
    $file = './account/editor.txt';
    $orig = file_get_contents($file);
    $a = htmlentities($orig);
   echo "

         <div class='add-oftrabajo'>
                  <span class='spans'>Pagina de Inicio</span>
                  <div class='line' style='width:100%;'><hr></div>
               <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                  <tr>
                     <td style='width:35%;padding-top:15px;text-align:left;'>
                        <span style='margin-top:20px;' class='spans'>Post Principal: </span><br>
                        <span style='color: gray'></span>
                     </td>
                     <td style='width:65%;'>
                        <form id='oftrabajo' method='POST' action='./account/post-text.php'>
                            <textarea name='post' id='post' style='width:70%;height: 100px;border-radius:4px;border: 2px solid #ccc;resize:none;'>".str_replace('<br />>','',$a)."</textarea> 
                            <input type='submit' class='buttonefex1' value='Guardar Cambios'>
                        </form>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Imagen de Post: </span><br>
                        <span style='color: gray'></span>
                     </td>
                     <td style='width:65%;'>";
                       
                     echo "</td>
                  </tr>                  
               </table>
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

