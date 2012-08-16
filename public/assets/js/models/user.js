define([
  'backbone'
], function() {

    var aUser = Backbone.Model.extend({
        defaults : {
            authenticated: false,
            groups: null
        },
        url : function() {
            return '/user';
        }
    });

  return aUser;

});

//define(['jQuery', 'Underscore', 'Backbone'],
//function($, _, Backbone){
//    var UserSession = Backbone.View.extend({ ... });
//
//    return new UserSession();
//});