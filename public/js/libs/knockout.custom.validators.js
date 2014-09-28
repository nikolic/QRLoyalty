ko.validation.rules['checked'] = {
    validator: function (value) {
        if (!value) {
            return false;
        }
        return true;
    }
};

ko.validation.rules['name'] = {
    validator: function (value) {
    	var re = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
    	return re.test(value);
    }
};

ko.validation.rules['companyName'] = {
    validator: function (value) {
    	var re = /^[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/;
    	return re.test(value);
    }
};

ko.validation.rules['numbersOnly'] = {
    validator: function (value) {
    	var re = /^[0-9]{1,}$/;
    	return re.test(value);
    }
};

ko.validation.rules['password'] = {
    validator: function (value) {
    	var re = /^[a-zA-Z0-9,.'-+~!@#%^&]{6,}$/;
    	return re.test(value);
    }
};

ko.validation.rules['passwordMustEqual'] = {
    validator: function (val) {
    	var otherVal = document.getElementById("passwordField").value;
        return val === otherVal;
    }
};

ko.validation.rules['amount'] = {
    validator: function (value) {
        var re = /^\d+(\.\d+)?$/;
        return re.test(value);
    }
};

ko.validation.registerExtenders();