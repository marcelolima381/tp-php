(function(){
  angular.module("jobFinder").controller('employeeController', ['$scope', '$location', '$http', function($scope, $location, $http) {
      // Definindo objeto que armazena as informações do usuário
      $scope.user = {};
      // GET dados do usuário
      $http({
        method: 'GET',
        url: '/backend/public/index.php/user/' + localStorage.getItem("userID")
      }).then(function successCallback(response) {
          // Todo o conteúdo do usuário é preenchido
          console.log("preenchendo dados do usuário...");
          $scope.user.name = response.data.name;
          $scope.user.profiletext = response.data.text;
          $scope.user.skills = response.data.skills;
          $scope.user.languages = response.data.languages;
          $scope.user.contributions = response.data.contributions;
          $scope.user.graduation = response.data.graduation;
          $scope.user.experience = response.data.experience;
          $scope.user.phone = response.data.telephone;
          $scope.user.birthD = response.data.birthD;
          $scope.user.email = response.data.email;

        }, function errorCallback(response) {
          alert('ERROR! CALL THE JÃO!');
        });
      $scope.$on('$viewContentLoaded', function () {
        //   Scripts
        $('head').append('<script src="js/scrollreveal.min.js"></script>');
        $('head').append('<script src="js/jquery.easing.min.js"></script>');
        $('head').append('<script src="js/jquery.fittext.js"></script>');
        $('head').append('<script src="js/jquery.magnific-popup.min.js"></script>');
        $('head').append('<script src="js/creative.js"></script>');
        $('head').append('<script src="jasny-bootstrap/js/jasny-bootstrap.js"></script>');
        $('head').append('<script src="js/jqueryManipulation/manipulator.js"></script>');
      });
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



  }]);
})();
