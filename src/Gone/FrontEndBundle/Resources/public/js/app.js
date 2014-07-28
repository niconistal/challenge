var boxCollection = new BoxCollection;
var boxesView = new BoxesView({collection : boxCollection});
var router = new Router;

router.on("route:home",function(){
	boxesView.render();
});

Backbone.history.start();