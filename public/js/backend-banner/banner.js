(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('BackendBannerController', function ($scope,$http){
    });
})();
// Multiple images preview in browser
$(function() {
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img>'))
                        .attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#imageInput').on('change', function() {
        imagesPreview(this, 'div#gallery');
    });
});

$(function() {
    var imagesPreviewedit = function(input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $("#edit-img").attr('src',event.target.result);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#image-edit').on('change', function() {
        imagesPreviewedit(this, 'div#gallery-edit');
    });
});

$(document).ready(function() {
    setTimeout(function(){
        $('#response').hide();
    }, 5000);
});

/**list all banner */
$(document).ready(function(){
    if($('#bannerLoad').val()){
        $.ajax({
            url: "/BackendBanner/ListCarousal",
            type: "get",
            contentType: "application/json",
            success : function(response) {
                if(response){
                    $('#banner').bootstrapTable('load',{data : response});
                }
            },error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
              }
        });
        setTimeout(function () {$("#banner").bootstrapTable("hideLoading");}, 500);
    }
});
/**Formatter table*/
function viewbannerFormatter(value, row) {
    return "<div class='banner-list'><img src='"+window.location.origin+'/storage/banner/'+row.carousel_path+"'></div>";
}
function deleteBannerFormatter(value, row) {
    return "<a href='javascript:void(0);' class='btn btn-danger ers' onclick='ondelete("+row.id+");'>delete</a>";
}
function editBannerFormatter(value, row) {
    return "<a href='javascript:void(0);' class='btn btn-warning ers' onclick='openModal("+row.id+")'>edit</a>";
}
// Open modal Add Category
function openModal(id){
    $.ajax({
        url: "/BackendBanner/SelectCarousal/"+id,
        type: "get",
        contentType: "application/json",
        success : function(response) {
            if(response){
                $("#tempID").val(response[0].id)
                $("#edit-img").attr('src',window.location.origin+'/storage/banner/'+response[0].carousel_path)
            }
        },error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
          }
    });
    $('#modal-banner').modal('show');
}
/**on event del */
function ondelete(id){
    var r = confirm("are you sure you want to delete banner ?");
    if (r == true) {
        $.ajax({
            url: "/BackendBanner/DeleteCarousal/"+id,
            type: "get",
            contentType: "application/json",
            success : function(response) {
                if(response){
                    location.reload();
                }
            },error: function(xhr, status, error) {
                var err = eval("(" + xhr.responseText + ")");
                console.log(err.Message);
              }
        });
    } else {
        return false;
    }
}
