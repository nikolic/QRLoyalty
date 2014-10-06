console.log("account.js loaded.");

var AccountViewModel = function() {
	var self = this;

	self.password = ko.observable('').extend({ required: true, password: true});
	self.passwordConfirmation = ko.observable('').extend({ required: true, password: true, passwordMustEqual: true})
	self.ajaxInProgress = ko.observable(false);

	self.updatePassword = function(){
		var newPassword = ko.mapping.toJS(this, { 'ignore': ["updatePassword", "canUpdate", "ajaxInProgress"]});
		self.ajaxInProgress(true);
		$.ajax({
			url : SERVER_PATH_CHANGE_PASSWORD,
			type: "POST",
			data: newPassword,
			dataType: "json", 
			success: function(data, textStatus, jqXHR){
				console.log(data);
				self.ajaxInProgress(false);
				if(data.success){
					alert("Password uspesno izmenjen.");
					//window.location = SERVER_PATH_LOGIN;
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

	self.canUpdate = ko.computed(function(){
		return self.password.isValid() && self.passwordConfirmation.isValid();
	});
};

var accountViewModel = new AccountViewModel();
ko.applyBindings(accountViewModel);