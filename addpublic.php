<?php
session_start();
$_SESSION['page']=5;
require './log_header.php';
?>
                <div class="tab_derecha">
                    <div class="tab_panel shadow workexp edit-profile">
                        
                        <form  onload="doOnLoad();" name="publicform" id="publicform" action="./account/save-public.php" method="post">
                            <label class="title">Añadir Publicación : </label><br>
                            <span class="stag">Los campos con (*) a lado son opcionales</span><br><br><br>
                            <label for="titulop">
                                <span class="stag">Titulo:  </span>
                                <input id="titulop" class="sinput" type="text" name="titulop" required>
                                <ul class="input-requirements">
                                    <li>Debe contener entre 2 a 70 caracteres</li>
                                </ul>
                        
                            </label>

                            <label for="editor">
                                <span class="stag">Editor:  </span>
                                
                                <input id="editor" class="sinput" type="text" name="editor" required>
                                <ul class="input-requirements">
                                    <li>Debe contener entre 2 a 70 caracteres</li>
                                </ul>
                            </label>
                            
                            <label for="box">
                                <span class="stag">Fecha de publicación </span>
                                <input id="box" name="fecha" type="text" 
                                class="sinput datepicker" value="" required>
                                <ul class="input-requirements">
                                    <li>La fecha debe ser inferior a la fecha actual</li>
                                </ul>
                            </label>

                            
                            <span class="stag">Autor:  </span>
                            <span class="sinput"><?php echo $_SESSION['ape'].", ". $_SESSION['user']?></span>
                            <br><br><br>
                            <label for="autor">
                                <span class="stag">*Añada otro autor:  </span>
                                <input id="autor" class="sinput" type="text" name="autor"
                                 value="">
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>

                            <label for="urlp">
                                <span class="stag">*URL:  </span>
                                <input id="urlp" class="sinput" type="text" name="urlp">
                                <ul class="input-requirements">
                                    <li>URL inválido</li>
                                </ul>
                            </label>

                            <label for="desp">
                                <span class="stag">Descripción(opcional):  </span>
                                <textarea id="desp" type="text" name="desp"></textarea>
                                
                            </label>                            
                            
                            <input class="buttonefex1" type="submit" name="submit" value="Guardar Cambios">
                        </form>

                     </div>
                    
                </div>
            </div>
        </div>
    </body>

    <script type="text/javascript">
   

/*
function yesnoCheck() {
    var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();

	if(dd<10) {
		dd = '0'+dd
	} 

	if(mm<10) {
		mm = '0'+mm
	} 

	today = dd + '/' + mm + '/' + yyyy;
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('cursoanio').value = "Termino";
        
    }
    else {
    
    document.getElementById('cursoanio').value = '';
    }
}*/


    </script>

    <script src="./scriptpublic.js"></script>
    <link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptdate.js"></script>
   

</html>