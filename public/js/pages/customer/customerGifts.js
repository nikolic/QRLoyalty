console.log("customerGifts.js loaded.");

$(".qrl-scroller-panel").mCustomScrollbar();

var CustomerGiftsViewModel = function(giftsArray, companiesArray){
	var self = this;

	self.allGifts = giftsArray;
	self.gifts = ko.observableArray(giftsArray);
	self.companies = ko.observableArray(companiesArray);
	self.selectedCompany = ko.observable();

	self.filterByCompany = function(){
		console.log(self.selectedCompany());

		if(self.selectedCompany() == undefined){
			self.gifts(self.allGifts);
		}
		else{
			var filteredGifts = [];
			for(var i = 0; i < self.allGifts.length; i++){
				if(self.selectedCompany().id == self.allGifts[i].company_id){
					filteredGifts.push(self.allGifts[i]);
				}
			}

			self.gifts(filteredGifts);
		}
	}

};

var customerGiftsViewModel = new CustomerGiftsViewModel(SERVER_VALUE_GIFTS_JSON, SERVER_VALUE_COMPANIES_JSON);
ko.applyBindings(customerGiftsViewModel);