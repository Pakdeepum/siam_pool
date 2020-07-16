(function () {
	'use strict';
    var app = angular.module('application', []);

    app.controller('AcceptPaymentController', function ($scope,$http){
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
    $("#accept-price").text(numberOnly($("#accept-price").text()));
    $("#accept-price2").text(numberOnly($("#accept-price2").text()));
});

function numberOnly(value){
    return value.toString().replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

/**add date */
$(document).ready(function(){
  var day = moment($("#add3day").text()).locale('en').format('MMM, Do YYYY kk:mm');
	//var day = new Date($("#add3day").text()).format('MMM, Do YYYY kk:mm');
  $("#add3day").text(day);
  $("#add3day2").text(day);
});
