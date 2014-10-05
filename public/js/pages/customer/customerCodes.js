console.log("customerCodes.js script loaded.");
$(".qrl-scroller-panel").mCustomScrollbar();


var FILTERS = [{ key: "Svi kodovi", value: null }, { key: "Aktivni", value: 0 }, { key: "Iskorišćeni", value: 1 }];


var CustomerLoyaltyCodesViewModel = function(loyaltyCodesArray, filtersArray, companiesArray){
	var self = this;

	self.allCodes = loyaltyCodesArray;
	self.codes = ko.observableArray(loyaltyCodesArray);
	self.filters = ko.observableArray(filtersArray);
	self.selectedFilter = ko.observable(filtersArray[0]);
	self.companies = ko.observableArray(companiesArray);
	self.selectedCompany = ko.observable();

	self.generatePath = function(loyaltyCodeId){
		return SERVER_PATH_CODES + "/" + loyaltyCodeId + '.png';
	}

	self.filterByStatus = function(){
		self.selectedFilter(this);
		self._filter();
	}

	self.filterByCompany = function(){
		self._filter();
	}

	self._filter = function(){
		if(self.selectedFilter().value == null && self.selectedCompany() == undefined){
			self.codes(self.allCodes);
		}
		else{
			var filteredCodes = [];
			for(var i = 0; i < self.allCodes.length; i++)
			{
				if((self.selectedFilter().value == null || self.selectedFilter().value == self.allCodes[i].used) && ( self.selectedCompany() == undefined || self.selectedCompany().id == self.allCodes[i].company_id )){
					filteredCodes.push(self.allCodes[i]);
				}
			}
			self.codes(filteredCodes);
		}
	}

	self.countLoyaltyCodes = function(){
		return self.codes().length > 0 ? self.codes().length : 0;
	}
};

var customerLoyaltyCodesViewModel = new CustomerLoyaltyCodesViewModel(SERVER_VALUE_LOYALTY_CODES_JSON, FILTERS, SERVER_VALUE_COMPANIES_JSON);

ko.applyBindings(customerLoyaltyCodesViewModel);


