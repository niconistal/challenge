var boxCollection = new BoxCollection;

var boxesView = new BoxesView({collection : boxCollection});
var boxView = new BoxView({model : BoxModel});
var router = new Router;

router.on("route:home",function(){
	boxesView.render();
});
router.on("route:box",function(id){
	boxView.render({id : id});
});

Backbone.history.start();