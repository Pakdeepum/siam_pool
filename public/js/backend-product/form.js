(function () {
	'use strict';
    var app = angular.module('application', []);
    app.controller('BackendProductController', function ($scope,$http){
			$http.get('/BackendBrandProduct/AllBrandList').then(function(response){
					$scope.datalistBrand = response.data.data;
					console.log("AllBrandList:",$scope.datalistBrand);
					//$scope.apply();
				});
    });
})();

$(function() {
    var imagesPreviewedit = function(input, placeToInsertImagePreview) {
        if (input.files) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img class="col" id="product-add">'))
                        .attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                 }
                reader.readAsDataURL(input.files[0]);
        }
    };
    $('#file1').on('change', function() {
        imagesPreviewedit(this, 'div#preview-product1');
    });
    $('#file2').on('change', function() {
        imagesPreviewedit(this, 'div#preview-product2');
    });
    $('#file3').on('change', function() {
        imagesPreviewedit(this, 'div#preview-product3');
    });
    $('#file4').on('change', function() {
        imagesPreviewedit(this, 'div#preview-product4');
    });
    $('#file5').on('change', function() {
        imagesPreviewedit(this, 'div#preview-product5');
    });

    $('#file_e1').on('change', function() {
        $("#preview-product-e1 img").remove();
        imagesPreviewedit(this, 'div#preview-product-e1');
    });
    $('#file_e2').on('change', function() {
        $("#preview-product-e2 img").remove();
        imagesPreviewedit(this, 'div#preview-product-e2');
    });
    $('#file_e3').on('change', function() {
        $("#preview-product-e3 img").remove();
        imagesPreviewedit(this, 'div#preview-product-e3');
    });
    $('#file_e4').on('change', function() {
        $("#preview-product-e4 img").remove();
        imagesPreviewedit(this, 'div#preview-product-e4');
    });
    $('#file_e5').on('change', function() {
        $("#preview-product-e5 img").remove();
        imagesPreviewedit(this, 'div#preview-product-e5');
    });
});

$(document).ready(function(){
    $("#file1-valid").hide()
    $('div#Invalid-image').hide();
    $("#submitFile").click(function(){
        var $file = $("input[name='file1']");
        if (parseInt($file.get(0).files.length)==0){
            $("#file1-valid").css('display','block');
            $('#input[name="file1"]').focus();
            setTimeout(function () {
                $("#file1-valid").css('display','none');
            }, 5000);
            return false;
        }
        if(!$("#productname").val()){
            $("#productname").focus()
            return false;
        }
        if(!$("#product_detail_a").val()){
            $("#product_detail_a").focus()
            return false;
        }
        if(!$("#product_warning").val()){
            $("#product_warning").focus()
            return false;
        }
        if(!$("#product_instruction").val()){
            $("#product_instruction").focus()
            return false;
        }
        if(!$("#idproducttype").val()){
            $("#idproducttype").focus()
            return false;
        }
				if(!$("#idBrandProduct").val()){
            $("#idBrandProduct").focus()
            return false;
        }
        if(!$("#productprice").val()){
            $("#productprice").focus()
            return false;
        }
        if(!$("#productcode").val()){
            $("#productcode").focus()
            return false;
        }
				if(!$("#stock_amount").val()){
					$("#stock_amount").focus();
					return false;
				}
        $("#addproduct").submit();
    });
});

// Open Modal and Select CategoryProduct To Select Option
jQuery(document).ready(function(){
    $("div#Invalid-image").hide();
    jQuery('#open-modal-AddProduct').click(function(e){
       $('#modal-AddProduct').modal('show')
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
       jQuery.ajax({//find all Category
          url: "/BackendCategoryProduct/ListProductType",
          method: 'get',
          success: function(data){
            var Categoryproduct = '';
						$('#idproducttype')
				    .find('option')
				    .remove()
				    .end()
				    .append('<option hidden">Select Category</option>')
				    .val('');
						console.log('cat:',data)
            $.each(data,function(i,o){
                Categoryproduct += '<option value="'+o.id_category_product+'">'+o.category_product_name+'</option>';
           });
          $('#idproducttype').append(Categoryproduct);
          }});
					jQuery.ajax({//find all Brand
						 url: "/BackendBrandProduct/ListBrandSelect",
						 method: 'get',
						 success: function(data){
							 var Brandproduct = '';
							 $('#idBrandProduct')
	 				    .find('option')
	 				    .remove()
	 				    .end()
	 				    .append('<option hidden">Select Brand</option>')
	 				    .val('');
							 $.each(data,function(i,o){
									 Brandproduct += '<option value="'+o.id_brand+'">'+o.brand_name+'</option>';
							});
						 $('#idBrandProduct').append(Brandproduct);
						 }});
    });
    $('#modal-AddProduct').on('hidden.bs.modal', function (e) {
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

             $("#preview-product1 img").remove();
             $("#preview-product2 img").remove();
             $("#preview-product3 img").remove();
             $("#preview-product4 img").remove();
             $("#preview-product5 img").remove();

    })
});

