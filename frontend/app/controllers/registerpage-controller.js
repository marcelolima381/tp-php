(function(){
  angular.module("jobFinder").controller('registerpageController', ['$scope', '$location', '$http', function($scope, $location, $http) {
    $scope.go = function(path) {
      $location.path(path);
    };

    this.tab = 1;
    this.isSet = function(checkTab) {
      return this.tab === checkTab;
    };
    this.setTab = function(setTab) {
      this.tab = setTab;
    };

    //Controle do form pra empresa
    $scope.company = {};
    $scope.submitCompanyForm = function(isValid) {

  		// check to make sure the form is completely valid
  		if (isValid) {
            console.log(JSON.stringify($scope.company));
            $scope.companyJSON = JSON.stringify($scope.company);
            $http({method: 'POST', url: '/backend/public/index.php/register/company', data: $scope.companyJSON}).then(function successCallback(response) {
              if (typeof(Storage) !== "undefined") {
                // Guardando no storage local...
                localStorage.setItem("userID", null);
                localStorage.setItem("userID", response.data.id);
                // Debugando...
                console.log(localStorage.getItem("userID"));
                //Trocando de diretório
                $location.path('/company/profile');
              } else {
                alert("Seu navegador não suporta este website, desculpe.")
              }
            }, function errorCallback(response) {
              alert('ERROR! CALL THE JÃO!');
            });
  		}
  	};

    //Controle do form pra pessoa
    $scope.user = {};
    $scope.submitUserForm = function(isValid) {

  		// check to make sure the form is completely valid
  		if (isValid) {
            console.log(JSON.stringify($scope.user));
            $scope.userJSON = JSON.stringify($scope.user);
            $http({method: 'POST', url: '/backend/public/index.php/register/user', data: $scope.userJSON}).then(function successCallback(response) {
              if (typeof(Storage) !== "undefined") {
                // Guardando no storage local...
                // localStorage.setItem("userID", null);
                localStorage.setItem("userID", response.data.id);
                // Debugando...
                console.log(localStorage.getItem("userID"));
                //Trocando de diretório
                $location.path('/employee/profile');
              } else {
                alert("Seu navegador não suporta este website, desculpe.")
              }
            }, function errorCallback(response) {
              alert('ERROR! CALL THE JÃO!');
            });
  		}
  	};
  }]);
})();
