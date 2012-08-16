define([
    'desktop_router',
    'views/session',
    'backbone'
], function(DesktopRouter, Session){

    var initialize = function() {
        // start the session
        window.app_session = new Session();

    };

    return {
        initialize: initialize
    };
});
