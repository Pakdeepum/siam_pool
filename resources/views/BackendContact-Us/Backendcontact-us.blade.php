@extends('layouts.app')
@section('content')
<div class="container" ng-app="myapp" ng-controller="contactus" ng-cloak>
<div class="last-section-bg">
    <div class="container">
        <div class="hide-responsive">
            <div class="row">
                <div class="col-lg-6 text-left">
                    <div class="head-txt-product" >Contact Management</div>
                </div>
                <div class="col-lg-6 text-right"hidden>
                    <div class="link-txt-product">POOLSHOPBKK > Contact Us</div>
                </div>
            </div>
        </div>
        <div class="show-responsive">
            <div class="row">
                <div class="col-lg-6">
                    <div class="head-txt-product">Contact Management</div>
                </div>
                <div class="col-lg-6">
                    <div class="link-txt-product"hidden>POOLSHOPBKK > Contact Us</div>
                </div>
            </div>
        </div>
    </div>
</div>
    <form method="get" action="{{ route('BackendContactUs.SaveEditContactUs') }}">
        <div class="row">
          <div class="col-lg-12" style="background-color:rgb(248, 248, 248);">
            <div class="col-lg-6">
                <div class="contact-info">
                    <h1 id = "contact_us_text_header"></h1>
                    <label hidden>EMAIL</label>
                    <p  hidden id="contact_us_email"></p>
                    <label>PHONE</label>
                    <p id="contact_us_phone"></p>
                    <label>ADDRESS</label>
                    <p id="contact_us_address"></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-info">
                        @csrf
                        <label>TITLE</label >
                        <input class="form-control" type="text" id = "id_title" name="contact_us_text_header">
                        <label  hidden>EMAIL ADDRESS</label>
                        <input  hidden class="form-control" type="text" id = "id_email" name="contact_us_email">
                        <label>PHONE</label>
                        <input class="form-control" type="text" id = "id_phone" name="contact_us_phone">
                        <label>ADDRESS</label>
                        <textarea class="form-control" style="min-height: 120px;" type="text" id = "id_address" name="contact_us_address"></textarea>
                </div>
            </div>
        </div>
          <hr style="width:1000px;">
        <!-- <div class="row" style="margin-top: 10px;" > -->
          <div class="col-lg-12" style="background-color:rgb(248, 248, 248);"  hidden>
            <div class="col-lg-6">
                <div class="contact-info">
                    <label>FACEBOOK URL</label>
                    <p id="contact_us_facebook_url"></p>
                    <label>TWITTER URL</label>
                    <p id="contact_us_twitter_url"></p>
                    <label>INSTAGRAM URL</label>
                    <p  id="contact_us_instagram_url"></p>
                    <label>TELEPHONE</label>
                    <p  id="contact_us_phone1"></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="contact-info">
                    @csrf
                    <label>FACEBOOK URL</label>
                    <input class="form-control" type="text" id = "id_facebook_url" name="contact_us_facebook_url">
                    <label>TWITTER URL</label>
                    <input class="form-control" type="text" id = "id_twitter_url" name="contact_us_twitter_url">
                    <label>INSTAGRAM URL</label>
                    <input class="form-control" type="text" id = "id_instagram_url" name="contact_us_instagram_url">
                    <label>TELEPHONE </label>
                    <input class="form-control" type="text" id = "id_phone1" name="contact_us_phone1">
                </div>
            </div>
          <!-- </div> -->
        </div>
          <div class="col-lg-12 text-center">
            <button  type="submit" class="btn-save">SAVE</button>
          </div>
    </form>
</div>
<script src="{{asset('js/backend-contactus/form.js')}}"></script>
@endsection
