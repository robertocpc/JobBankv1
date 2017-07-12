$(document).ready(function(){
		$('#keyword').click(function(){
            var val_height="180px"
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
            var val_height="170px"
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
            var val_height="170px"
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
            var val_height="170px"
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
        $('#idioma').click(function(){
            var val_height="170px";
            var name=document.getElementById('idiomas');
            if(document.getElementById('idiomas').style.height==val_height){
                document.getElementById('idiomas').style.height = "0px";
				document.getElementById('arrowdown4').style.display='inline';
				document.getElementById('arrowup4').style.display='none';
			}else{
                document.getElementById('idiomas').style.height = val_height;
				document.getElementById('arrowdown4').style.display='none';
				document.getElementById('arrowup4').style.display='inline';
			}
        })
		
		$('#search').keypress(function(e){
            if(e.which == 13) {
				//alert("bienn"); 
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
				else if(document.getElementById('idtest2').checked==true)
					var idd=document.getElementById('idtest2').value;
				else if(document.getElementById('idtest3').checked==true)
					var idd=document.getElementById('idtest3').value;
				else
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
				
				//window.location = './fetch-s.php?search=' + name;
			}     
        })

		$('#ddnombre').keypress(function(e){
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
				
				if(document.getElementById('idtest1').checked==true)
					var idd=document.getElementById('idtest1').value;
				else if(document.getElementById('idtest2').checked==true)
					var idd=document.getElementById('idtest2').value;
				else if(document.getElementById('idtest3').checked==true)
					var idd=document.getElementById('idtest3').value;
				else
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
        })
		$('#ddtitulo').keypress(function(e){
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
				
				if(document.getElementById('idtest1').checked==true)
					var idd=document.getElementById('idtest1').value;
				else if(document.getElementById('idtest2').checked==true)
					var idd=document.getElementById('idtest2').value;
				else if(document.getElementById('idtest3').checked==true)
					var idd=document.getElementById('idtest3').value;
				else
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
        })
		$('#ddcompania').keypress(function(e){
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
				
				if(document.getElementById('idtest1').checked==true)
					var idd=document.getElementById('idtest1').value;
				else if(document.getElementById('idtest2').checked==true)
					var idd=document.getElementById('idtest2').value;
				else if(document.getElementById('idtest3').checked==true)
					var idd=document.getElementById('idtest3').value;
				else
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
        })
		$('#dduni').keypress(function(e){
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
				
				if(document.getElementById('idtest1').checked==true)
					var idd=document.getElementById('idtest1').value;
				else if(document.getElementById('idtest2').checked==true)
					var idd=document.getElementById('idtest2').value;
				else if(document.getElementById('idtest3').checked==true)
					var idd=document.getElementById('idtest3').value;
				else
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
        })

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
		/*EMPRESAS ACTUALMENTE*/
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

		/*EMPRESAS PASADA*/
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

		/*IDIOMA*/
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
        })
		
		/*$('#search').keyup(function(){
			var txt=$('#search').val();
			document.getElementById("cuadro-resultado").style.visibility="";
			document.getElementById("select-op").style.visibility="";


			$('#title').html('<h3>Resultados de la búsqueda</h3>');
				
			
		})*/
    })