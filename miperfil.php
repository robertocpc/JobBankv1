<link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" 
    type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src='./scriptdate.js'></script>
<script src='./scriptoftrabajo.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <Script src="./jquery.js"></Script>
 <script src="./googlemap.js">    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>
<?php echo "
        <div class='container shadow'>
            <div id='contegre'>
                <div class='show-right' >
                     <div class='dropdown' id='dropdown'>
                        <div class='dropdownfiltro set-blue' id='keyword'>
                            <span class='spans' style='font-weigth:bold;'>Información Personal</span>
                           <span><img id='arrowdown'src='./img/arrow-down.png'></span>
                           <span><img id='arrowup' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords set-white' id='keywords'>
                                <li id='ipdp'><a class='linkdirec'>Datos Personales</a></li>
                                <li id='ipc'><a class='linkdirec'>Datos de Carrera</a></li>
                            </div>
                        <div class='dropdownfiltro set-blue' id='ubicacion'>
                            <span class='spans' style='font-weigth:bold;'>Estudios</span>
                           <span><img id='arrowdown1'src='./img/arrow-down.png'></span>
                           <span><img id='arrowup1' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords set-white' id='ubicaciones'>
                                <li id='estadd'><a class='linkdirec'>Añadir Estudios</a></li>
                                <li id='estlist'><a class='linkdirec'>Listado</a></li>                               
                            </div>
                        <div class='dropdownfiltro set-blue' id='empactual'>
                            <span class='spans' style='font-weigth:bold;'>Experiencia Laboral:</span>
							<span><img id='arrowdown2'src='./img/arrow-down.png'></span>
							<span><img id='arrowup2' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords set-white' id='empactuals'>
                                <li id='expadd'><a class='linkdirec'>Añadir Experiencia Laboral</a></li>
                                <li id='explist'><a class='linkdirec'>Listado</a></li> 
                            </div>
                        <div class='dropdownfiltro set-blue' id='emppas'>
                            <span class='spans' style='font-weigth:bold;'>Publicaciones</span>
							<span><img id='arrowdown3'src='./img/arrow-down.png'></span>
							<span><img id='arrowup3' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords set-white' id='emppass'>
                                <li><a class='linkdirec'>Añadir Publicaciones</a></li>
                                <li><a class='linkdirec'>Listado</a></li> 
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

		 
		$('#keyword').click(function(){
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
         $('#result').load("./miperfil-dt-prs.php",function(){
            if(document.getElementById('tipod').value==0){
               document.getElementById('opt1').selected=true;
               document.getElementById('inputpost').style.display='inline';
               document.getElementById('inputpost').value=document.getElementById('numide').value;
            }
            else if(document.getElementById('tipod').value==1){
               document.getElementById('opt2').selected=true;
               document.getElementById('inputpost').style.display='inline';
               document.getElementById('inputpost').value=document.getElementById('numide').value;
            }
            else if(document.getElementById('tipod').value==2){
               document.getElementById('opt3').selected=true;
               document.getElementById('inputpost').style.display='inline';
               document.getElementById('inputpost').value=document.getElementById('numide').value;
            }

            if(document.getElementById('tipogen').value==0){
               document.getElementById('optg1').selected=true;
            }
            else if(document.getElementById('tipogen').value==1){
               document.getElementById('optg2').selected=true;
            }
            else if(document.getElementById('tipogen').value==2){
               document.getElementById('optg3').selected=true;
            }
         });
      })
      $('#ipc').click(function(){
         $('#result').load("./miperfil-dt-c.php",function(){
            
         });
      })
      $('#estadd').click(function(){
         $('#result').load("./miperfil-est-add.php",function(){
            
         });
      })
      $('#estlist').click(function(){
         $('#result').load("./miperfil-est-list.php",function(){
            
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
            

		

        
    })
</script>