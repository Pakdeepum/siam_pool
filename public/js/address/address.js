(function () {
	'use strict';
    var app = angular.module('application', []);

    app.controller('AddressController', function ($scope,$http){
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
/**radio select */
$(document).ready(function(){
    inputDisable();
		$.ajax({
				headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
				method : 'get',
				url : '/v1/getAddress',
				success : function(res){
                     $("#db-address").show()
                     console.log('res',res);
                    
					 if(res.data[0].customers.address){
                                $("#db-address").text(res.data[0].customers.address);
                                $("#db-amphur").text(res.amphur[0].amphur_name);
                                $("#db-district").text(res.district[0].district_name);
                                $("#db-province").text(res.province[0].province_name);
                                $("#db-post_codes").text(res.post_codes[0].post_code);
								$("#address-name-tmp").val(res.data[0].customers.name);
								$("#address-lastname-tmp").val(res.data[0].customers.lastname);
								$("#address-tel-tmp").val(res.data[0].customers.tel);
								$("#select_system_address").prop("checked", true);
					 }else{
								$("#db-address").val("<a href=\"/v1/profile\" id=\"address-profile\">แก้ไขโปรไฟล์</a>")
					 }
				},
				error : function(error){
						console.log(error)
				}
		});
    $('input[type=radio][name=address]').change(function() {
        if (this.value == 'db') {
            clearInput();
            inputDisable();
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                method : 'get',
                url : '/v1/getAddress',
                success : function(res){
                   $("#db-address").show()
                   if(res.data[0].customers.address){
                        $("#db-address").text(res.data[0].customers.address);
                        $("#db-distric").text(res.data[0].customers.district_id);
                        $("#address-name-tmp").val(res.data[0].customers.name);
                        $("#address-lastname-tmp").val(res.data[0].customers.lastname);
                        $("#address-tel-tmp").val(res.data[0].customers.tel);
                   }else{
                        $("#db-address").val("<a href=\"/v1/profile\" id=\"address-profile\">แก้ไขโปรไฟล์</a>")
                   }
                },
                error : function(error){
                    console.log(error)
                }
            });
        }
        else if (this.value == 'new') {
            $("#db-address").hide();
            inputEnable();
            /**appending province */
            address();
        }
    });
		//step Payment
		var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });

  allNextBtn.click(function(){
      var curStep = $(this).closest(".setup-content"),
          curStepBtn = curStep.attr("id"),
          nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
          curInputs = curStep.find("input[type='text'],input[type='url']"),
          isValid = true;

      $(".form-group").removeClass("has-error");
      for(var i=0; i<curInputs.length; i++){
          if (!curInputs[i].validity.valid){
              isValid = false;
              $(curInputs[i]).closest(".form-group").addClass("has-error");
          }
      }

      if (isValid)
          nextStepWizard.removeAttr('disabled').trigger('click');
  });

  $('div.setup-panel div a.btn-primary').trigger('click');
		//end step payment
});
function inputDisable(){
    $("#address-name").attr('disabled', 'disabled');
    $("#address-dalivery").attr('disabled', 'disabled');
    $("#address-tel").attr('disabled', 'disabled');
    $("#address-province").attr('disabled', 'disabled');
    $("#address-district").attr('disabled', 'disabled');
    $("#address-aumphar").attr('disabled', 'disabled');
    $("#address-postcode").attr('disabled', 'disabled');
}
function inputEnable(){
    $("#address-name").removeAttr('disabled');
    $("#address-dalivery").removeAttr('disabled');
    $("#address-tel").removeAttr('disabled');
    $("#address-province").removeAttr('disabled');
    $("#address-district").removeAttr('disabled');
    $("#address-aumphar").removeAttr('disabled');
    $("#address-postcode").removeAttr('disabled');
}
/**append select2 */
$(document).ready(function(){
    $("#address-province").select2();
    $("#address-district").select2();
    $("#address-aumphar").select2();
    $("#address-postcode").select2();
});

