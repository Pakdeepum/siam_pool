@extends('layouts.app-element')
@section('content')

    <div ng-controller="ProfileController" ng-cloak >
        <?php if(isset($data)){?>
            <div  data-ng-init=<?php echo"load_data(".$data.")" ?> ></div>
        <?php } ?>
        <div class="last-section-bg push-down-30">
            <div class="container">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 proinfo-bg edit_s">

                <div class="profiles push-down-50">
                    <div class="row push-down-10">
                        <div class="col signup-center signup-font">
                            <label class="control-label push-down-5">{{ trans('profile.edit_user_information') }}</label>
                        </div>
                    </div>

            <form id="profile-form" enctype="multipart/form-data" action="">
            <div class="row push-down-10">
            {{ method_field('PUT') }}
            <input type="hidden" name="profile-id" value="{{$profile[0]->id}}"/>
                <div class="col-lg-4 col-md-12 col-sm-12" id="profile-vaildate">
                    <label class="control-label push-down-5">{{ trans('profile.first_name') }}</label>
                    <input type="text" class="form-control" id="profile-name" name="profile-name" value="{{$profile[0]->customers->name}}"/>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12" id="passwords-vaildate">
                <label class="control-label push-down-5">{{ trans('profile.last_name') }}</label>
                    <input type="text" class="form-control" id="profile-lastname" name="profile-lastname" value="{{$profile[0]->customers->lastname}}" autocomplete ="false"/>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col">
                            <label class="control-label push-down-5">{{ trans('profile.telephone_number') }}</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4" id="passwords-vaildate">
                            <select class="form-control" id="profile-conutry-code" name="profile-conutry-code">
                                <option value="66">{{ trans('profile.country_code') }}(+66)</option>
                            </select>
                        </div>
                        <div class="col" id="passwords-vaildate">
                            <input type="text" class="form-control" id="profile-tel" name="profile-tel" value="{{$profile[0]->customers->tel}}" autocomplete ="false" style="min-width: 95px;"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row push-down-10">
                <div class="col-lg-6 col-md-12 col-sm-12" id="username-vaildate">
                    <label class="control-label push-down-5">{{ trans('profile.e-mail_address') }}</label>
                    <input type="text" class="form-control" placeHolder="{{ trans('profile.placeholder.email') }}" value="{{$profile[0]->email}}" id="profile-email" name="profile-email" disabled/>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <label class="control-label push-down-5">{{ trans('profile.password') }}</label>
                    <input type="password" class="form-control" placeHolder="{{ trans('profile.placeholder.password') }}" id="profile-password" name="profile-password" autocomplete ="false"/>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <label class="control-label push-down-5">{{trans('profile.password_confirm')}}</label>
                    <input type="password" class="form-control" placeHolder="{{ trans('profile.placeholder.password_confirm') }}" id="profile-confirm" name="profile-confirm"  autocomplete ="false"/>
                </div>
            </div>
            <div class="row push-down-10">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <label class="control-label push-down-5">{{trans('profile.address')}}</label>
                    <input type="text" class="form-control" value="{{$profile[0]->customers->address}}" placeHolder="{{ trans('profile.placeholder.address') }}" id="profile-address" name="profile-address"/>
                </div>
            </div>
            <div class="row push-down-20">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <label class="control-label push-down-5">{{trans('profile.province')}}*</label>
                    <select class="form-control" id="profile-province" name="profile-province">
                        <option value="0">...</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <label class="control-label push-down-5">{{trans('profile.district')}}*</label>
                    <select class="form-control" id="profile-aumphar" name="profile-aumphar">
                        <option value="0">...</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <label class="control-label push-down-5">{{trans('profile.sub_district')}}*</label>
                    <select class="form-control" id="profile-district" name="profile-district">
                        <option value="0">...</option>
                    </select>
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <label class="control-label push-down-5">{{trans('profile.zip_code')}}*</label>
                    <select class="form-control" id="profile-postCode" name="profile-postCode" >
                        <option value="0">...</option>
                    </select>
                </div>
            </div>
            <input type="hidden" id="province-tmp" name="province-tmp"/>
            <input type="hidden" id="aumphar-tmp" name="aumphar-tmp"/>
            <input type="hidden" id="district-tmp" name="district-tmp"/>
            <input type="hidden" id="postCode-tmp" name="postCode-tmp"/>
            </form>
</div>

<div class="row">
    <div class="col signup-center">    
    <button type="button" id="profile-cancel" class="btn btn-sign-up buy_btn2">{{trans('profile.cancel')}}</button>
    <button type="button" id="profile-accept" class="btn btn-sign-up buy_btn">{{trans('profile.confirm')}}</button>
    </div>
</div>



</div>
  </div>



        </div>
    </div>

@include('Profile.modals.successfully-modal')
<script>
    var phoneCode = {!! $country !!};
    var province = {!! $province !!}
    var code = {!!$profile[0]->customers->phone_code!!};
    var _province = {!!$profile[0]->customers->province_id!!};
    var _geo = {!!$profile[0]->customers->geo_id!!};
    var amphur ={!!$profile[0]->customers->amphur_id!!}
    var district = {!! $profile[0]->customers->district_id!!}
    var postcode = {!! $profile[0]->customers->postcode_id!!}
</script>
<script src="{{asset('js/profile/profile.js')}}"></script>
@endsection
