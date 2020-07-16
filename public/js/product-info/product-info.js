(function () {
	'use strict';
    var app = angular.module('application', []);

    app.controller('ProductInfoController', function ($scope,$http){
			$scope.TotalPrice =0;
			$scope.IsCheckDelivery = false;
			$scope.deliveryCharge = 0;
			$http.get('/v1/listDelivery').then(function(response){
					$scope.listDelivery = response.data.data;
					console.log('delivery',$scope.listDelivery);
			});
			console.log('total price 1',$scope.TotalPrice);
			$scope.deliveryChange = function(value){
				 console.log('deliveryChange',value);
				 $scope.deliveryCharge = value.service_charge;
				 var totalInfo =  $("#totalPrices-info").text().indexOf(',') !== -1 ? $("#totalPrices-info").text().replace(',',''): $("#totalPrices-info").text();
				 $scope.TotalPrice = 	addComma(parseInt(totalInfo)+value.service_charge);
				 console.log('total price',$scope.TotalPrice);
				 $("#totalPriceInfo").text($scope.TotalPrice);
				 $scope.IsCheckDelivery = true;
			}
			$(document).ready(function(){
			    $("#cancel-payment").on('click', function(){
			        localStorage.clear();
			        setTimeout(function () {
			            window.location.href = '/';
			        }, 100);
				});
				$('#back-payment').on('click',function(){
					window.location.href = '/v1/address';
				});
			    $("#accept-payment").on('click', function(){
						// console.log('createInfo:',createInfo());
						// return;
			        $.ajax({
			            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			            method :'post',
			            url :'/v1/updateOrder',
			            data : {"data" : createInfo()},
			            dataType: "JSON",
			            success:function(response){			                
			                 if(response.success){
			                    setTimeout(function () {
			                        emailOrder(response.data.order_id);
			                    }, 100);
			                }
			            },
			            error : function(error){
			                console.log(error)
			            }
			        });
			    });
			});
			function emailOrder(order_id){
			    $("body").css("cursor", "wait");
			    $.ajax({
			        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			        method :'post',
			        url :'/v1/emailOrder',
			        data : {"data" : createInfo(), "order" : order_id, 'email' : $("#email-tmp").val()},
			        dataType: "JSON",
			        success:function(response){
								console.log('emailOrder success:',response);
			             if(response.success){
			                $("body").css("cursor", "default");
			                setTimeout(function () {
			                    localStorage.clear();
			                    window.location.href = '/v1/acceptPayment?order_id='+order_id;
			                }, 200);
			            }
			        },
			        error : function(error){
			            console.log(error)
			        }
			    });
			}
			function createInfo(){
			    var storages = getProductStroage();
			    var charge = $('input[type=radio][name=address-info]:checked').val();
			    var product = [];
			     storages.forEach(element => {
						 if(element!="undefined"){
							 var json = JSON.parse(element);
							 //console.log("json",json);
							 if(Array.isArray(json)){
								 var data = {
				             "product_id" : json[0].productID,
				             "amount" : json[0].Amount,
				             "dalivery" : $("#info-address").text(),
				             "descriptions" : $("#info-descript").val(),
				             "sendType" : $("#sendType-tmp").val(),
				             // "charge" : charge === 'ems' ? $("#charge").text() : "0"
										 "charge" : $scope.deliveryCharge
				         }
				         product.push(data);
							 }
						 }

			    });
			    return product;
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
function getProductStroage() {
		var values = [],
				keys = Object.keys(localStorage),
				i = keys.length;
		while ( i-- ) {
				if(keys[i] !== 'dalivery'){
						values.push( localStorage.getItem(keys[i]) );
				}
		}
		return values;
}

function getDaliveryStroage() {
		var values = [],
				keys = Object.keys(localStorage),
				i = keys.length;
		while ( i-- ) {
				if(keys[i] === 'dalivery'){
						values.push( localStorage.getItem(keys[i]) );
				}
		}
		return values;
}

$(document).ready(function(){
		loadOrder();
		loadAddress();
});
function loadAddress(){
		var address = getDaliveryStroage();
		if(address.length > 0){
				var spit = address[0].split(",");
				$("#info-name").text(spit[1]);
				$("#info-address").text(spit[0]);
				$("#info-tel").text(spit[2]);
				$("#info-descript").val(spit[3]);
		}
}
function totalFormatter(value, row) {
		//return addComma(value) + ' บาท';
		return addComma(value) + ' Baht';
}
function priceInfoFormatter(value, row) {
		//return value + ' บาท';
		return value + ' Baht';
}
function amountInfoFormatter(value, row) {
		//return value + ' ชิ้น';
		return value + ' Item';
}
function loadOrder(){
		var storage = getProductStroage();
		var storages = [];
		var totalList = storage.length;
		var totalAmount = 0;
		var totalPrice = 0;

		storage.forEach(element => {
			if(element!="undefined"){
				var json = JSON.parse(element);
				//console.log("json",json);
				if(Array.isArray(json)){
					totalAmount = totalAmount + json[0].Amount;
					totalPrice = totalPrice + parseInt(json[0].totalPrice);
					json[0].productName = "<a href='/product/ListProductDetail?id_product="+json[0].productID+"' target='_blank'>"+json[0].productName+"</a>";
					storages.push(json[0]);
				}
			}
		});
		$('#productInfo-table').bootstrapTable('load',{data : storages});
		$("#totalList-info").text(totalList);
		$("#totalAmount-info").text(totalAmount);
		$("#totalPrices-info").text(addComma(totalPrice));
		setTimeout(function () {
				$("#productInfo-table").bootstrapTable("hideLoading");
		}, 100);
}

$(document).ready(function(){
		$('input[type=radio][name=address-info]').attr('checked', 'checked').change();
		$("#totalPriceInfo").text($("#totalPrices-info").text());
		$('input[type=radio][name=address-info]').on('change ,click', function(){
			console.log('input hange address-info');
				var totalInfo =  $("#totalPrices-info").text().indexOf(',') !== -1 ? $("#totalPrices-info").text().replace(',',''): $("#totalPrices-info").text();
				if ($('input[type=radio][name=address-info]:checked').val() === 'ems') {
						$("#totalPriceInfo").text(addComma(parseInt(totalInfo) + parseInt($("#charge").text())));
						$("#sendType-tmp").val('0')
						$("#charge").val($("#charge-tmp").val())
				}else if ($('input[type=radio][name=address-info]:checked').val() === 'normal'){
						$("#totalPriceInfo").text(totalInfo);
						$("#sendType-tmp").val('1')
						$("#charge").val('0')
				}
		});
});
