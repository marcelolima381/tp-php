var app = angular.module("brworks", ["ngRoute"]);
var hostAddress = '/backend/public/';

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider.when("/", {
        templateUrl: "templates/home.html",
        controller: "mainController",
        controllerAs: "mc"

    })
            .when("/login", {
                templateUrl: "templates/login.html",
                controller: "mainController",
                controllerAs: "mc"
            })
            .when("/lg", {
                templateUrl: "templates/listagem.html",
                controller: "mainController",
            })
            .when("/ov", {
                templateUrl: "templates/overview-vaga.html",
                controller: "mainController",
            })
            .when("/ou", {
                templateUrl: "templates/overview-usuario.html",
                controller: "mainController",
            })
            .when("/oe", {
                templateUrl: "templates/overview-empresa.html",
                controller: "mainController",
            })
            .when("/addvaga", {
                templateUrl: "templates/cadastro-vaga.html",
                controller: "mc",
            })
            .when("/addemp", {
                templateUrl: "templates/cadastro-empresa.html",
                controller: "mainController",
            })
            .when("/adduser", {
                templateUrl: "templates/cadastro-user.html",
                controller: "userCadastroController",
            })
            // route for the skills page
            .otherwise(
                    {
                        redirectTo: "/"
                    }
            );
}]);

/**
* Serviço para manipulação dos objetos do serviço
*/
app.factory('Service', function($http) {
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

  return service;
});



app.controller("mainController", function ($scope) {
    this.a = 0;
});

app.controller("menuController", function ($scope) {
    var self = this;


    self.links = [{}];

    self.links [0] = {
        name: "Cadastro",
        link: "add"
    };
    self.links [1] = {
        name: "Login",
        link: "login"
    };

});

app.controller('userCadastroController', ['$sce', '$scope', '$location', 'Service', function ($sce, $scope, $location, service) {
    var self = this;

    service.get(hostAddress + '/user/available', function (answer) {
        $scope.id = answer;
    });

    $scope.newUser = function (user) {
        if (user.senha != user.senhaConfirm) {
            alert("Senhas não batem!");
            return;
        }
        service.post(hostAddress + '/register/u', user, function (answer) {
            if (answer.id !== null)
                alert("Cadastrado com sucesso");
            else
                alert("Erro!");
        });
    }

}]);
