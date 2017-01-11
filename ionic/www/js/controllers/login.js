angular.module('starter.controllers',[])
    .controller('LoginCtrl',['$scope', 'OAuth', '$state','$ionicPopup', '$ionicLoading',
                function($scope, OAuth, $state, $ionicPopup,$ionicLoading){

        $scope.user = {
            username: '',
            password: ''
        };

        $scope.state = $state.current;

        $scope.login = function (){
            $ionicLoading.show({
                template: 'Carregando...'
            });
            OAuth.getAccessToken($scope.user)
                .then( function(data){
                   // console.log(data);
                    $ionicLoading.hide();
                    $state.go('home', { name: $scope.user.username});
                }, function(responseError) {
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'Login e/ou senha inválidos'
                    })
                    console.log(responseError);
                    $ionicLoading.hide();
                });
        };
    }]);