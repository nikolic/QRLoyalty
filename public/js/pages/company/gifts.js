console.log("Gifts.js loaded.")

$(".qrl-scroller-panel").mCustomScrollbar();

var GiftsViewModel = function(giftsArray) {
	var self = this;
	self.ajaxInProgress = ko.observable(false);
	self.name = ko.observable('').extend({required: true, name: true});
	self.price = ko.observable(1).extend({required: true,  min: 1, max: 15});
	self.gifts = ko.observableArray(giftsArray);


	self.isValidNewGift = ko.computed(function(){
		return self.name.isValid() && self.price.isValid();
	});

	self.createGift = function(){
		if(!self.isValidNewGift()){
			return false;
		}
		var jsonData = { name: self.name(), price: self.price()};
		self.ajaxInProgress(true);
		$.ajax({
			url : SERVER_PATH_GIFT_CREATE,
			type: "POST",
			data: jsonData, 
			dataType: "json", 
			success: function(data, textStatus, jqXHR){
				console.log(data);
				self.ajaxInProgress(false);
				if(data.success){
					console.log("success <->")
					self.gifts(data.gifts);
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
}

var giftViewModel = new GiftsViewModel(SERVER_PATH_GIFTS_JSON);
ko.applyBindings(giftViewModel);