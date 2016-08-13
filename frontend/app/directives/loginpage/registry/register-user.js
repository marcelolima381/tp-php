(function(){
angular.module('jobFinder').directive('registerUser', function() {
  return {
    restrict: 'E',
    templateUrl: 'app/templates/loginpage/form-register-user.html'
  };
});
})();
