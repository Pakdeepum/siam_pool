(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('ContactUsController', function ($scope,$http){
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

		$("#contactMailDealer").on('click',function(){
        $("body").css("cursor", "wait");
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method :'post',
            url :'/contactemail',
            data : new FormData($("#contact-mail-dealer")[0]),
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
		//map Section
		// Get the modal
		var modal = document.getElementById("siamPoolMapModal");

		// Get the image and insert it inside the modal - use its "alt" text as a caption
		var img = document.getElementById("siamPoolMap");
		var modalImg = document.getElementById("map01");
		var captionText = document.getElementById("caption");
		img.onclick = function(){
		  modal.style.display = "block";
		  modalImg.src = this.src;
		  captionText.innerHTML = this.alt;
		}

		// Get the <span> element that closeMaps the modal
		var span = document.getElementsByClassName("closeMap")[0];

		// When the user clicks on <span> (x), closeMap the modal
		span.onclick = function() {
		  modal.style.display = "none";
		}

		function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.866, lng: 151.196},
          zoom: 15
        });

        var request = {
          placeId: 'ChIJJdAZvY4v2jAR9nrA2AIxFQw',
          fields: ['name', 'formatted_address', 'place_id', 'geometry']
        };

        var infowindow = new google.maps.InfoWindow();
        var service = new google.maps.places.PlacesService(map);

        service.getDetails(request, function(place, status) {
          if (status === google.maps.places.PlacesServiceStatus.OK) {
            var marker = new google.maps.Marker({
              map: map,
              position: place.geometry.location
            });
            google.maps.event.addListener(marker, 'click', function() {
              infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                'Place ID: ' + place.place_id + '<br>' +
                place.formatted_address + '</div>');
              infowindow.open(map, this);
            });
          }
        });
      }
});
