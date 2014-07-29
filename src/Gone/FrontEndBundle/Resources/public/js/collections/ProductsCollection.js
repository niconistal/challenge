var ProductsCollection = Backbone.Collection.extend({
	
	box : null,

	url: null,

	model : ProductModel,

	initialize : function (options){
		this.box = options.box;
		this.url = "/boxes/"+this.box+"/products";

	}
});
