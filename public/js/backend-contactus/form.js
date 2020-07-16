var application = angular.module('application', []);
(function (app) {
	'use strict';    
    app.controller('contactus', function ($scope,$http){
        $http.get('/contactUs/ListContactUs').then(function(response){
                $scope.datalistcontactus = response.data.data;    
                $("#contact_us_text_header").text($scope.datalistcontactus[0].contact_us_text_header) ; // label = data  
                document.getElementById("id_title").value = $scope.datalistcontactus[0].contact_us_text_header ; // textbox = data

                $("#contact_us_email").text($scope.datalistcontactus[0].contact_us_email) ;
                document.getElementById("id_email").value = $scope.datalistcontactus[0].contact_us_email ;

                $("#contact_us_phone").text($scope.datalistcontactus[0].contact_us_phone) ;
                document.getElementById("id_phone").value = $scope.datalistcontactus[0].contact_us_phone ;

                $("#contact_us_address").text($scope.datalistcontactus[0].contact_us_address) ;
                document.getElementById("id_address").value = $scope.datalistcontactus[0].contact_us_address ;

                $("#contact_us_facebook_url").text($scope.datalistcontactus[0].contact_us_facebook_url) ;
                document.getElementById("id_facebook_url").value = $scope.datalistcontactus[0].contact_us_facebook_url ;

                $("#contact_us_twitter_url").text($scope.datalistcontactus[0].contact_us_twitter_url) ;
                document.getElementById("id_twitter_url").value = $scope.datalistcontactus[0].contact_us_twitter_url ;

                $("#contact_us_instagram_url").text($scope.datalistcontactus[0].contact_us_instagram_url) ;
                document.getElementById("id_instagram_url").value = $scope.datalistcontactus[0].contact_us_instagram_url ;

                $("#contact_us_phone1").text($scope.datalistcontactus[0].contact_us_phone1) ;
                document.getElementById("id_phone1").value = $scope.datalistcontactus[0].contact_us_phone1 ;     
        });
    });
       
})(application);

document.getElementById("id_title").onkeyup = function() {  //  if onkeyup in textbox
    document.getElementById("contact_us_text_header").innerHTML = document.getElementById("id_title").value; // label = textbox
};

document.getElementById("id_email").onkeyup = function() {
    document.getElementById("contact_us_email").innerHTML = document.getElementById("id_email").value;
};

document.getElementById("id_phone").onkeyup = function() {
    document.getElementById("contact_us_phone").innerHTML = document.getElementById("id_phone").value;
};

document.getElementById("id_address").onkeyup = function() {
    document.getElementById("contact_us_address").innerHTML = document.getElementById("id_address").value;
};

document.getElementById("id_facebook_url").onkeyup = function() {
    document.getElementById("contact_us_facebook_url").innerHTML = document.getElementById("id_facebook_url").value;
};

document.getElementById("id_twitter_url").onkeyup = function() {
    document.getElementById("contact_us_twitter_url").innerHTML = document.getElementById("id_twitter_url").value;
};

document.getElementById("id_instagram_url").onkeyup = function() {
    document.getElementById("contact_us_instagram_url").innerHTML = document.getElementById("id_instagram_url").value;
};

document.getElementById("id_phone1").onkeyup = function() {
    document.getElementById("contact_us_phone1").innerHTML = document.getElementById("id_phone1").value;
};