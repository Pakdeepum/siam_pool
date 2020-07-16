<!-- Modal Add -->
<form enctype="multipart/form-data" class="form-horizontal" id="forgotpwd-form">
    {{csrf_field()}}
<!-- Modal -->
    <div class="modal push-up-50" tabindex="-1" role="dialog" id="modal-forgotpwd">
        <div class="modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 text-center cropped-forgot">
                            <img src="{{asset('img/pic/forget-password[1].png')}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row push-down-10">
                                <div class="col">
                                    <label class="control-label push-down-5 top_head_txt">Request a new password</label>
                                    <hr>
                                    <small id="small">Forgot your password ? Please enter the email in the box below to start setting up a password.</small>
                                </div>
                            </div>
                            <div class="row push-down-10">
                                <div class="col-12" id="reset-vaildate">
                                    <label class="control-label push-down-5">Your Email</label>
                                    <input type="text" class="form-control" placeHolder="กรอกอีเมล์ของคุณ" id="reset-email" name="forgot-email"
                                    data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="กรุณากรอกอีเมล์ของคุณ!"/>
                                </div>
                            </div>
                            <div class="row push-down-10">
                                <div class="col signup-center">
                                    <button type="button" id="forgot-accept" class="btn buy_btn">ส่งข้อมูล</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal Successfully- -->
<div class="modal fade" id="modal-forgotpwd-success">
    <div class="modal-success modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row push-down-10">
                    <div class="col signup-center">
                        <span>Password send to your email Successfully. Plaese Check your email.</span>
                    </div>
                </div>
                <div class="row push-down-10">
                    <div class="col signup-center">
                        <button type="button" class="btn btn-success" id="forgot-success" data-dismiss="modal" aria-label="Close">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
