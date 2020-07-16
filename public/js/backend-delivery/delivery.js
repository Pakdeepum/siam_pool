
(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('BackendPaymentController', function ($scope,$http){   
        
    });
})();
function initialzed(){
    if($("#validate-service-name").hasClass('has-error-redio')){
        $("#validate-service-name").removeClass('has-error-redio')
    }
    if($("#validate-service-name").hasClass('has-error')){
        $("#validate-service-name").removeClass('has-error')
    }

    $('#success').hide();
    $('#error').hide();
    $("#service-name-valid").hide();

    setTimeout(function () {$("#delivery-information").bootstrapTable("hideLoading");}, 10);
}
$(document).ready(function(){
    
    $("#service-charge").on('keydown, keyup',function(){
        var number = numberOnly($("#service-charge").val());
        $("#service-charge").val(number);
    });

    $("#service-charge").on('click',function(){
        this.select();
    });

    initialzed();
    deliveryformation();
    $("#service-name").on('keyup, keydown', function(){
        setTimeout(function () {
            $("#validate-service-name").removeClass('has-error');
            $("#service-name-valid").css('display','none');
        }, 100);
    });

    $("#add-service").on('click', function(){
        /**validate */
        if(!$("#service-name").val()){
            $("#validate-service-name").addClass('has-error');
                $("#service-name-valid").css('display','block');
                //$("#service-name-valid").hide();
                $("#service-name").focus();
                setTimeout(function () {
                    $("#validate-service-name").removeClass('has-error');
                    $("#service-name-valid").css('display','none');
                }, 2500);
            return false;
        }
        $("body").css("cursor", "wait");
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method :'post',
            url :'/v1/handle/delivery',   
            data : new FormData($("#service-form")[0]),     
            processData : false,
            contentType : false,
            success:function(response){
                if(response.success){
                    $('#success').show();
                    $('#success span').text(response.message);
                    deliveryformation();
                    $("body").css("cursor", "default");
                    setTimeout(function () {                        
                        $("#service-name").val('');
                        $("#service-url").val('');
                        $("#service-charge").val('');
                        $('#success').hide();
                    }, 2000);
                }
            },
            error: function(xhr, status, error){
                $('#error').show();
                $('#error span').text("these was has a problem.");
                setTimeout(function () {
                    $('#error').hide(); 
                }, 2000);
            }
        });
    });
});

function indexFormatter(value, row, index){
    return index + 1;
}
function urlFormatter(value, row, index){
    return "<a target='_blank' href="+value+">"+value+"</a>";
}
function chargeFormatter(value, row, index){
    return numberOnly(value);
}

function deleteFormatter(value, row, index){
    return "<a href='javascript:void(0);' class='btn btn-sm btn-danger push-down-10'  onclick='ondelete(\""+row.id+"\")'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></a>";
}

$(function () {
    $('#delivery-information').on('post-body.bs.table', function (e, data, args) {   
        for(row in data) {
            $(this).bootstrapTable('check', data[row].id-1); 
            return false; 
        }      
    });
});

$(document).ready(function(){
    $('#delivery-information').on('check.bs.table',function(row, $element){
        $("body").css("cursor", "wait");
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: 'post',
            url : '/v1/handle/useDelivery', 
            data : {"data" : $element},      
            dataType : 'JSON',
            success : function(res){
                if(res.success){
                     setTimeout(function () {
                        $("body").css("cursor", "default");
                        $('#success').hide();
                    }, 100);                      
                }             
            },
            error: function(xhr, status, error){
                console.log(xhr.responseJSON)
                $('#error').show();
                $('#error span').text("these was has a problem.");
                setTimeout(function () {
                    $('#error').hide(); 
                }, 500);
            }
        });
    });
});

function ondelete (id){
    var r = confirm("Are you sure to Delete!");
    if (r == true) {
    $("body").css("cursor", "wait");
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: 'delete',
        url : '/v1/handle/delivery?id='+id,       
        contentType : 'application/json',
        success : function(res){
            if(res.success){
                $('#success').show();
                $('#success span').text(res.message);
                deliveryformation();
                setTimeout(function () {
                    $("body").css("cursor", "default");
                    $('#success').hide();
                }, 1000);                      
            }             
        },
        error: function(xhr, status, error){
            console.log(xhr.responseJSON)
            $('#error').show();
            $('#error span').text("these was has a problem.");
            setTimeout(function () {
                $('#error').hide(); 
            }, 2000);
        }
    });
}
}

/**number only */
function numberOnly(value){
    return value.toString().replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function deliveryformation(){
    $.ajax({
        type: 'get',
        url : '/v1/handle/delivery/view',
        contentType : 'application/json',
        success : function(res){
            if(res.success){
                $('#delivery-information').bootstrapTable('load',{data : res.data});
                   
            }             
        },
        error : function(xhr, status, error){
            console.log(error);
        }
    });
}