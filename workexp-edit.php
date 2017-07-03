<?php
session_start();
$_SESSION['page']=4;
require './log_header.php';

    $id=$_REQUEST['id'];
    $_SESSION['workexpid']=$id;
    $result = $mysqli->query("SELECT * FROM tbl_workexp WHERE cod_workexp='$id'");
    $user = $result->fetch_assoc();


?>
                <div class="tab_derecha">
                    <div class="tab_panel shadow workexp edit-profile">
                        
                        <form  onload="doOnLoad();" name="regworkexp" id="regworkexp" action="./account/edit-work.php" method="post">
                            <label class="title">Añadir Experiencia Laboral : </label><br>
                            <label for="wecargo">
                                <span class="stag">Cargo:  </span>
                                <input id="wecargo"class="sinput" type="text" name="cargo" value="<?php echo $user['col_cargo']?>" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                        
                            </label>
                            <label for="weempresa">
                                <span class="stag">Empresa/Institución:  </span>
                                <input id="weempresa" class="sinput" type="text" name="empresa" value="<?php echo $user['col_empresa']?>" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            
                            <label>
                                <span class="stag">Localidad(Region)</span>
                                <input id="autocomplete" class="sinput" placeholder=""
                                onFocus="geolocate()" type="text"></input>
                            </label>
                            <input class="field" id="locality"
                            disabled="true"></input>
                            <input class="field" id="sublocality"
                            disabled="true"></input>
                            <input class="field"
                              id="administrative_area_level_1" disabled="true"></input>
                            <input class="field"
                              id="administrative_area_level_2" disabled="true"></input>

                            <input class="field"
                            id="country" disabled="true"></input>

                            <br><br>
                            <label for="wedireccion">
                                <span class="stag">Dirección:  </span>
                                <input id="wedireccion" class="sinput" type="text" name="direccion" value="<?php echo $user['col_direccion']?>" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            
                           
                            <label for="box">
                                <span class="stag">Desde </span>
                                <input id="box" name="fecha" type="text" 
                                class="sinput datepicker" value="<?php if($user['col_idia']<10)
                                {echo "0".$user['col_idia'];}
                                else{echo $user['col_idia'];}echo "/";if($user['col_imes']<10)
                                {echo "0".$user['col_imes'];}
                                else{echo $user['col_imes'];}echo "/".$user['col_ianio'];?>"  required >
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>

                            <span>Actualmente trabajo aqui: </span>
                            <label class="switch">
                            <input type="checkbox"  name="checkwork" onchange="yesnoCheck()" id="yesCheck">
                            <div class="slider round"></div>
                            </label><br><br>
                            
                            <label for="box2" id="hidde">
                                <span class="stag">Hasta </span>
                                <input id="box2" name="fecha2" type="date" 
                                class="sinput datepicker" value="<?php  if($user['col_actualtrab']!=1){if($user['col_fdia']<10)
                                {echo "0".$user['col_fdia'];}
                                else{echo $user['col_fdia'];}echo "/";if($user['col_fmes']<10)
                                {echo "0".$user['col_fmes'];}
                                else{echo $user['col_fmes'];}echo "/".$user['col_fanio'];}else{$currentDateTime = date('d/m/Y');echo $currentDateTime;}?>" required>
                                <ul class="input-requirements">
                                    <li>Debe contener almenos 2 caracteres</li>
                                    <li>Debe contener almenos 2 caracteres</li>
                                </ul>
                            </label>
                            
                                <br>


                            <input class="buttonefex1" type="submit" name="submit" value="Guardar Cambios">
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </body>

    <script>

   
var d = myCalendar.getDate(true);
alert(d); // "2013-03-01"

       

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
        document.getElementById('hidde').style.display = 'none';
        document.getElementById('box2').value = today;
    }
    else {
    document.getElementById('hidde').style.display = '';
    document.getElementById('box2').value = '';
    }
}

function pruebass()
{
    var d = myCalendar.getDate(true);

    alert(d);

}

    </script>

    <script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
       
        locality: 'long_name',
        sublocality: 'long_name',
        administrative_area_level_1: 'short_name',
        administrative_area_level_2: 'short_name',
        country: 'long_name',
       
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['(regions)']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1mqGxOcvKuautGjS4Q0EcgWYV8jcltj8&libraries=places&callback=initAutocomplete"
        async defer></script>

    <script src="./scriptw.js"></script>
    <link rel="stylesheet" href="http://cdn.dhtmlx.com/edge/dhtmlx.css" 
    type="text/css"> 
<script src="./codebase/dhtmlxcalendar.js"></script>
<script src="./scriptdate.js"></script>
   

</html>