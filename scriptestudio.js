    /* ----------------------------

	CustomValidation prototype

	- Keeps track of the list of invalidity messages for this input
	- Keeps track of what validity checks need to be performed for this input
	- Performs the validity checks and sends feedback to the front end

---------------------------- */

function CustomValidation(input) {
	this.invalidities = [];
	this.validityChecks = [];

	//add reference to the input node
	this.inputNode = input;

	//trigger method to attach the listener
	this.registerListener();
}

CustomValidation.prototype = {
	addInvalidity: function(message) {
		this.invalidities.push(message);
	},
	getInvalidities: function() {
		return this.invalidities.join('. \n');
	},
	checkValidity: function(input) {
		for ( var i = 0; i < this.validityChecks.length; i++ ) {

			var isInvalid = this.validityChecks[i].isInvalid(input);
			if (isInvalid) {
				this.addInvalidity(this.validityChecks[i].invalidityMessage);
			}

			var requirementElement = this.validityChecks[i].element;

			if (requirementElement) {
				if (isInvalid) {
					requirementElement.classList.add('invalid');
					requirementElement.classList.remove('valid');
				} else {
					requirementElement.classList.remove('invalid');
					requirementElement.classList.add('valid');
				}

			} // end if requirementElement
		} // end for
	},
	checkInput: function() { // checkInput now encapsulated

		this.inputNode.CustomValidation.invalidities = [];
		this.checkValidity(this.inputNode);

		if ( this.inputNode.CustomValidation.invalidities.length === 0 && this.inputNode.value !== '' ) {
			this.inputNode.setCustomValidity('');
		} else {
			var message = this.inputNode.CustomValidation.getInvalidities();
			this.inputNode.setCustomValidity(message);
		}
	},
	registerListener: function() { //register the listener here

		var CustomValidation = this;

		this.inputNode.addEventListener('keyup', function() {
			CustomValidation.checkInput();
		});


	}

};



/* ----------------------------

	Validity Checks

	The arrays of validity checks for each input
	Comprised of three things
		1. isInvalid() - the function to determine if the input fulfills a particular requirement
		2. invalidityMessage - the error message to display if the field is invalid
		3. element - The element that states the requirement

---------------------------- */

var wecargoValidityChecks = [
	{
		isInvalid: function(input) {
			return false;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="wecargo"] .input-requirements li:nth-child(1)')
	}
];
var usernameValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 2 | input.value.length > 35;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="username"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^A-Za-zÑñÁÉÍÓÚáéíóú ]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Solo los caracteres alfabéticos estan permitidos',
		element: document.querySelector('label[for="username"] .input-requirements li:nth-child(2)')
	}
];
var apellidoValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 2 | input.value.length > 35;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres',
		element: document.querySelector('label[for="apellido"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^A-Za-z ]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Solo los caracteres alfabéticos estan permitidos',
		element: document.querySelector('label[for="apellido"] .input-requirements li:nth-child(2)')
	}
];

var emailValidityChecks = [
	{
		isInvalid: function(input) {
			return validateForm();
		},
		invalidityMessage: 'No es un email válido',
		element: document.querySelector('label[for="email"] .input-requirements li:nth-child(1)')
	}
];

function validateForm() {
    var x = document.forms["registration"]["email"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        //alert("Not a valid e-mail address");
        return true;
    }
}

var telefonoValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 3 | input.value.length > 15;
		},
		invalidityMessage: 'Tiene que tener entre 3-15 digitos',
		element: document.querySelector('label[for="telefono"] .input-requirements li:nth-child(1)')
	},
    {
		isInvalid: function(input) {
			var iillegalCharacters = input.value.match(/[^0-9]/g);
			return iillegalCharacters ? true : false;
		},
		invalidityMessage: 'Solo se aceptan caracteres numéricos',
		element: document.querySelector('label[for="telefono"] .input-requirements li:nth-child(2)')
	}
];


