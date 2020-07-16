(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('BackendBrandProductController', function ($scope,$http){
			$http.get('/BackendBrandProduct/AllBrandList').then(function(response){
					$scope.datalistBrand = response.data.data;
					console.log("AllBrandList:",$scope.datalistBrand);
					//$scope.apply();
				});
				$scope.EditBrand = function(id){
						EditBrandById(id);
        }
    });
})();
// Open modal Add Brand
jQuery(document).ready(function(){
    jQuery('#open-modal-AddBrand').click(function(e){
			console.log('AddBrandClick');
       $('#modal-AddBrand').modal('show')

       $('#modal-AddBrand').on('hidden.bs.modal', function (e) {
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


function EditBrandById(id) {
	console.log("Edit Brand id:",id);
    $('#modal-EditBrand').modal('show')
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    jQuery.ajax({
    url: "/BackendBrandProduct/EditBrand/"+id,
    method: 'get',
    success: function(data){
        var EditBrand = data.editbrand;
        $.each(EditBrand,function(i,data){
            $('input[name="brandname"]').val(data.brand_name)
            $('input[name="idsaveedit"]').val(data.id_brand)
            $('#output_image_e').attr("src", '/storage/brandProduct/'+data.id_brand+'/'+data.brand_pic_url);
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
