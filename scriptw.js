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
			return input.value.length < 3 | input.value.length > 70;;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="wecargo"] .input-requirements li:nth-child(1)')
	}
];
var weempresaValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 3 | input.value.length > 70;;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="weempresa"] .input-requirements li:nth-child(1)')
	}
];
var wedireccionValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 3 | input.value.length > 70;;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="wedireccion"] .input-requirements li:nth-child(1)')
	}
];


var startdateValidityChecks = [
	{
		isInvalid: function(input) {
			return checkDate(input);
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="box"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			return true;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="box"] .input-requirements li:nth-child(1)')
	}
];

var finaldateValidityChecks = [
	{
		isInvalid: function(input) {
			return checkDate(input);
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="box2"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			return verifydate(input);
		},
		invalidityMessage: 'La fecha final no debe ser inferior a la fecha de inicio',
		element: document.querySelector('label[for="box2"] .input-requirements li:nth-child(1)')
	}
];


	function verifydate(field){
		var input=document.getElementById('box').value;
		re = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
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
					if(regs[1]<=regd[1]){
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
var wecargoInput = document.getElementById('wecargo');
var weempresaInput = document.getElementById('weempresa');
var wedireccionInput = document.getElementById('wedireccion');
var startdateInput = document.getElementById('box');
var finaldateInput = document.getElementById('box2');

wecargoInput.CustomValidation = new CustomValidation(wecargoInput);
wecargoInput.CustomValidation.validityChecks = wecargoValidityChecks;

weempresaInput.CustomValidation = new CustomValidation(weempresaInput);
weempresaInput.CustomValidation.validityChecks = weempresaValidityChecks;

wedireccionInput.CustomValidation = new CustomValidation(wedireccionInput);
wedireccionInput.CustomValidation.validityChecks = wedireccionValidityChecks;

finaldateInput.CustomValidation = new CustomValidation(finaldateInput);
finaldateInput.CustomValidation.validityChecks = finaldateValidityChecks;

startdateInput.CustomValidation = new CustomValidation(startdateInput);
startdateInput.CustomValidation.validityChecks = startdateValidityChecks;




/* ----------------------------

	Event Listeners

---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');



var submit = document.querySelector('input[type="submit"');
var form = document.getElementById('regworkexp');


function validate() {
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].CustomValidation.checkInput();
	}
}


submit.addEventListener('click', validate);

form.addEventListener('submit', validate);
