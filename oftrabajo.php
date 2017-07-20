<?php echo "<div class='buscador shadow'>
            <div class='container searchbar'>
                    <input  name='search' id='search' type='text' class='width-of'
                     placeholder='Busqueda ofertas laborales'
                     value='".$searchq."'>
                     <input name='searchciu' id='autocomplete' type='text' class='searchciu'
                     placeholder='Ciudad, Provincia o Pais' onFocus='geolocate()' 
                     value='".$searchciuq."'>
                    <input  type='submit' class='buscar-submit' id='buscar' value='Buscar'>
						  <div style='float:right;' id='opavanzadas'><img src='./imglogo/settings.png'></div>
                    <br><label><span style='color:white;'>Ejemplo: Ingeniero de Preventa </span></label>
                
           </div>
        </div>
        <div class='container shadow'>
            <div id='contegre'>
                <div class='show-right' >
                    <label style='font-size:14px;' id='cab-filtro'>Filtro por:</label><br><Br>
                    <div class='dropdown' id='dropdown'>
                        <div class='dropdownfiltro' id='keyword'>
                            <span class='spans' style='font-weigth:bold;'>Palabras Claves:</span>
							<span><img id='arrowdown'src='./img/arrow-down.png'></span>
							<span><img id='arrowup' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords' id='keywords'>
                                <input class='filtro-input' type='text' name='cargo' id='ddcargo' placeholder='Cargo'>
                                <input class='filtro-input' type='text' name='empresa' id='ddempresa' placeholder='Empresa'>
                                <input class='filtro-input' type='text' name='idioma' id='ddidioma' placeholder='Idiomas'>
                            </div>
                        <div class='dropdownfiltro' id='ubicacion'>
                            <span class='spans' style='font-weigth:bold;'>Fecha de publicación:</span>
							<span><img id='arrowdown1'src='./img/arrow-down.png'></span>
							<span><img id='arrowup1' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords' id='ubicaciones'>
                                <p><input type='checkbox' id='fptest1' value='0'/><label for='fptest1'>Ultimas 24 horas</label></p>
                                <p><input type='checkbox' id='fptest2' value='1'/><label for='fptest2'>Ultima Semana</label></p>
                                <p><input type='checkbox' id='fptest3' value='2'/><label for='fptest3'>Ultimo Mes</label></p>
                                <p><input type='checkbox' id='fptest4' value='3'/><label for='fptest4'>Cualquier hora</label></p>                               
                            </div>
                        <div class='dropdownfiltro' id='empactual'>
                            <span class='spans' style='font-weigth:bold;'>Tipo de Empleo:</span>
							<span><img id='arrowdown2'src='./img/arrow-down.png'></span>
							<span><img id='arrowup2' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords' id='empactuals'>
                                <p><input type='checkbox' id='tetest1' value='0'/><label for='tetest1'>Tiempo Completo</label></p>
                                <p><input type='checkbox' id='tetest2' value='1' /><label for='tetest2'>Medio Tiempo</label></p>
                                <p><input type='checkbox' id='tetest3' value='2'/><label for='tetest3'>Temporal</label></p>
                                <p><input type='checkbox' id='tetest4' value='3'/><label for='tetest4'>Por Contrato</label></p>
                                <p><input type='checkbox' id='tetest5' value='4'/><label for='tetest5'>Becas/Practicas</label></p>
                                <p><input type='checkbox' id='tetest6' value='5'/><label for='tetest6'>Comisión</label></p>
                                <p><input type='checkbox' id='tetest7' value='6'/><label for='tetest7'>Indefinido</label></p>
                            </div>
                        <div class='dropdownfiltro' id='emppas'>
                            <span class='spans' style='font-weigth:bold;'>Tipo de Postulación:</span>
							<span><img id='arrowdown3'src='./img/arrow-down.png'></span>
							<span><img id='arrowup3' style='display:none;' src='./img/up-arrow.png'></span>
                        </div>
                            <div class='dropdown-keywords' id='emppass'>
                                <p><input type='checkbox' id='tptest1' value='0'/><label for='tptest1'>Email</label></p>
                                <p><input type='checkbox' id='tptest2' value='1'/><label for='tptest2'>Presencial</label></p>
                            </div>
                        <div class='dropdownfiltro' id='idioma'>
                            <p><input type='checkbox' id='dstest1' value='1'/><label for='dstest1'>Vigente</label></p>
                            <p><input type='checkbox' id='dstest2' value='1'/><label for='dstest2'>Disponibilidad de Viaje</label></p>
                            <p><input type='checkbox' id='dstest3' value='1'/><label for='dstest3'>Disponibilidad de Residencia</label></p> 
                        </div>
                            
                    </div>
                </div>
                <div class='resultado shadow'>
					<div class='op-oftrabajo' >
						<div style='float:left' class='ckbox'><span><input type='checkbox' id='checkall' value='1'/><label for='checkall'>Marcar Todo</label></span></div>
						<div style='float:right' id='add'><span><img src='./imglogo/add-op.png'>Añadir</span></div>
						<div style='float:right' id='deleteoft'><span><img src='./imglogo/cancel.png'>Eliminar</span></div>
					</div>
					
               <div id='result' >
					
					";
	
	echo "
                </div>
            </div>
			
			<div class='line' style='width:100%;float:left;'><hr></div>
        </div>


    </div>
					";
					?>
