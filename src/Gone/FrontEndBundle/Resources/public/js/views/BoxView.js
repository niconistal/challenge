var BoxView = Backbone.View.extend({
    el : "#main",
    events : {
        'click .change-status': 'changeStatus',
        'submit .box-form'     : 'updateOffer'
    },
    render : function(options){
        var that = this;
        if (!options.id) {
            that.$el.html("<h2 style='text-align:center'>Box ID Undefined</h2>");
            return;
        }

        that.box = new BoxModel({id: options.id});
        that.products = new ProductsCollection({box : options.id});
        that.box.fetch({
            success : function(box){
                that.products.fetch({
                    success : function (products){
                        var context = {
                            box : box.toJSON(),
                            products : products.toJSON(),
                            nextStatus : box.nextStatus(),
                            offerLocked : box.offerLocked()
                        }
                        var html = Handlebars.templates.BoxTemplate(context);
                        that.$el.html(html);
                        that.$el.find(".widget-area").LogWidget({logs :box.attributes.log });
                    }
                });
                
            }
        });
    },
    changeStatus : function(){
        console.log("saving...");
        this.box.set("status", this.box.nextStatus());    
        this.box.save(this.box.attributes, {
            success: function (box) {
                router.navigate('', {trigger:true});
            }
        });
        return false;
    },
    updateOffer : function(ev){
        var newOffer = $(ev.currentTarget).find("input[name=offer]").val();
        this.box.set("offer", newOffer);
        this.box.save(this.box.attributes, {
            success: function (box) {
                router.navigate('', {trigger:true});
            }
        });
        return false;
    }
});