(function() {
	
    'use strict';

	var app = angular.module('writer', [
		'ngRoute',
		'writer.controllers'
	]);

	app.config(function ($routeProvider) {
		$routeProvider
            .when('/', {controller: 'ApplicationController', templateUrl: '/templates/index.html'})
            .otherwise({redirectTo : '/'});
    });
	
})();