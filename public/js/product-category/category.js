(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('categoryController', ['$scope','$http', '$window',function ($scope,$http,$window){
        $http.get('/product/getProduct').then(function(response){
            var promotion = [];
            response.data.data.forEach(function( element, index) {
                var items = [];
                element.products.forEach(function(val , index){
                    if (val.special.length !== 0) {
                        if(items.length === 0){
                            items.splice(items.length,0,val.special);
                        }else{
                            if(val.special[0].discount !== items[index-1]){
                                items.splice(items.length,0,val.special);
                            }
                        }
                    }
                });
                promotion[index] = items;
            });
            $scope.promotions = promotion;
            /**product */
            response.data.data.forEach(function( element, index) {
                var carosulImage = [];
                if(parseInt(element.products.length) >= 4){
                    var size = parseInt(element.products.length / 4)
                    var mod = element.products.length % 4;

                    var products = [];
                    for(var i = 0; i < size; i++){
                        var remove = 0;
                        var carosulIndex = [];
                        for(var j = 0 ; j < 4; j++){
                            carosulIndex[j] = element.products[0];
                            element.products = element.products.filter(function(item) {
                                return item !== element.products[0]
                            });
                            remove++;
                             if(remove === 4){
                                break;
                            }
                          }
                         products[i] =  carosulIndex;
                    }
                    var omit = [];
                    if(mod != 0){
                        for(var a=1; a < mod+1; a++){
                            omit[0] = element.products[element.products.length - a]
                        }
                    }
                    products[products.length] = omit
                    element.products = products;
                }else{
                    var image = []
                    var index = element.products.length;
                    for(var i = 0; i < index; i++){
                        carosulImage[i] = element.products[i];
                    }
                    image.push(carosulImage);
                    element.products= image;
                }
            });
            $scope.items = response.data.data;
						angular.forEach($scope.items, function(value, key) {
							if(value['id_category_product']==1)//chlorinator
							{
								$scope.chlorinatorItem = value['products'][0];
							}
						  // console.log('foreach loop:',key ,value);
						});
						console.log("chlorinator:",($scope.chlorinatorItem));
        });

        $http.get('/product/getProduct').then(function(response){
             var promotion = [];
            response.data.data.forEach(function( element, index) {
                var items = [];
                element.products.forEach(function(val , index){
                    if (val.special.length !== 0) {
                        if(items.length === 0){
                            items.splice(items.length,0,val.special);
                        }else{
                            if(val.special[0].discount !== items[index-1]){
                                items.splice(items.length,0,val.special);
                            }
                        }
                    }
                });
                promotion[index] = items;
            });
            $scope.promotions = promotion;
            $scope.itemsResponse = response.data.data;
        });
    }]);

    app.controller('ElementsController', function ($scope,$http){
        $http.get('/elements/Listmemu').then(function(response){
            $scope.datalistmemu = response.data.data;
        });
        $http.get('/elements/ListContactUs').then(function(response){
            $scope.datalistcontactus = response.data.data;
        });
    });
})();
