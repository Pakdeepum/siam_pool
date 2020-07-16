
(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('BackendPaymentController', function ($scope,$http){   
        
    });
})();
/**Bank */
$(document).ready(function(){
    $("#add-bank").on('click', function(){
        if(!$("#bank-name").val()){
            $('#bank-name').popover({
                trigger: 'focus'
            });
            $('#bank-name').focus();
            return false;
        }
        if(!$("#account-name").val()){
            $('#account-name').popover({
                trigger: 'focus'
            });
            $('#account-name').focus();
            return false;
        }
        if(!$("#account-number").val()){
            $('#account-number').popover({
                trigger: 'focus'
            });
            $('#account-number').focus();
            return false;
        }
        /**ajax call */
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method :'POST',
            url :'/v1/bankInfo',
            data : new FormData($("#bank-info-form")[0]),           
            processData : false,
            contentType : false,
            success:function(response){
                if(response.success){
                    $('#success').show();
                    $('#success span').text(response.message)

                    $('#bank-name').val('');
                    $('#account-name').val('');
                    $('#account-number').val('');
                    bankInformation();
                    setTimeout(function () {
                        $('#success').hide();
                        
                    }, 2000);
                }
            }, 
            error: function(xhr, status, error){
                $('#error').show();
                $('#error span').text("these was has a problem create bank information.");
                setTimeout(function () {
                    $('#error').hide(); 
                }, 2000);
            }
          });
    });
});
/**views */
$(document).ready(function(){
     $('#success').hide();
     $('#error').hide();
     /**ajax call bank master*/
     $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method :'get',
        url :'/v1/getBankInfo',        
        processData : false,
        contentType : false,
        success:function(response){
            if(response.success){
                response.data.forEach(element => {
                    $('#bank-name').append($('<option>',
                        {
                            value: element.bank_code,
                            text : element.bank_name
                        })
                    );
                    $('#bank-name-edit').append($('<option>',
                        {
                            value: element.bank_code,
                            text : element.bank_name
                        })
                    );
                });
            }
        },
        error: function(xhr, status, error){
            console.log("error : " , error);
        }
      });

      bankInformation();
    
    /** */
    setTimeout(function () {
        $("#bank-information").bootstrapTable("hideLoading");
    }, 100);
});

function bankInformation(){
    /**ajax call data to table */
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method :'get',
        url :'/v1/bankInfo',        
        processData : false,
        contentType : false,
        success:function(response){
            if(response.success){
                $('#bank-information').bootstrapTable('load',{data : response.data});
            }
        },
        error: function(xhr, status, error){
            console.log("error : " , error);
        }
    });
}
function deleteFormatter(value, row) {
    return "<a href='javascript:void(0);' class='btn btn-sm btn-danger mb-2'  onclick='ondelete("+row.id+");'>delete</a>";
}
function editFormatter(value, row) {
    return "<a href='javascript:void(0);' class='btn btn-sm btn-warning mb-2' onclick=\"openModal(\'"+row.id+"\',\'"+row.bank_code+"\',\'"+row.account_name+"\',\'"+row.account_number+"\')\">edit</a>";
}
/**update */
$(document).ready(function(){
    $("#edit-bank-info").on('click', function(){
        $('#modal-bank-info').modal('hide');
        $("body").css("cursor", "wait");
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method :'post',
            url :'/v1/bankInfo',   
            data : new FormData($("#bank-info-update")[0]),     
            processData : false,
            contentType : false,
            success:function(response){
                if(response.success){
                    $('#success').show();
                    $('#success span').text(response.message);
                    bankInformation();
                    setTimeout(function () {
                        $("body").css("cursor", "default");
                        $('#success').hide();
                    }, 2000);
                }
            },
            error: function(xhr, status, error){
                $('#error').show();
                $('#error span').text("these was has a problem update bank information.");
                setTimeout(function () {
                    $('#error').hide(); 
                }, 2000);
            }
        });
    });
});

function openModal(id,bank_name,account_name,account_number){
    $("#id").val(id);
    $("#bank-name-edit").val(bank_name);
    $("#account-name-edit").val(account_name);
    $("#account-number-edit").val(account_number);
    $('#modal-bank-info').modal('show');
}
function ondelete(id){
    var r = confirm("Are you sure to Delete!");
    if (r == true) {
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method :'delete',
            url :'/v1/bankInfo?id='+id,        
            contentType : 'appliction/json',
            success:function(response){
                if(response.success){
                    
                    $('#success').show();
                    $('#success span').text(response.message);
                    bankInformation();
                    setTimeout(function () {
                        $('#success').hide(); 
                    }, 2000);
                }
            },
            error: function(xhr, status, error){
                console.log(error)
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

$(document).ready(function(){
    $('#account-number').on('change, keyup', function(event){
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
    return value.replace(/\D/g, "");
}