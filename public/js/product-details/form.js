(function () {
    var app = angular.module('application', []);
    'use strict';
    app.controller('ProductController', function ($scope,$http){
        $http.get('/product/ListProductByCategoryProducts?category='+ $("#category").val()).then(function(response){
            $scope.sametype = response.data.data;
        });
        $http.get('/product/ListProducts').then(function(response){
            $scope.somemight = response.data.data;
        });
        $scope.SelectAllProduct = function(){
            $http.get('/product/ListProduct').then(function(response){
                $scope.datalistproduct = load_substring (response.data.data , 'product_name' , 30 , null );
            });
        }
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

/**add product to cart */
$(document).ready(function(e){
  $('input[name=amount]').change(function() {
  var amount = $("#amount").val();
  var stock_balance = $("#stock_amount").val();
  if(amount>stock_balance){
    $('input[name=amount]').val(stock_balance);
    console.log('on amount change amount more than stock (:'+amount+") stock:"+stock_balance);
  }

});
    $("#buy").on('click', function(e){
       var stock_amount = parseInt($("#stock_amount").val());
        if($("#amount").val()){
          if($("#amount").val()<=0){
            return;
          }
          if(parseInt($("#amount").val())>stock_amount)
          {
            $("#amount").val(stock_amount);
            console.log('set amount to stock balance amount:',$("#amount").val());
          }
          console.log('amount:',$("#amount").val());
            var objects = [] ;
            var amount = 0;
            var stockInStorage =0;
            var inStorage = localStorage.getItem($("#product-id").val()+'_product');
            amount = parseInt($("#amount").val());
            if(inStorage){
                var json =JSON.parse(inStorage);
                amount = amount + parseInt(json[0].Amount);
                stockInStorage = stockInStorage + parseInt(json[0].stock_amount);
                if(amount>stockInStorage){
                  amount = stockInStorage;
                }
            }
            console.log('inStorage'+inStorage+'amount',amount);
            var discount = $("#price-discount").val().indexOf(',') !== -1 ? $("#price-discount").val().replace(',',''): $("#price-discount").val();
            var price = 0;
            if(parseInt(discount) > 0){
                 price = $("#price2").text().indexOf(',') !== -1 ? $("#price2").text().replace(',',''): $("#price2").text();
            }else{
                 price = $("#pricel").val().indexOf(',') !== -1 ? $("#pricel").val().replace(',',''): $("#pricel").val();
            }
            var collection = {
                        "productID" : $("#product-id").val(),
                        "productName" : $("#product-name").text(),
                        "productDetail" : $("#product-detail").text(),
                        "productInstruction" : $("#product-instruction").text(),
                        "productWarning" : $("#product-warning").text(),
                        "price" : price,
                        "totalPrice" : amount * parseInt(price),
                        "image" : $('#image-product img').attr('src'),
                        "stock_amount" : stock_amount,
                        "Amount" : amount
                    }
                objects.push(collection);
                localStorage.setItem($("#product-id").val()+'_product', JSON.stringify(objects));
                console.log('localStorage',localStorage);
                updateBasket();
                listOrder();
                $("#modal-cart").modal('show');

            $("#amount").val('1');
            e.preventDefault();
        }
    });
});

$(document).ready(function(){
    $("#sub-1").on('click', function(){
        var image1 = $("#sub-1 img").attr('src');
        $("#image-product img").attr('src',image1);
    });
    $("#sub-2").on('click', function(){
        var image2 = $("#sub-2 img").attr('src');
        $("#image-product img").attr('src',image2);
    });
    $("#sub-3").on('click', function(){
        var image3 = $("#sub-3 img").attr('src');
        $("#image-product img").attr('src',image3);
    });
    $("#sub-4").on('click', function(){
        var image4 = $("#sub-4 img").attr('src');
        $("#image-product img").attr('src',image4);
    });
})
