(function() {
	
    'use strict';

	var app = angular.module('writer.controllers', [
		'writer.services',
		'LocalStorageModule'
	]);

	app.controller('ApplicationController', function($scope, localStorageService) {
		localStorageService.bind($scope, 'textAreaModel');
	});

})();