var ImagesCollection = Backbone.Collection.extend({
	
	box : null,

	url: null,

	initialize : function (options){
		this.box = options.box;
		this.products = options.products; 
		this.url = "/boxes/"+this.box+"/products/"+this.products+"/images";

	}
});
