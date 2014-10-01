console.log('generateLoyaltyCode.js script loaded.')

var GenerateLoyaltyCodeViewModel = function(){
	var self = this;

	self.email = ko.observable('').extend({ required: true, email: true });
	self.fullName = ko.observable('');
	self.ajaxInProgress = ko.observable(false);

	self.canSend = ko.computed(function(){
		return self.email() != '' && self.email.isValid();
	});

	self.sendCode = function(){
		var userData = ko.mapping.toJS(this, {'ignore': ['sendCode', 'canSend', 'ajaxInProgress']});

		console.log(userData);
		self.ajaxInProgress(true);
		$.ajax({
			url : SERVER_PATH_LOYALTY_CODE_CREATE,
			type: 'POST',
			data : userData,
			dataType: 'json', 
			success: function(data, textStatus, jqXHR)
			{
				self.ajaxInProgress(false);
				if(data.success){
					alert("Kod uspesno poslat.")
				}
				else{
					console.log(data, 'Something goes wrong...');
				}
			},
			error: function (jqXHR, textStatus, errorThrown)
			{
				self.ajaxInProgress(false);
				console.log(errorThrown);
			}
		});

	}

}

var generateLoyaltyCodeViewModel = new GenerateLoyaltyCodeViewModel();

ko.applyBindings(generateLoyaltyCodeViewModel, document.getElementById('generateCodeForm'));