(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('BackendSpecialController', function ($scope,$http){

    });
})();

$(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var reader = new FileReader();
            reader.onload = function(event) {
                $($.parseHTML('<img>'))
                    .attr('src', event.target.result).appendTo(placeToInsertImagePreview);
            }
            reader.readAsDataURL(input.files[0]);
        }
    };
    $('#image_promotion').on('change', function() {
        $("#image img").remove();
        imagesPreview(this, 'div#image');
    });
    $('#image_promotion_edit').on('change', function() {
        $("#image_edit img").remove();
        imagesPreview(this, 'div#image_edit');
    });
});

function editFormatter(value, row, index){
    return "<a href='javascript:void(0);' class='btn btn-md btedit push-down-10'  onclick='onedit(\""+row.id+"\")'>Edit</a>";
}
function deleteFormatter(value, row, index){
    return "<a href='javascript:void(0);' class='btn btn-md btdel push-down-10'  onclick='ondelete(\""+row.id+"\")'>Delete</a>";
}
function indexFormatter(value, row, index){
    return index +1;
}
function promotionFormatter(value, row, index){
    return "<div class='cropped' ><img src='"+window.location.origin+'/storage/special/'+row.special_image+"'/></div>";
}
function onedit(id){
    var getData = JSON.stringify($("#promotion-table").bootstrapTable("getRowByUniqueId",id));
    var json = JSON.parse(getData);

    $("#edit-name-valid").hide();
    $("#image_promotion_edit-valid").hide();
    $("#promotion-error-edit").hide()

    $("#image_edit").append('<img src=""/>');
    $('#image_edit img').attr('src', window.location.origin+'/storage/special/'+json.special_image);
    $("#oldFile").val(json.special_image);
    $('#_id').val(json.id)
    $("#special_name_edit").val(json.special_name);
    $("#special_discount_edit").val(json.discount);
    $("#modal-edit-promotion").modal('show');
}

function ondelete(id){
    var r = confirm("Are you sure to Delete!");
    if (r == true) {
        $("body").css("cursor", "wait");
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method :'delete',
            url :'/BackendSpecial/promotion?id='+id,
            contentType : 'application/json',
            success:function(response){
                $("body").css("cursor", "default");
                if(response.success){
                    $('#promotion-success').show();
                    $('#promotion-success label').text(response.message);
                    getPromotion();
                    setTimeout(function () {
                        $('#promotion-success').hide();
                    }, 2000);
                }else{
                    $("body").css("cursor", "default");
                    $('#promotion-list-error').show();
                    $('#promotion-list-error label').text(response.message);
                    setTimeout(function () {
                        $('#promotion-list-error').hide();
                    }, 2000);
                }
            }
        });
    } else {
        return false;
    }
}
$(document).ready(function(){
    setTimeout(function () {$("#promotion-table").bootstrapTable("hideLoading");}, 10);

    getPromotion();

    $("#image_promotion-valid").hide();
    $("#special-name-valid").hide();
    $("#special-discount-valid").hide();
    $("#promotion-error").hide();
    $("#promotion-success").hide();
    $("#promotion-list-error").hide();

    $("#modal_add-promotion").on('click', function(){
        $("#modal-promotion").modal('show');
    });

    $("#add-promotion").on('click', function(){
        var $file = $("input[name='image_promotion']");
        if (parseInt($file.get(0).files.length)==0){
            $("#image_promotion-valid").css('display','block');
            $('#input[name="image_promotion"]').focus();
            setTimeout(function () {
                $("#image_promotion-valid").css('display','none');
            }, 3000);
            return false;
        }
        if(!$("#special_name").val()){
            $("#special-name-valid").css('display','block');
            $('.valid-special_name').addClass('has-error');
            $('#special_name').focus();
            setTimeout(function () {
                $('.valid-special_name').removeClass('has-error');
                $("#special-name-valid").css('display','none');
            }, 3000);
            return false;
        }
        if(!$("#special_discount").val()){
            $("#special-discount-valid").css('display','block');
            $('.valid-special_discount').addClass('has-error');
            $('#special_discount').focus();
            setTimeout(function () {
                $('.valid-special_discount').removeClass('has-error');
                $("#special-discount-valid").css('display','none');
            }, 3000);
            return false;
        }
        $("body").css("cursor", "wait");
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method :'post',
            url :'/BackendSpecial/promotion',
            data : new FormData($("#promotion-form")[0]),
            processData : false,
            contentType : false,
            success:function(response){
                if(response.success){
                    $("#modal-promotion").modal('hide');
                    $("#promotion-success").show();
                    $("#promotion-success label").text(response.message);
                    $("body").css("cursor", "default");
                    getPromotion();
                    setTimeout(function () {
                        $("#promotion-success").hide();
                    }, 2000);
                } else{
                    $("body").css("cursor", "default");
                    $("#promotion-error").show();
                    $("#promotion-error label").text(response.message.image_promotion[0])
                    setTimeout(function () {
                        $("#promotion-error").hide();
                    }, 3500);
                }
            }
        });
    });

    /**hide */
    $('#modal-promotion').on('hidden.bs.modal', function (e) {
        $(this).find("input[type=file]").val('').end();
        $("#image img").remove();
        $("#special_name").val('')
        $("#image_edit img").remove();
    })
    $('#modal-edit-promotion').on('hidden.bs.modal', function (e) {
        $("#image_edit img").remove();
        $("#special_name_edit").val('')
        $("#special_discount_edit").val()
    })
});

