$(document).ready(function(){
    $("#forgot-password").on('click', function(){
        $("#modal-signin").modal('hide');     
        setTimeout(function () {
            $("#modal-forgotpwd").modal('show');
        }, 300);
    });
});

$(document).ready(function(){
    $("#reset-email").on('keyup , keydown', function(){
        $("#reset-email").popover('hide');
    });

    $("#forgot-accept").on('click', function(){
        if(validation()){
            $("body").css("cursor", "wait");
            $.ajax({           
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                method : 'post',
                url : '/v1/forgotpwd',
                data : new FormData($("#forgotpwd-form")[0]),     
                processData : false,
                contentType : false,
                success : function(res){
                    if(res.success){
                        $("#modal-forgotpwd").modal('hide');
                        setTimeout(function () {                        
                            $("#modal-forgotpwd-success").modal('show');
                        }, 500);
                        $("body").css("cursor", "default");
                    }                    
                },
                error : function(error){
                    console.log(error)
                }
            }); 
        }
    });

    $('#modal-forgotpwd').on('hidden.bs.modal', function(){
        $("#reset-email").val('')
        forgotPopover();
        if($("#reset-vaildate").hasClass('has-error')){
            $("#reset-vaildate").removeClass('has-error');
        }

        if($("#reset-vaildate").hasClass('has-success')){
            $("#reset-vaildate").removeClass('has-success');
        }
    });
});

function forgotPopover(){
    $('#reset-email').popover('hide');
}

function validation(){
    $('#reset-email').attr('data-content','');
    if(!$("#reset-email").val()){
        setTimeout(function () {
            $('#reset-email').attr('กรุณากรอกอีเมล์ของคุณ!');
            $("#reset-email").popover('show');
        }, 100);       
        $("#reset-vaildate").addClass('has-error');
        return false;
    }else{
        $("#reset-vaildate").removeClass('has-error');
        $("#reset-vaildate").addClass('has-success');
    }
    if($("#reset-email").val()){
        var result = validateEmail($("#reset-email").val());
        if(!result){            
            setTimeout(function () {
                $('#reset-email').attr('data-content','Invalid email.');
                $('#reset-email').popover('show');
            }, 100);  
            $("#reset-vaildate").addClass('has-error');
            return false;
        }
    }else{
        $("#reset-vaildate").removeClass('has-error');
        $("#reset-vaildate").addClass('has-success');
    }
    return true;
}