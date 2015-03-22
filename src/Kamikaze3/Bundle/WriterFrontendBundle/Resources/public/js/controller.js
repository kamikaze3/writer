(function() {
	
    'use strict';

	var app = angular.module('writer.controllers', [
		'writer.services',
		'LocalStorageModule'
	]);

	app.controller('ApplicationController', function($scope, localStorageService) {
		localStorageService.bind($scope, 'textAreaModel');
	});

	app.directive('editor', function() {
		return {
			restrict: 'E',

			template: '<textarea ng-model="data" autofocus="true"></textarea><div>{{data}}</div>',

			scope: {
				data: '=info'
			}
		}
	})

})();