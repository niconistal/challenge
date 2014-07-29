var LogWidget = Backbone.Widget.extend({

	logs : null,
	
	initialize: function(options) {
    	this.logs = options.logs;
    	console.log("initialize called");
  	},

  	render : function(){
  		console.log("render called");
  	}

});

LogWidget.exportWidget('LogWidget');