<?php
session_start();
   include './db.php';
	$n=$mysqli->query("SELECT * FROM tbl_publicacion WHERE cod_alumno='$_SESSION[cod]'");
	
   echo "
      
         <div class='add-oftrabajo' style='border: 1.5px solid gray'>
                  <span class='spans'>Listado de Experiencia Laboral : </span>
                  <div class='line' style='width:100%;'><hr></div>
            <form id='oftrabajo' method='POST' action='./account/add-admin-user.php'>
               <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>";
                  if($n->num_rows==0){
                     echo "
                     <tr>
                        <td style='width:100%'>
                           <span>No se registro ninguna publicación</span>
                        </td>
                     </tr>
                     ";
                  }
                  else{

                  echo "
                  <tr>
                     <td style='width:20%;text-align:left;'>
                        <span style='margin-top:20px;' class='spans'>Titulo</span><br>
                     </td>
                     <td style='width:20%;'>
                        <span style='margin-top:20px;' class='spans'>Editorial</span><br>
                     </td>
                     <td style='width:20%;'>
                        <span style='margin-top:20px;' class='spans'>Fecha de publicación</span><br>
                     </td>
                     <td style='width:15%;'>
                        <span style='margin-top:20px;' class='spans'>URL</span><br>
                     </td>
                     <td style='width:15%;'>
                        <span style='margin-top:20px;' class='spans'>Descripción</span><br>
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
                        <span style='margin-top:20px;' class='spans'>".$user['col_titulo']." </span><br>
                        
                     </td>
                     <td style='width:20%;'>
                        <span style='margin-top:20px;' class='spans'>".$user['col_editor']."</span><br>
                     </td>
                     <td style='width:20%;'>
                        <span style='margin-top:20px;' class='spans'>".$user['col_fecha']."</span><br>
                     </td>
                     <td style='width:15%;'>
                        <span style='margin-top:20px;' class='spans'>".$user['col_url']."</span><br>
                     </td>
                     <td style='width:15%;'>
                        <span style='margin-top:20px;' class='spans'>".$user['col_descrip']."</span><br>
                     </td>
                     <td style='width:5%;'>
                        <li style='list-style: none;
    text-decoration: none;' ><a class='workexp-eliminar' href='./account/perfil-pub-delete.php?id=".$user['cod_publicacion']."'><img src='./imglogo/delete.png' height='19px'></a></li>
                     </td>
                  </tr>
                  ";
                  }
                  }
                  ECHO "
                  
                  
               </table>
               
            </form>
			</div>
     ";
?>
<script>
   $(document).ready(function(){
      

   })

   

</script>
<script src='./scriptadmin.js'></script>

