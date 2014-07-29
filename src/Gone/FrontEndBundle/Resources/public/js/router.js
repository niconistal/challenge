var Router = Backbone.Router.extend({

  dispatcher : null,

  routes : {
    "" : "home",
    "box/:id" : "box" ,
    "box/:box/product/:id" : "product"
  }

});
