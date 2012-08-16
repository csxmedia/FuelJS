define([
    'text!templates/desktop/dashboard/main.html',
    'text!templates/desktop/dashboard/sidebar.html',
    'text!templates/desktop/dashboard/topbar.html',
    'backbone'
], function(aTemplate, aSidebar, aTopbar)
{
    var aView = Backbone.View.extend({
        render: function(){
            $(this.options.main_el).html(_.template(aTemplate));
            $(this.options.sidebar_el).html(_.template(aSidebar));
            $(this.options.topbar_el).html(_.template(aTopbar));
        }
    });
    return aView;
});
