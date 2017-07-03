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
		var startdateInput = document.getElementById('box');

		

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

var tituloValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 2 | input.value.length > 70;;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="titulop"] .input-requirements li:nth-child(1)')
	}
];

var editorValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 2 | input.value.length > 70;;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="editor"] .input-requirements li:nth-child(1)')
	}
];
var autorValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 2 | input.value.length > 70;;
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="autor"] .input-requirements li:nth-child(1)')
	}
];
var urlValidityChecks = [
	{
		isInvalid: function(input) {
			return isUrlValid(input);
		},
		invalidityMessage: 'Necesita al menos de 2 caracteres ',
		element: document.querySelector('label[for="urlp"] .input-requirements li:nth-child(1)')
	}
];

function isUrlValid(input) {
    var re = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
    if (!re.test(input.value)) { 
        return true;
    }
    else{
        return false;
    }
}


var descripcionValidityChecks = [
	{
		isInvalid: function(input) {
			return input.value.length < 10 | input.value.length > 70;;
		},
		invalidityMessage: 'Necesita al menos de 10 caracteres ',
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

  function checkDatee(field)
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
		dd = '0'+dd;
	} 

	if(mm<10) {
		mm = '0'+mm;
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
        if(regs[3] < minYear )  {
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
var tituloInput = document.getElementById('titulop');
var editorInput = document.getElementById('editor');
var autorInput = document.getElementById('autor');
var urlInput = document.getElementById('urlp');
var descripcionInput = document.getElementById('desp');
var startdateInput = document.getElementById('box');


tituloInput.CustomValidation = new CustomValidation(tituloInput);
tituloInput.CustomValidation.validityChecks = tituloValidityChecks;

editorInput.CustomValidation = new CustomValidation(editorInput);
editorInput.CustomValidation.validityChecks = editorValidityChecks;

autorInput.CustomValidation = new CustomValidation(autorInput);
autorInput.CustomValidation.validityChecks = autorValidityChecks;

urlInput.CustomValidation = new CustomValidation(urlInput);
urlInput.CustomValidation.validityChecks = urlValidityChecks;

startdateInput.CustomValidation = new CustomValidation(startdateInput);
startdateInput.CustomValidation.validityChecks = startdateValidityChecks;

descripcionInput.CustomValidation = new CustomValidation(descripcionInput);
descripcionInput.CustomValidation.validityChecks = descripcionValidityChecks;




/* ----------------------------

	Event Listeners

---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');

var datein = document.querySelector('input[name="fecha"]');
var datefn = document.querySelector('input[name="fecha2"]');

var submit = document.querySelector('input[type="submit"]');
var form = document.getElementById('publicform');


function validate() {
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].CustomValidation.checkInput();
	}
}

datein.CustomValidation.checkInput();

//datein.addEventListener('onClick',validate);	

datein.addEventListener('onClick', function() {
			datein.CustomValidation.checkInput();
		});

datefn.addEventListener('onClick', function() {
			datefn.CustomValidation.checkInput();
		});

submit.addEventListener('click', validate);

form.addEventListener('submit', validate);

var myCalendar;
		function doOnLoad() {
			
			myCalendar1 = new dhtmlXCalendarObject("box");
            myCalendar1.setDateFormat("%d/%m/%Y");
            var dd1 = myCalendar1.getFormatedDate();
			myCalendar1.attachEvent("onClick", function(d){
				//var element = document.querySelector('label[for="box2"] li:nth-child(1)');
                //var elementt = document.getElementById('box2');
                dd1 = myCalendar1.getFormatedDate(null,d);
				datein.CustomValidation.checkInput();
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