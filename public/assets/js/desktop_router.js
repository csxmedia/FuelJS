define([
    'backbone'
], function()
{
    var AppRouter = Backbone.Router.extend(
    {
        routes:
        {
            ""          : "home",
            "login"     : "login",
            "dashboard" : "dashboard"
        },
        home: function()
        {
            require(['views/desktop/home/main'], function(aView) {
                var myView = new aView({
                    'main_el': '#content_body',
                    'sidebar_el': '#content_sidebar',
                    'topbar_el': '#content_topbar'
                });
                myView.render();
            });
        },
        dashboard: function()
        {
            require(['views/desktop/dashboard/main'], function(aView) {
                var myView = new aView({
                    'main_el': '#content_body',
                    'sidebar_el': '#content_sidebar',
                    'topbar_el': '#content_topbar'
                });
                myView.render();
            });
        }
    });

    var initialize = function(){

        var router = new AppRouter;
        Backbone.history.start();
        return router;

    };
    return {
        initialize: initialize
    };
});
