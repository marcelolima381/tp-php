(function(){
  angular.module("jobFinder").controller('companyController', ['$scope', '$location', '$http', function($scope, $location, $http) {
      $scope.$on('$viewContentLoaded', function () {
        //   Scripts
        $('head').append('<script src="js/scrollreveal.min.js"></script>');
        $('head').append('<script src="js/jquery.easing.min.js"></script>');
        $('head').append('<script src="js/jquery.fittext.js"></script>');
        $('head').append('<script src="js/jquery.magnific-popup.min.js"></script>');
        $('head').append('<script src="js/creative.js"></script>');
        $('head').append('<script src="jasny-bootstrap/js/jasny-bootstrap.js"></script>');
        $('head').append('<script src="js/jqueryManipulation/manipulator.js"></script>');
        // Definindo objeto que armazena as informações do usuário
        $scope.user = {};
        // GET dados do usuário
        $http({
          method: 'GET',
          url: '/backend/rota/' + localStorage.getItem("userID") + '.json'
        }).then(function successCallback(response) {
            // Todo o conteúdo do usuário é preenchido
            console.log("preenchendo dados do usuário...");

          }, function errorCallback(response) {
            alert('ERROR! CALL THE JÃO!');
          });
      });
      $scope.go = function(path) {
        $location.path(path);
      };



  }]);
})();
