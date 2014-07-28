var Router = Backbone.Router.extend({

  dispatcher : null,

  routes : {
    "" : "home",
    "box/:id" : "box" 
  }

});
