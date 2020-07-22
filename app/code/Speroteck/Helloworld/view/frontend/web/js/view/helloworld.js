define([
    'jquery',
    'ko',
    'uiComponent'
], function ($, ko, Component) {
    'use strict';

    //var helloworld = "";

    return Component.extend({

        defaults: {
            template: 'Speroteck_Helloworld/helloworld'
        },

        initialize: function () {

            this._super();
            this.helloworld = "Welcome to Speroteck HelloWorld page! :)";

        }

        // helloworld: function(){
        //     helloworld = ko.observable("Welcome to Speroteck HelloWorld page! :)");
        //     return helloworld;
        // }

    });

});