(function () {
	'use strict';
    var app = angular.module('application', ['angularUtils.directives.dirPagination']);

    app.controller('PromotionController', function ($scope,$http){
        $http.get('/promotion/ListPromotion').then(function(response){
            $scope.datalistpromotion = load_substring (response.data.data , 'promotion_detail' , 400 , null )
        });

        $scope.SelectAllPromotion = function(){
            $http.get('/promotion/ListPromotion').then(function(response){
                $scope.datalistpromotion = load_substring (response.data.data , 'promotion_detail' , 400 , null )
            });
        }

        $http.get('/categorypromotion/ListCategoryPromotion').then(function(response){
            $scope.allcategorypromotion = response.data.data;
        });


        $scope.SelectCategoryPromotion = function(data){
            $http.get('/promotion/ListPromotionByCategoryPromotion/'+ data).then(function(response){
                $scope.datalistpromotion = load_substring (response.data.data , 'promotion_detail' , 400 , null )
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

function load_substring (obj_data , name_data , num , addtem ) {  //จำกัดคำการแสดง
    if(obj_data == []){ return null ;}
    var i = 0 ;
    while(obj_data.length > i){
      var temp = obj_data[i][name_data] ;
      obj_data[i][name_data] = (obj_data[i][name_data].substring(0, num));  //  ตัดคำ
      if(temp[num] != null && addtem == null){
        obj_data[i][name_data] = obj_data[i][name_data]+"...";  //  ถ้าคำมีไม่ถึง num ไม่ต้องใส่ ...
      }
      i++;
    }
    return obj_data ;
};
