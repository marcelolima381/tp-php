(function(){
  angular.module("jobFinder").controller('companyVisitController', ['$scope', '$location', '$http', function($scope, $location, $http) {
    // Definindo objeto que armazena as informações do usuário
    $scope.company = {};
    $scope.company.jobs = [];
    $scope.company.areas = [];
    // Adiciona texto principal
    // this.profileText;
    // this.addProfileText = function(){
    //   $scope.company.profiletext = this.profileText;
    //   this.profileText = null;
    //   console.log($scope.company.profiletext);
    // };
    // Adiciona trabalho
    // this.job = {};
    // this.addJob = function(){
    //   this.job.companyId = localStorage.getItem("userID");
    //   $http({method: 'POST', url: '/backend/public/index.php/register/job', data: this.job}).then(function successCallback(response) {
    //     console.log("job upado");
    //   }, function errorCallback(response) {
    //     alert('ERROR! CALL THE JÃO!');
    //   });
    //   $scope.company.jobs.push(this.job);
    //   this.job = {};
    //   console.log($scope.company.jobs);
    // };
    // Adiciona área de atuação
    // this.area = {};
    // this.addArea = function(){
    //   $scope.company.areas.push(this.area);
    //   this.area = {};
    //   console.log($scope.company.areas);
    // };
    // Adiciona informações pessoais
    // this.personal = {};
    // this.addPersonal = function(){
    //   $scope.company.phone = this.personal.phone;
    //   $scope.company.location = this.personal.location;
    //   this.personal = {};
    //   console.log($scope.company.phone);
    //   console.log($scope.company.location);
    // };
      // Scripts
      $scope.$on('$viewContentLoaded', function () {
        $('head').append('<script src="js/scrollreveal.min.js"></script>');
        $('head').append('<script src="js/jquery.easing.min.js"></script>');
        $('head').append('<script src="js/jquery.fittext.js"></script>');
        $('head').append('<script src="js/jquery.magnific-popup.min.js"></script>');
        $('head').append('<script src="js/creative.js"></script>');
        $('head').append('<script src="jasny-bootstrap/js/jasny-bootstrap.js"></script>');
        $("button#interest").attr('disabled', 'true');

        // GET dados do usuário
        $http({
          method: 'GET',
          url: '/backend/public/index.php/company/' + localStorage.getItem("userID")
        }).then(function successCallback(response) {
            // Todo o conteúdo do usuário é preenchido
            console.log("preenchendo dados do usuário...");
            $scope.company.name = response.data.name;
            $scope.company.profiletext = response.data.text;
            // $scope.company.jobs = response.data.jobs;
            console.log(response.data.jobs.length);
            for (var i = 0; i < response.data.jobs.length; i++) {
                $http({
                  method: 'GET',
                  url: '/backend/public/index.php/job/' + response.data.jobs[i]
                }).then(function successCallback(response) {
                    $scope.company.jobs[i] = response.data;
                  }, function errorCallback(response) {
                    alert('ERROR! CALL THE JÃO!');
                  });
            }
            $scope.company.areas = response.data.areas;
            $scope.company.phone = response.data.phone;
            $scope.company.email = response.data.email;
            $scope.company.location = response.data.location;
          }, function errorCallback(response) {
            alert('ERROR! CALL THE JÃO!');
          });
      });
      // Go
      $scope.go = function(path) {
        $location.path(path);
      };
      $scope.addInterest(selectedJob) = function() {
        $http({method: 'POST', url: '/backend/rota', data: localStorage.getItem("userID")}).then(function successCallback(response) {
          alert("Você acabou de manifestar interesse nessa vaga de emprego!");
          selectedJob.interests.push(response.data);
        }, function errorCallback(response) {
          alert('ERROR! CALL THE JÃO!');
        });

      }
      // Tabs
    //   this.tab = 1;
    //   this.isSet = function(checkTab) {
    //     return this.tab === checkTab;
    //   };
    //   this.setTab = function(setTab) {
    //     this.tab = setTab;
    //   };
    //   $scope.update = function() {
    //     $scope.company.id = parseInt(localStorage.getItem("userID"));
    //     $http({method: 'POST', url: '/backend/public/index.php/alter/company', data: $scope.company}).then(function successCallback(response) {
    //       alert("Atualizado com sucesso!");
    //     }, function errorCallback(response) {
    //       alert('ERROR! CALL THE JÃO!');
    //     });
    //   }



  }]);
})();
