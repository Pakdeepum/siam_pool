(function () {
	'use strict';
    var app = angular.module('application', ['angularUtils.directives.dirPagination']);
    
    app.controller('BackendCategoryPromotionController', function ($scope,$http){
        //alert("dfsdf");

        $http.get('/BackendCategoryPromotion/ListCategoryPromotion').then(function(response){
            //$scope.datalistpromotion = response.data.data;    
            $scope.datalistcategorypromotion= load_substring(response.data.data , 'category_promotion_detail' , 50 );
           //  console.log( $scope.datalistcategorypromotion );   
             
        });
        
        $scope.AddCategoryPromotion = function(data){
            //alert("sss");
            $("#modal-AddCategoryPromotion").modal('show');
            
            $('#modal-AddCategoryPromotion').on('hidden.bs.modal', function (e) {
                $(this)
                  .find("input,textarea,select")
                     .val('')
                     .end()
                  .find("input[type=checkbox], input[type=radio]")
                     .prop("checked", "")
                     .end()
                  .find("input[type=file]")
                     .val('')
                     .end();
            })
         }

        $scope.EditCategoryPromotion = function(data){
            // alert("sss");
            $("#modal-EditCategoryPromotion").modal('show');
            $http.get('/BackendCategoryPromotion/EditCategoryPromotion/'+ data).then(function(response){
            //$('#output_image_id').attr('src', ($scope.edituser[0].output_image));
            
            $scope.datacategorypromotion = response.data.data;
        
            });
         }

         $scope.DeleteCategoryPromotion = function(data){
            // alert("sss");
            $http.get('/BackendCategoryPromotion/DeleteCategoryPromotion/'+ data).then(function(response){
                $scope.allcategorypromotion= response.data.data ;
                window.location.reload();
            });
         }


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