function EditProduct(id) {
    $('#modal-EditProduct').modal('show')
    function SelectCategory(){
    jQuery.ajax({
        url: "/BackendCategoryProduct/ListProductType",
        method: 'get',
        success: function(data){
            var Categoryproduct = '';
						$('#idcategory')
						.find('option')
						.remove()
						.end();
            $.each(data,function(i,o){
                Categoryproduct += '<option value="'+o.id_category_product+'">'+o.category_product_name+'</option>';
            });
        $('#idcategory').append(Categoryproduct);
        }});

    };
		function SelectBrand(){
		jQuery.ajax({//find all Brand
			 url: "/BackendBrandProduct/ListBrandSelect",
			 method: 'get',
			 success: function(data){
				 var Brandproduct = '';
				 $('#idBrand')
				.find('option')
				.remove()
				.end();
				 $.each(data,function(i,o){
						 Brandproduct += '<option value="'+o.id_brand+'">'+o.brand_name+'</option>';
				});
			 $('#idBrand').append(Brandproduct);
		}});
	};

    // SelectCategory
    SelectCategory();
		SelectBrand();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
    });

    jQuery.ajax({
    url: "/BackendProduct/EditProduct/"+id,
    method: 'get',
    success: function(data){
        var EditProduct = data.editproduct;
        $.each(EditProduct,function(i,data){
            $('input[name="productname"]').val(data.product_name)
            $('input[name="productcode"]').val(data.product_code)
            $('input[name="productprice"]').val(data.price)
            $('input[name="idsaveedit"]').val(data.id_product)

            $('#product_detail_e').text(data.product_detail)
            $('input[name="product_instruction"]').val(data.product_instruction)
            $('input[name="product_warning"]').val(data.product_warning)

            $('#preview-product-e1').append('<img src='+'/storage/product/'+data.id_product+'/'+data.pic1_url+' />');
            $('#preview-product-e2').append('<img src='+'/storage/product/'+data.id_product+'/'+data.pic2_url+' />');
            $('#preview-product-e3').append('<img src='+'/storage/product/'+data.id_product+'/'+data.pic3_url+' />');
            $('#preview-product-e4').append('<img src='+'/storage/product/'+data.id_product+'/'+data.pic4_url+' />');
            $('#preview-product-e5').append('<img src='+'/storage/product/'+data.id_product+'/'+data.pic5_url+' />');

            $("#idcategory option[value='" + data.id_category_product + "']").attr("selected","selected");
						$("#idBrand option[value='" + data.id_brand_product + "']").attr("selected","selected");
            $("#promotion_edit option[value='" + data.promotion_id + "']").attr("selected","selected");

						$('input[name="stock_amount"]').val(data.stock_amount);
        });
    }});
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

$(document).ready(function(){
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method :'get',
        url :'/BackendSpecial/promotion',
        processData : false,
        contentType : false,
        success:function(response){
            console
            if(response.success){
							// $('#promotion')
					    // .find('option')
					    // .remove()
					    // .end()
					    // .append('<option hidden">Select Promotion</option>')
					    // .val('');
							// $('#promotion_edit')
					    // .find('option')
					    // .remove()
					    // .end()
							// .append('<option hidden">Select Promotion</option>')
					    // .val('');
                response.result.forEach(element => {
                    $('#promotion').append($('<option>',
                        {
                            value: element.id,
                            text : element.special_name
                        })
                    );
                    $('#promotion_edit').append($('<option>',
                        {
                            value: element.id,
                            text : element.special_name
                        })
                    );
                });
            }
        },
        error: function(xhr, status, error){
            console.log("error : " , error);
        }
      });
});

//Set Timeout Show Message
jQuery(document).ready(function(){
    setTimeout(function() {
        $('#message').hide()
      }, 5000);
});
