// create the module and name it brworkApp
var brworkApp = angular.module("brworkApp", ["ngRoute"]);

// configure our routes
brworkApp.config(function($routeProvider) {
	$routeProvider.when("/", {
		templateUrl : "templates/home.html",
		controller  : "mainController",
		controllerAs: "mc"

	})
	.when("/login", {
		templateUrl : "templates/login.html",
		controller  : "mainController",
		controllerAs: "mc"
	})
	.when("/lg", {
		templateUrl : "templates/listagem.html",
		controller  : "mainController",
	})
	.when("/av", {
		templateUrl : "templates/add-vaga.html",
		controller  : "mainController",
	})
	.when("/ov", {
		templateUrl : "templates/overview-vaga.html",
		controller  : "mainController",
	})
	.when("/ou", {
		templateUrl : "templates/overview-usuario.html",
		controller  : "mainController",
	})
	.when("/oe", {
		templateUrl : "templates/overview-empresa.html",
		controller  : "mainController",
	})
	.when("/cu", {
		templateUrl : "templates/cadastro-user.html",
		controller  : "mainController",
	})
	.when("/cv", {
		templateUrl : "templates/cadastro-vaga.html",
		controller  : "mc",
	})
	.when("/ce", {
		templateUrl : "templates/cadastro-empresa.html",
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
