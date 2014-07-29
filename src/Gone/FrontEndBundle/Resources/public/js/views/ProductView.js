var ProductView = Backbone.View.extend({
    el : "#main",
    events : {
        'submit .product-form'     : 'updateName',
        'click .modal-trigger' : 'loadPicture',
        'click #add-picture-button' : 'createPicture',
        'submit .new-picture-form' : 'addPicture'
    },
    render : function(options){
        var that = this;
        if ( ( ! options.id )|| ( ! options.box)) {
            that.$el.html("<h2 style='text-align:center'>Box ID Undefined</h2>");
            return;
        }

        that.products = new ProductModel({box : options.box, id: options.id});
        that.pictures = new ImagesCollection({box : options.box, products: options.id});
        that.products.fetch({
            success : function(products){
                that.pictures.fetch({
                    success : function (pictures){
                        var context = {
                            products : products.toJSON(),
                            pictures : pictures.toJSON().map( function(picture) {
                                picture.added_date = 
                                    picture.added_date.replace('T',' ').split('+')[0];
                                return picture; 
                            })
                        }
                        console.log(products.toJSON());
                        var html = Handlebars.templates.ProductTemplate(context);
                        that.$el.html(html);
                    }
                });
                
            }
        });
    },
    updateName : function(ev){
        var newName = $(ev.currentTarget).find("input[name=name]").val();
        this.products.set("name", newName);
        this.products.save(this.products.attributes, {
            success: function (products) {
                router.navigate('/box/'+products.attributes.box.id, {trigger:true});
            }
        });
        return false;
    },
    loadPicture : function(ev){
        ev.preventDefault();
        this.$el.find(".picture-modal .modal-content img")
            .attr('src', $(ev.currentTarget).attr('rel'));
        this.$el.find(".picture-modal").modal('show');
        //$('#myModal').modal('toggle');
        return false;
    },
    createPicture : function(ev){
        ev.preventDefault();
        this.$el.find("#add-picture-modal").modal('show');
        return false;
    },
    addPicture : function(ev){
        ev.preventDefault();
        var newUrl = $(ev.currentTarget).find("input[name=url]").val();
        var context = {
            box : this.products.attributes.box.id,
            products :  this.products.attributes.id
        };
        var newPicture = new PictureModel(context);
        newPicture.set("url",newUrl);
        var that = this;
        newPicture.save(newPicture.attributes, {
            success: function(){
                that.$el.find("#add-picture-modal").modal('hide');
                that.render({id : that.products.attributes.id, box : that.products.attributes.box.id});

            },
            error: function (a, b){
                debugger;
                console.log("hubo un error por aqui...");
            }
        });

    }
});