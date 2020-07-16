
(function () {
	'use strict';
    var app = angular.module('application', [])
		.service('sharedProperties', function () {
        var property = {editVideoId:0};

        return {
            getProperty: function () {
                return property;
            },
            setProperty: function(value) {
                property = value;
            },
						setEditVideoId: function(value) {
                property.editVideoId = value;
            },
        };
    });;
    app.controller('BackendVideoSettingController', function ($scope,$http,sharedProperties){
			$scope.EditVideoData =[];
			var search = 'watch?v=';
			$http.get('/VideoSetting/AllVideoList').then(function(response){
					$scope.datalistVideoSetting = response.data.data;
					angular.forEach($scope.datalistVideoSetting.data, function (item) {
						if(item.status==1){
							item.status = true;
						}else{
							item.status = false;
						}
					});
					console.log("AllVideoList:",$scope.datalistVideoSetting);
					//$scope.apply();
				});
				$scope.EditVideo = function(id){
						EditVideo(id);
						sharedProperties.setEditVideoId(id);
						console.log('sharedProperties:',sharedProperties);
						console.log('get sharedProperties:',sharedProperties.getProperty());
						$http.get('/VideoSetting/EditVideo/'+id).then(function(response){
							$scope.EditVideoData = response.data.editVideo;
								console.log('edit video'+id+' :',	$scope.EditVideoData);
								$("input[id=EditvideoLink]").val($scope.EditVideoData.video_url);
								$('#EditVideoIframe').attr('src', $scope.EditVideoData.video_url_embed);
								$("input[id=EditVideoId]").val(id);
								$("input[name=video_url_embed]").val($scope.EditVideoData.video_url_embed);
								if($scope.EditVideoData.status){
										$('#editRadio1').prop('checked',true);
										$('#editRadio2').prop('checked',false);
								}else{
									$('#editRadio2').prop('checked',true);
									$('#editRadio1').prop('checked',false);
								}
								console.log('{EditVideoData.video_url_embed',$scope.EditVideoData.video_url_embed);
						});
				};
				$scope.onInputEditLinkChange = function() {
					console.log('in iput edit link change',$scope.EditVideoData);
					$scope.EditVideoEmbed = $scope.EditVideoLink;
					//console.log('in On input link change');
					if($scope.EditVideoLink){
						if($scope.EditVideoLink.includes(search)){
							console.log('contain watch?v=');
							$scope.EditVideoEmbed = $scope.EditVideoLink.replace(search, 'embed/');
							console.log('after replace: ',	$scope.EditVideoEmbed);

						}

					}
	    };
			$scope.switchPublish = function(status,id_video) {
				console.log('switchPublishe: ',status,id_video);
				var config = {
							headers:  {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
									'Content-Type': 'application/json'
							}
					};					
					var update_data = {id_video:id_video,status:status};
				$http.patch('/VideoSetting/VideoStatus/update', {data:update_data}, config).then(function(res){
					console.log('patch video update',res);
               if(res.data.success){
							 }
							 }).catch(error => {
                console.log(error)
            });
				};
    });
		app.filter('trusted', ['$sce', function ($sce) {//for show embed video with angular
    	return function(url) {
        return $sce.trustAsResourceUrl(url);
    	};
		}]);
		app.controller('ModalAddVideoController', function ($scope,$http){
			$scope.videoLink = "";
			$scope.videoLink_embed = "";
			$scope.videoStatus = 0;
			var search = 'watch?v=';
			$scope.onInputLinkChange = function() {
				$scope.videoLink_embed = $scope.videoLink;
				//console.log('in On input link change');
				if($scope.videoLink){
					if($scope.videoLink.includes(search)){
						console.log('contain watch?v=');
						$scope.videoLink_embed = $scope.videoLink.replace(search, 'embed/');
						console.log('after replace: ',	$scope.videoLink_embed);
					}

				}
    };
    });
		app.controller('ModalEditVideoController', function ($scope,$http){
			//$scope.Edit = sharedProperties.getProperty();
			// $http.get('/VideoSetting/EditVideo/1').then(function(response){
			// 		$scope.datalistVideoSetting = response.data.data;
			// 		console.log("EditVideo1:",$scope.datalistVideoSetting);
			// 		//$scope.apply();
			// 	});
		});
})();

// Open Modal and Select CategoryProduct To Select Option
jQuery(document).ready(function(){
    $("div#Invalid-image").hide();
    jQuery('#open-modal-AddVideo').click(function(e){
       $('#modal-AddVideo').modal('show')
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
       jQuery.ajax({//find all Category
          url: "/BackendCategoryProduct/ListProductType",
          method: 'get',
          success: function(data){
            var Categoryproduct = '';
            $.each(data,function(i,o){
                Categoryproduct += '<option value="'+o.id_category_product+'">'+o.category_product_name+'</option>';
           });
          $('#idproducttype').append(Categoryproduct);
          }});
					jQuery.ajax({//find all Brand
						 url: "/BackendBrandProduct/ListBrandSelect",
						 method: 'get',
						 success: function(data){
							 var Brandproduct = '';
							 $.each(data,function(i,o){
									 Brandproduct += '<option value="'+o.id_brand+'">'+o.brand_name+'</option>';
							});
						 $('#idBrandProduct').append(Brandproduct);
						 }});
    });
    $('#modal-AddProduct').on('hidden.bs.modal', function (e) {
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

             $("#preview-product1 img").remove();
             $("#preview-product2 img").remove();
             $("#preview-product3 img").remove();
             $("#preview-product4 img").remove();
             $("#preview-product5 img").remove();

    })
});

function EditVideo(id) {
	console.log('in edit video');
    $('#modal-EditVideo').modal('show');



    // SelectCategory
    // $.ajaxSetup({
    // headers: {
    //     'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    // }
    // });
		//
    // jQuery.ajax({
    // url: "/VideoSetting/EditVideo/"+id,
    // method: 'get',
    // success: function(data){
		// 	console.log('EditVideo id :',id);
    //     var EditVideo = data.$EditVideo;
    //     $.each(EditVideo,function(i,data){
    //         $('input[name="productname"]').val(data.product_name)
    //         $('input[name="productcode"]').val(data.product_code)
    //         $('input[name="productprice"]').val(data.price)
    //         $('input[name="idsaveedit"]').val(data.id_product)
		//
    //         $('#product_detail_e').text(data.product_detail)
    //         $('input[name="product_instruction"]').val(data.product_instruction)
    //         $('input[name="product_warning"]').val(data.product_warning)
		//
    //         $('#preview-product-e1').append('<img src='+'/storage/product/'+data.id_product+'/'+data.pic1_url+' />');
    //         $('#preview-product-e2').append('<img src='+'/storage/product/'+data.id_product+'/'+data.pic2_url+' />');
    //         $('#preview-product-e3').append('<img src='+'/storage/product/'+data.id_product+'/'+data.pic3_url+' />');
    //         $('#preview-product-e4').append('<img src='+'/storage/product/'+data.id_product+'/'+data.pic4_url+' />');
    //         $('#preview-product-e5').append('<img src='+'/storage/product/'+data.id_product+'/'+data.pic5_url+' />');
		//
    //         $("#idcategory option[value='" + data.id_category_product + "']").attr("selected","selected");
		// 				$("#idBrand option[value='" + data.id_brand_product + "']").attr("selected","selected");
    //         $("#promotion_edit option[value='" + data.promotion_id + "']").attr("selected","selected");
    //     });
    // }});
};


//Set Timeout Show Message
jQuery(document).ready(function(){
    setTimeout(function() {
        $('#message').hide()
      }, 5000);
});
