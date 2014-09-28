console.log("registration script loaded.")

var RegistrationFormViewModel = function (path, role) {
	var self = this;

	self.fullName = ko.observable('');
	self.companyName = ko.observable('');
	self.email = ko.observable('').extend({ email: true});
	self.password = ko.observable('').extend({ required: true, password: true});
	self.passwordConfirmation = ko.observable('').extend({ required: true, passwordMustEqual: true});
	self.ajaxInProgress = ko.observable(false);
	self.role = ko.observable(role);

	self.save = function(){
		if(!self.canSave()){
			return false;
		}
		var newUser = ko.mapping.toJS(self, { 'ignore': ["ajaxInProgress", "save", "canSave"]});
		console.log(newUser);
		self.ajaxInProgress(true);
		$.ajax({
			url : path,
			type: "POST",
			data: newUser,
			dataType: "json", 
			success: function(data, textStatus, jqXHR){
				console.log(data);
				self.ajaxInProgress(false);
				if(data.success){
					alert("Nalog uspesno napravljen.");
					window.location = SERVER_PATH_LOGIN;
				}
				else{
					//TODO display error
					alert("Doslo je do greske.");
				}
			},
			error: function (jqXHR, textStatus, errorThrown){
				self.ajaxInProgress(false);
				console.log(errorThrown);
			}
		});
	}

	self.canSave = ko.computed(function() {
		return (self.email() != "" && self.email.isValid() && self.password.isValid());
   	});
};
var registrationFormViewModel = new RegistrationFormViewModel(SERVER_PATH_REGISTRATION, SERVER_VALUE_ROLE);

ko.applyBindings(registrationFormViewModel);

