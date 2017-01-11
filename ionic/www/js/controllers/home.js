angular.module('starter.controllers')
    .controller('HomeCtrl',['$scope', '$stateParams', function($scope, $stateParams){

        $scope.name = $stateParams.name;

    }]);