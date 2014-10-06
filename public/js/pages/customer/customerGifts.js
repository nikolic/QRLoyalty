console.log("customerGifts.js loaded.");

$(".qrl-scroller-panel").mCustomScrollbar();

var CustomerGiftsViewModel = function(giftsArray, companiesArray, loyaltyCodesArray){
	var self = this;
	self.validCodesPerCompanyObj = _.countBy(loyaltyCodesArray, "company_id");
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

	self.hasEnoughCodes = function(companyId, price){
		var codeCount = self.validCodesPerCompanyObj.hasOwnProperty(companyId) ? self.validCodesPerCompanyObj[companyId] : 0;
		return codeCount >= price;
	}
};

function extractOnlyValidCodes(allCodes){
	var filteredCodes = [];
	for(var i = 0; i < allCodes.length; i++)
	{
		if(allCodes[i].used == 0 && allCodes[i].deleted == 0 && allCodes[i].active == 1){
			filteredCodes.push(allCodes[i]);
		}
	}

	return filteredCodes;
}

var customerGiftsViewModel = new CustomerGiftsViewModel(SERVER_VALUE_GIFTS_JSON, SERVER_VALUE_COMPANIES_JSON, extractOnlyValidCodes(SERVER_VALUE_LOYALTY_CODES_JSON));
ko.applyBindings(customerGiftsViewModel);