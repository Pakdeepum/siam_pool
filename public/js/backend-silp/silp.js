(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('BackendSilpController', function ($scope,$http){

    });
})();

function emailTrackFormatter(value, row) {
    return "<a href='javascript:void(0);' class='btn btn-sm btn-info push-down-10'  onclick='onSendTracking(\""+row.order_id+"\")'><i class=\"fa fa-envelope-o\" aria-hidden=\"true\"></i></a>";
}
function deleteFormatter(value, row) {
    return "<a href='javascript:void(0);' class='btn btn-sm btn-danger push-down-10'  onclick='ondelete(\""+row.order_id+"\")'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></a>";
}
function approveFormatter(value, row) {
    return "<a href='javascript:void(0);' class='btn btn-sm btn-success push-down-10'  onclick='onApproved(\""+row.order_id+"\")'><i class=\"fa fa-thumbs-o-up\" aria-hidden=\"true\"></i></a>";
}
function imageFormatter(value, row){
	// console.log('image formater',row);
    if(row.status === 'unpaid' || row.slip_image === null){
        return '-'
    }
    return "<div class='cropped'  style='max-width:200px;'><a href='"+window.location.origin+"/storage/silp/"+row.slip_image+"' target='_blank'><img src='"+window.location.origin+'/storage/silp/'+row.slip_image+"'/></a></div>";
}
function datePaidFormatter(value, row){
    if(row.status === 'unpaid'){
        return '-'
    }
    return value;
}
function priceFormatter(value,row){
    if(value){
        return numberOnly(value);
    }
    return 0;
}
function detailFormatter(index, row) {
    var html = []
    var content = []
    $.ajax({
        type: 'get',
        url : '/v1/handle/subView?key='+ row.order_id,
        contentType : 'application/json',
        async: false,
        success : function(res){
            res.content.forEach(element => {
                element.products.forEach(val => {
										var price = val.special[0]!=null?val.price-(val.special[0].discount *val.price/100):val.price;
                    var result = {
                        "name" : "<a href='/product/ListProductDetail?id_product="+val.id_product+"&id_category="+val.id_category_product+"' target='_blank'>"+val.product_name+"</a>",
                        "price" : val.special[0]!=null?'<span id="price2">'+numberOnly(price)+' </span><strike><span id="price">'+numberOnly(val.price)+'</span></strike>':price,
                        "amount" : element.product_amount,
                        "total" : element.product_amount * price
                    }
                    content.push(result);
                });
            });

        },
        error : function(xhr, status, error){
            $("body").css("cursor", "default");
            console.log(error);
        }
    });
    var h = "<div class='row'>"+
                "<div class='col'><strong>Product</strong></strong></div>"+
                "<div class='col'><strong>Price/item</strong></div>"+
                "<div class='col'><strong>Amount</strong></div>"+
                "<div class='col'><strong>Total Price</strong></div>"+
            "</div>"
    html.push(h)
    $.each(content, function (key, value) {
        html.push(createHtml(value));
    })
    return html.join('')
}

function createHtml(content){
    var html =  "<div class='row'>"+
                    "<div class='col'>"+content.name+"</div>"+
                    //"<div class='col'>"+numberOnly(content.price)+"</div>"+
										"<div class='col'>"+content.price+"</div>"+
                    "<div class='col'>"+numberOnly(content.amount)+"</div>"+
                    "<div class='col'>"+numberOnly(content.total)+"</div>"+
               "</div>"
    return html;
}
$(document).ready(function(){
    $('#success').hide();
    $('#error').hide();

    OrderTable();
});
function onSendTracking(order_id){
    $("#modal-sendTracking").modal('show');
    $.ajax({
        type: 'get',
        url : '/v1/handle/trackCode?key='+ order_id,
        contentType : 'application/json',
        success : function(res){
					console.log('onSendTracking: success: ',res);
            if(res.success){
                $("#send-email").val(res.user[0].user.email);
                $("#customer").val(res.user[0].customers.name + " " + res.user[0].customers.lastname)
                res.track.forEach(element => {
                    $('#trackCode').append($('<option>',
                        {
                            value: element.service_url,
                            text : element.service
                        })
                    );
                });
            }
        },
        error : function(xhr, status, error){
            $("body").css("cursor", "default");
            console.log(error);
        }
    });
}

