<?php
   include './db.php';
	$n=$mysqli->query("SELECT MAX(cod_oftrabajo)+1 as col_max FROM tbl_oftrabajo");
	$user = $n->fetch_assoc();
   echo "
      <div class='container' > 
         <div class='add-oftrabajo shadow' style='padding:20px;margin-top:20px;'>
                  <span class='spans'>Registro de Oferta Laboral : ".$user['col_max']."</span>
                  <div class='line' style='width:100%;'><hr></div>
            <form id='oftrabajo' method='POST' action='./account/save-oftrabajo.php'>
               <table class='tbl-oftrabajo' style='font-size:12px;width:100%;border-collapse: collapse;'>
                  <tr>
                     <td style='width:35%;padding-top:15px;text-align:left;'>
                        <span style='margin-top:20px;' class='spans'>Titulo: </span><br>
                        <span style='color: gray'>* Nombre del cargo a requerir</span>
                     </td>
                     <td style='width:65%;'>
                        <span><input name='ofnombre' class='btn-st1' id='ofnombre' value='' placeholder='Ej: Ingeniero de Preventa' required></span>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Empresa: </span><br>
                        <span style='color: gray'>* Nombre de la entidad, institución o persona que solicita profesionales</span>
                     </td>
                     <td style='width:65%;'>
                        <input name='ofempresa' class='btn-st1' id='ofempresa' value='' placeholder='UNJBG' required>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Ubicación(región): </span>
                        <br><span style='color: gray'>* Ubicación de la entidad o institución</span>
                     </td>
                     <td style='width:65%;'>
                        <input name='ofubicacion' class='btn-st1' id='ofubicacion' value='' placeholder='Ej: Tacna, Perú' required>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>E-mail: </span>
                     </td>
                     <td style='width:65%;'>
                        <input name='ofemail'  class='btn-st1' id='ofemailcon' value='' placeholder=''>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Teléfono: </span>
                        <br><span style='color: gray'>* Solo digitos numéricos</span>
                     </td>
                     <td style='width:65%;'>
                        <input name='oftelf' class='btn-st1' id='oftelfcon' value='' placeholder='' required>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Tipo de Empleo: </span>
                     </td>
                     <td style='width:65%;'>
                        <select name='tipem' style='font-size:12px;' class='slt-sty1'>
                           <option value='0'>Tiempo Completo</option>
                           <option value='1'>Medio Tiempo</option>
                           <option value='2'>Temporal</option>
                           <option value='3'>Por Contrato</option>
                           <option value='4'>Becas/Prácticas</option>
                           <option value='5'>Comisión</option>
                           <option value='6' selected>Indefinido</option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Tipo de postulación: </span>
                     </td>
                     <td style='width:65%;'>
                        <select name='tippos' style='font-size:12px;' class='slt-sty1' id='tippos' required>
                           <option value='' disabled selected>Selecione...</option>
                           <option value='0'>E-mail</option>
                           <option value='1'>Presencial</option>
                        </select><br><br><input name='inputpos' class='btn-st1' id='inputpost' disabled style='display:none;'>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>URL: </span>
                        <br><span style='color: gray'>* Dirección de la página web</span>
                     </td>
                     <td style='width:65%;'>
                        <input name='ofurl' class='btn-st1' id='ofurl' value='' placeholder=''>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Fecha Limite Postulación: </span>
                     </td>
                     <td style='width:65%;'>
                        <input id='box' name='fechalim' type='text'  class='btn-st1 datepicker'  required>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Cantidad de Puestos: </span>
                     </td>
                     <td style='width:65%;'>
                        <input name='ofcan' class='btn-st1' id='ofcan' value='' placeholder=''>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Idiomas requeridos: </span> 
                     </td>
                     <td style='width:65%;'>
                        <input name='ofidioma' class='btn-st1' id='ofidioma' value='' placeholder='Ej: Inglés, Francés ...'>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Tiempo mínimo laborando: </span>
                     </td>
                     <td style='width:65%;'>
                        <input name='oftimin' class='btn-st1' id='oftimin' value='' placeholder='Ej: 2 años'>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Licencia de Conducir: </span>
                     </td>
                     <td style='width:65%;'>
                        <select name='oflic' style='font-size:12px;' class='slt-sty1'>
                           <option value='' disabled selected>Opcional...</option>
                           <option value='0'>A-I</option>
                           <option value='1'>A-II-a</option>
                           <option value='2'>A-II-b</option>
                           <option value='3'>A-III-a</option>
                           <option value='4'>A-III-v</option>
                           <option value='5'>A-III-c</option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Disponible a viajar: </span>
                     </td>
                     <td style='width:65%;'>
                        <select name='ofdisv' style='font-size:12px;' class='slt-sty1'>
                           <option value='0' selected>No</option>
                           <option value='1'>Si</option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;'>
                        <span class='spans'>Disponible a cambio residencia: </span>
                     </td>
                     <td style='width:65%;'>
                        <select name='ofdisr' style='font-size:12px;' class='slt-sty1'>
                           <option value='0' selected>No</option>
                           <option value='1'>Si</option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td style='width:35%;vertical-align:top;padding-top:15px;'>
                        <span class='spans'>Descripción: </span>
                     </td>
                     <td style='width:65%;'>
                        <textarea name='ofdescrip' id='ofdescrip' style='width:70%;height: 100px;border-radius:4px;border: 2px solid #ccc;resize:none;'></textarea>
                     </td>
                  </tr>
               </table>
               <input type='submit' class='buttonefex1' value='Guardar Cambios'>
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
      $('#ofcan').keypress(function(e) {
         var txt =document.getElementById('ofcan');
         if(txt.value.length>=3){
            return this.value = this.value.substring(0, 2);
         }
      })


   $('#tippos').change(function(){
			var opt=document.getElementById('tippos');
			var input=document.getElementById('inputpost');
			input.style.display='inline';
			input.disabled=false;
			var val=opt.value;
			if(val=='0')
				input.placeholder='E-mail...';
			else if(val=='1')
				input.placeholder='Dirección...';
		})

   })

   

</script>
<script src='./scriptoftrabajo.js'></script>
<link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