/**appending province */
function address(){
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method : 'get',
        url : '/v1/getProvince',
        success : function(res){
            res.forEach(element => {
                $('#address-province').append($('<option>',
                    {
                        value: element.province_id + "," + element.geo_id,
                        text : element.province_name
                    })
                );
            });

        },
        error : function(error){
            console.log(error)
        }
    });
    $( "#address-province" ).on('change',function(){
        $("#address-province").popover('hide');
        $('#address-aumphar')
                .empty().append('<option selected="selected" value="0">...</option>');
        $("#address-province-tmp").val($('#address-province').select2('data')[0].text)
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method : 'get',
            url : '/v1/getAumphar?province_id='+$("#address-province").val(),
            success : function(res){

                res.forEach(element => {
                    $('#address-aumphar').append($('<option>',
                        {
                            value: element.amphur_id,
                            text : element.amphur_name
                        })
                    );
                });

            },
            error : function(error){
                console.log(error)
            }
        });
    });

    $( "#address-aumphar" ).on('change',function(){
        $("#address-aumphar").popover('hide');
        $('#address-district')
                .empty().append('<option selected="selected" value="0">...</option>');
        $("#address-aumphar-tmp").val($('#address-aumphar').select2('data')[0].text)
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method : 'get',
            url : '/v1/getDistict?amphur_id='+$("#address-aumphar").val(),
            success : function(res){
                res.forEach(element => {
                    $('#address-district').append($('<option>',
                        {
                            value: element.district_code,
                            text : element.district_name
                        })
                    );
                });

            },
            error : function(error){
                console.log(error)
            }
        });
    });

    $("#address-district").on('change',function(){
        $("#address-district").popover('hide');
        $('#address-postcode')
                .empty().append('<option selected="selected" value="0">...</option>');
        $("#address-district-tmp").val($('#address-district').select2('data')[0].text)
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method : 'get',
            url : '/v1/getPostCode?district_id='+$("#address-district").val(),
            success : function(res){
                res.forEach(element => {
                    $('#address-postcode').append($('<option>',
                        {
                            value: element.id,
                            text : element.post_code
                        })
                    );
                });
            },
            error : function(error){
                console.log(error)
            }
        });
    });

    $( "#address-postcode" ).on('change', function(){
        $("#address-postcode").popover('hide');
        $("#address-postcode-tmp").val($('#address-postcode').select2('data')[0].text)
    });
}
/**create data address dalivery */
$(document).ready(function(){
    popoverAddress();
        $("#address-submit").on('click', function(){
            if ($('input[type=radio][name=address]:checked').val() === 'db') {

                var dalivery = [];
                dalivery[0] = $("#db-address").text()+' '+$("#db-district").text()+' '+$("#db-amphur").text()+' '+$("#db-province").text()+' '+$("#db-post_codes").text();              
                dalivery[1] = $("#address-name-tmp").val()+' '+$("#address-lastname-tmp").val();
                dalivery[2] = $("#address-tel-tmp").val();
                dalivery[3] = $("#comment").val();
                dalivery[4] = $('input[type=radio][name=address]:checked').val();

                localStorage.setItem('dalivery',dalivery);
                setTimeout(function () {
                    window.location.href = '/v1/productinfo';
                }, 100);
            }else if ($('input[type=radio][name=address]:checked').val() === 'new'){
                if(validateAddress()){
                    var dalivery = [];
                    var address = $("#address-dalivery").val() +
                    ' ' + $("#address-district-tmp").val() + ' ' +$("#address-aumphar-tmp").val() +
                    ' ' + $("#address-province-tmp").val() + ' ' +$("#address-postcode-tmp").val();
                    var person = $("#address-name").val();
                    var tel = $("#address-tel").val();
                    var description = $("#comment").val();

                    dalivery[0] = address;
                    dalivery[1] = person;
                    dalivery[2] = tel;
                    dalivery[3] = description;
                    dalivery[4] = $('input[type=radio][name=address]:checked').val();

                    localStorage.setItem('dalivery',dalivery);

                    setTimeout(function () {
                        window.location.href = '/v1/productinfo';
                    }, 100);
                }
            }
    });

    $("#address-tel").on('keyup',function(){
        $("#address-tel").val(numberOnly($("#address-tel").val()));
    });
});
function numberOnly(value){
    return value.toString().replace(/\D/g, "");
}
function popoverAddress(){
    $("#address-name").on('keydown, keyup , focusout', function(){
        $("#address-name").popover('hide');
    });

    $("#address-dalivery").on('keydown, keyup , focusout', function(){
        $("#address-dalivery").popover('hide');
    });

    $("#address-tel").on('keydown, keyup , focusout', function(){
        $("#address-tel").popover('hide');
    });
}
function clearInput(){
    $("#address-name").val('')
    $("#address-dalivery").val('')
    $("#address-tel").val('')

    $('#address-province').empty().append('<option selected="selected" value="0">...</option>');
    $('#address-district').empty().append('<option selected="selected" value="0">...</option>');
    $('#address-aumphar').empty().append('<option selected="selected" value="0">...</option>');
    $('#address-postcode').empty().append('<option selected="selected" value="0">...</option>');

    if($("#address-validate-name").hasClass('has-error')){
        $("#address-validate-name").removeClass('has-error');
    }

    if($("#address-validate-name").hasClass('has-success')){
        $("#address-validate-name").removeClass('has-success');
    }

    if($("#address-validate-dalivery").hasClass('has-error')){
        $("#address-validate-dalivery").removeClass('has-error');
    }

    if($("#address-validate-dalivery").hasClass('has-success')){
        $("#address-validate-dalivery").removeClass('has-success');
    }

    if($("#address-validate-tel").hasClass('has-error')){
        $("#address-validate-tel").removeClass('has-error');
    }

    if($("#address-validate-tel").hasClass('has-success')){
        $("#address-validate-tel").removeClass('has-success');
    }
}
function validateAddress(){
    if(!$("#address-name").val()){
        setTimeout(function () {
            $("#address-name").focus();
            $("#address-name").popover('show');
        }, 100);
        $("#address-validate-name").addClass('has-error');
        return false;
     }else{
        setTimeout(function () {
            $("#address-validate-name").removeClass('has-error');
            $("#address-validate-name").addClass('has-success');
        }, 100);
     }
     if(!$("#address-dalivery").val()){
        setTimeout(function () {
            $("#address-dalivery").focus();
            $("#address-dalivery").popover('show');
        }, 100);
        $("#address-validate-dalivery").addClass('has-error');
        return false;
     }else{
        setTimeout(function () {
            $("#address-validate-dalivery").removeClass('has-error');
            $("#address-validate-dalivery").addClass('has-success');
        }, 100);
     }
     if(!$("#address-tel").val()){
        setTimeout(function () {
            $("#address-tel").focus();
            $("#address-tel").popover('show');
        }, 100);
        $("#address-validate-tel").addClass('has-error');
        return false;
     }else{
        setTimeout(function () {
            $("#address-validate-tel").removeClass('has-error');
            $("#address-validate-tel").addClass('has-success');
        }, 100);
     }
     if($('#address-province').select2('data')[0].id === "0"){
        setTimeout(function () {
            $("#address-province").popover('show');
        }, 100);
        return false;
     }
     if($('#address-aumphar').select2('data')[0].id === "0"){
        setTimeout(function () {
            $("#address-aumphar").popover('show');
        }, 100);
        return false;
     }
     if($('#address-district').select2('data')[0].id === "0"){
        setTimeout(function () {
            $("#address-district").popover('show');
        }, 100);
        return false;
     }
     if($('#address-postcode').select2('data')[0].id === "0"){
        setTimeout(function () {
            $("#address-postcode").popover('show');
        }, 100);
        return false;
     }
     return true;
}
