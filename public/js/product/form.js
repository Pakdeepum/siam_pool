(function () {
	'use strict';
    var app = angular.module('application', ['angularUtils.directives.dirPagination']);
		/* Range Slider
    Input with default values:
    -min=0      // Min slider value
    -max=100    // Max slider value
    -step=1     // Steps

    Output / Input model
    -value-min    // Default value @min
    -value-max    // Default value @max

    example:
    <slider-range min="0" max="100" step="5" value-min="scope.form.slider_value_min" value-max="scope.form.slider_value_max"></slider-range>
*/
app.directive("onFinishRender", function(){
		return {
				restrict: "A",
				link: function (scope, element, attrs) {
					// console.log('directuve on finish element',element);
					// console.log('directuve on finish scope',scope);
					// console.log('directuve on finish attrs',attrs);
						if (scope.$last=== true) {
							scope.$emit('ngRepeatProductFinished');
						}
				}
		};
});
app.directive('sliderRange', ['$document',function($document) {

// Move slider handle and range line
  var moveHandle = function(handle, elem, posX) {
    $(elem).find('.handle.'+handle).css("left",posX +'%');
  };
  var moveRange = function(elem,posMin,posMax) {
    $(elem).find('.range').css("left",posMin +'%');
    $(elem).find('.range').css("width",posMax - posMin +'%');
  };

return {
    template: '<div class="slider horizontal">'+
                '<div class="range"></div>'+
                '<a class="handle min" ng-mousedown="mouseDownMin($event)" ng-touchstart="touchDownMin($event)"></a>'+
                '<a class="handle max" ng-mousedown="mouseDownMax($event)"></a>'+
              '</div>',
    replace: true,
    restrict: 'E',
    scope:{
      valueMin:"=",
      valueMax:"="
    },
    link: function postLink(scope, element, attrs) {
        // Initilization
        var dragging = false;
        var startPointXMin = 0;
        var startPointXMax = 0;
        var xPosMin = 0;
        var xPosMax = 0;
        var settings = {
                "min"   : (typeof(attrs.min) !== "undefined"  ? parseInt(attrs.min,10) : 0),
                "max"   : (typeof(attrs.max) !== "undefined"  ? parseInt(attrs.max,10) : 100),
                "step"  : (typeof(attrs.step) !== "undefined" ? parseInt(attrs.step,10) : 1)
            };
        if ( typeof(scope.valueMin) == "undefined" || scope.valueMin === '' )
            scope.valueMin = settings.min;

        if ( typeof(scope.valueMax) == "undefined" || scope.valueMax === '' )
            scope.valueMax = settings.max;

        // Track changes only from the outside of the directive
        scope.$watch('valueMin', function() {
          if (dragging) return;
          xPosMin = ( scope.valueMin - settings.min ) / (settings.max - settings.min ) * 100;
          if(xPosMin < 0) {
              xPosMin = 0;
          } else if(xPosMin > 100)  {
              xPosMin = 100;
          }
          moveHandle("min",element,xPosMin);
          moveRange(element,xPosMin,xPosMax);
        });

        scope.$watch('valueMax', function() {
          if (dragging) return;
          xPosMax = ( scope.valueMax - settings.min ) / (settings.max - settings.min ) * 100;
          if(xPosMax < 0) {
              xPosMax = 0;
          } else if(xPosMax > 100)  {
              xPosMax = 100;
          }
          moveHandle("max",element,xPosMax);
          moveRange(element,xPosMin,xPosMax);
        });
				scope.touchDownMin = function($event){
					console.log('test touch down min');
				};
				//touch click helper
// (function ($) {
//     $.fn.tclick = function (onclick) {
//
//         this.bind("touchstart", function (e) {
//             onclick.call(this, e);
//             e.stopPropagation();
//             e.preventDefault();
//         });
//
//         this.bind("click", function (e) {
//            onclick.call(this, e);  //substitute mousedown event for exact same result as touchstart
//         });
//
//         return this;
//     };
// })(jQuery);
        // Real action control is here
				scope.touchDownMin = function($event){
					console.log('on touch mouse min');
				}
        scope.mouseDownMin = function($event) {
            dragging = true;
            startPointXMin = $event.pageX;
						console.log('mouseDownMin draggin:',dragging);
            // Bind to full document, to make move easiery (not to lose focus on y axis)
						// $document.on('touchmove', function($event) {
						// 	console.log('intouchstart event dragging',startPointXMin);
						// 		if(!dragging) return;
						// 		console.log('intouchstart event');
						// });
            $document.on('mousemove touchmove', function($event) {
							console.log('mouseDownMin draggin:',dragging);
                //if(!dragging) return;
								console.log('in mouse move event',$event);
                //Calculate handle position
								var touch = null;
								var pos_x =0;
								if ($event.originalEvent.touches){
									 touch = $event.originalEvent.touches[0];
									pos_x= touch.pageX;
								}else{
									pos_x = $event.pageX;
								}
								console.log('in mouse move pos_x',pos_x);
                var moveDelta = pos_x - startPointXMin;

                xPosMin = xPosMin + ( (moveDelta / element.outerWidth()) * 100 );
                if(xPosMin < 0) {
                    xPosMin = 0;
                } else if(xPosMin > xPosMax) {
                  xPosMin = xPosMax;
                } else {
                    // Prevent generating "lag" if moving outside window
                    startPointXMin = pos_x;
                }
                scope.valueMin = Math.round((((settings.max - settings.min ) * (xPosMin / 100))+settings.min)/settings.step ) * settings.step;
                scope.$apply();

                // Move the Handle
								console.log('in touch move event',xPosMin);
                moveHandle("min", element,xPosMin);
                moveRange(element,xPosMin,xPosMax);
            });
        $document.mouseup(function(){
                dragging = false;
                $document.unbind('mousemove');
                $document.unbind('mousemove');
            });
        };

        scope.mouseDownMax = function($event) {
            dragging = true;
            startPointXMax = $event.pageX;

            // Bind to full document, to make move easiery (not to lose focus on y axis)
            $document.on('mousemove', function($event) {
                if(!dragging) return;

                //Calculate handle position
                var moveDelta = $event.pageX - startPointXMax;

                xPosMax = xPosMax + ( (moveDelta / element.outerWidth()) * 100 );
                if(xPosMax > 100)  {
                    xPosMax = 100;
                } else if(xPosMax < xPosMin) {
                  xPosMax = xPosMin;
                } else {
                    // Prevent generating "lag" if moving outside window
                    startPointXMax = $event.pageX;
                }
                scope.valueMax = Math.round((((settings.max - settings.min ) * (xPosMax / 100))+settings.min)/settings.step ) * settings.step;
                scope.$apply();

                // Move the Handle
                moveHandle("max", element,xPosMax);
                moveRange(element,xPosMin,xPosMax);
            });

            $document.mouseup(function(){
                dragging = false;
                $document.unbind('mousemove');
                $document.unbind('mousemove');
            });
        };
    }
  };
}]);
        app.controller('ProductController', function ($scope,$http){
					$scope.Current_Category = "All Product";
					$scope.Current_Category_ID =1;
					$scope.onTouchstart = function(){
						console.log('onTouchStart');
					}
        $scope.isCollapsed = false;
        $http.get('/product/ListProduct').then(function(response){
            $scope.datalistproduct = load_substring (response.data.data , 'product_name' , 30 , null );
        });

        $http.get('/categoryproduct/ListCategoryProduct').then(function(response){
            $scope.allcategoryproduct = response.data.data;
						for(var i=0;i<$scope.allcategoryproduct.length;i++){
							if($scope.allcategoryproduct[i].id_category_product==7)//oxygen_minerale id
							{
								var temp = $scope.allcategoryproduct[i];
								$scope.allcategoryproduct.splice(1,0,temp);
									$scope.allcategoryproduct.splice(i+1,1);//remove last item
								break;
								//$scope.allcategoryproduct
								//break;
								//$scope.allcategoryproduct.splice(i,1);
							}
							console.log('$scope.allcategoryproduct sort',$scope.allcategoryproduct);

						}
						//for make sub category hard code--
						var tempCategory = [];
						tempCategory = $scope.allcategoryproduct.slice(0);
						var itemForRemove =[];
						var subCategoryItem =[];
						for(var i=0;i<tempCategory.length;i++){
							if(tempCategory[i].id_category_product ==4 || tempCategory[i].id_category_product==5 ||  tempCategory[i].id_category_product==8){
								itemForRemove.push(tempCategory[i].id_category_product);
								// $scope.allcategoryproduct.splice(i,1);
								subCategoryItem.push(tempCategory[i]);

							}
						}
						for(var i=0;i<itemForRemove.length;i++){
							var obj = itemForRemove[i];
							console.log('obj',obj);
							for(var j=0;j<$scope.allcategoryproduct.length;j++){
								if($scope.allcategoryproduct[j].id_category_product == obj){
									console.log('insplice');
									$scope.allcategoryproduct.splice(j,1);
									j--;
								}
							}
						}
						for(var i=0;i<$scope.allcategoryproduct.length;i++){
							if($scope.allcategoryproduct[i].id_category_product==6){//add sub category in accessories
								$scope.allcategoryproduct[i].submenu = subCategoryItem;
							}

						}
						// end make sub category
						console.log('$scope.allcategoryproduct:',$scope.allcategoryproduct);
        });
				$scope.search = { price_min : 0, price_max : 100000};
				var min=$scope.search.price_min;
				var max=$scope.search.price_max;
				$scope.priceFiltering = function(){
					 min = $scope.search.price_min;
					 max =$scope.search.price_max;
				 }
				 $scope.pricefilter = function (product) {
						 if ((product.price <= max) && (product.price >= min)){
								 return product;
						 }
				 };
				// $scope.priceFiltering = function(command){
				// 	console.log('in Filter');
				// 			 $scope.pricefilter = function (product) {
				// 					 if ((product.price <= $scope.search.price_max)&&(product.price >= $scope.search.price_min)){
				// 							 return product;
				// 					 }
				// 			 };
				//  }
        /*$http.get('/BackendBanner/ListCarousal').then(function(response){
             $scope.carosul = response.data.data;
        });*/

        $scope.SelectCategoryProduct = function(data,category_name){
					console.log('select cat',data);

					if(data==6||data==4||data==5 ||data==8){
					$scope.isCollapsed = true;
				}else{
					$scope.isCollapsed = false;
				}

					$scope.Current_Category = category_name;
					$scope.Current_Category_ID = data;
            $http.get('/product/ListProductByCategoryProduct/'+ data).then(function(response){
                $scope.datalistproduct = load_substring (response.data.data , 'product_name' , 30 , null );
            });
        }
				$scope.init = function(data){
						//console.log('inSelectCategoryProduct',category_name );
						//$scope.Current_Category = category_name;
						$scope.Current_Category_ID = data;
						$http.get('/categoryproduct/GetCategoryById/'+data).then(function(res){
							 console.log('allcategoryProduct',$scope.Current_Category);
		           $scope.Current_Category = res.data['category_product_name'];
							 console.log('allcategoryProduct', res);
							 $http.get('/product/ListProductByCategoryProduct/'+ data).then(function(response){
								 if(data==6||data==4||data==5 ||data==8){
					 					$scope.isCollapsed = true;
					 				}else{
					 					$scope.isCollapsed = false;
					 				}
 									$scope.datalistproduct = load_substring (response.data.data , 'product_name' , 30 , null );
 							});
		        });


				}
				$scope.$on('ngRepeatProductFinished', function(ngRepeatProductFinishedEvent) {//function for assign src video beacuse ng-repeat value caome after carousel data set
						console.log('onRepeat product finished');
				});
        $scope.load_data = function (data) {
					console.log('load_data:',data);
            $http.get('/product/ListProductByCategoryProduct/'+ data).then(function(response){
                $scope.datalistproduct = load_substring (response.data.data , 'product_name' , 30 , null );
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
	console.log('load_substring:objdata',obj_data);
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
