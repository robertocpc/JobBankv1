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

var ofnombreValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 2 | input.value.length > 81;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="wecargo"] .input-requirements li:nth-child(1)')
	}
];
var ofempresaValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 2 | input.value.length > 81;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="username"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^A-Za-z0-9ñÑáéíúóúÁÉÍÓÚüÄËÏÖÜäëïö.,?#@&!'*~+  ]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Caracteres Inválidos',
		element: document.querySelector('label[for="username"] .input-requirements li:nth-child(2)')
	}
];
var ofubicacionValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 2 | input.value.length > 81;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres',
		element: document.querySelector('label[for="apellido"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^A-Za-z0-9ñÑáéíóúúÁÉÍÓÚüÄËÏÖÜäëïö,.#&  ]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Caracteres inválidos',
		element: document.querySelector('label[for="apellido"] .input-requirements li:nth-child(2)')
	}
];

var ofemailValidityChecks = [
	{
		isInvalid: function(input) {
			return validateForm();
		},
		invalidityMessage: 'No es un email válido',
		element: document.querySelector('label[for="email"] .input-requirements li:nth-child(1)')
	}
];

function validateForm() {
    var x = document.forms["oftrabajo"]["ofemailcon"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if ((atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)&&x.length!=0) {
        //alert("Not a valid e-mail address");
        return true;
    }
}
	function validateFormcase() {
    var x = document.forms["oftrabajo"]["inputpost"].value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if ((atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)&&x.length!=0) {
        //alert("Not a valid e-mail address");
        return true;
    }
}

var oftelfValidityChecks = [
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

var ofinputpostValidityChecks = [
	{
		isInvalid: function(input) {
			if(document.getElementById('tippos').value==0)
				return validateFormcase();
			else if(document.getElementById('tippos').value==1){
				if(input.length=='0')
					return false;
				else{
					var illegalCharacters = input.value.match(/[^A-Za-z0-9ñÑáéíóúúÁÉÍÓÚüÄËÏÖÜäëïö,.#&  ]/g);
					return illegalCharacters ? true : false;
				}
			}
		},
		invalidityMessage: 'Caracter no válido',
		element: document.querySelector('label[for="email"] .input-requirements li:nth-child(1)')
	}
];

var ofurlValidityChecks = [
	{
		isInvalid: function(input) {
			return isUrlValid(input);
		},
		invalidityMessage: 'URL inválido ',
		element: document.querySelector('label[for="urlp"] .input-requirements li:nth-child(1)')
	}
];

function isUrlValid(input) {
    var re = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
	if(input.value.length==0){
		return false;
	}
    if (!re.test(input.value)) { 
        return true;
    }
    else{
        return false;
    }
}



var startdateValidityChecks = [
	{
		isInvalid: function(input) {
			return checkDate(input);
		},
		invalidityMessage: 'Fecha Invalida ',
		element: document.querySelector('label[for="box2"] .input-requirements li:nth-child(1)')
	}
];

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
	if(regs[3]>=regd[3]){
		if(regs[3]==regd[3]){
			if(regs[2]>=regd[2]){
				if(regs[2]==regd[2]){
					if(regs[1]>regd[1]){
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
var ofcanValidityChecks = [
	{
		isInvalid: function(input) {
			if(input.length=='0')
				return false;
			else{
				var illegalCharacters = input.value.match(/[^0-9]/g);
				return illegalCharacters ? true : false;
			}
		},
		invalidityMessage: 'Solo se admite cantidades numéricas ',
		element: document.querySelector('label[for="wecargo"] .input-requirements li:nth-child(1)')
	}
];
var ofidiomaValidityChecks = [
	{
		isInvalid: function(input) {
			if(input.length=='0')
				return false;
			else{
				var illegalCharacters = input.value.match(/[^A-Za-z,ÑñáéíóúäëïöüÄËÏÖÜÁÉÍÓÚ, ]/g);
				return illegalCharacters ? true : false;
			}
		},
		invalidityMessage: 'Caracter no válido ',
		element: document.querySelector('label[for="wecargo"] .input-requirements li:nth-child(1)')
	}
];
var oftiminValidityChecks = [
	{
		isInvalid: function(input) {
			if(input.length=='0')
				return false;
			else{
				var illegalCharacters = input.value.match(/[^A-Za-z0-9,ÑñáéíóúäëïöüÄËÏÖÜÁÉÍÓÚ, ]/g);
				return illegalCharacters ? true : false;
			}
		},
		invalidityMessage: 'Caracter no válido ',
		element: document.querySelector('label[for="wecargo"] .input-requirements li:nth-child(1)')
	}
];
/* ----------------------------

	Setup CustomValidation

	Setup the CustomValidation prototype for each input
	Also sets which array of validity checks to use for that input

---------------------------- */

var ofnombre = document.getElementById('ofnombre');
var ofempresa = document.getElementById('ofempresa');
var ofubicacion = document.getElementById('ofubicacion');
var ofemail = document.getElementById('ofemailcon');
var oftelf = document.getElementById('oftelfcon');
var ofinputpost = document.getElementById('inputpost');
var ofurl = document.getElementById('ofurl');
var startdateInput = document.getElementById('box');

var ofcan = document.getElementById('ofcan');
var ofidioma = document.getElementById('ofidioma');
var oftimin = document.getElementById('oftimin');
var ofdescrip = document.getElementById('ofdescrip'); 

ofnombre.CustomValidation = new CustomValidation(ofnombre);
ofnombre.CustomValidation.validityChecks = ofnombreValidityChecks;

ofempresa.CustomValidation = new CustomValidation(ofempresa);
ofempresa.CustomValidation.validityChecks = ofempresaValidityChecks;

ofubicacion.CustomValidation = new CustomValidation(ofubicacion);
ofubicacion.CustomValidation.validityChecks = ofubicacionValidityChecks;

ofemail.CustomValidation = new CustomValidation(ofemail);
ofemail.CustomValidation.validityChecks = ofemailValidityChecks;

oftelf.CustomValidation = new CustomValidation(oftelf);
oftelf.CustomValidation.validityChecks = oftelfValidityChecks;

ofinputpost.CustomValidation = new CustomValidation(ofinputpost);
ofinputpost.CustomValidation.validityChecks = ofinputpostValidityChecks;

ofurl.CustomValidation = new CustomValidation(ofurl);
ofurl.CustomValidation.validityChecks = ofurlValidityChecks;

startdateInput.CustomValidation = new CustomValidation(startdateInput);
startdateInput.CustomValidation.validityChecks = startdateValidityChecks;


ofcan.CustomValidation = new CustomValidation(ofcan);
ofcan.CustomValidation.validityChecks = ofcanValidityChecks;

ofidioma.CustomValidation = new CustomValidation(ofidioma);
ofidioma.CustomValidation.validityChecks = ofidiomaValidityChecks;

oftimin.CustomValidation = new CustomValidation(oftimin);
oftimin.CustomValidation.validityChecks = oftiminValidityChecks;

ofdescrip.CustomValidation = new CustomValidation(ofdescrip);
ofdescrip.CustomValidation.validityChecks = ofdescripValidityChecks;





/* ----------------------------

	Event Listeners

---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');

var datein = document.querySelector('input[name="fecha"]');

var submit = document.querySelector('input[type="submit"');
var form = document.getElementById('oftrabajo');


function validate() {
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].CustomValidation.checkInput();
	}
}

datein.CustomValidation.checkInput();

datein.addEventListener('onClick', function() {
			datein.CustomValidation.checkInput();
		});

submit.addEventListener('click', validate);

form.addEventListener('submit', validate);



