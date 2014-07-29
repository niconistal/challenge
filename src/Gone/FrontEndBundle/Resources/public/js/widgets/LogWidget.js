var LogWidget = Backbone.Widget.extend({

	logs : null,
	
	initialize: function(options) {
    	this.logs = options.logs;
    	var context = {
            logs : this.logs.map( function(logs) {
                logs.date = 
                    logs.date.replace('T',' ').split('+')[0];
                return logs; 
            })
        }
    	var html = Handlebars.templates.LogWidgetTemplate(context);
    	this.$el.html(html)
  	}

});

LogWidget.exportWidget('LogWidget');
