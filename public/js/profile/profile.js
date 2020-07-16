(function () {
	'use strict';
    var app = angular.module('application', []);

    app.controller('ProfileController', function ($scope,$http){   
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
$(document).ready(function(){
    $("#profile-province").select2();
    $('#profile-province').on('select2:unselect',function(){
        $('#profile-province').html(null);
    });

    $("#profile-aumphar").select2();
    $('#profile-aumphar').on('select2:unselect',function(){
        $('#profile-aumphar').html(null);
    });
    $("#profile-district").select2();
    $('#profile-district').on('select2:unselect',function(){
        $('#profile-district').html(null);
    });
    $("#profile-postCode").select2();
    $('#profile-postCode').on('select2:unselect',function(){
        $('#profile-postCode').html(null);
    });
    /**/
    phoneCode.forEach(element => {
        $('#profile-conutry-code').append($('<option>',
            {
                value: element.phonecode,
                text : element.iso +" +"+ element.phonecode
            })
        );        
    });
    $('#profile-conutry-code option[value='+code+']').attr('selected','selected');
    $("#profile-conutry-code").select2();
    province.forEach(element => {
        $('#profile-province').append($('<option>',
            {
                value: element.province_id + "," + element.geo_id,
                text : element.province_name
            })
        );            
    });
    
    if(parseInt(_province) !== 0){
        $('#profile-province option[value="'+_province+","+_geo+'"]').attr('selected','selected').change(); 
    }   
    /**province on change */
    $( "#profile-province" )
            .change(function () {
                $('#profile-aumphar')
                    .empty()
                    .append('<option selected="selected" value="0">...</option>')
                ;
            if(parseInt($("#profile-province").val()) !== 0){
                $("#province-tmp").val($('#profile-province').select2('data')[0].text)
                $.ajax({           
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    method : 'get',
                    url : '/v1/getAumphar?province_id='+$("#profile-province").val(),
                    success : function(res){
                        
                        res.forEach(element => {
                            $('#profile-aumphar').append($('<option>',
                                {
                                    value: element.amphur_id,
                                    text : element.amphur_name
                                })
                            );            
                        });
                        $('#profile-aumphar option[value='+amphur+']').attr('selected','selected').change();
                    },
                    error : function(error){
                        console.log(error)
                    }
                });  
            }                   
    })
    .change();
    /** aumphar on change*/
    $( "#profile-aumphar " )
            .change(function () {
                $('#profile-district')
                .empty()
                .append('<option selected="selected" value="0">...</option>')
                ;
                $("#aumphar-tmp").val($('#profile-aumphar').select2('data')[0].text)
            $.ajax({           
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method : 'get',
            url : '/v1/getDistict?amphur_id='+$("#profile-aumphar").val(),
            success : function(res){                    
                 res.forEach(element => {
                    $('#profile-district').append($('<option>',
                        {
                            value: element.district_code,
                            text : element.district_name
                        })
                    );            
                });
                $('#profile-district option[value='+district+']').attr('selected','selected').change();
            },
            error : function(error){
                console.log(error)
            }
        });     
    })
    .change();
    /** district on change */
    $( "#profile-district " )
            .change(function () {
                $('#profile-postCode')
                    .empty()
                    .append('<option selected="selected" value="0">...</option>')
                ;
                $("#district-tmp").val($('#profile-district').select2('data')[0].text)
            $.ajax({           
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method : 'get',
            url : '/v1/getPostCode?district_id='+$("#profile-district").val(),
            success : function(res){
                res.forEach(element => {
                    $('#profile-postCode').append($('<option>',
                        {
                            value: element.id,
                            text : element.post_code
                        })
                    );            
                });
                $('#profile-postCode option[value='+postcode+']').attr('selected','selected').change();
            },
            error : function(error){
                console.log(error)
            }
        });
    })
    .change();
    $( "#profile-postCode" )
            .change(function () {
                $("#postCode-tmp").val($('#profile-postCode').select2('data')[0].text)
    })
    .change();
    
});

$(document).ready(function(){
    $("#profile-accept").on('click', function(){
        $("body").css("cursor", "wait");
        $.ajax({           
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method : 'post',
            url : '/v1/updateProfile',
            data : new FormData($("#profile-form")[0]),     
            processData : false,
            contentType : false,
            success : function(res){
                if(res.success){
                    setTimeout(function () {
                        $("#modal-profile").modal('show')
                        $("body").css("cursor", "default");
                    }, 500);
                }               
            },
            error : function(error){
                console.log(error)
            }
        });  
    });
    $("#profile-cancel").on('click', function(){
        window.location.reload();
    });
});