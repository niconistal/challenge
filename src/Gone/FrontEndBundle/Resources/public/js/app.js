var boxCollection = new BoxCollection;
var boxesView = new BoxesView({collection : boxCollection});
var boxView = new BoxView({model : BoxModel});
var productView = new ProductView({model : ProductModel})
var router = new Router;


router.on("route:home",function(){
	boxesView.render();
});
router.on("route:box",function(id){
	boxView.render({id : id});
});
router.on("route:product",function(box,id){
	productView.render({box : box, id : id});
});
Backbone.history.start();