var inputpostValidityChecks = [
	{
		isInvalid: function(input) {
			if(document.getElementById('tipodoc').value==0){
				return input.value.length < 8 | input.value.length > 8;
			}
			else if(document.getElementById('tipodoc').value==1){
				return input.value.length < 7 | input.value.length > 12;
			}
			else if(document.getElementById('tipodoc').value==2){
				return input.value.length < 7 | input.value.length > 12;
			}
		},
		invalidityMessage: 'Tiene que tener entre 3-15 digitos',
		element: document.querySelector('label[for="telefono"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			if(document.getElementById('tipodoc').value==0){
				var iillegalCharacters = input.value.match(/[^0-9]/g);
			return iillegalCharacters ? true : false;
			}
			else if(document.getElementById('tipodoc').value==1){
				var iillegalCharacters = input.value.match(/[^a-z0-9]/g);
			return iillegalCharacters ? true : false;
			}
			else if(document.getElementById('tipodoc').value==2){
				var iillegalCharacters = input.value.match(/[^a-z0-9]/g);
			return iillegalCharacters ? true : false;
			}
		},
		invalidityMessage: 'Tiene que tener entre 3-15 digitos',
		element: document.querySelector('label[for="telefono"] .input-requirements li:nth-child(1)')
	}
];



var startdateValidityChecks = [
	{
		isInvalid: function(input) {
			return checkDate(input);
		},
		invalidityMessage: 'Fecha Inválida ',
		element: document.querySelector('label[for="box"] .input-requirements li:nth-child(1)')
	}
];
var enddateInputValidityChecks = [
	{
		isInvalid: function(input) {
			return checkDate(input);
		},
		invalidityMessage: 'Fecha Inválida ',
		element: document.querySelector('label[for="box2"] .input-requirements li:nth-child(1)')
	}
];




	function verifydate(field){
		var input=document.getElementById('box').value;
		re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
		//alert("verifyfield");
		regd = input.match(re);
		regs = field.value.match(re);
		if(input!=''){
			return compare(regd,regs);
		}
		else{
			return false;
		}
		
	}
  function checkDate(field)
  {
    var allowBlank = true;
    var minYear = 1902;
    var maxYear = (new Date()).getFullYear();
	//alert("checkdata");

    var errorMsg = "";
	var days=new Array(31,28,31,30,31,30,31,31,30,31,30,31);

    // regular expression to match required date format
    re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;

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

	regd = today.match(re);
	

    if(field.value != '') {
      if(regs = field.value.match(re)) {
		var maxday=days[regs[2]-1];

                    if(regs[2]==2){
                        if(regs[3]%4==0){
                            maxday=maxday+1;                                
                        }
                    }
        if(regs[3] < minYear || regs[3] > maxYear)  {
          return true;//errorMsg = "Invalid value for day: " + regs[1];
        } else if(regs[2] < 1 || regs[2] > 12) {
          return true;//errorMsg = "Invalid value for month: " + regs[2];
        } else if(regs[1] < 1 || regs[1]>maxday) {
          return true;//errorMsg = "Invalid value for year: " + regs[3] + " - must be between " + minYear + " and " + maxYear;
        }
      } else {
        return true;//errorMsg = "Invalid date format: " + field.value;
      }
    } else if(!allowBlank) {
      return true;//errorMsg = "Empty date not allowed!";
    }
	/*
    if(errorMsg != "") {
      alert(errorMsg);
      field.focus();
      return false;
    }*/
	return compare(regs,regd);
	
	
  }

  function compare(regs,regd){
	if(regs[3]<=regd[3]){
		if(regs[3]==regd[3]){
			if(regs[2]<=regd[2]){
				if(regs[2]==regd[2]){
					if(regs[1]<regd[1]){
						return false;
						
					}
					else{
						return true;
					}
				}
				else{
					return false;
				}
			}
			else{
				return true;
			}
		}
		else{
			return false;
		}
	}
	else{
		return true;
	}
  }
/* ----------------------------

	Setup CustomValidation

	Setup the CustomValidation prototype for each input
	Also sets which array of validity checks to use for that input

---------------------------- */

var apellidoInput = document.getElementById('apellido');
var usernameInput = document.getElementById('username');
var emailInput = document.getElementById('email');
var telefonoInput = document.getElementById('telefono');
var inputpost = document.getElementById('inputpost');
//var pasaporteInput = document.getElementById('pasaporte');
//var carnetInput = document.getElementById('carnet');
var startdateInput = document.getElementById('box');
var enddateInput = document.getElementById('box2');


apellidoInput.CustomValidation = new CustomValidation(apellidoInput);
apellidoInput.CustomValidation.validityChecks = apellidoValidityChecks;

usernameInput.CustomValidation = new CustomValidation(usernameInput);
usernameInput.CustomValidation.validityChecks = usernameValidityChecks;