$(document).ready(function(){
    $("#edit-name-valid").hide();
    $("#special-discount-valid-edit").hide();
    $("#add-promotion-edit").on('click', function(){
        if(!$("#special_name_edit").val()){
            $("#edit-name-valid").css('display','block');
            $('.valid-special_name_edit').addClass('has-error');
            $('#special_name_edit').focus();
            setTimeout(function () {
                $('.valid-special_name_edit').removeClass('has-error');
                $("#edit-name-valid").css('display','none');
            }, 3000);
            return false;
        }
        if(!$("#special_discount_edit").val()){
            $("#special-discount-valid-edit").css('display','block');
            $('.valid-special_discount_edit').addClass('has-error');
            $('#special_discount_edit').focus();
            setTimeout(function () {
                $('.valid-special_discount_edit').removeClass('has-error');
                $("#special-discount-valid-edit").css('display','none');
            }, 3000);
            return false;
        }
        $("body").css("cursor", "wait");
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method :'post',
            url :'/BackendSpecial/promotion',
            data : new FormData($("#promotion-edit-form")[0]),
            processData : false,
            contentType : false,
            success:function(response){
                console.log(response)
                if(response.success){
                    $("#modal-edit-promotion").modal('hide');
                    $("#promotion-success").show();
                    $("#promotion-success label").text(response.message);
                    $("body").css("cursor", "default");
                    getPromotion();
                    setTimeout(function () {
                        $("#promotion-success").hide();
                    }, 2000);
                } else{
                    $("body").css("cursor", "default");
                    $("#promotion-error-edit").show();
                    $("#promotion-error-edit label").text(response.message)
                    setTimeout(function () {
                        $("#promotion-error-edit").hide();
                    }, 3500);
                }
            },error : function(error){
                console.log(error)
            }
        });
    });
});
/**number only */
function numberOnly(value){
    return value.toString().replace(/\D/g, "")
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
$(document).ready(function(){
    $('#input-promotion').on('keypress',function(e) {
        if(e.which == 13) {
            $("#search-promotion").click();
        }
    });

    $("#special_discount").on('keyup', function(){
        $("#special_discount").val(numberOnly($("#special_discount").val()));
    });

    $("#search-promotion").on('click', function(){
        var key = $('#input-promotion').val();
        if(key){
            $("body").css("cursor", "wait");
            $.ajax({
                type: 'get',
                url : '/BackendSpecial/promotion?key='+ key,
                contentType : 'application/json',
                success : function(res){
                    $("body").css("cursor", "default");
                    if(res.result.length > 0){
                        if(res.success){
                            $('#promotion-table').bootstrapTable('load',{data : res.result});
                        }
                    }
                    $('#promotion-table').bootstrapTable('load',{data : res.result});
                }
            });
        }else{
            $("body").css("cursor", "default");
            getPromotion();
        }
    });
});

function getPromotion(){
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method :'get',
        url :'/BackendSpecial/promotion',
        processData : false,
        contentType : false,
        success:function(response){
            if(response.result.length > 0){
                if(response.success){
                    $('#promotion-table').bootstrapTable('load',{data : response.result});
                }
            }
        }
      });
}
