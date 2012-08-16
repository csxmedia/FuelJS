define([
    'models/user',
    'desktop_router',
    'backbone'
], function(UserModel, DesktopRouter)
{
    var Session = Backbone.View.extend({
        initialize: function() {
            this.login();
        },
        logout: function() {
            this.model = new UserModel;
            window.location = "/logout";
        },
        authenticated: function() {
            if(this.model) {
                return Boolean(this.model.get('authenticated'));
            }
            return false;
        },
        login: function() {
            this.model = new UserModel;
            this.model.fetch({
                error: function(model, response) {
                    console.log("error, response: " + response);
                    alert('failed to fetch user, (' + response.status+ ')' +response.statusText + ': response: ' + response.responseText);
                },
                success: function(model, response) {
                    //console.log('loaded user model:' + model);

                    if(Boolean(model.get('authenticated')) == true) {
                        //user is logged in, we dont need to do anything yet, callback is in complete()
                    } else {
                        // user is not logged in, redirect to login page
                        window.location = "/login";
                    }
                }
            }).complete(function() {
                    // deferred ajax callback, lets now init our router
                    if (typeof window.app_router === 'undefined') {
                        // variable is undefined, lets start the router
                        window.app_router = DesktopRouter.initialize();
                    }

            });
        },
        groups: function() {
            return this.model.get('groups');
        }

    });

    return Session;
});
