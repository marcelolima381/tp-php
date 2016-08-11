(function(){
  angular.module("jobFinder").controller('employeeController', ['$scope', '$location', '$http', function($scope, $location, $http) {
      // Definindo objeto que armazena as informações do usuário
      $scope.user = {};
      $scope.user.skills = [];
      $scope.user.languages = [];
      $scope.user.contributions = [];
      $scope.user.graduation = [];
      $scope.user.experience = [];
      // Adiciona texto principal
      this.profileText;
      this.addProfileText = function(){
        $scope.user.profiletext = this.profileText;
        this.profileText = null;
        console.log($scope.user.profiletext);
      };
      // Adiciona habilidade
      this.skill = {};
      this.addSkill = function(){
          $scope.user.skills.push(this.skill);
          this.skill = {};
          console.log($scope.user.skills);
      };
      // Adiciona língua
      this.language = {};
      this.addLanguage = function(){
          $scope.user.languages.push(this.language);
          this.language = {};
          console.log($scope.user.languages);
      };
      // Adiciona contribuição
      this.contribution;
      this.addContribution = function(){
          $scope.user.contributions.push(this.contribution);
          this.contribution = null;
          console.log($scope.user.contributions);
      };
      // Adiciona graduação
      this.graduation = {};
      this.addGraduation = function(){
          $scope.user.graduation.push(this.graduation);
          this.graduation = {};
          console.log($scope.user.graduation);
      };
      // Adiciona experiência profissional
      this.experience = {};
      this.addExperience = function(){
          $scope.user.experience.push(this.experience);
          this.experience = {};
          console.log($scope.user.experience);
      };
      // Adiciona informações pessoais
      this.personal = {};
      this.addPersonal = function(){
        $scope.user.phone = this.personal.phone;
        $scope.user.birthD = this.personal.birthD;
        this.personal = {};
        console.log($scope.user.phone);
        console.log($scope.user.birthD);
      };
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
      // Tabs
      this.tab = 1;
      this.isSet = function(checkTab) {
        return this.tab === checkTab;
      };
      this.setTab = function(setTab) {
        this.tab = setTab;
      };
      $scope.update = function() {
        $http({method: 'POST', url: '/backend/rota', data: $scope.user}).then(function successCallback(response) {
          alert("Atualizado com sucesso!");
        }, function errorCallback(response) {
          alert('ERROR! CALL THE JÃO!');
        });
      }
      $scope.searchdata;
      $scope.search = function() {
          $http({method: 'POST', url: '/backend/rota', data: $scope.searchdata}).then(function successCallback(response) {
            $location.path('/search');
          }, function errorCallback(response) {
            alert('ERROR! CALL THE JÃO!');
          });
      }



  }]);
})();
