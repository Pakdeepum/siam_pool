(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('BackendUserController', function ($scope,$http){

    });
})();

function indexFormatter(value, row, index){
    return index + 1;
}

function nameFormatter(value, row){
    if(!value){
        return ;
    }
    return row.customers.name + ' '+ row.customers.lastname;
}

function deleteFormatter(value, row, index){
    return "<a href='javascript:void(0);' class='btn btn-sm btn-danger push-down-10'  onclick='ondelete(\""+row.id+"\")'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></a>";
}

$(document).ready(function(){
    setTimeout(function () {$("#user-table").bootstrapTable("hideLoading");}, 10);
    getUser();
});

function ondelete(id){
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method :'delete',
        url :'/v1/handle/user?id='+id,
        contentType : 'appliction/json',
        success:function(response){
            if(response.success){
                alert(response.message)
            }
        },
        error : function(error){
            console.log(error)
        }
    });
}

function getUser(){
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method :'get',
        url :'/v1/handle/getUser',
        contentType : 'appliction/json',
        success:function(response){
            if(response.success){
								console.log('get user list:',response.result);
								for(var i=0;i<response.result.length;i++){
									response.result[i].fullName = response.result[i].customers.name +' '+response.result[i].customers.lastname;
								}
                $("#user-table").bootstrapTable( 'load',{data : response.result});
            }
        },
        error : function(error){

        }
    });
}

/**on key enter */
$(document).ready(function(){
    $('#input-user').on('keypress',function(e) {
        if(e.which == 13) {
            $("#search-user").click();
        }
    });

    $("#search-user").on('click', function(){
        var key = $('#input-user').val();
        if(key){
            $.ajax({
                type: 'get',
                url : '/v1/handle/getUser?key='+ key,
                contentType : 'application/json',
                success : function(res){
                     if(res.success){
											 console.log('search user:',res.result);
											 if(res.result.length>0){
												 if(res.result[0].customers){
 													for(var i=0;i<res.result.length;i++){
 														res.result[i].fullName = res.result[i].customers.name +' '+res.result[i].customers.lastname;
 													}
                             $('#user-table').bootstrapTable('load',{data : res.result});
                         }else{
                             $('#user-table').bootstrapTable('load',{data : []});
                         }
											 }else{
												      $('#user-table').bootstrapTable('load',{data : []});
											 }

                    }
                },
                error : function(error){
                    console.log(error);
                }
            });
        }else{
            getUser();
        }
    });
});
