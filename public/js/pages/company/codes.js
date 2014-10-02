console.log("codes.js script loaded.")

$(".qrl-scroller-panel").mCustomScrollbar();

var LoyaltyCode = function(id, status, name, email, created){
	this.id = id;
	this.status = status;
	this.ownerName = name;
	this.ownerEmail = email;
	this.created = created;
	this.ownerDetails = function(){
		return this.ownerName + '(' + this.ownerEmail + ')';
	}
	this.codeImgPath = function(){
		return SERVER_PATH_CODES + '/' + this.id + '.png';
	}
}

//TEST DATA 
var l1 = new LoyaltyCode(1, true, "Marko Nikolic", "nikolic89@hotmail.com", "21.1.2014");
var l2 = new LoyaltyCode(2, false, "Milan Nikolic", "nikolic89@hotmail.com", "3.2.2014");
var l3 = new LoyaltyCode(3, true, "Jovan Nikolic", "branko89@hotmail.com", "1.2.2014");
var l4 = new LoyaltyCode(4, false, "Milentije Nikolic", "nikolic89@hotmail.com", "21.2.2014");
var l5 = new LoyaltyCode(5, true, "Branko Nikolic", "nikolic89@hotmail.com", "12.2.2014");
var l6 = new LoyaltyCode(6, true, "Darko Nikolic", "nikolic89@hotmail.com", "4.2.2014");

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

var codesViewModel = new CodesViewModel([l1,l2,l3,l4,l5,l6], FILTERS);

ko.applyBindings(codesViewModel);