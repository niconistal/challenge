var BoxesView = Backbone.View.extend({
    el : "#main",
    render : function(){
        var that = this;
        this.collection.fetch({
            success : function(boxes){
                var context = {
                    boxes: boxes.toJSON()
                };
                var html = Handlebars.templates.BoxesTemplate(context);
                that.$el.html(html);
            }
        });
    }
});
