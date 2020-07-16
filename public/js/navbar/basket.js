function removeStorage(id){
    localStorage.removeItem(id+"_product");
    listOrder();
    updateBasket();
}
/** retrieve all storage*/
function allStorage() {
  console.log("allStorage localStorage",localStorage);
  console.log("object key localStorage",Object.keys(localStorage));
  // localStorage.clear();
    var values = [],
        keys = Object.keys(localStorage),
        i = keys.length;
    while ( i-- ) {
        if(keys[i] !== 'dalivery'){
            //if(keys[i]==="1_product")
            values.push( localStorage.getItem(keys[i]) );
        }
    }
    console.log("allStorage: ",values);
    return values;
}
function updateBasket(){
    var inCart = allStorage();
    console.log('updateBasket inCart',inCart);
    if( inCart.length !== 0){
        $("#cart").text(inCart.length);
    }else{
        $("#cart").text(0);
    }
}
/**modal cart product */
$(document).ready(function(e){
    updateBasket();
    $("#cart-category").on('click', function(){
        listOrder();
        console.log("in cart-category click");
        $("#modal-cart").modal('show');
    });
});
/**modal cart product 2 responsive */
$(document).ready(function(e){
    updateBasket();
    $("#cart-category2").on('click', function(){
      listOrder();
        console.log("in cart-category2 click");
        $("#modal-cart").modal('show');
    });
});
/**remove Order */
function cartRemoveFormatter(value, row){
    return  '<button type="button" class="close" onClick="removeStorage('+row.productID+')" aria-label="Close">'+
                '<span aria-hidden="true">&times</span>'+
            '</button>';
}

function totalPriceFormatter(value, row){
    return addComma(value);
}

function cartImageFormatter(value, row) {
    return '<div class="cart"><img src='+value+'></div>';
}
/**view Order */
function listOrder(){
        var storage = allStorage();
        var storages = [];
        var totalList = storage.length;
        var totalAmount = 0;
        var totalPrice = 0;

        storage.forEach(element => {
          //console.log("element",element);
          if(element!="undefined"){
            var json = JSON.parse(element);
            //console.log("json",json);
            if(Array.isArray(json)){
              if(json[0].Amount<json[0].stock_amount){
                totalAmount = totalAmount + json[0].Amount;
                totalPrice = totalPrice + parseInt(json[0].totalPrice);
                console.log('add total Price',totalPrice);
              }else if(json[0].Amount==json[0].stock_amount){
                totalAmount =  json[0].Amount;
                totalPrice +=  parseInt(json[0].totalPrice);
                console.log('add else total Price',totalPrice);
              }
              storages.push(json[0]);
            }
          }


        });
        console.log("storages",storages);
        $('#cart-table').bootstrapTable('load',{data : storages});
        setTimeout(function () {
            $("#cart-table").bootstrapTable("hideLoading");
        }, 100);

    $("#totalList").text(totalList);
    $("#totalAmount").text(totalAmount);
    $("#totalPrices").text(addComma(totalPrice));
    return storages;
}

function addComma(value){
return value.toString().replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function addAmount(id){
    alert('addAmount:',id);
}
function operateAddFormatter(value, row, index) {
  console.log("value:"+value+",row:"+row+",index:"+index);
  console.log("row:",row);
  return ['<a class="addAmount" href="javascript:void(0);" title="AddAmount">',
    '<i class="fa fa-plus fa-2x pull-left" style="margin-right:5px"></i>',
    '</a>'].join(' ');
}
function operateDeleteFormatter(value,row,index){

  return ['<a class="deleteAmount" href="javascript:void(0);" title="DeleteAmount">',
  '<i class="fa fa-minus fa-2x pull-right"></i>',
  '</a>'].join(' ')
}
window.operateEvents = {
  "click .addAmount": function(event, value, row, index) {
    //alert('row_id',row);
    var table = $("#cart-table");
    console.log('table:',table);

    //localStorage['2'+'_product'][0].Amount++;
    var newAmountItem = JSON.parse(localStorage[row['productID']+'_product']);
    console.log('newAmount:',newAmountItem[0]);
    if(newAmountItem[0].Amount<=0){
      removeStorage(row['productID']);
    }else{
      if(newAmountItem[0].Amount<newAmountItem[0].stock_amount){
        newAmountItem[0].Amount++;
        newAmountItem[0].totalPrice+=parseInt(newAmountItem[0].price);
      }
      else if(newAmountItem[0].Amount==newAmountItem[0].stock_amount){
        newAmountItem[0].Amount=newAmountItem[0].stock_amount;
        newAmountItem[0].totalPrice=parseInt(newAmountItem[0].totalPrice);
      }
      localStorage.removeItem(row['productID']+"_product");
      localStorage.setItem(row['productID']+"_product", JSON.stringify(newAmountItem));
      listOrder();
      // console.log('localStorage: amount',newAmountItem[0].Amount);
      // console.log('currentData:',localStorage);
      //table.bootstrapTable('load',{data : currentData});
    }

  },
  "click .deleteAmount": function(event, value, row, index) {
    var table = $("#cart-table");
    console.log('table:',table);

    //localStorage['2'+'_product'][0].Amount++;
    var newAmountItem = JSON.parse(localStorage[row['productID']+'_product']);
    // console.log('newAmount:',newAmountItem[0]);
    newAmountItem[0].Amount--;
    if(newAmountItem[0].Amount<=0){
      removeStorage(row['productID']);
    }else{
      newAmountItem[0].totalPrice-=parseInt(newAmountItem[0].price);
      // console.log('after - amount:',newAmountItem[0].totalPrice);
      // console.log('localStorage: amount',newAmountItem[0].Amount);
      // console.log('currentData:',localStorage);
      localStorage.removeItem(row['productID']+"_product");
      localStorage.setItem(row['productID']+"_product", JSON.stringify(newAmountItem));
      listOrder();
    }

  }
};
