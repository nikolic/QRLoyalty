console.log("codes.js script loaded.")

$(".qrl-scroller-panel").mCustomScrollbar();

var LoyaltyCode = function(id, status, name, email, created){
	this.id = id;
	this.status = status;
	this.ownerName = name;
	this.ownerEmail = email;
	this.created = created;
	this.ownerDetails = function(){
		return this.ownerName + ' (' + this.ownerEmail + ')';
	}
	this.codeImgPath = function(){
		return SERVER_PATH_CODES + '/' + this.id + '.png';
	}
}

var MappingHelper = function(){
	var self = this;

	self.mapRawData = function(loyaltyCodesRaw) {
		var loyaltyCodes = [];
		var tmpCode = null;
		for(var i = 0; i < loyaltyCodesRaw.length; i++){
			tmpCode = loyaltyCodesRaw[i];
			loyaltyCodes.push(new LoyaltyCode(tmpCode.id, tmpCode.used == 0, tmpCode.user.full_name, tmpCode.user.email, tmpCode.created_at));
		}

		return loyaltyCodes;
	}
}

var FILTERS = [{ key: "Svi kodovi", value: null }, { key: "Aktivni kodovi", value: true }, { key: "Iskorišćeni kodovi", value: false }];

var CodesViewModel = function(codesArray, filtersArray){
	var self = this;
	self.allCodes = codesArray;
	self.codes = ko.observableArray(codesArray);
	self.filters = ko.observableArray(filtersArray);
	self.selectedFilter = ko.observable(filtersArray[0]);

	self.filterByStatus = function(){
		console.log(this);
		self.selectedFilter(this);

		if(this.value == null){
			self.codes(self.allCodes);
		}
		else{
			var filteredCodes = [];
			for(var i = 0; i < self.allCodes.length; i++)
			{
				if(self.selectedFilter().value == self.allCodes[i].status){
					filteredCodes.push(self.allCodes[i]);
				}
			}
			self.codes(filteredCodes);
		}
	}
};

var codesViewModel = new CodesViewModel(new MappingHelper().mapRawData(SERVER_VALUE_LOYALTY_CODES_JSON), FILTERS);
ko.applyBindings(codesViewModel);