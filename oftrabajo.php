<?php echo "<div class='buscador shadow'>
            <div class='container'>
                    <input  name='search' id='search' type='text'
                     placeholder='Busqueda ofertas laborales'
                     value='".$searchq."'>
                     <input name='searchciu' id='autocomplete' type='text' class='searchciu'
                     placeholder='Ciudad, Provincia o Pais' onFocus='geolocate()' 
                     value='".$searchciuq."'>


                    <input  type='submit' class='buscar-submit' id='buscar' value='Buscar'>
                    <br><label><span style='color:white;'>Ejemplo: Ingeniero de Preventa </span></label>
                
            </div>
        </div>
        <div class='container shadow'>
            <div id='contegre'>
                <div class='show-right'>
                    <label style='font-size:14px;' id='cab-filtro'>Filtro por:</label><br><Br>
                    <div class='dropdown'>
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
        		
		$('#search').keypress(function(e){
            if(e.which == 13) {
				//alert("bienn"); 
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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;   
				
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
				
				//window.location = './fetch-s.php?search=' + name;
			}     
        })

        $('#autocomplete').keypress(function(e){
            if(e.which == 13) {
				//alert("bienn"); 
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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
				
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
				
				//window.location = './fetch-s.php?search=' + name;
			}     
        })

		$('#ddcargo').keypress(function(e){
            if(e.which == 13) {
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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
				
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
        })
		$('#ddempresa').keypress(function(e){
            if(e.which == 13) {
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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
        })
		$('#ddidioma').keypress(function(e){
            if(e.which == 13) {
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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			}     
        })
		$('#fptest1').click(function(e){
                document.getElementById('fptest2').checked=false;
                document.getElementById('fptest3').checked=false;
                document.getElementById('fptest4').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })
        $('#fptest2').click(function(e){
                document.getElementById('fptest1').checked=false;
                document.getElementById('fptest3').checked=false;
                document.getElementById('fptest4').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })

        $('#fptest3').click(function(e){
                document.getElementById('fptest2').checked=false;
                document.getElementById('fptest1').checked=false;
                document.getElementById('fptest4').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })

        $('#fptest4').click(function(e){
                document.getElementById('fptest2').checked=false;
                document.getElementById('fptest3').checked=false;
                document.getElementById('fptest1').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })

        $('#tetest1').click(function(e){
            document.getElementById('tetest2').checked=false;
            document.getElementById('tetest3').checked=false;
            document.getElementById('tetest4').checked=false;
            document.getElementById('tetest5').checked=false;
            document.getElementById('tetest6').checked=false;
            document.getElementById('tetest7').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })

        $('#tetest2').click(function(e){
            document.getElementById('tetest1').checked=false;
            document.getElementById('tetest3').checked=false;
            document.getElementById('tetest4').checked=false;
            document.getElementById('tetest5').checked=false;
            document.getElementById('tetest6').checked=false;
            document.getElementById('tetest7').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })

        $('#tetest3').click(function(e){
            document.getElementById('tetest2').checked=false;
            document.getElementById('tetest1').checked=false;
            document.getElementById('tetest4').checked=false;
            document.getElementById('tetest5').checked=false;
            document.getElementById('tetest6').checked=false;
            document.getElementById('tetest7').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })

        $('#tetest4').click(function(e){
            document.getElementById('tetest2').checked=false;
            document.getElementById('tetest3').checked=false;
            document.getElementById('tetest1').checked=false;
            document.getElementById('tetest5').checked=false;
            document.getElementById('tetest6').checked=false;
            document.getElementById('tetest7').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })

        $('#tetest5').click(function(e){
            document.getElementById('tetest2').checked=false;
            document.getElementById('tetest3').checked=false;
            document.getElementById('tetest4').checked=false;
            document.getElementById('tetest1').checked=false;
            document.getElementById('tetest6').checked=false;
            document.getElementById('tetest7').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				}) 
			   
        })

        $('#tetest6').click(function(e){
            document.getElementById('tetest2').checked=false;
            document.getElementById('tetest3').checked=false;
            document.getElementById('tetest4').checked=false;
            document.getElementById('tetest5').checked=false;
            document.getElementById('tetest1').checked=false;
            document.getElementById('tetest7').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })

        $('#tetest7').click(function(e){
            document.getElementById('tetest2').checked=false;
            document.getElementById('tetest3').checked=false;
            document.getElementById('tetest4').checked=false;
            document.getElementById('tetest5').checked=false;
            document.getElementById('tetest6').checked=false;
            document.getElementById('tetest1').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })

        $('#tptest1').click(function(e){
            document.getElementById('tptest2').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				}) 
			   
        })

        $('#tptest2').click(function(e){
            document.getElementById('tptest1').checked=false;
            

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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				}) 
			   
        })

        $('#dstest1').click(function(e){
            
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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })

        $('#dstest2').click(function(e){
            
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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })

        $('#dstest3').click(function(e){
            
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

				if(document.getElementById('tetest1').checked==true)
					var tipem=document.getElementById('tetest1').value;
				else if(document.getElementById('tetest2').checked==true)
					var tipem=document.getElementById('tetest2').value;
				else if(document.getElementById('tetest3').checked==true)
					var tipem=document.getElementById('tetest3').value;
				else if(document.getElementById('tetest4').checked==true)
					var tipem=document.getElementById('tetest4').value;
                else if(document.getElementById('tetest5').checked==true)
					var tipem=document.getElementById('tetest5').value;
                else if(document.getElementById('tetest6').checked==true)
					var tipem=document.getElementById('tetest6').value;
                else if(document.getElementById('tetest7').checked==true)
					var tipem=document.getElementById('tetest7').value;
               
				
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
				data: { 'search':txt,'searchc':txtc,'cargo':txt1,'empresa':txt2,
                        'idioma':txt3,'fechali':fecha,'tipem':tipem,
                        'tippo':tippo,
                        'dis':dis,'disv':disv,'disr':disr},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			   
        })
        /*
		//Ubicacion 
		$('#ubtest1').click(function(e){
			document.getElementById('ubtest2').checked=false;
			document.getElementById('ubtest3').checked=false;
			document.getElementById('autocomplete').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('emtest1').checked==true)
				var emp=document.getElementById('emtest1').value;
			else if(document.getElementById('emtest2').checked==true)
				var emp=document.getElementById('emtest2').value;
			else if(document.getElementById('emtest3').checked==true)
				var emp=document.getElementById('emtest3').value;
			else
				var emp=document.getElementById('inputempac').value;
			
			if(document.getElementById('eptest1').checked==true)
				var epp=document.getElementById('eptest1').value;
			else if(document.getElementById('eptest2').checked==true)
				var epp=document.getElementById('eptest2').value;
			else if(document.getElementById('eptest3').checked==true)
				var epp=document.getElementById('eptest3').value;
			else
				var epp=document.getElementById('inputemppas').value;
			
			if(document.getElementById('idtest1').checked==true)
				var idd=document.getElementById('idtest1').value;
			else if(document.getElementById('idtest2').checked==true)
				var idd=document.getElementById('idtest2').value;
			else if(document.getElementById('idtest3').checked==true)
				var idd=document.getElementById('idtest3').value;
			else
				var idd=document.getElementById('inputid').value;

			if(document.getElementById('ubtest1').checked==true)
				var lugar=document.getElementById('ubtest1').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})    
        })
		$('#ubtest2').click(function(e){
			document.getElementById('ubtest1').checked=false;
			document.getElementById('ubtest3').checked=false;
			document.getElementById('autocomplete').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('emtest1').checked==true)
				var emp=document.getElementById('emtest1').value;
			else if(document.getElementById('emtest2').checked==true)
				var emp=document.getElementById('emtest2').value;
			else if(document.getElementById('emtest3').checked==true)
				var emp=document.getElementById('emtest3').value;
			else
				var emp=document.getElementById('inputempac').value;
			
			if(document.getElementById('eptest1').checked==true)
				var epp=document.getElementById('eptest1').value;
			else if(document.getElementById('eptest2').checked==true)
				var epp=document.getElementById('eptest2').value;
			else if(document.getElementById('eptest3').checked==true)
				var epp=document.getElementById('eptest3').value;
			else
				var epp=document.getElementById('inputemppas').value;
			
			if(document.getElementById('idtest1').checked==true)
				var idd=document.getElementById('idtest1').value;
			else if(document.getElementById('idtest2').checked==true)
				var idd=document.getElementById('idtest2').value;
			else if(document.getElementById('idtest3').checked==true)
				var idd=document.getElementById('idtest3').value;
			else
				var idd=document.getElementById('inputid').value;

			if(document.getElementById('ubtest2').checked==true)
				var lugar=document.getElementById('ubtest2').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})      
        })
		$('#ubtest3').click(function(e){
			document.getElementById('ubtest2').checked=false;
			document.getElementById('ubtest1').checked=false;
			document.getElementById('autocomplete').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('emtest1').checked==true)
				var emp=document.getElementById('emtest1').value;
			else if(document.getElementById('emtest2').checked==true)
				var emp=document.getElementById('emtest2').value;
			else if(document.getElementById('emtest3').checked==true)
				var emp=document.getElementById('emtest3').value;
			else
				var emp=document.getElementById('inputempac').value;
			
			if(document.getElementById('eptest1').checked==true)
				var epp=document.getElementById('eptest1').value;
			else if(document.getElementById('eptest2').checked==true)
				var epp=document.getElementById('eptest2').value;
			else if(document.getElementById('eptest3').checked==true)
				var epp=document.getElementById('eptest3').value;
			else
				var epp=document.getElementById('inputemppas').value;
			
			if(document.getElementById('idtest1').checked==true)
				var idd=document.getElementById('idtest1').value;
			else if(document.getElementById('idtest2').checked==true)
				var idd=document.getElementById('idtest2').value;
			else if(document.getElementById('idtest3').checked==true)
				var idd=document.getElementById('idtest3').value;
			else
				var idd=document.getElementById('inputid').value;

			if(document.getElementById('ubtest3').checked==true)
				var lugar=document.getElementById('ubtest3').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})      
        })
		$('#autocomplete').keypress(function(e){
			document.getElementById('ubtest2').checked=false;
			document.getElementById('ubtest3').checked=false;
			document.getElementById('ubtest1').checked=false;
			if(e.which == 13) {
				var txt=document.getElementById("search").value;
				var txt1=document.getElementById("ddnombre").value;
				var txt2=document.getElementById("ddtitulo").value;
				var txt3=document.getElementById("ddcompania").value;
				var txt4=document.getElementById("dduni").value;

				if(document.getElementById('emtest1').checked==true)
					var emp=document.getElementById('emtest1').value;
				else if(document.getElementById('emtest2').checked==true)
					var emp=document.getElementById('emtest2').value;
				else if(document.getElementById('emtest3').checked==true)
					var emp=document.getElementById('emtest3').value;
				else
					var emp=document.getElementById('inputempac').value;
				
				if(document.getElementById('eptest1').checked==true)
					var epp=document.getElementById('eptest1').value;
				else if(document.getElementById('eptest2').checked==true)
					var epp=document.getElementById('eptest2').value;
				else if(document.getElementById('eptest3').checked==true)
					var epp=document.getElementById('eptest3').value;
				else
					var epp=document.getElementById('inputemppas').value;
				
				if(document.getElementById('idtest1').checked==true)
					var idd=document.getElementById('idtest1').value;
				else if(document.getElementById('idtest2').checked==true)
					var idd=document.getElementById('idtest2').value;
				else if(document.getElementById('idtest3').checked==true)
					var idd=document.getElementById('idtest3').value;
				else
					var idd=document.getElementById('inputid').value;

				var lugar=document.getElementById('autocomplete').value;
				$.ajax({
				type: 'POST',
				url: './resultado-egresado.php',
				data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
						'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			}       
        })
		/*EMPRESAS ACTUALMENTE*//*
		$('#emtest1').click(function(e){
			document.getElementById('emtest2').checked=false;
			document.getElementById('emtest3').checked=false;
			document.getElementById('inputempac').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('ubtest1').checked==true)
				var lugar=document.getElementById('ubtest1').value;
			else if(document.getElementById('ubtest2').checked==true)
				var lugar=document.getElementById('ubtest2').value;
			else if(document.getElementById('ubtest3').checked==true)
				var lugar=document.getElementById('ubtest3').value;
			else
				var lugar=document.getElementById('autocomplete').value;
			
			if(document.getElementById('eptest1').checked==true)
				var epp=document.getElementById('eptest1').value;
			else if(document.getElementById('eptest2').checked==true)
				var epp=document.getElementById('eptest2').value;
			else if(document.getElementById('eptest3').checked==true)
				var epp=document.getElementById('eptest3').value;
			else
				var epp=document.getElementById('inputemppas').value;
			
			if(document.getElementById('idtest1').checked==true)
				var idd=document.getElementById('idtest1').value;
			else if(document.getElementById('idtest2').checked==true)
				var idd=document.getElementById('idtest2').value;
			else if(document.getElementById('idtest3').checked==true)
				var idd=document.getElementById('idtest3').value;
			else
				var idd=document.getElementById('inputid').value;

			if(document.getElementById('emtest1').checked==true)
				var emp=document.getElementById('emtest1').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})     
        })
		$('#emtest2').click(function(e){
			document.getElementById('emtest1').checked=false;
			document.getElementById('emtest3').checked=false;
			document.getElementById('inputempac').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('ubtest1').checked==true)
				var lugar=document.getElementById('ubtest1').value;
			else if(document.getElementById('ubtest2').checked==true)
				var lugar=document.getElementById('ubtest2').value;
			else if(document.getElementById('ubtest3').checked==true)
				var lugar=document.getElementById('ubtest3').value;
			else
				var lugar=document.getElementById('autocomplete').value;
			
			if(document.getElementById('eptest1').checked==true)
				var epp=document.getElementById('eptest1').value;
			else if(document.getElementById('eptest2').checked==true)
				var epp=document.getElementById('eptest2').value;
			else if(document.getElementById('eptest3').checked==true)
				var epp=document.getElementById('eptest3').value;
			else
				var epp=document.getElementById('inputemppas').value;
			
			if(document.getElementById('idtest1').checked==true)
				var idd=document.getElementById('idtest1').value;
			else if(document.getElementById('idtest2').checked==true)
				var idd=document.getElementById('idtest2').value;
			else if(document.getElementById('idtest3').checked==true)
				var idd=document.getElementById('idtest3').value;
			else
				var idd=document.getElementById('inputid').value;

			if(document.getElementById('emtest2').checked==true)
				var emp=document.getElementById('emtest2').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})       
        })
		$('#emtest3').click(function(e){
			document.getElementById('emtest2').checked=false;
			document.getElementById('emtest1').checked=false;
			document.getElementById('inputempac').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('ubtest1').checked==true)
				var lugar=document.getElementById('ubtest1').value;
			else if(document.getElementById('ubtest2').checked==true)
				var lugar=document.getElementById('ubtest2').value;
			else if(document.getElementById('ubtest3').checked==true)
				var lugar=document.getElementById('ubtest3').value;
			else
				var lugar=document.getElementById('autocomplete').value;
			
			if(document.getElementById('eptest1').checked==true)
				var epp=document.getElementById('eptest1').value;
			else if(document.getElementById('eptest2').checked==true)
				var epp=document.getElementById('eptest2').value;
			else if(document.getElementById('eptest3').checked==true)
				var epp=document.getElementById('eptest3').value;
			else
				var epp=document.getElementById('inputemppas').value;
			
			if(document.getElementById('idtest1').checked==true)
				var idd=document.getElementById('idtest1').value;
			else if(document.getElementById('idtest2').checked==true)
				var idd=document.getElementById('idtest2').value;
			else if(document.getElementById('idtest3').checked==true)
				var idd=document.getElementById('idtest3').value;
			else
				var idd=document.getElementById('inputid').value;
			

			if(document.getElementById('emtest3').checked==true)
				var emp=document.getElementById('emtest3').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})       
        })
		$('#inputempac').keypress(function(e){
			document.getElementById('emtest2').checked=false;
			document.getElementById('emtest3').checked=false;
			document.getElementById('emtest1').checked=false;
			if(e.which == 13) {
				var txt=document.getElementById("search").value;
				var txt1=document.getElementById("ddnombre").value;
				var txt2=document.getElementById("ddtitulo").value;
				var txt3=document.getElementById("ddcompania").value;
				var txt4=document.getElementById("dduni").value;

				if(document.getElementById('ubtest1').checked==true)
					var lugar=document.getElementById('ubtest1').value;
				else if(document.getElementById('ubtest2').checked==true)
					var lugar=document.getElementById('ubtest2').value;
				else if(document.getElementById('ubtest3').checked==true)
					var lugar=document.getElementById('ubtest3').value;
				else
					var lugar=document.getElementById('autocomplete').value;
				
				if(document.getElementById('eptest1').checked==true)
					var epp=document.getElementById('eptest1').value;
				else if(document.getElementById('eptest2').checked==true)
					var epp=document.getElementById('eptest2').value;
				else if(document.getElementById('eptest3').checked==true)
					var epp=document.getElementById('eptest3').value;
				else
					var epp=document.getElementById('inputemppas').value;
				
				if(document.getElementById('idtest1').checked==true)
					var idd=document.getElementById('idtest1').value;
				else if(document.getElementById('idtest2').checked==true)
					var idd=document.getElementById('idtest2').value;
				else if(document.getElementById('idtest3').checked==true)
					var idd=document.getElementById('idtest3').value;
				else
					var idd=document.getElementById('inputid').value;
			

				var emp=document.getElementById('inputempac').value;
				$.ajax({
				type: 'POST',
				url: './resultado-egresado.php',
				data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
						'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
				success: function(resp){
					$('#result').html(resp);
				}
				}) 
			}       
        })

		/*EMPRESAS PASADA*//*
		$('#eptest1').click(function(e){
			document.getElementById('eptest2').checked=false;
			document.getElementById('eptest3').checked=false;
			document.getElementById('inputemppas').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('ubtest1').checked==true)
				var lugar=document.getElementById('ubtest1').value;
			else if(document.getElementById('ubtest2').checked==true)
				var lugar=document.getElementById('ubtest2').value;
			else if(document.getElementById('ubtest3').checked==true)
				var lugar=document.getElementById('ubtest3').value;
			else
				var lugar=document.getElementById('autocomplete').value;
			
			if(document.getElementById('emtest1').checked==true)
				var emp=document.getElementById('emtest1').value;
			else if(document.getElementById('emtest2').checked==true)
				var emp=document.getElementById('emtest2').value;
			else if(document.getElementById('emtest3').checked==true)
				var emp=document.getElementById('emtest3').value;
			else
				var emp=document.getElementById('inputempac').value;
			
			if(document.getElementById('idtest1').checked==true)
				var idd=document.getElementById('idtest1').value;
			else if(document.getElementById('idtest2').checked==true)
				var idd=document.getElementById('idtest2').value;
			else if(document.getElementById('idtest3').checked==true)
				var idd=document.getElementById('idtest3').value;
			else
				var idd=document.getElementById('inputid').value;

			if(document.getElementById('eptest1').checked==true)
				var epp=document.getElementById('eptest1').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})    
        })
		$('#eptest2').click(function(e){
			document.getElementById('eptest1').checked=false;
			document.getElementById('eptest3').checked=false;
			document.getElementById('inputemppas').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('ubtest1').checked==true)
				var lugar=document.getElementById('ubtest1').value;
			else if(document.getElementById('ubtest2').checked==true)
				var lugar=document.getElementById('ubtest2').value;
			else if(document.getElementById('ubtest3').checked==true)
				var lugar=document.getElementById('ubtest3').value;
			else
				var lugar=document.getElementById('autocomplete').value;
			
			if(document.getElementById('emtest1').checked==true)
				var emp=document.getElementById('emtest1').value;
			else if(document.getElementById('emtest2').checked==true)
				var emp=document.getElementById('emtest2').value;
			else if(document.getElementById('emtest3').checked==true)
				var emp=document.getElementById('emtest3').value;
			else
				var emp=document.getElementById('inputempac').value;
			
			if(document.getElementById('idtest1').checked==true)
				var idd=document.getElementById('idtest1').value;
			else if(document.getElementById('idtest2').checked==true)
				var idd=document.getElementById('idtest2').value;
			else if(document.getElementById('idtest3').checked==true)
				var idd=document.getElementById('idtest3').value;
			else
				var idd=document.getElementById('inputid').value;

			if(document.getElementById('eptest2').checked==true)
				var epp=document.getElementById('eptest2').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})      
        })
		$('#eptest3').click(function(e){
			document.getElementById('eptest2').checked=false;
			document.getElementById('eptest1').checked=false;
			document.getElementById('inputemppas').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('ubtest1').checked==true)
				var lugar=document.getElementById('ubtest1').value;
			else if(document.getElementById('ubtest2').checked==true)
				var lugar=document.getElementById('ubtest3').value;
			else if(document.getElementById('ubtest3').checked==true)
				var lugar=document.getElementById('ubtest3').value;
			else
				var lugar=document.getElementById('autocomplete').value;
			
			if(document.getElementById('emtest1').checked==true)
				var emp=document.getElementById('emtest1').value;
			else if(document.getElementById('emtest2').checked==true)
				var emp=document.getElementById('emtest2').value;
			else if(document.getElementById('emtest3').checked==true)
				var emp=document.getElementById('emtest3').value;
			else
				var emp=document.getElementById('inputempac').value;
			

			if(document.getElementById('idtest1').checked==true)
				var idd=document.getElementById('idtest1').value;
			else if(document.getElementById('idtest2').checked==true)
				var idd=document.getElementById('idtest2').value;
			else if(document.getElementById('idtest3').checked==true)
				var idd=document.getElementById('idtest3').value;
			else
				var idd=document.getElementById('inputid').value;

			if(document.getElementById('eptest3').checked==true)
				var epp=document.getElementById('eptest3').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})      
        })
		$('#inputemppas').keypress(function(e){
			document.getElementById('eptest2').checked=false;
			document.getElementById('eptest3').checked=false;
			document.getElementById('eptest1').checked=false;
			if(e.which == 13) {
				var txt=document.getElementById("search").value;
				var txt1=document.getElementById("ddnombre").value;
				var txt2=document.getElementById("ddtitulo").value;
				var txt3=document.getElementById("ddcompania").value;
				var txt4=document.getElementById("dduni").value;

				if(document.getElementById('ubtest1').checked==true)
					var lugar=document.getElementById('ubtest1').value;
				else if(document.getElementById('ubtest2').checked==true)
					var lugar=document.getElementById('ubtest2').value;
				else if(document.getElementById('ubtest3').checked==true)
					var lugar=document.getElementById('ubtest3').value;
				else
					var lugar=document.getElementById('autocomplete').value;
					
				if(document.getElementById('emtest1').checked==true)
					var emp=document.getElementById('emtest1').value;
				else if(document.getElementById('emtest2').checked==true)
					var emp=document.getElementById('emtest2').value;
				else if(document.getElementById('emtest3').checked==true)
					var emp=document.getElementById('emtest3').value;
				else
					var emp=document.getElementById('inputempac').value;
				
				if(document.getElementById('idtest1').checked==true)
					var idd=document.getElementById('idtest1').value;
				else if(document.getElementById('idtest2').checked==true)
					var idd=document.getElementById('idtest2').value;
				else if(document.getElementById('idtest3').checked==true)
					var idd=document.getElementById('idtest3').value;
				else
					var idd=document.getElementById('inputid').value;

				var epp=document.getElementById('inputemppas').value;
				$.ajax({
				type: 'POST',
				url: './resultado-egresado.php',
				data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
						'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			}       
        })

		/*IDIOMA*//*
		$('#idtest1').click(function(e){
			
			document.getElementById('idtest2').checked=false;
			document.getElementById('idtest3').checked=false;
			document.getElementById('inputid').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('ubtest1').checked==true)
				var lugar=document.getElementById('ubtest1').value;
			else if(document.getElementById('ubtest2').checked==true)
				var lugar=document.getElementById('ubtest2').value;
			else if(document.getElementById('ubtest3').checked==true)
				var lugar=document.getElementById('ubtest3').value;
			else
				var lugar=document.getElementById('autocomplete').value;
			
			if(document.getElementById('emtest1').checked==true)
				var emp=document.getElementById('emtest1').value;
			else if(document.getElementById('emtest2').checked==true)
				var emp=document.getElementById('emtest2').value;
			else if(document.getElementById('emtest3').checked==true)
				var emp=document.getElementById('emtest3').value;
			else
				var emp=document.getElementById('inputempac').value;

			if(document.getElementById('eptest1').checked==true)
				var epp=document.getElementById('eptest1').value;
			else if(document.getElementById('eptest2').checked==true)
				var epp=document.getElementById('eptest2').value;
			else if(document.getElementById('eptest3').checked==true)
				var epp=document.getElementById('eptest3').value;
			else
				var epp=document.getElementById('inputemppas').value;

			if(document.getElementById('idtest1').checked==true)
				var idd=document.getElementById('idtest1').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})    
        })
		$('#idtest2').click(function(e){
			
			document.getElementById('idtest1').checked=false;
			document.getElementById('idtest3').checked=false;
			document.getElementById('inputid').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('ubtest1').checked==true)
				var lugar=document.getElementById('ubtest1').value;
			else if(document.getElementById('ubtest2').checked==true)
				var lugar=document.getElementById('ubtest2').value;
			else if(document.getElementById('ubtest3').checked==true)
				var lugar=document.getElementById('ubtest3').value;
			else
				var lugar=document.getElementById('autocomplete').value;
			
			if(document.getElementById('emtest1').checked==true)
				var emp=document.getElementById('emtest1').value;
			else if(document.getElementById('emtest2').checked==true)
				var emp=document.getElementById('emtest2').value;
			else if(document.getElementById('emtest3').checked==true)
				var emp=document.getElementById('emtest3').value;
			else
				var emp=document.getElementById('inputempac').value;
			
			if(document.getElementById('eptest1').checked==true)
				var epp=document.getElementById('eptest1').value;
			else if(document.getElementById('eptest2').checked==true)
				var epp=document.getElementById('eptest2').value;
			else if(document.getElementById('eptest3').checked==true)
				var epp=document.getElementById('eptest3').value;
			else
				var epp=document.getElementById('inputemppas').value;

			if(document.getElementById('idtest2').checked==true)
				var idd=document.getElementById('idtest2').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})      
        })
		$('#idtest3').click(function(e){
			document.getElementById('idtest2').checked=false;
			document.getElementById('idtest1').checked=false;
			document.getElementById('inputid').value="";

			var txt=document.getElementById("search").value;
			var txt1=document.getElementById("ddnombre").value;
			var txt2=document.getElementById("ddtitulo").value;
			var txt3=document.getElementById("ddcompania").value;
			var txt4=document.getElementById("dduni").value;

			if(document.getElementById('ubtest1').checked==true)
				var lugar=document.getElementById('ubtest1').value;
			else if(document.getElementById('ubtest2').checked==true)
				var lugar=document.getElementById('ubtest2').value;
			else if(document.getElementById('ubtest3').checked==true)
				var lugar=document.getElementById('ubtest3').value;
			else
				var lugar=document.getElementById('autocomplete').value;
			
			if(document.getElementById('emtest1').checked==true)
				var emp=document.getElementById('emtest1').value;
			else if(document.getElementById('emtest2').checked==true)
				var emp=document.getElementById('emtest2').value;
			else if(document.getElementById('emtest3').checked==true)
				var emp=document.getElementById('emtest3').value;
			else
				var emp=document.getElementById('inputempac').value;
			
			if(document.getElementById('eptest1').checked==true)
				var epp=document.getElementById('eptest1').value;
			else if(document.getElementById('eptest2').checked==true)
				var epp=document.getElementById('eptest2').value;
			else if(document.getElementById('eptest3').checked==true)
				var epp=document.getElementById('eptest3').value;
			else
				var epp=document.getElementById('inputemppas').value;

			if(document.getElementById('idtest3').checked==true)
				var idd=document.getElementById('idtest3').value;
			$.ajax({
			type: 'POST',
			url: './resultado-egresado.php',
			data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
					'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
			success: function(resp){
				$('#result').html(resp);
			}
			})      
        })
		$('#inputid').keypress(function(e){
			document.getElementById('idtest2').checked=false;
			document.getElementById('idtest3').checked=false;
			document.getElementById('idtest1').checked=false;
			if(e.which == 13) {
				
				var txt=document.getElementById("search").value;
				var txt1=document.getElementById("ddnombre").value;
				var txt2=document.getElementById("ddtitulo").value;
				var txt3=document.getElementById("ddcompania").value;
				var txt4=document.getElementById("dduni").value;

				if(document.getElementById('ubtest1').checked==true)
					var lugar=document.getElementById('ubtest1').value;
				else if(document.getElementById('ubtest2').checked==true)
					var lugar=document.getElementById('ubtest2').value;
				else if(document.getElementById('ubtest3').checked==true)
					var lugar=document.getElementById('ubtest3').value;
				else
					var lugar=document.getElementById('autocomplete').value;
					
				if(document.getElementById('emtest1').checked==true)
					var emp=document.getElementById('emtest1').value;
				else if(document.getElementById('emtest2').checked==true)
					var emp=document.getElementById('emtest2').value;
				else if(document.getElementById('emtest3').checked==true)
					var emp=document.getElementById('emtest3').value;
				else
					var emp=document.getElementById('inputempac').value;
				
				if(document.getElementById('eptest1').checked==true)
					var epp=document.getElementById('eptest1').value;
				else if(document.getElementById('eptest2').checked==true)
					var epp=document.getElementById('eptest2').value;
				else if(document.getElementById('eptest3').checked==true)
					var epp=document.getElementById('eptest3').value;
				else
					var epp=document.getElementById('inputemppas').value;

				var idd=document.getElementById('inputid').value;
				$.ajax({
				type: 'POST',
				url: './resultado-egresado.php',
				data: { 'search':txt,'nombre':txt1,'titulo':txt2,'compania':txt3,
						'uni':txt4,'lugar':lugar,'empresa':emp,'empresap':epp,'idioma':idd},
				success: function(resp){
					$('#result').html(resp);
				}
				})
			}       
        })*/
		
		/*$('#search').keyup(function(){
			var txt=$('#search').val();
			document.getElementById("cuadro-resultado").style.visibility="";
			document.getElementById("select-op").style.visibility="";


			$('#title').html('<h3>Resultados de la búsqueda</h3>');
				
			
		})*/
    })
</script>
 <script src="./googlemap.js">    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>