function CustomValidation(){
    this.invalidities=[];
}

CustomValidation.prototype = {
    addInvalidity: function(message){
        this.invalidities.push(message);
    },
    getInvalidities: function() {
        return this.invalidities.join('. \n');
    },
    checkValidity: function(input) {
        if(input.value.length < 3 ){
            this.addInvalidity('Version de prueba');
            var element = document.querySelector('input[type=""]');
            element.classList.add('invalid');
        }
    }
}
