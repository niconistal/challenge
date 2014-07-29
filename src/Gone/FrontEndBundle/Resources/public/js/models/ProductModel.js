var ProductModel = Backbone.Model.extend({

    box : null,

    url: null,

    initialize : function (options){
        this.box = options.box;
        this.url = "/boxes/"+this.box+"/products/"+this.id;

    }
});
