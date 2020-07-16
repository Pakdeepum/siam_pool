<!-- Modal Add -->
<form enctype="multipart/form-data" class="form-horizontal" id="signin-form">
    {{csrf_field()}}
<!-- Modal -->
    <div class="modal push-up-50" tabindex="-1" role="dialog" id="modal-signin">
        <div class="modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 text-center signin-background">
                            <div class="row signin-cropped push-down-5">
                                <img src="{{asset('img/logo/poolicon.png')}}" style="max-width:100%;max-height:100%">
                            </div>
                            <div class="row signin-text">
                                <div class="signin-text-h push-down-5"> <span class="mark">POOLBKKSHOP</span>
                                      <span>{{trans('profile.address_detail')}}</span>
                                    {{-- <span>English Tel : 080-619-5154</span><span>Thai Tel: 084-378-9319</span> --}}

                                </div>
                                <div class="signin-text-c">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 signin-head">
                            <div class="row push-down-10  push-up-50">
                                <div class="col signup-center">
                                    {{-- <label class="control-label push-down-5 top_head_txt">ยินดีต้อนรับเข้าสู่ระบบ</label> --}}
                                    <label class="control-label push-down-5 top_head_txt">"{{trans('profile.welcome_to')}} POOLSHOPBKK"</label>
                                </div>
                            </div>
                            <div class="row push-down-5">
                                <div class="col signup-center">
                                    <div class="alert alert-danger" id="signin-error">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            {{-- sign in group --}}
                            <div class="row push-down-20" >
                                <div class="col-12" id="username-vaildate">
                                    <label class="control-label push-down-5">{{trans('profile.e-mail_address')}}</label>
                                    {{-- <input type="text" class="form-control" placeHolder="กรอกอีเมล์ของคุณ" id="signin-email" name="signin-email"
                                    data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="กรุณากรอกอีเมล์ของคุณ!"/> --}}
                                    <input type="text" class="form-control" placeHolder="{{trans('profile.placeholder.email')}}" id="signin-email" name="signin-email"
                                    data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="{{trans('profile.placeholder.email')}}"/>
                                </div>
                                <div class="col-12" id="passwords-vaildate">
                                    <label class="control-label push-down-5">{{trans('profile.password')}}</label>
                                    {{-- <input type="password" class="form-control" placeHolder="ป้อนรหัสผ่าน" id="signin-password" name="signin-password"
                                    data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="กรุณาป้อนรหัสผ่าน!" autocomplete ="false"/> --}}
                                    <input type="password" class="form-control" placeHolder="{{trans('profile.placeholder.password')}}" id="signin-password" name="signin-password"
                                    data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="{{trans('profile.placeholder.password')}}" autocomplete ="false"/>
                                </div>
                            </div>
                            {{-- btn login --}}
                            <div class="row push-down-20">
                                <div class="col signup-center">
                                    <button type="button" id="signin-accept" class="btn btn-sign-up buy_btn">Login | เข้าสู่ระบบ</button>
                                </div>
                            </div>
                            <div class="row push-down-10">
                                <div class="col signup-center signin-forgot">
                                    {{-- <a href="javascript:void(0);" id="forgot-password">ลืมรหัสผ่าน</a> | <a href="javascript:void(0);" id="signup-btn">สมัครสมาชิก</a></p> --}}
                                    <a href="javascript:void(0);"  class="bold" style="color: #E04B4A; " id="forgot-password">{{trans('profile.forgot_password')}}</a> | <a href="javascript:void(0);"  class="bold"  id="signup-btn">{{trans('profile.register')}}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
