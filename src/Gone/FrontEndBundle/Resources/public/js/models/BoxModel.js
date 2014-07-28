var BoxModel = Backbone.Model.extend({
	
	urlRoot : "/boxes",
	boxStatus : ['New', 'Accepted', 'To schedule pickup', 'Pickup scheduled', 'In transit', 'Received' ],
	nextStatus : function(){
		var statusIndex = this.boxStatus.indexOf(this.attributes.status);
		if ( ( statusIndex == this.boxStatus.length - 1 ) || ( statusIndex == -1 ) ){
			return null;
		}
		return this.boxStatus[statusIndex + 1];
	},
	offerLocked : function(){
		var indexOfAccepted = this.boxStatus.indexOf("Accepted");
		var statusIndex = this.boxStatus.indexOf(this.attributes.status);
		return ( (statusIndex >= indexOfAccepted) || (statusIndex == -1) )
	}
});