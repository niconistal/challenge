var dummyModel = new DummyModel;
var dummy = new Dummy({model: dummyModel});
var router = new Router;

router.on("route:home",function(){
	dummyModel.set({a: 5});
});

Backbone.history.start();