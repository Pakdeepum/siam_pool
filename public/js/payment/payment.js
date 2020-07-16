(function () {
	'use strict';
    var app = angular.module('application', []);

    app.controller('PaymentController', function ($scope,$http){
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
function initialzed(){
    if($("#validate-bank").hasClass('has-error-redio')){
        $("#validate-bank").removeClass('has-error-redio')
    }
    if($("#validate-date").hasClass('has-error')){
        $("#validate-date").removeClass('has-error')
    }
    if($("#validate-paid").hasClass('has-error')){
        $("#validate-paid").removeClass('has-error')
    }
    if($("#validate-order").hasClass('has-error')){
        $("#validate-order").removeClass('has-error')
    }
		if($("#validate-promptpay").hasClass('has-error-redio')){
				$("#validate-promptpay").removeClass('has-error-redio')
		}
    $("#radio-valid").hide()
    $("#date-valid").hide()
    $("#paid-valid").hide()
    $("#silp-valid").hide()
    $("#order-valid").hide()
}
/**has change */
$(document).ready(function(){
    $("#date_upload").on('change', function(){
        setTimeout(function () {
            $("#validate-date").removeClass('has-error');
            $("#date-valid").css('display','none');
        }, 100);
    });
    $("input[name='_payment']").on('change', function(){
        setTimeout(function () {
            $("#validate-bank").removeClass('has-error-redio');
            $("#radio-valid").css('display','none');
        }, 100);
    });
    $("#paid").on('change', function(){
        setTimeout(function () {
            $("#validate-paid").removeClass('has-error');
            $("#paid-valid").css('display','none');
        }, 100);
    });
    $("#silp").on('change', function(){
        setTimeout(function () {
            $("#validate-silp").removeClass('has-error');
            $("#silp-valid").css('display','none');
        }, 100);
    });
    $("#input-order").on('change', function(){
        setTimeout(function () {
            $("#validate-order").removeClass('has-error');
            $("#order-valid").css('display','none');
        }, 100);
				$("#search-order").click();
    });
});
/**submit payment */
$(document).ready(function(){
    initialzed()
    $('#btn-payment').on('click', function(){
        /**radio */
				console.log('pay clcik');
        var data =  $("#order-table").bootstrapTable("getData").length;
        if(data === 0){
					console.log('no data');
            return false;
        }
        var radioValue = $("input[name='_payment']:checked").val();
				console.log('radioValueBank',radioValue);
        if(!radioValue){
            $("#validate-bank").addClass('has-error-redio');
            $("#radio-valid").css('display','block');
            setTimeout(function () {
                $("#validate-bank").removeClass('has-error-redio');
                $("#radio-valid").css('display','none');
            }, 5000);
						console.log('no bank radio selected');
						$("#validate-bank").focus();
            return false;
        }
        /**วันที่ชำระ */
        if(!$("#date_upload").val()){
            $("#validate-date").addClass('has-error');
            $("#date-valid").css('display','block');
            $("#date_upload").focus();
            setTimeout(function () {
                $("#validate-date").removeClass('has-error');
                $("#date-valid").css('display','none');
            }, 5000);
            return false;
        }
        /**จำนวนเงิน */
        if(!$("#paid").val()){
            $("#validate-paid").addClass('has-error');
            $("#paid-valid").css('display','block');
            $("#paid").focus();
            setTimeout(function () {
                $("#validate-paid").removeClass('has-error');
                $("#paid-valid").css('display','none');
            }, 5000);
            return false;
        }
        /**หลักฐานการโอน */
        if(!$("#silp").val()){
            $("#validate-silp").addClass('has-error');
            $("#silp-valid").css('display','block');
            $("#silp").focus();
            setTimeout(function () {
                $("#validate-silp").removeClass('has-error');
                $("#silp-valid").css('display','none');
            }, 5000);
            return false;
        }
        /**Order ID */
        if(!$("#input-order").val()){
            $("#validate-order").addClass('has-error');
            $("#order-valid").css('display','block');
            $("#input-order").focus();
            setTimeout(function () {
                $("#validate-order").removeClass('has-error');
                $("#order-valid").css('display','none');
            }, 5000);
            return false;
        }
        $("body").css("cursor", "wait");
        /**ajax call */
				$.ajaxSetup({
						 headers: {
								 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						 }
				 });
				console.log('payment click');
				console.log('x-csrf-token:',$('meta[name="csrf-token"]').attr('content'));
				console.log('slip',$('#silp').val());
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            //method :'PUT',
						method :'post',
            url :'/v1/order',
            data : new FormData($("#payment-form")[0]),
            processData : false,
            contentType : false,
            success:function(response){
                if(response.success){
                    $.ajax({
                        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        method :'get',
                        url :'/notification?order_id='+$("#input-order").val(),
                        processData : false,
                        contentType : false,
                        success:function(response){
                            if(response.success){
                                $("body").css("cursor", "default");
                                $("#modal-successfully").modal('show');
                            }
                        },
                        error : function(xhr, status, error){
                            console.log(error)
                            $("body").css("cursor", "default");
                            $("#modal-problem").modal('show');
                        }
                      });
                }
            },
            error : function(xhr, status, error){
                console.log(error)
                $("#modal-problem").modal('show');
            }
          });
    });
});
$(document).ready(function(){
    $("#success").on('click', function(){
        window.location.reload();
    });
    $("#problem").on('click', function(){
        window.location.reload();
    });
});
/**Formatter table*/
function totalFormatter(value,row){
    if(value){
        return numberOnly(value);
    }
    return 0;
}
function priceFormatter(value,row){
    if(value){
        return numberOnly(value);
    }
    return 0;
}
function imageFormatter(value, row){
    return "<div class='cropped-table' ><img src='"+window.location.origin+"/storage/product/"+row.id+"/"+row.pic1_url+"'/></div>";
}
function totalPriceSumFormatter(items) {
    var totalPrice = 0;
		var shipping_charge = 0;
    items.forEach(function(item) {
      totalPrice = totalPrice + item.total;
			shipping_charge = item.charge;
    });
		totalPrice += shipping_charge;
    return numberOnly(totalPrice);
  }
function titleFormatter(items){
    //return 'รวม';
		return '';
}
function titleShippingFormatter(items){
	var charge ='';
	items.forEach(function(item) {
		charge = item.charge;
	});
	if(charge==''){
		return 'Total with shipping charge';
	}else{

		return 'Total with shipping charge ('+charge+')';
	}
}
$(document).ready(function(){
    $('#paid').on('change, keyup', function(event){
        event.preventDefault();
        // skip for arrow keys
        if(event.which >= 37 && event.which <= 40) return;

        // format number
        $(this).val(function(index, value) {
            return numberOnly(value);
        });
    });
});
/**number only */
function numberOnly(value){
    return value.toString().replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

/**on key enter */
$(document).ready(function(){
    $('#input-order').on('keypress',function(e) {
        if(e.which == 13) {
            $("#search-order").click();
        }
    });
});
/** find by id or username*/
$(document).ready(function(){
    setTimeout(function () {$("#order-table").bootstrapTable("hideLoading");}, 10);
    $("#search-order").on('click' , function(){
        var key = $('#input-order').val();
        if(key){
            $.ajax({
                type: 'get',
                url : '/v1/order?key='+ key,
                contentType : 'application/json',
                success : function(res){
                    if(res.success){
											var dataRes = res.data;
											console.log('dataRes',res);
											var i;
											for (i = 0; i < dataRes.length; i++) {
												dataRes[i].product_name = "<a href='/product/ListProductDetail?id_product="+dataRes[i].id_product+"&id_category="+dataRes[i].id_category_product+"' target='_blank'>"+dataRes[i].product_name+"</a>";
												dataRes[i].total -=dataRes[i].charge;
											}
                        $('#order-table').bootstrapTable('load',{data : dataRes});
                    }else{
                        console.log(res.message);
                    }
                },
                error : function(xhr, status, error){
                    console.log(error);
                }
            });
        }
    });
		if($("#input-order").val()){
			console.log('input-order val');
				$("#search-order").click();
		}
});
