(function () {
	'use strict';
    var app = angular.module('application', ['angularUtils.directives.dirPagination']);
    
    app.controller('BackendPromotionController', function ($scope,$http){
        //alert("dfsdf");

        $http.get('/BackendPromotion/ListPromotion').then(function(response){
            //$scope.datalistpromotion = response.data.data;    
            $scope.datalistpromotion = load_substring(response.data.data , 'promotion_detail' , 50 );
            // console.log( $scope.datalistpromotion );   
             
        });
        
        $http.get('/BackendPromotion/ListCategoryPromotion').then(function(response){
            //$scope.datalistpromotion = response.data.data;    
            $scope.allcategorypromotion= response.data.data ;
        });
        $scope.AddPromotion = function(data){
            //alert("sss");
            $("#modal-AddPromotion").modal('show');

         }

        $scope.EditPromotion = function(data){
            // alert("sss");
            $("#modal-EditPromotion").modal('show');
            $http.get('/BackendPromotion/EditPromotion/'+ data).then(function(response){
            //$('#output_image_id').attr('src', ($scope.edituser[0].output_image));
             
            response.data.data = load_substring (response.data.data , 'date_upload' , 10 , 1);
            response.data.data = load_substring (response.data.data , 'date_end_show' , 10 , 1);
            $scope.datapromotion = response.data.data;
        
            });
         }

         $scope.SelectCategoryPromotion = function(data){
             //alert("sss");
            $http.get('/BackendPromotion/SelectPromotionByCategoryPromotion/'+ data).then(function(response){
            $scope.datalistpromotion = load_substring(response.data.data , 'promotion_detail' , 50 );
            //console.log(response.data.data);
        
            });
         }

         $scope.DeletePromotion = function(data){
            // alert("sss");
            $http.get('/BackendPromotion/DeletePromotion/'+ data).then(function(response){
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