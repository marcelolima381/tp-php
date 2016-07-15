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
	.when("/cv", {
		templateUrl : "templates/cadastro-vaga.html",
		controller  : "mc",
	})
	.when("/add", {
		templateUrl : "templates/cadastro.html",
		controller  : "mainController",
	})
	.when("/addcomp", {
		templateUrl : "templates/cadastro-empresa.html",
		controller  : "mainController",
	})
	.when("/adduser", {
		templateUrl : "templates/cadastro-user.html",
		controller  : "mainController",
	})
	// route for the skills page
	.otherwise(
		{
			redirectTo: "/"
		}
	);
});
/**
 * Serviço para manipulação dos objetos do serviço
 */
brworkApp.factory('Service', function($http) {
  var service = {};

  /**
   *  Função para tratar GET no serviço
   */
  service.get = function(url, callback) {
    $http.get(url).then(function(response) {
      var answer = response.data;
      callback(answer);
    });
  };


  /**
   *  Função para tratar POST no serviço
   */
  service.post = function(url, data, callback) {
    $http.post(url, data).then(function(response) {
      var answer = response.data;
      callback(answer);
    });
  };
  /**
   *  Função para tratar POST no serviço
   */
  service.delete = function(url, data, callback) {
    $http.delete(url).then(function(response) {
      var answer = response.data;
    });
  };

  return service;
});



// create the controller and inject Angular"s $scope
brworkApp.controller("mainController", function($scope) {

this.a = 0;


});
brworkApp.controller("menuController", function($scope) {
var self = this;


	self.links = [{}];

	self.links [0] = {
		name : "Cadastro",
		link : "add"
	}
	self.links [1] = {
		name : "Login",
		link : "login"
	}

});