emailInput.CustomValidation = new CustomValidation(emailInput);
emailInput.CustomValidation.validityChecks = emailValidityChecks;

telefonoInput.CustomValidation = new CustomValidation(telefonoInput);
telefonoInput.CustomValidation.validityChecks = telefonoValidityChecks;

startdateInput.CustomValidation = new CustomValidation(startdateInput);
startdateInput.CustomValidation.validityChecks = startdateValidityChecks;

enddateInput.CustomValidation = new CustomValidation(enddateInput);
enddateInput.CustomValidation.validityChecks = enddateInputValidityChecks;
/*
pasaporteInput.CustomValidation = new CustomValidation(pasaporteInput);
pasaporteInput.CustomValidation.validityChecks = pasaporteValidityChecks;

carnetInput.CustomValidation = new CustomValidation(carnetInput);
carnetInput.CustomValidation.validityChecks = carnetValidityChecks;
*/



/* ----------------------------

	Event Listeners

---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');

var datein = document.querySelector('input[name="fecha"]');
var datefn = document.querySelector('input[name="fecha2"]');

var submit = document.querySelector('input[type="submit"');
var form = document.getElementById('registration');


function validate() {
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].CustomValidation.checkInput();
	}
}

submit.addEventListener('click', validate);

form.addEventListener('submit', validate);

 $(document).ready(function(){    
   
	 var myCalendar3 = new dhtmlXCalendarObject("box2");
    myCalendar3.setDateFormat("%d/%m/%Y");
    var myEvent = myCalendar3.attachEvent("onClick", function(){
        datefn.CustomValidation.checkInput();
	 });
		
	 var myCalendar1 = new dhtmlXCalendarObject("box");
    myCalendar1.setDateFormat("%d/%m/%Y");
    var myEvent = myCalendar1.attachEvent("onClick", function(){
        datein.CustomValidation.checkInput();
    });
    })
   
var myCalendar;
		function doOnLoad() {
			
			var myCalendar1 = new dhtmlXCalendarObject("box");

            myCalendar1.setDateFormat("%d/%m/%Y");
            var dd1 = myCalendar1.getFormatedDate();
			if(document.getElementById("opt1").selected==true){
				document.getElementById("dni").value=document.getElementById("numide").value;
				document.getElementById("dni").style.display="inline";
				document.getElementById("pasaporte").style.display="none";
				document.getElementById("carnet").style.display="none";
				document.getElementById("pasaporte").value="";
				document.getElementById("carnet").value="";
				document.getElementById("dni").required=true;
				document.getElementById("pasaporte").required=false;
				document.getElementById("carnet").required=false;
				
			}
			else if(document.getElementById("opt2").selected==true){
				document.getElementById("pasaporte").value=document.getElementById("numide").value;
				document.getElementById("dni").style.display="none";
				document.getElementById("pasaporte").style.display="inline";
				document.getElementById("carnet").style.display="none";
				//document.getElementById("dni").value="";
				//document.getElementById("carnet").value="";
				document.getElementById("dni").required=false;
				document.getElementById("pasaporte").required=true;
				document.getElementById("carnet").required=false;
			}
			else if(document.getElementById("opt3").selected==true){
				document.getElementById("carnet").value=document.getElementById("numide").value;
				document.getElementById("dni").style.display="none";
				document.getElementById("pasaporte").style.display="none";
				document.getElementById("carnet").style.display="inline";
				//document.getElementById("dni").value="";
				//document.getElementById("pasaporte").value="";
				document.getElementById("dni").required=false;
				document.getElementById("pasaporte").required=false;
				document.getElementById("carnet").required=true;
			}
			myCalendar1.attachEvent("onClick", function(d){
					alert('funciona');
				//var element = document.querySelector('label[for="box2"] li:nth-child(1)');
                //var elementt = document.getElementById('box2');
                dd1 = myCalendar1.getFormatedDate(null,d);
				datefn.CustomValidation.checkInput();
                //element.classList.remove('valid');
                //element.classList.add('invalid');
                //var message = "holaa";
                //elementt.setCustomValidity(dd);
                
                //alert(dd);
                
                /*var elementt = document.querySelector('input[type="date"]');
                elementt.classList.remove('valid');
                elementt.classList.add('invalid');*/
                //alert("funciona");
			});

			

		}
