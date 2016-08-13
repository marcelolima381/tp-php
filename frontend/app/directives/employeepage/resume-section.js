(function(){
angular.module('jobFinder').directive('resumeSection', function() {
  return {
    restrict: 'E',
    templateUrl: 'app/templates/employeepage/sections/resume-section.html'
  };
});
})();
