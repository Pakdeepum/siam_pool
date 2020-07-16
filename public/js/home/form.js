var objImg = {data0:'img/pic/Rectangle -1.png',data1:'img/pic/Rectangle -2.png',data2:'img/pic/Rectangle -3.png',
					 data3:'img/pic/Rectangle -1.png',data4:'img/pic/Rectangle -2.png',data5:'img/pic/Rectangle -3.png'};

(function () {
	'use strict';
    var app = angular.module('application', []);
		app.filter('trusted', ['$sce', function ($sce) {//for show embed video with angular
    	return function(url) {
        return $sce.trustAsResourceUrl(url);
    	};
		}]);
		app.directive("onFinishRender", function(){
        return {
            restrict: "A",
            link: function (scope, element, attrs) {
							// console.log('directuve on finish element',element);
							// console.log('directuve on finish scope',scope);
							// console.log('directuve on finish attrs',attrs);
                if (scope.$last=== true) {
									if(attrs.id=="BrandCarousel"){
										//console.log('in attr.id',attrs.id);
										scope.$emit('ngRepeatBrandFinished');
									}else if (attrs.id=="videoCarousel"){
										scope.$emit('ngRepeatVideoFinished');
									}
                }
            }
        };
    });
    app.controller('HomeController', function ($scope,$http){
        // $http.get('/home/ListHomeCarouselMain').then(function(response){
        //     $scope.datalisthomecarouselmain = response.data.data;
        // });

        $http.get('/home/ListAbout').then(function(response){
            $scope.datalistabout = response.data.data;
        });

        $http.get('/home/ListPromotion').then(function(response){
            $scope.datalistpromotion = load_substring (response.data.data , 'promotion_detail' , 150 , null );
            $scope.datalistpromotion = load_substring ($scope.datalistpromotion , 'promotion_name' , 30 , null )
            $scope.datalistshow =  (response.data.data);
        });

        $http.get('/product/ListProduct').then(function(response){
            var carosulImage = [];
            if(parseInt(response.data.data.length) >= 4){
            var size = parseInt(response.data.data.length / 4)
            var k =0;
            for(var i = 0; i < size; i++){
                var carosulIndex = [];
                var remove = 0;
                for(var j = k ; j < response.data.data.length; j++){
                    carosulIndex.splice(j,0,response.data.data[j]);
                    k++
                    remove++;
                    if(remove === 4){
                        break;
                    }
                }
                carosulImage[i] = carosulIndex;
              }
            $scope.carosul = carosulImage;
            }else{
                var image = []
                var index = response.data.data.length;
                for(var i = 0; i < index; i++){
                    carosulImage[i] = response.data.data[i];
                }
                image.push(carosulImage);
                $scope.carosul = image;
            }
            $scope.datalistproduct = load_substring (response.data.data , 'product_name' , 30 , null );
        });
        $http.get('/product/ListProduct').then(function(response){
            $scope.carosuls = response.data.data;
            $scope.datalistproduct = load_substring (response.data.data , 'product_name' , 30 , null );
        });
        $http.get('/home/ListCategoryProduct').then(function(response){
            $scope.datalistcategoryproduct = response.data.data;
						console.log("list category product",$scope.datalistcategoryproduct)
        });
        $http.get('/home/Listmemu').then(function(response){
            $scope.datalistmemuonhome = response.data.data;
        });
				$http.get('/home/Listmemu').then(function(response){
            $scope.datalistmemuonhome = response.data.data;
        });
				$http.get('/Video/ListVideoSelect').then(function(response){
            $scope.allActiveVideo = response.data;
						console.log('activeVideo:',$scope.allActiveVideo);
        });
				$http.get('/Brand/AllBrandList').then(function(response){
						$scope.datalistBrand = response.data.data;
						console.log("AllBrandList:",$scope.datalistBrand);
					});
			 $http.get('/product/TopSeller').then(function(response){
						$scope.topSellerProduct = response.data;
						console.log("topSellerProduct:",$scope.topSellerProduct);
				});
				$http.get('/product/NewArival').then(function(response){
						 $scope.newArrivalProduct = response.data;
						 console.log("newArrivalProduct:",$scope.newArrivalProduct);
				 });
				$scope.addProductToCart = function(id_product){
					console.log(id_product);
				};
				$scope.page = 1;
				$scope.PerPage = 4;//for show number of item per page
				//$scope.displaynewArrivalProduct = $scope.newArrivalProduct.slice(0, 3);
				$scope.pageChanged = function(pram) {
					if(pram==2){
						$scope.page++;
						if($scope.page>$scope.newArrivalProduct.length/$scope.PerPage){
							$scope.page = Math.floor($scope.newArrivalProduct.length/$scope.PerPage);
						}
					}else{
						$scope.page--;
						if($scope.page<0){
							$scope.page=0;
						}
					}
				  var startPos = ($scope.page-1) * $scope.PerPage;
					if(startPos<0) startPos=0;
				  //$scope.displayItems = $scope.totalItems.slice(startPos, startPos + 3);
					$scope.newArrivalProduct.slice(startPos, startPos + $scope.PerPage);
					console.log('page: ',$scope.page);
				  console.log('data new arriaval:',$scope.newArrivalProduct.slice(startPos, startPos + $scope.PerPage));
				};
				$scope.pageTopSell = 1;
				$scope.pageTopSellerChanged = function(pram) {
					if(pram==2){
						$scope.pageTopSell++;
						if($scope.pageTopSell>$scope.topSellerProduct.length/$scope.PerPage){
							$scope.pageTopSell = Math.floor($scope.topSellerProduct.length/$scope.PerPage);
						}
					}else{
						$scope.pageTopSell--;
						if($scope.pageTopSell<0){
							$scope.pageTopSell=0;
						}
					}
				  var startPos = ($scope.pageTopSell-1) * $scope.PerPage;
					if(startPos<0) startPos=0;
					$scope.topSellerProduct.slice(startPos, startPos + $scope.PerPage);
				};
					$scope.$on('ngRepeatVideoFinished', function(ngRepeatVideoFinishedEvent) {//function for assign src video beacuse ng-repeat value caome after carousel data set
						$('.multi-item-carousel').carousel({
							//interval: false
							interval: 12000
						});
						console.log('ngRepeatVideoFinished');

						// for every slide in carousel, copy the next slide's item in the slide.
						// Do the same for the next, next item.
						var counter=0;
						$('.multi-item-carousel .item').each(function(index){
							console.log('counter',counter);
							// console.log('ein loop:',$(this));
							// console.log("$('.multi-item-carousel .item')",$('.multi-item-carousel .item').length);
							 console.log("$scope.allActiveVideo["+counter+"]",$scope.allActiveVideo[counter]);
							if(this.id=="videoCarousel"){
								var next = $(this).next();
								var indexNext = index+1;
					 			var indexNextNext = index+2;
								if (!next.length) {
									next = $(this).siblings(':first');
									indexNext = 0;
	            		indexNextNext = 1;
								}
								next.children(':first-child').clone().appendTo($(this));
								// Change the source of the element
								//console.log('$scope.allActiveVideo[indexNext]',$scope.allActiveVideo[indexNext]);
								if(typeof $scope.allActiveVideo[indexNext]!=="undefined"){
									$(this).children(':first-child').next()[0].getElementsByTagName('iframe')[0].src = $scope.allActiveVideo[indexNext].video_url_embed;
									// console.log('indexNext counter:',counter);
								}else{
									// console.log('Else indexNext counter:',counter);
									var fakeIndex = indexNext-1;
									if(fakeIndex<0) fakeIndex=0;
									$(this).children(':first-child').next()[0].getElementsByTagName('iframe')[0].src = $scope.allActiveVideo[fakeIndex].video_url_embed;
								}
								if (next.next().length>0) {
									// console.log('indexNextNext counter:',counter);
									next.next().children(':first-child').clone().appendTo($(this));
									// Change the source of the element
									// console.log('$scope.allActiveVideo[indexNextNext]0',$scope.allActiveVideo[indexNextNext]);
									if(typeof $scope.allActiveVideo[indexNextNext]!=="undefined"){
										// console.log('indexNextNext counter:',counter);
										// console.log('in undefined indexNext');
										$(this).children(':first-child').next().next()[0].getElementsByTagName('iframe')[0].src = $scope.allActiveVideo[indexNextNext].video_url_embed;
									}else{
										// console.log('Else indexNextNext counter:',counter);
										// console.log('Else indexNextNext indexNextNext:',indexNextNext);
										var fakeIndex = indexNextNext-1;
										if(fakeIndex<0) fakeIndex=0;
										$(this).children(':first-child').next().next()[0].getElementsByTagName('iframe')[0].src = $scope.allActiveVideo[fakeIndex].video_url_embed;
									}
								} else {
									// console.log('Big Else counter:',counter);
									indexNextNext = 0;
									$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
									// Change the source of the element
									// console.log('$scope.allActiveVideo[indexNextNext]1',$scope.allActiveVideo[indexNextNext]);
	            		$(this).children(':first-child').next().next()[0].getElementsByTagName('iframe')[0].src = $scope.allActiveVideo[indexNextNext].video_url_embed;
								}
								counter++;
							}
						});
					});
					$scope.$on('ngRepeatBrandFinished', function(ngRepeatBrandFinishedEvent) {//function for assign src video beacuse ng-repeat value caome after carousel data set
						$('.multi-item-carousel').carousel({
							//interval: false
							interval: 15000
						});
						console.log('ngRepeatBrandFinished');
						// for every slide in carousel, copy the next slide's item in the slide.
						// Do the same for the next, next item.
						$('.multi-item-carousel .item').each(function(index){
							// console.log('ein loop:',$(this));
							// console.log("$('.multi-item-carousel .item')",$('.multi-item-carousel .item').length);
							// console.log("$scope.allActiveVideo["+counter+"]",$scope.allActiveVideo[counter]);
							if(this.id=="BrandCarousel"){
								console.log('on finiished brand carousel');
								var next = $(this).next();
								var indexNext = index+1;
								var indexNextNext = index+2;
								if (!next.length) {
									next = $(this).siblings(':first');
									indexNext = 0;
									indexNextNext = 1;
								}
								next.children(':first-child').clone().appendTo($(this));
								// Change the source of the element
								var img_link = "/storage/brandProduct/"+$scope.datalistBrand[indexNext].id_brand+"/"+$scope.datalistBrand[indexNext].brand_pic_url;
									$(this).children(':first-child').next()[0].getElementsByTagName('img')[0].src = img_link;
								if (next.next().length>0) {
									// console.log('indexNextNext counter:',counter);
									next.next().children(':first-child').clone().appendTo($(this));
									var img_link = "/storage/brandProduct/"+$scope.datalistBrand[indexNextNext].id_brand+"/"+$scope.datalistBrand[indexNextNext].brand_pic_url;
									$(this).children(':first-child').next().next()[0].getElementsByTagName('img')[0].src = img_link;
								} else {
									// console.log('Big Else counter:',counter);
									indexNextNext = 0;
									$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
									// Change the source of the element
									var img_link = "/storage/brandProduct/"+$scope.datalistBrand[indexNextNext].id_brand+"/"+$scope.datalistBrand[indexNextNext].brand_pic_url;
									$(this).children(':first-child').next().next()[0].getElementsByTagName('img')[0].src = img_link;
								}
							}
						});
					});

    });

    app.controller('ElementsController', function ($scope,$http){
        $http.get('/elements/Listmemu').then(function(response){
            $scope.datalistmemu = response.data.data;
						console.log("menu",$scope.datalistmemu);
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
			// console.log(temp);
      obj_data[i][name_data] = (obj_data[i][name_data].substring(0, num));  //  ตัดคำ
      if(temp[num] != null && addtem == null){
        obj_data[i][name_data] = obj_data[i][name_data]+"...";  //  ถ้าคำมีไม่ถึง num ไม่ต้องใส่ ...
      }
      i++;


    }
    return obj_data ;
};
jQuery(document).ready(function(){
	// // Instantiate the Bootstrap carousel
	// $('.multi-item-carousel').carousel({
	//   interval: false
	// });
	//
	// // for every slide in carousel, copy the next slide's item in the slide.
	// // Do the same for the next, next item.
	// $('.multi-item-carousel .item').each(function(){
	//   var next = $(this).next();
	//   if (!next.length) {
	//     next = $(this).siblings(':first');
	//   }
	//   next.children(':first-child').clone().appendTo($(this));
	//
	//   if (next.next().length>0) {
	//     next.next().children(':first-child').clone().appendTo($(this));
	//   } else {
	//   	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
	//   }
	// });
	$('#myCarousel').carousel({
	  interval: 10000
	})
});
