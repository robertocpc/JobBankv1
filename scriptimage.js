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
			var illegalCharacters = input.value.match(/[^A-Za-z ]/g);
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

var imagenValidityChecks = [
	{
		isInvalid: function(input) {
			return ValidateFileUploads();		
		},
		invalidityMessage: 'La imagen no es compatible',
		element: document.querySelector('label[for="imagen"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			return showFileSize();		
		},
		invalidityMessage: 'La imagen excede el tamaño máximo',
		element: document.querySelector('label[for="imagen"] .input-requirements li:nth-child(2)')
	}
];

   function ValidateFileUploads() {
        var fuData = document.getElementById('imagen');
        var FileUploadPath = fuData.value;
		//To check if user upload any file
        if (FileUploadPath == '') {
            //alert("Please upload an image");
        } else {
            var Extension = FileUploadPath.substring(
                    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
			//The file uploaded is an image
		if (Extension == "gif" || Extension == "png" || Extension == "bmp"
                    || Extension == "jpeg" || Extension == "jpg") {
		// To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(fuData.files[0]);
                }
            } 
		//The file upload is NOT an image
		else {
                return true; //alert("Photo only allows file types of GIF, PNG, JPG, JPEG and BMP. ");
            }
        }
    }

function showFileSize() {
    var input, file;
    if (!window.FileReader) {
        //alert("The file API isn't supported on this browser yet.");
        return true;
    }
    input = document.getElementById('imagen');
    if (!input) {
        //bodyAppend("p", "Um, couldn't find the fileinput element.");
		return true;
    }
    else if (!input.files) {
        //bodyAppend("p", "This browser doesn't seem to support the `files` property of file inputs.");
		return true;
    }
    else if (!input.files[0]) {
        //bodyAppend("p", "Please select a file before clicking 'Load'");
		return true;
    }
    else {
         

        file = input.files[0]; console.log(file);
        //bodyAppend("p", "File " + file.name + " is " + file.size + " bytes in size");
        if(file.size>1000){
            return true;
        }
        else{
            return false;
        }
    }
}

/* ----------------------------

	Setup CustomValidation

	Setup the CustomValidation prototype for each input
	Also sets which array of validity checks to use for that input

---------------------------- */
var wecargoInput = document.getElementById('wecargo');
var apellidoInput = document.getElementById('apellido');
var usernameInput = document.getElementById('username');
var emailInput = document.getElementById('email');
var telefonoInput = document.getElementById('telefono');
var imagenInput = document.getElementById('imagen');
var passwordInput = document.getElementById('password');
var passwordRepeatInput = document.getElementById('password_repeat');



apellidoInput.CustomValidation = new CustomValidation(apellidoInput);
apellidoInput.CustomValidation.validityChecks = apellidoValidityChecks;

imagenInput.CustomValidation = new CustomValidation(imagenInput);
imagenInput.CustomValidation.validityChecks = imagenValidityChecks;


usernameInput.CustomValidation = new CustomValidation(usernameInput);
usernameInput.CustomValidation.validityChecks = usernameValidityChecks;

emailInput.CustomValidation = new CustomValidation(emailInput);
emailInput.CustomValidation.validityChecks = emailValidityChecks;

telefonoInput.CustomValidation = new CustomValidation(telefonoInput);
telefonoInput.CustomValidation.validityChecks = telefonoValidityChecks;




/* ----------------------------

	Event Listeners

---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');
 
var img = document.querySelector('input[type="file"]');
var submit = document.querySelector('input[type="submit"');
var form = document.getElementById('registration');


function validate() {
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].CustomValidation.checkInput();
	}
}

img.CustomValidation.checkInput();

submit.addEventListener('click', validate);

form.addEventListener('submit', validate);
