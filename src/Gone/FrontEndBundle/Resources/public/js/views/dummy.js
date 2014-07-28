var Dummy = Backbone.View.extend({
	el : "#main",

	className : "dummy",

	initialize: function() {
    	this.listenTo(this.model, "change", this.render);
  	},

  	render: function() {
  		console.log("HOLA EHEHE");
   	 	this.$el.html("HOLA MUNDO!");
   	}
});