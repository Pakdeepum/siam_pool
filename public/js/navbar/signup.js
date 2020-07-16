/**modal signup */
$(document).ready(function(){
    $("#signup").on('click', function(){
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method : 'get',
            url : '/v1/conutry-code',
            success : function(res){
                res.data.forEach(element => {
                    $('#signup-conutry-code').append($('<option>',
                        {
                            value: element.phonecode,
                            text : element.iso +" +"+ element.phonecode
                        })
                    );
                });
                $('#signup-conutry-code option[value=66]').attr('selected','selected');
                popoverHide();
                setTimeout(function () {
                    $("#modal-sign-up").modal('show');
                }, 500);
            },
            error : function(error){
                console.log(error)
            }
        });
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method : 'get',
            url : '/v1/getSignupProvince',
            success : function(res){
              res.forEach(element => {
                  $('#signup-province').append($('<option>',
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
    });
    $( "#signup-province" ).on('change',function(){
      $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          method : 'get',
          url : '/v1/getSignupAmphur?province_id='+$("#signup-province").val(),
          success : function(res){
            $("#signup-amphur option").remove();
            console.log(res);
              res.forEach(element => {
                  $('#signup-amphur').append($('<option>',
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
    $( "#signup-amphur" ).on('change',function(){
      $.ajax({
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          method : 'get',
          url : '/v1/getSignupDistict?amphur_id='+$("#signup-amphur").val(),
          success : function(res){
            $("#signup-district option").remove();
            console.log(res);
              res.forEach(element => {
                  $('#signup-district').append($('<option>',
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
    $("#signup-district").on('change',function(){
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method : 'get',
            url : '/v1/getSignupPostCode?district_id='+$("#signup-district").val(),
            success : function(res){
              $('#signup-postcode option').remove();
                res.forEach(element => {
                    $('#signup-postcode').append($('<option>',
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
});
function popoverHide(){
    $("#signup-name").popover('hide');
    $("#signup-lastname").popover('hide');
    $("#signup-email").popover('hide');
    $("#signup-tel").popover('hide');
    $("#signup-password").popover('hide');
    $("#signup-confirm").popover('hide');
}

function popoverEvent(){
    $("#error").hide();

    $("#signup-name").on('keydown, keyup , focusout', function(){
        $("#signup-name").popover('hide');
    });
    $("#signup-lastname").on('keydown, keyup ,focusout', function(){
        $("#signup-lastname").popover('hide');
    });
    $("#signup-email").on('keydown, keyup , focusout', function(){
        $("#signup-email").popover('hide');
    });
    $("#signup-tel").on('keydown, keyup , focusout', function(){
        $("#signup-tel").popover('hide');
    });
    $("#signup-password").on('keydown, keyup, focusout', function(){
        $("#signup-password").popover('hide');
    });
    $("#signup-confirm").on('keydown, keyup, focusout', function(){
        $("#signup-confirm").popover('hide');
    });
}
/**signup */
$(document).ready(function(){
    popoverEvent();
   $("#signup-accept").on('click', function(){
        var valid = vaildateSignup();
        // console.log('signup-accept click',$("#signup-form")[0]);
        // return ;
        if(valid){
            $("body").css("cursor", "wait");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') ,
                },
                method : 'post',
                url : '/v1/signup',
                data : new FormData($("#signup-form")[0]),
                processData : false,
                contentType : false,
                success : function(res){
                    if(res.success){
                        setTimeout(function () {
                            $("#modal-sign-up").modal('hide');
                            $("#modal-resgiter").modal('show');
                            $("body").css("cursor", "default");
                        }, 2500);
                    }else{
                        $("#error span").text(res.message);
                        $("#error").show();
                        $("#email-vaildate").addClass('has-error');
                        $("body").css("cursor", "default");
                    }
                    setTimeout(function () {
                        $("#error").hide();
                        $("body").css("cursor", "default");
                    }, 2000);
                },
                error : function(error){
                    console.log(error)
                }
            });
        }
    });
});
$(document).ready(function(){
    $("#signup-tel").on('keyup',function(){
        $("#signup-tel").val(numberOnly($("#signup-tel").val()));
    });

    $('#modal-sign-up').on('hidden.bs.modal', function (e) {
        $("#signup-name").val('')
        $("#signup-lastname").val('')
        $("#signup-email").val('')
        $("#signup-tel").val('')
        $("#signup-password").val('')
        $("#signup-confirm").val('')

        if($("#name-vaildate").hasClass('has-error')){
            $("#name-vaildate").removeClass('has-error');
        }

        if($("#name-vaildate").hasClass('has-success')){
            $("#name-vaildate").removeClass('has-success');
        }

        if($("#lastname-vaildate").hasClass('has-error')){
            $("#lastname-vaildate").removeClass('has-error');
        }

        if($("#lastname-vaildate").hasClass('has-success')){
            $("#lastname-vaildate").removeClass('has-success');
        }

        if($("#email-vaildate").hasClass('has-error')){
            $("#email-vaildate").removeClass('has-error');
        }

        if($("#email-vaildate").hasClass('has-success')){
            $("#email-vaildate").removeClass('has-success');
        }

        if($("#confirm-vaildate").hasClass('has-error')){
            $("#confirm-vaildate").removeClass('has-error');
        }

        if($("#confirm-vaildate").hasClass('has-success')){
            $("#confirm-vaildate").removeClass('has-success');
        }

        if($("#password-vaildate").hasClass('has-error')){
            $("#password-vaildate").removeClass('has-error');
        }

        if($("#password-vaildate").hasClass('has-success')){
            $("#password-vaildate").removeClass('has-success');
        }
    })
});
/**email */
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
/**number only */
function numberOnly(value){
    return value.toString().replace(/\D/g, "");
}

/**vaildation */
function vaildateSignup(){
    $('#signup-email').attr('data-content','');
    $('#signup-confirm').attr('data-content','');
    if(!$("#signup-name").val()){
        setTimeout(function () {
            $("#signup-name").popover('show');
        }, 100);
        $("#name-vaildate").addClass('has-error');
        return false;
    }else{
        $("#name-vaildate").removeClass('has-error');
        $("#name-vaildate").addClass('has-success');
    }
    if(!$("#signup-lastname").val()){
        setTimeout(function () {
            $("#signup-lastname").popover('show');
        }, 100);
        $("#lastname-vaildate").addClass('has-error');
        return false;
    }else{
        $("#lastname-vaildate").removeClass('has-error');
        $("#lastname-vaildate").addClass('has-success');
    }
    if(!$("#signup-email").val()){
        setTimeout(function () {
            $('#signup-email').attr('data-content','กรุณากรอกที่อยู่อีเมล์ของคุณเช่น (example@gmail.com)!');
            $("#signup-email").popover('show');
        }, 100);
        $("#email-vaildate").addClass('has-error');
        return false;
    }else{
        $("#email-vaildate").removeClass('has-error');
        $("#email-vaildate").addClass('has-success');
    }
    if($("#signup-email").val()){
        var result = validateEmail($("#signup-email").val());
        if(!result){
            setTimeout(function () {
                $('#signup-email').attr('data-content','Invalid email.');
                $('#signup-email').popover('show');
            }, 100);
            $("#email-vaildate").addClass('has-error');
            return false;
        }
    }else{
        $("#email-vaildate").removeClass('has-error');
        $("#email-vaildate").addClass('has-success');
    }
    if(!$("#signup-tel").val()){
        setTimeout(function () {
            $("#signup-tel").popover('show');
        }, 100);
        $("#tel-vaildate").addClass('has-error');
        return false;
    }else{
        $("#tel-vaildate").removeClass('has-error');
        $("#tel-vaildate").addClass('has-success');
    }
    if(!$("#signup-password").val()){
        setTimeout(function () {
            $("#signup-password").popover('show');
        }, 100);
        $("#password-vaildate").addClass('has-error');
        return false;
    }else{
        $("#password-vaildate").removeClass('has-error');
        $("#password-vaildate").addClass('has-success');
    }
    if(!$("#signup-confirm").val()){
        setTimeout(function () {
            $("#signup-confirm").popover('show');
        }, 100);
        $("#confirm-vaildate").addClass('has-error');
        return false;
    }else{
        $("#confirm-vaildate").removeClass('has-error');
        $("#confirm-vaildate").addClass('has-success');
    }
    /**confirm */
    if($("#signup-confirm").val() !== $("#signup-password").val()){
        setTimeout(function () {
            $('#signup-confirm').attr('data-content','Mismatch Password!');
            $('#signup-password').attr('data-content','Mismatch Password!');
            $('#signup-confirm').popover('show');
            $('#signup-password').popover('show');
        }, 100);
        $("#confirm-vaildate").addClass('has-error');
        $("#password-vaildate").addClass('has-error');
        return false;
    }else{
        $("#confirm-vaildate").removeClass('has-error');
        $("#password-vaildate").removeClass('has-error');
        $("#confirm-vaildate").addClass('has-success');
        $("#password-vaildate").addClass('has-success');
    }
    return true;
}
