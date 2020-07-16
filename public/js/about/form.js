(function () {
	'use strict';
    var app = angular.module('application', []);
    
    app.controller('AboutController', function ($scope,$http){
        $http.get('/about/ListAbout').then(function(response){
            $scope.datalistabout = response.data.data;    
        });
    });

    app.controller('ElementsController', function ($scope,$http){
        $http.get('/elements/Listmemu').then(function(response){
            $scope.datalistmemu = response.data.data;    
        });
        $http.get('/elements/ListContactUs').then(function(response){
            $scope.datalistcontactus = response.data.data;    
        });     
    });
})();