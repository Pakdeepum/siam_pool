
/**sign in */
$(document).ready(function(){
    $("#signin-error").hide();
    $("#signin").on('click', function(){
        $("#modal-signin").modal('show');
    });
    $("#signup-btn").on('click', function(){
        $("#modal-signin").modal('hide');
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
        setTimeout(function () {
            $("#modal-sign-up").modal('show');
        }, 100);
    });
    $("#signin-accept").on('click', function(){
        var vaild = vaildateSignIn();
        if(vaild){
            $("body").css("cursor", "wait");
            $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                method : 'post',
                url : '/v1/signin',
                data : new FormData($("#signin-form")[0]),
                processData : false,
                contentType : false,
                success : function(res){
                    if(res.success){
                        setTimeout(function () {
                            $("#modal-signin").modal('hide');
                            $("body").css("cursor", "default");
                            if(res.fromPayment){
                              console.log('from payment',res.session);
                              window.location.href = '/'+res.session;
                            }else{
                              console.log('reload after signin');
                              window.location.reload();
                            }

                        }, 500);
                    }else{
                        $("body").css("cursor", "default");
                        $('#signin-password').attr('data-content','');
                        $('#signin-email').attr('data-content','');
                        if(res.data === "password"){
                            setTimeout(function () {
                                $('#signin-password').attr('data-content', res.message);
                                $("#signin-password").popover('show');
                            }, 100);
                            $("#passwords-vaildate").addClass('has-error');
                        }
                        if(res.data === "email"){
                            setTimeout(function () {
                                $('#signin-email').attr('data-content', res.message);
                                $("#signin-email").popover('show');
                            }, 100);
                            $("#username-vaildate").addClass('has-error');
                        }
                    }
                    setTimeout(function () {
                        $("#signin-error").hide();
                        $("body").css("cursor", "default");
                    }, 3000);
                },
                error : function(error){
                    $("body").css("cursor", "default");
                    console.log(error);
                }
            });
        }
    });

    $('#modal-signin').on('hidden.bs.modal', function (e) {
        signinPopover();

        $("#signin-email").val('')
        $("#signin-password").val('')

        if($("#username-vaildate").hasClass('has-error')){
            $("#username-vaildate").removeClass('has-error');
        }

        if($("#username-vaildate").hasClass('has-success')){
            $("#username-vaildate").removeClass('has-success');
        }

        if($("#passwords-vaildate").hasClass('has-error')){
            $("#passwords-vaildate").removeClass('has-error');
        }

        if($("#passwords-vaildate").hasClass('has-success')){
            $("#passwords-vaildate").removeClass('has-success');
        }
    })
});
function signinPopover(){
    $("#signin-email").popover('hide');
    $("#signin-password").popover('hide');
}

/**validate input*/
$(document).ready(function(){
    $("#signin-email").on('keyup , keydown', function(){
        $("#signin-email").popover('hide');
    });
    $("#signin-password").on('keyup , keydown', function(){
        $("#signin-password").popover('hide');
    });
});
/**vaildation */
function vaildateSignIn(){
    /** */
    $('#signin-email').attr('data-content','');
    if(!$("#signin-email").val()){
        setTimeout(function () {
            $('#signin-email').attr('กรุณากรอกอีเมล์ของคุณ!');
            $("#signin-email").popover('show');
        }, 100);
        $("#username-vaildate").addClass('has-error');
        return false;
    }else{
        $("#username-vaildate").removeClass('has-error');
        $("#username-vaildate").addClass('has-success');
    }
    if($("#signin-email").val()){
        var result = validateEmail($("#signin-email").val());
        if(!result){
            setTimeout(function () {
                $('#signin-email').attr('data-content','Invalid email.');
                $('#signin-email').popover('show');
            }, 100);
            $("#username-vaildate").addClass('has-error');
            return false;
        }
    }else{
        $("#username-vaildate").removeClass('has-error');
        $("#username-vaildate").addClass('has-success');
    }
    /** */
    if(!$("#signin-password").val()){
        setTimeout(function () {
            $("#signin-password").popover('show');
            $("#passwords-vaildate").addClass('has-error');
        }, 100);
        return false;
    }else{
        $("#passwords-vaildate").removeClass('has-error');
        $("#passwords-vaildate").addClass('has-success');
    }
    return true;
}
/**email */
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
