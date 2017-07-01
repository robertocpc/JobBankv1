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
var imagenValidityChecks = [
	{
		isInvalid: function(input) {
			return ValidateFileUploads();		
		},
		invalidityMessage: 'La imagen no es compatible',
		element: document.querySelector('label[for="fileinput"] .input-requirements li:nth-child(1)')
	},
	{
		isInvalid: function(input) {
			return selectimage(input);		
		},
		invalidityMessage: 'Por favor seleccione una imagen',
		element: document.querySelector('label[for="fileinput"] .input-requirements li:nth-child(2)')
	},
	{
		isInvalid: function(input) {
			return showFileSize();		
		},
		invalidityMessage: 'La imagen excede el tamaño máximo',
		element: document.querySelector('label[for="fileinput"] .input-requirements li:nth-child(2)')
	}
];

   function ValidateFileUploads() {
        var fuData = document.getElementById('fileinput');
        var FileUploadPath = fuData.value;
        //alert("The file API isn't supported on this browser yet.");
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

function selectimage(input){
	if (!input.files[0]) {
        //bodyAppend("p", "Please select a file before clicking 'Load'");
		return true;
	}
}

function showFileSize() {
    var input, file;
    if (!window.FileReader) {
        //alert("The file API isn't supported on this browser yet.");
        return true;
    }
    input = document.getElementById('fileinput');
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
		return false;
    }
    else {
         

        file = input.files[0]; console.log(file);
        //bodyAppend("p", "File " + file.name + " is " + file.size + " bytes in size");
        if(file.size>500000){
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
var imagenInput = document.getElementById('fileinput');


imagenInput.CustomValidation = new CustomValidation(imagenInput);
imagenInput.CustomValidation.validityChecks = imagenValidityChecks;




/* ----------------------------

	Event Listeners

---------------------------- */

var inputs = document.querySelectorAll('input:not([type="submit"])');
 
var img = document.querySelector('input[type="file"]');
var submit = document.querySelector('input[type="submit"');
var form = document.getElementById('uploadform');

var elementt = document.getElementById('fileinput');
elementt.setCustomValidity("Funciona");


function validate() {
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].CustomValidation.checkInput();
	}
}

img.CustomValidation.checkInput();

submit.addEventListener('click', validate);

form.addEventListener('submit', validate);
