<?php echo "
        <div class='container shadow'>
            <div id='contegre'>
                <div class='show-right' >
                     <div class='dropdown' id='dropdown'>
                        <div class='dropdownfiltro set-blue' id='admi'>
                            <span class='spans' style='font-weigth:bold;'>Administradores</span>
                           <span><img id='arrowdown'src='./img/arrow-down.png'></span>
                           <span><img id='arrowup' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords set-white' id='keywords'>
                                <li id='ipdp'><a class='linkdirec'>Añadir Administradores</a></li>
                                <li id='ipc'><a class='linkdirec'>Listar Administradores</a></li>
                            </div>
                        <div class='dropdownfiltro set-blue' id='ubicacion'>
                            <span class='spans' style='font-weigth:bold;'>Configuraciones</span>
                           <span><img id='arrowdown1'src='./img/arrow-down.png'></span>
                           <span><img id='arrowup1' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords set-white' id='ubicaciones'>
                                <li id='estadd'><a href='./account/backup.php'class='linkdirec' style='display:block'>Realizar Backup</a></li>
                                <li style='display:none' id='estlist'><a class='linkdirec'>Editar Pagina de Inicio</a></li>                               
                            </div>
                        <div style='display:none' class='dropdownfiltro set-blue' id='empactual'>
                            <span class='spans' style='font-weigth:bold;'>Experiencia Laboral:</span>
							<span><img id='arrowdown2'src='./img/arrow-down.png'></span>
							<span><img id='arrowup2' style='display:none;' src='./img/up-arrow.png'></span>
                        </div style='display:none'>
                            <div class='dropdown-keywords set-white' id='empactuals'>
                                <li id='expadd'><a class='linkdirec'>Añadir Experiencia Laboral</a></li>
                                <li id='explist'><a class='linkdirec'>Listado</a></li> 
                            </div>
                        <div style='display:none' class='dropdownfiltro set-blue' id='emppas'>
                            <span class='spans' style='font-weigth:bold;'>Publicaciones</span>
							<span><img id='arrowdown3'src='./img/arrow-down.png'></span>
							<span><img id='arrowup3' style='display:none;' src='./img/up-arrow.png'></span>
                        </div style='display:none' >
                            <div class='dropdown-keywords set-white' id='emppass'>
                                <li id='pubadd'><a class='linkdirec'>Añadir Publicaciones</a></li>
                                <li id='publist'><a class='linkdirec'>Listado</a></li> 
                            </div>
                        
                            
                    </div>
                </div>
                <div class='resultado shadow'>
					
					
               <div id='result' >
					
					";
	
	echo "
                </div>
            </div>
			
			
        </div>


    </div>
					";
?>
<script>
	

	$(document).ready(function(){
		
        
		/*
		$("#add").on('click',function(){
			$('#cover').fadeIn('slow');
			$('#popup').fadeIn('slow');
		})
		$('#popup').on('click',function(){
			if($(event.target).is('#close')){
				$('#cover').fadeOut('slow');
				$('#popup').fadeOut('slow');
			}
		})
		$('#cover,#close').on('click',function(){
			$('#cover').fadeOut('slow');
			$('#popup').fadeOut('slow');
		})
		*/

		 
		$('#admi').click(function(){
            var val_height="76px"
            if(document.getElementById('keywords').style.height==val_height){
                document.getElementById('keywords').style.height = "0px";
				document.getElementById('arrowdown').style.display='inline';
				document.getElementById('arrowup').style.display='none';
			}else{
                document.getElementById('keywords').style.height = val_height;
				document.getElementById('arrowdown').style.display='none';
				document.getElementById('arrowup').style.display='inline';
      }

      })
      $('#ubicacion').click(function(){
         var val_height="76px"
         if(document.getElementById('ubicaciones').style.height==val_height){
               document.getElementById('ubicaciones').style.height = "0px";
         document.getElementById('arrowdown1').style.display='inline';
         document.getElementById('arrowup1').style.display='none';
      }else{
               document.getElementById('ubicaciones').style.height = val_height;
         document.getElementById('arrowdown1').style.display='none';
         document.getElementById('arrowup1').style.display='inline';
      }
      })
      $('#empactual').click(function(){
         var val_height="76px"
         if(document.getElementById('empactuals').style.height==val_height){
               document.getElementById('empactuals').style.height = "0px";
         document.getElementById('arrowdown2').style.display='inline';
         document.getElementById('arrowup2').style.display='none';
      }else{
               document.getElementById('empactuals').style.height = val_height;
         document.getElementById('arrowdown2').style.display='none';
         document.getElementById('arrowup2').style.display='inline';
      }
      })
      $('#emppas').click(function(){
         var val_height="76px"
         if(document.getElementById('emppass').style.height==val_height){
               document.getElementById('emppass').style.height = "0px";
         document.getElementById('arrowdown3').style.display='inline';
         document.getElementById('arrowup3').style.display='none';
      }else{
               document.getElementById('emppass').style.height = val_height;
         document.getElementById('arrowdown3').style.display='none';
         document.getElementById('arrowup3').style.display='inline';
      }
      })

      $('#ipdp').click(function(){
         $('#result').load("./add-admi.php",function(){
            
         });
      })
      $('#ipc').click(function(){
         $('#result').load("./list-admin.php",function(){
            
         });
      })
      $('#estlist').click(function(){
         $('#result').load("./panel-admin-index.php",function(){
            
         });
      })
      $('#expadd').click(function(){
         $('#result').load("./miperfil-exp-add.php",function(){
            if(document.getElementById('opta1').selected==true){
               document.getElementById('fechafn').style.display='none';
               document.getElementById('box2').required=false;
            }
            if(document.getElementById('opta2').selected==true){
               document.getElementById('fechafn').style.display='table-row';
               document.getElementById('box2').required=true;
            }
         });
      })
      $('#explist').click(function(){
         $('#result').load("./miperfil-exp-list.php",function(){
            
         });
      })

      $('#pubadd').click(function(){
         $('#result').load("./miperfil-pub-add.php",function(){     
         });
      })
      $('#publist').click(function(){
         $('#result').load("./miperfil-pub-list.php",function(){     
         });
      })
      
            

		

        
    })
</script>

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
      $('#backup').click(function(){
        $.get("./account/backup.php");
        return false;   
      })
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

 