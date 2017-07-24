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
	},
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^A-Za-zñÑáéíúóúÁÉÍÓÚüÄËÏÖÜäëïö ]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Caracteres Inválidos',
		element: document.querySelector('label[for="username"] .input-requirements li:nth-child(2)')
	}
];
var ofapellidoValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 2 | input.value.length > 81;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="wecargo"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			var illegalCharacters = input.value.match(/[^A-Za-zñÑáéíúóúÁÉÍÓÚüÄËÏÖÜäëïö ]/g);
			return illegalCharacters ? true : false;
		},
		invalidityMessage: 'Caracteres Inválidos',
		element: document.querySelector('label[for="username"] .input-requirements li:nth-child(2)')
	}
];
var ofusernameValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 11 | input.value.length > 11;
		},
		invalidityMessage: 'Debe tener 11 Caracteres ',
		element: document.querySelector('label[for="wecargo"] .input-requirements li:nth-child(1)')
	}
];
var ofpasswordValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 11 | input.value.length > 11;
		},
		invalidityMessage: 'Debe tener 11 Caracteres ',
		element: document.querySelector('label[for="wecargo"] .input-requirements li:nth-child(1)')
	}
];

/* ----------------------------

	Setup CustomValidation

	Setup the CustomValidation prototype for each input
	Also sets which array of validity checks to use for that input

---------------------------- */

var ofnombre = document.getElementById('ofnombre');
var ofapellido = document.getElementById('ofapellido');
var ofusername = document.getElementById('ofusername');
var ofpassword = document.getElementById('ofpassword');


ofnombre.CustomValidation = new CustomValidation(ofnombre);
ofnombre.CustomValidation.validityChecks = ofnombreValidityChecks;

ofapellido.CustomValidation = new CustomValidation(ofapellido);
ofapellido.CustomValidation.validityChecks = ofapellidoValidityChecks;


ofusername.CustomValidation = new CustomValidation(ofusername);
ofusername.CustomValidation.validityChecks = ofusernameValidityChecks;


ofpassword.CustomValidation = new CustomValidation(ofpassword);
ofpassword.CustomValidation.validityChecks = ofpasswordValidityChecks;








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



