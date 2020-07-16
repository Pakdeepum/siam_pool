(function () {
	'use strict';
    var app = angular.module('application', ['angularUtils.directives.dirPagination']);
    
    app.controller('BackendReviewsController', function ($scope,$http){
        $http.get('/BackendReview/ListReviews').then(function(response){
            $scope.datalistreviews = response.data.data;    
        });
        $scope.AddBackendreview = function(){
            $("#modal-AddBackendreview").modal('show');
         }
         $http.get('/BackendReview/ListAboutProduct').then(function(response){
            $scope.allaboutproduct = response.data.data;    
        });

        $scope.EditReview = function(data){
            $("#modal-EditBackendreview").modal('show');
            $http.get('/BackendReview/EditReview/'+ data).then(function(response){

            $scope.dataeditreview = response.data.data;
        
            });
         }
    });     
})();


function preview_image(event) 
{

    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image_add');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
function preview_image_e(event) 
{

    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image_e');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}