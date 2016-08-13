(function(){
  angular.module("jobFinder").controller('homepageController', ['$scope', '$location', function($scope, $location) {
      $scope.$on('$viewContentLoaded', function () {
        $('head').append('<script src="js/scrollreveal.min.js"></script>');
        $('head').append('<script src="js/jquery.easing.min.js"></script>');
        $('head').append('<script src="js/jquery.fittext.js"></script>');
        $('head').append('<script src="js/jquery.magnific-popup.min.js"></script>');
        $('head').append('<script src="js/creative.js"></script>');
      });
      $scope.go = function(path) {
        $location.path(path);
      };

  }]);
})();
