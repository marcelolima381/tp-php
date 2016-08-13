(function(){
  angular.module("jobFinder").controller('employeeVisitController', ['$scope', '$location', '$http', function($scope, $location, $http) {
      // Definindo objeto que armazena as informações do usuário
      $scope.user = {};
      $scope.user.skills = [];
      $scope.user.languages = [];
      $scope.user.contributions = [];
      $scope.user.graduation = [];
      $scope.user.experience = [];
      // GET dados do usuário
      $http({
        method: 'GET',
        url: '/backend/public/index.php/user/' + localStorage.getItem("visitUserID")
      }).then(function successCallback(response) {
          // Todo o conteúdo do usuário é preenchido
          console.log("preenchendo dados do usuário...");
          $scope.user.name = response.data.name;
          $scope.user.text = response.data.text;
          $scope.user.skills = response.data.skills;
          $scope.user.languages = response.data.languages;
          $scope.user.contributions = response.data.contributions;
          $scope.user.graduation = response.data.graduation;
          $scope.user.experience = response.data.experience;
          $scope.user.telephone = response.data.telephone;
          $scope.user.birthD = response.data.birthD;
          $scope.user.email = response.data.email;

        }, function errorCallback(response) {
          alert('ERROR! CALL THE JÃO!');
        });
      // Scripts
      $scope.$on('$viewContentLoaded', function () {
        $('head').append('<script src="js/scrollreveal.min.js"></script>');
        $('head').append('<script src="js/jquery.easing.min.js"></script>');
        $('head').append('<script src="js/jquery.fittext.js"></script>');
        $('head').append('<script src="js/jquery.magnific-popup.min.js"></script>');
        $('head').append('<script src="js/creative.js"></script>');
        $('head').append('<script src="jasny-bootstrap/js/jasny-bootstrap.js"></script>');

      });
      // Go
      $scope.go = function(path) {
        $location.path(path);
      };
    



  }]);
})();
