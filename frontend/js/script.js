// create the module and name it brworkApp
var brworkApp = angular.module("brworkApp", ["ngRoute"]);

// configure our routes
brworkApp.config(function($routeProvider) {
	$routeProvider.when("/", {
		templateUrl : "templates/home.html",
		controller  : "mainController",
	})
	.when("/login", {
		templateUrl : "templates/login.html",
		controller  : "mainController",
	})

	// route for the skills page
	.otherwise(
		{
			redirectTo: "/"
		}
	);
});
// create the controller and inject Angular"s $scope
brworkApp.controller("mainController", function($scope) {

		});
