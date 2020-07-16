(function () {
	'use strict';
    var app = angular.module('application', ['angularUtils.directives.dirPagination']);
    app.controller('ReviewsController', function ($scope,$http){
        $http.get('/reviews/ListReviews').then(function(response){
            $scope.datalistreviews = response.data.data;     
        });

        $http.get('/reviews/ListAboutProduct').then(function(response){
            $scope.allaboutproduct = response.data.data;    
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