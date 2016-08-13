(function(){
angular.module('jobFinder').directive('jobForm', function() {
  return {
    restrict: 'E',
    templateUrl: 'app/templates/companypage/sections/job-form.html'
  };
});
})();