<script>
	

	$(document).ready(function(){
		$('.result-a').click(function(){
			alert('dfsdf');/*
            var txt=this.getAttribute("data-code");
            $('#result').load("./preview-oftrabajo-f.php" {'id':txt});*/
        })
		$('#tippos').change(function(){
			var opt=document.getElementById('tippos');
			var input=document.getElementById('inputpost');
			input.style.display='inline';
			input.disabled=false;
			var val=opt.value;
			if(val=='0')
				input.value='E-mail...';
			else if(val=='1')
				input.value='Dirección...';
		})

		$("#add").on('click',function(){
        	$('#cuadroresultado').load("./add-oftrabajo.php");
		})
        
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

		function fnsearch(){
			document.getElementById('checkall').checked=false;
			var txt=document.getElementById("search").value;
			var txtc=document.getElementById("autocomplete").value;
			var txt1=document.getElementById("ddcargo").value;
			var txt2=document.getElementById("ddempresa").value;
			var txt3=document.getElementById("ddidioma").value;
			

			if(document.getElementById('fptest1').checked==true)
				var fecha=document.getElementById('fptest1').value;
			else if(document.getElementById('fptest2').checked==true)
				var fecha=document.getElementById('fptest2').value;
			else if(document.getElementById('fptest3').checked==true)
				var fecha=document.getElementById('fptest3').value;
			else if(document.getElementById('fptest4').checked==true)
				var fecha=document.getElementById('fptest4').value;

			var tipem="";
			if(document.getElementById('tetest1').checked==true)
				tipem=tipem+" "+document.getElementById('tetest1').value;
			if(document.getElementById('tetest2').checked==true)
				tipem=tipem+" "+document.getElementById('tetest2').value;
			if(document.getElementById('tetest3').checked==true)
				tipem=tipem+" "+document.getElementById('tetest3').value;
			if(document.getElementById('tetest4').checked==true)
				tipem=tipem+" "+document.getElementById('tetest4').value;
			if(document.getElementById('tetest5').checked==true)
				tipem=tipem+" "+document.getElementById('tetest5').value;
			if(document.getElementById('tetest6').checked==true)
				tipem=tipem+" "+document.getElementById('tetest6').value;
			if(document.getElementById('tetest7').checked==true)
				tipem=tipem+" "+document.getElementById('tetest7').value;
			
			if(document.getElementById('tptest1').checked==true)
				var tippo=document.getElementById('tptest1').value;
			else if(document.getElementById('tptest2').checked==true)
				var tippo=document.getElementById('tptest2').value;
			
			if(document.getElementById('dstest1').checked==true)
				var dis=document.getElementById('dstest1').value;
			if(document.getElementById('dstest2').checked==true)
				var disv=document.getElementById('dstest2').value;
			if(document.getElementById('dstest3').checked==true)
				var disr=document.getElementById('dstest3').value;
			
			$.ajax({
			type: 'POST',
			url: './resultado-trabajo.php',
			data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,'idioma':txt3,
					'fechali':fecha,'tipem':tipem,'tippo':tippo,
							'dis':dis,'disv':disv,'disr':disr},
			success: function(resp){
				$('#result').html(resp);
			}
			})
		}

		$('#checkall').click(function(){
			if(document.getElementById('checkall').checked==true){
				var inputs = document.querySelectorAll('.checkopt');	
				for (var i = 0; i < inputs.length; i++) {
					inputs[i].checked=true;
				}
			}
			else if(document.getElementById('checkall').checked==false){
				var inputs = document.querySelectorAll('.checkopt');
				for (var i = 0; i < inputs.length; i++) {
					inputs[i].checked=false;
				}
			}
		})
		$('#deleteoft').click(function(){
			var j=1;
            var ck='ck'+j;
			//var ck='ck1';
			var txt;
			var inputs = document.querySelectorAll('.checkopt');
            for (var i = 0; i < inputs.length; i++) {
				txt = inputs[i].value;
				//alert(txt);
				if(inputs[i].checked==true){
					$.ajax({
					type: 'POST',
					url: './account/admin-oft-delete.php',
					data: { 'id':txt},
					success: function(resp){
						fnsearch();
					}
					})
				}
			}
			
       		//$('#cuadroresultado').load("./oftrabajo.php");
                
        })  
		$('#keyword').click(function(){
            var val_height="130px"
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
            var val_height="140px"
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
            var val_height="230px"
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
            var val_height="80px"
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
        		   

		$('#ddcargo,#ddempresa,#ddidioma,#autocomplete,#search').keypress(function(e){
            if(e.which == 13) {
				fnsearch();
			}     
        })
	
		$('#fptest1').click(function(e){
			document.getElementById('fptest2').checked=false;
			document.getElementById('fptest3').checked=false;
			document.getElementById('fptest4').checked=false;
         fnsearch();   
			   
        })
        $('#fptest2').click(function(e){
			document.getElementById('fptest1').checked=false;
			document.getElementById('fptest3').checked=false;
			document.getElementById('fptest4').checked=false;
			fnsearch();		
        })

        $('#fptest3').click(function(e){
			document.getElementById('fptest2').checked=false;
			document.getElementById('fptest1').checked=false;
			document.getElementById('fptest4').checked=false;
         fnsearch();
			   
        })

        $('#fptest4').click(function(e){
			document.getElementById('fptest2').checked=false;
			document.getElementById('fptest3').checked=false;
			document.getElementById('fptest1').checked=false;
         fnsearch();  
        })

        $('#tetest1,#tetest2,#tetest3,#tetest4,#tetest5,#tetest6,#tetest7,#dstest1,#dstest2,#dstest3').click(function(e){
			
			fnsearch();
        })


        $('#tptest1').click(function(e){
         document.getElementById('tptest2').checked=false;
         fnsearch();  
        })

        $('#tptest2').click(function(e){
         document.getElementById('tptest1').checked=false;
         fnsearch();
        })

        
    })
</script>
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