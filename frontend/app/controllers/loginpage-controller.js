(function(){
  angular.module("jobFinder").controller('loginpageController', ['$scope', '$location', '$http', function($scope, $location, $http) {
    $scope.go = function(path) {
      $location.path(path);
    };

    $scope.login = {};

    $scope.submitLoginForm = function(isValid) {
        if (isValid) {
            console.log(JSON.stringify($scope.login));
            $scope.loginJSON = JSON.stringify($scope.login);
            $http({method: 'POST', url: '/backend/public/index.php/login', data: $scope.loginJSON}).then(function successCallback(response) {
              if (typeof(Storage) !== "undefined") {
                // Guardando no storage local...
                localStorage.setItem("userID", null);
                localStorage.setItem("userID", response.data.id);
                // Debugando...
                console.log(localStorage.getItem("userID"));
                // Definindo rota por tipo de login
                if(response.data.type == "user") {
                    console.log("1");
                    $location.path('/employee/profile');
                }
                else if(response.data.type == "company") {
                    console.log("2");
                    $location.path('/company/profile');
                }
                else {
                    alert('ERROR! CALL THE JÃO!');
                }
              } else {
                alert("Seu navegador não suporta este website, desculpe.")
              }
            }, function errorCallback(response) {
              alert('LOGIN E SENHA INVÁLIDOS');
            });
  		}
    };
  }]);
})();
