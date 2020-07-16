(function () {
	'use strict';
    var app = angular.module('application', []);

    app.controller('MyOrderController', function ($scope,$http){
			$scope.customerId =0;
			$scope.order_id_list = [];
			$scope.init = function(user_id,order)
 			{
				console.log('userId',user_id);
				console.log('Myorder',order);
				$scope.customerId = user_id;
				$scope.order_id_list = order;
			}
			$scope.orderDetail = function(order_id){
				$http.get('/v1/getOrderById/'+order_id).then(function(response){
					console.log('response myorder',response);
								setTimeout(function () {
										$scope.$apply(function () {
										});
								}, 0);
						}).catch(error => {
								console.log(error)
						});
			}

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

});
/**number only */
function numberOnly(value){
    return value.toString().replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
