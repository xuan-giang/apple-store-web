function Validator(formSelector){
    var _this = this;
    var formRules = {};

    function getParent(element,selector){
        while(element.parentElement){
            if(element.parentElement.matches(selector)){
                return element.parentElement;
            }
            element = element.parentElement;
        }
    };

    

    // quy uoc rules:
    // neu co loi thi return 'error message'
    // ko co loi thi return 'undefine'
    var validatorRules = {
        required:function(value){
            return value ? undefined : 'Vui lòng nhập trường này'
        },
        email:function(value){
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : 'Vui lòng nhập đúng email'
        },
        min:function(min){
            return function(value){
                return value.length >= min ? undefined : `Vui lòng nhập ít nhất ${min} ký tự`
            }
        },
        max:function(max){
            return function(value){
                return value.length >= max ? undefined : `Vui lòng nhập ít nhất ${min} ký tự`
            }
        }
    };

    var rulesName = 'required';
    // lay ra form element trong DOM
    var formElement = document.querySelector(formSelector);
    //chi xu ly khi co form 
    if(formElement){
        var inputs = formElement.querySelectorAll('[name][rules]')
        for(var input of inputs){

            var rules = input.getAttribute('rules').split('|');
            for(var rule of rules){
                var ruleInfo;
                var isRuleHasValue = rule.includes(':');

                if(rule.includes(':')){
                    ruleInfo = rule.split(':');
                    rule = ruleInfo[0];
                }

                var ruleFunc = validatorRules[rule];

                if(isRuleHasValue){
                    ruleFunc = ruleFunc(ruleInfo[1])
                }

                if(Array.isArray(formRules[input.name])){
                    formRules[input.name].push(ruleFunc);
                }else{
                    formRules[input.name] = [ruleFunc];
                }
            }

            //lang nghe su kien de validate(blur, change,...)

            input.onblur = handleValidate;
            input.oninput = handleClearError;
        }
        //ham thuc hien validate
        function handleValidate(event) {
            var rules = formRules[event.target.name];
            var errorMessage;
            
            rules.some(function(rule){
                errorMessage = rule(event.target.value);
                return errorMessage;
            });

            //neu co fail thi show mess loi ra
            if(errorMessage) {
                    var formGroup = getParent(event.target,'.form-group');
                if(formGroup) {
                    formGroup.classList.add('invalid');
                    var formMessage = formGroup.querySelector('.form-message');
                    if(formMessage) {
                            formMessage.innerText = errorMessage;
                            
                    }
                        
                }
                    
            }
            return !errorMessage;
        }
        //ham clear mess loi
        function handleClearError(event) {
            var formGroup = getParent(event.target,'.form-group');
            if(formGroup.classList.contains('invalid')) {
                formGroup.classList.remove('invalid');
            }
            var formMessage = formGroup.querySelector('.form-message');
            if(formMessage) {
                formMessage.innerText = '';
            }
        }
    } 


    //xuly hanh vi submit form 
    formElement.onsubmit = function(event) {
        event.preventDefault();
        
        var inputs = formElement.querySelectorAll('[name][rules]')
        var isValid = true;

        for(var input of inputs){
            if (!handleValidate({target: input})) {
                isValid = false;
            }

        }
        // ko fail thi submit form
        if(isValid){
            if(typeof _this.onSubmit === 'function'){
                var enableInputs = formElement.querySelectorAll('[name]')
                var formValue = Array.from(enableInputs).reduce(function(values,input){
                    switch(input.type) {
                        case 'radio':
                            if(!input.matches(':checked')) {
                                values[input.name] = '';
                            }else
                            values[input.name] = formElement.querySelector('input[name="' + input.name + '"]:checked').value;
                            break;
                        case 'checkbox':
                            if(!input.matches(':checked')) {
                                values[input.name] = '';
                                return values;
                            };
                            if(!Array.isArray(values[input.name])){
                                values[input.name] = [];
                            }
                            values[input.name].push(input.value)
                            break;
                            case 'file':
                                values[input.name] = input.files;
                            break;
                        default:
                            values[input.name] = input.value
                    }
                    return values;
                }, {});

                //goi lai ham onsubmit va tra ve gia tri form
                _this.onSubmit(formValue);
            }else{
                formElement.submit();
            }
        }
    }
}