/**send tracking to email */
$(document).ready(function(){
    $("#trackCode-valid").hide();
    $("#email-track").on('click', function(){
        if(!$("#send-tracking").val()){
            setTimeout(function () {
                $("#send-tracking").popover('show');
            }, 100);
            $("#track-validate").addClass('has-error');
            return false;
        }else{
            $("#track-validate").removeClass('has-error');
            $("#track-validate").addClass('has-success');
        }
        if(!$("#trackCode").val()){
            $("#trackCode-valid").show();
            setTimeout(function () {
                $("#trackCode-valid").hide();
            }, 1000);
            return false;
        }
        var mail = {
            "email" : $('#send-email').val(),
            "track" : $("#send-tracking").val(),
            "url" : $("#trackCode").val(),
            'customer' : $('#customer').val()
        }
        $("body").css("cursor", "wait");
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method :'post',
            url :'/v1/handle/trackMail',
            data : {"data" : mail},
            dataType: "JSON",
            success:function(response){
							console.log('on trackMail success:',response);
                $("#modal-sendTracking").modal('hide');
                if(response.success){
                    $("body").css("cursor", "default");
                    setTimeout(function () {
                        alert(response.message);
                        OrderTable();
                    }, 500);
                }
            },
            error : function(xhr, status, error){
                $("body").css("cursor", "default");
                console.log(xhr.responseJSON)
            }
        });
    });
});
/**validation tracking */
$(document).ready(function(){
    $('#modal-sendTracking').on('hidden.bs.modal', function (e) {
        $("#send-tracking").val('')

        if($("#track-validate").hasClass('has-error')){
            $("#track-validate").removeClass('has-error');
        }

        if($("#track-validate").hasClass('has-success')){
            $("#track-validate").removeClass('has-success');
        }
    })
});

function onApproved(id){
    var r = confirm("Are you sure to Approved this Order!");
    if (r == true) {
    var data = {'orderId' : id};
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method :'get',
        url :'/v1/handle/approved',
        dataType: "json",
        data : data,
        success:function(response){
           if(response.success){
               alert(response.message);
               setTimeout(function () {
                OrderTable();
            }, 500);
           }else{
                alert(response.message)
           }
        },
        error : function(xhr, status, error){
            $("body").css("cursor", "default");
            console.log("error : " , error);
        }
      });
    }
}

function OrderTable(){
    /**ajax call*/
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method :'get',
        url :'/v1/handle/silp',
        processData : false,
        contentType : false,
        success:function(response){
            if(response.result.length > 0){
							console.log('order list:',response);
                if(response.success){
										for(var i=0;i<response.result.length;i++){
											response.result[i].receiverName= response.result[i].customers.name+' '+response.result[i].customers.lastname;
											response.result[i].paid_date = response.result[i].paid_date+' ('+response.result[i].paid_bank+')';
										}

                    $('#order-information').bootstrapTable('load',{data : response.result});
                }
            }
        },
        error : function(xhr, status, error){
            console.log("error : " , error);
        }
      });
    /** */
    setTimeout(function () {
        $("#order-information").bootstrapTable("hideLoading");
    }, 100);
}
/**on key enter */
$(document).ready(function(){
    $('#order-id').on('keypress',function(e) {
        if(e.which == 13) {
            $("#btn-order").click();
        }
    });
});
/** find by id or username*/
$(document).ready(function(){
    $("#btn-order").on('click' , function(){
        var key = $('#order-id').val();
        if(key){
            $.ajax({
                type: 'get',
                url : '/v1/handle/silp?key='+ key,
                contentType : 'application/json',
                success : function(res){
                    if(res.result.length > 0){
                        if(res.success){
                            $('#order-information').bootstrapTable('load',{data : res.result});
                        }
                    }
                    $('#order-information').bootstrapTable('load',{data : res.result});
                },
                error : function(xhr, status, error){
                    $("body").css("cursor", "default");
                    console.log(error);
                }
            });
        }else{
            OrderTable();
        }
    });
});
function ondelete(id){
    var r = confirm("Are you sure to Delete!");
    if (r == true) {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method :'delete',
            url :'/v1/handle/silp?id='+id,
            contentType : 'application/json',
            success:function(response){
                if(response.success){
                    $('#success').show();
                    $('#success span').text(response.message);
                    OrderTable();
                    setTimeout(function () {
                        $('#success').hide();
                    }, 2000);
                }
            },
            error : function(xhr, status, error){
                $("body").css("cursor", "default");
                $('#error').show();
                $('#error span').text("these was has a problem delete bank information.");
                setTimeout(function () {
                    $('#error').hide();
                }, 2000);
            }
        });
    } else {
        return false;
    }
}
/**number only */
function numberOnly(value){
    return value.toString().replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
