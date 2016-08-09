(function(){
angular.module('jobFinder').directive('job', function() {
  return {
    restrict: 'E',
    templateUrl: 'app/templates/companypage/sections/job.html'
  };
});
})();
