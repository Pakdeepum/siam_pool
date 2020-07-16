<!-- Modal Add -->
<form enctype="multipart/form-data" class="form-horizontal" id="signup-form">
    {{csrf_field()}}
<!-- Modal -->
    <div class="modal push-up-50" tabindex="-1" role="dialog" id="modal-sign-up" style="height:85%">
        <div class="modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row ">
                        <div class="col-lg-6 col-md-6 col-sm-6 text-center signin-background">
                            <div class="row signup-cropped push-down-5">
                                <img src="{{asset('img/logo/poolicon.png')}}" style="max-width:100%;max-height:100%;">
                            </div>
                            <div class="row signup-text">
                                <div class="signin-text-h push-down-5">
                                    <span class="mark">POOLBKKSHOP</span>
                                    <span>{{trans('profile.address_detail')}}</span>
                                    {{-- <span>English Tel : 080-619-5154</span><span>Thai Tel: 084-378-9319</span> --}}

                                </div>
                                <div class="signin-text-c">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 signin-head" style="overflow: scroll; max-height: -webkit-fill-available;">
                            <div class="row">
                                <div class="col signup-center top_head_txt signup-font">
                                    <label class="control-label push-down-5" style="padding-top: 41px;">REGISTER | สมัครสมาชิก</label>
                                </div>
                            </div>
                            <div class="row push-down-5">
                                <div class="col signup-center">
                                    <div class="alert alert-danger" id="error">
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row push-down-5">
                                <div class="col signup-padding-right" id="name-vaildate">
                                    <label class="control-label push-down-5">{{trans('profile.first_name')}}</label>
                                    <input type="text" class="form-control" placeHolder="{{trans('profile.placeholder.first_name')}}" id="signup-name" name="signup-name"
                                    data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="{{trans('profile.placeholder.first_name')}}"/>
                                </div>
                                <div class="col" id="lastname-vaildate">
                                    <label class="control-label push-down-5">{{trans('profile.last_name')}}</label>
                                    <input type="text" class="form-control" placeHolder="{{trans('profile.placeholder.last_name')}}" id="signup-lastname" name="signup-lastname"
                                    data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="{{trans('profile.placeholder.last_name')}}"/>
                                </div>
                            </div>
                            <div class="row push-down-5">
                              <div class="col signup-padding-right" id="address-vaildate">
                                  <label class="control-label push-down-5">{{trans('profile.address')}}</label>
                                  <input type="text" class="form-control" placeHolder="Please fill Address" id="signup-address" name="signup-address"
                                  data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="Please Fill Address"/>
                              </div>
                            </div>
                            <div class="row push-down-5">
                                <div class="col signup-padding-right" id="province-vaildate">
                                    <label class="control-label push-down-5">{{trans('profile.province')}}</label>
                                    <select class="form-control" id="signup-province" name="signup-province">
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col signup-padding-right" id="amphur-vaildate">
                                    <label class="control-label push-down-5">{{trans('profile.district')}}</label>
                                    <select class="form-control" id="signup-amphur" name="signup-amphur">
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col signup-padding-right" id="district-vaildate">
                                    <label class="control-label push-down-5">{{trans('profile.sub_district')}}</label>
                                    <select class="form-control" id="signup-district" name="signup-district">
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col signup-padding-right" id="postcode-vaildate">
                                    <label class="control-label push-down-5">{{trans('profile.zip_code')}}</label>
                                    <select class="form-control" id="signup-postcode" name="signup-postcode">
                                        <option value="">...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row push-down-5">
                                <div class="col" id="email-vaildate">
                                    <label class="control-label push-down-5">{{trans('profile.e-mail_address')}}</label>
                                    <input type="text" placeHolder="{{trans('profile.placeholder.email')}}" class="form-control" id="signup-email" name="signup-email"
                                    data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="{{trans('profile.placeholder.email')}}"/>
                                </div>
                            </div>
                            <div class="row push-down-5">
                                <div class="col-12">
                                    <label class="control-label">{{trans('profile.telephone_number')}}</label>
                                </div>
                            </div>
                            <div class="row push-down-5">
                                <div class="col-4 signup-padding-right">
                                    <select class="form-control" id="signup-conutry-code" name="signup-conutry-code">
                                        <option value="">country code (+66)</option>
                                    </select>
                                 </div>
                                <div class="col" id="tel-vaildate">
                                    <input type="text" placeHolder="{{trans('profile.placeholder.specify_phone_number')}}" class="form-control" id="signup-tel" name="signup-tel"
                                    data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="{{trans('profile.specify_phone_number')}}"/>
                                </div>
                            </div>
                            <div class="row push-down-5">
                                <div class="col">
                                    <label class="control-label push-down-5">{{trans('profile.password')}}</label>
                                </div>
                                <div class="col signup-right">
                                    <a href="javascript:void(0)" class="control-label push-down-5"
                                    data-toggle="tooltip" data-placement="top" title="{{trans('profile.placeholder.suggest_word')}}">
                                    <small>{{trans('profile.suggestion')}} <span class="glyphicon glyphicon-question-sign"></span></small></a>
                                </div>
                            </div>
                            <div class="row push-down-5">
                                <div class="col" id="password-vaildate">
                                    <input type="password" placeHolder="{{trans('profile.placeholder.password')}}" class="form-control" id="signup-password" name="signup-password" autocomplete="false"
                                    data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="{{trans('profile.placeholder.password')}}"/>
                                </div>
                            </div>
                            <div class="row push-down-10">
                                <div class="col" id="confirm-vaildate">
                                    <label class="control-label push-down-5">{{trans('profile.password_confirm')}}</label>
                                    <input type="password" placeHolder="{{trans('profile.placeholder.password_confirm')}}" class="form-control" id="signup-confirm" name="signup-confirm" autocomplete="false"
                                    data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="{{trans('profile.placeholder.password_confirm')}}"/>
                                </div>
                            </div>
                            <div class="row push-down-10">
                                <div class="col signup-center">
                                    <button type="button" id="signup-accept" class="btn btn-twitter btn-sign-up buy_btn">{{trans('profile.register')}}</button>
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
<div class="modal fade" id="modal-resgiter">
    <div class="modal-success modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row push-down-10">
                    <div class="col signup-center">
                        <div class="crop-success"><img src="{{asset('img/pic/success.png')}}"/></div>
                    </div>
                </div>
                <div class="row push-down-10">
                    <div class="col signup-center">
                        <span>{{trans('profile.register_success')}}</span>
                    </div>
                </div>
                <div class="row push-down-10">
                    <div class="col signup-center">
                        <button type="button" class="btn btn-success" id="register-success" data-dismiss="modal" aria-label="Close">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
