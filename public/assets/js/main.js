requirejs.config({
    paths: {
        'jquery'    : 'libs/jquery-1.8.0',
        'underscore': 'libs/underscore',
        'backbone'  : 'libs/backbone',
        'text'      : 'libs/text',
        'json2'     : 'libs/json2',
        'bootstrap' : 'libs/bootstrap',
        'templates' : '../templates'
    },
    shim: {
        'backbone': {
            deps: ['json2','underscore', 'jquery'],
            exports: 'Backbone'
        },
        'bootstrap' : ['jquery']
    }
});


define(['backbone'], function () {
        Backbone.emulateJSON = true;
        require([
            'desktop_app'
        ], function(DesktopApp){

            DesktopApp.initialize();

        });
    }
);
