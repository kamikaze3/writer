(function() {
	
    'use strict';

	var app = angular.module('writer.controllers', [
		'writer.services'
	]);

	app.controller('ApplicationController', ['$scope', function($scope) {
		$scope.textAreaModel = "stuff";

	}]);

})();