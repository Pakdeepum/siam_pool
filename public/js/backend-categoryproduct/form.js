(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('BackendCategoryProductController', function ($scope,$http){
     
    });
})();
// Open modal Add Category
jQuery(document).ready(function(){
    jQuery('#open-modal-AddCategory').click(function(e){
       $('#modal-AddCategory').modal('show')

       $('#modal-AddCategory').on('hidden.bs.modal', function (e) {
        $(this)
          .find("input,textarea,select")
             .val('')
             .end()
          .find("input[type=checkbox], input[type=radio]")
             .prop("checked", "")
             .end()
         .find("input[type=file]")
            .val('')
            .end();
    })
    });
});


function EditCategory(id) {
    $('#modal-EditCategory').modal('show')
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    jQuery.ajax({
    url: "/BackendCategoryProduct/EditCategory/"+id,
    method: 'get',
    success: function(data){
        var EditCategory = data.editcategory;
        $.each(EditCategory,function(i,data){
            $('input[name="categoryname"]').val(data.category_product_name)
            $("textarea#categorydetail").text(data.category_product_detail)
            $('input[name="idsaveedit"]').val(data.id_category_product)
            $('#output_image_e').attr("src", '/storage/categoryProduct/'+data.id_category_product+'/'+data.pic_url);
        });
    },
    error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        console.log(err.Message);
      }
    });
}

// Preview Image 
function preview_image1(event) 
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image_add_1');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function preview_image_e(event) 
{
    var reader = new FileReader();
    reader.onload = function()
    {
        var output = document.getElementById('output_image_e');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

//Set Timeout Show Message
jQuery(document).ready(function(){
    setTimeout(function() {
        $('#message').hide()
      }, 5000);
});