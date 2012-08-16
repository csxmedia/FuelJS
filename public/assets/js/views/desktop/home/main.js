define([
    'text!templates/desktop/home/main.html',
    'text!templates/desktop/home/sidebar.html',
    'text!templates/desktop/home/topbar.html',
    'backbone'
], function(aTemplate, aSidebar, aTopbar)
{
    var aView = Backbone.View.extend({
        //tagName    : "div",
        template   : _.template(aTemplate),
        render: function(){
            $(this.options.main_el).html(this.template());
            $(this.options.sidebar_el).html(_.template(aSidebar));
            $(this.options.topbar_el).html(_.template(aTopbar));
        }
    });
    return aView;
});
