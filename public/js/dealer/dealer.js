(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('DealerController', function ($scope,$http){
        $http.get('/contactUs/ListContactUs').then(function(response){
            $scope.datalistcontactus = response.data.data;
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

$(document).ready(function(){
    $("#success").hide();
    $("#contactMail").on('click',function(){
        $("body").css("cursor", "wait");
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method :'post',
            url :'/contactemail',
            data : new FormData($("#contact-mail")[0]),
            processData : false,
            contentType : false,
            success:function(response){
                if(response.success){
                    $("#success").show()
                    $("#success span").text(response.message)
                    $("body").css("cursor", "default");
                    setTimeout(function () {
                        $("#success").hide()
                        $("#email").val('')
                        $("#name").val('')
                        $("#message").val('')
                    }, 5000);
                }
            },
            error : function(xhr, status, error){
                console.log(xhr.responseJSON)
            }
          });
    });
});
