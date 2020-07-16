@extends('layouts.app-element')
@section('content')
<div ng-controller="DealerController" ng-cloak>
<div class="last-section-bg">
    <div class="container">
        <div class="row">
          <div class="col-md-6 col-md-offset-3" style="padding-top: 36px;">
            <h3 class="headdealer">To become an authorized dealer please contact POOLSHOPBKK. </h3>
{{--            <div>@{{datalistcontactus[0].contact_us_address}}</div>--}}
{{--            <div>@{{datalistcontactus[0].contact_us_phone}}</div>--}}
              <p class="dealertxt"><b>Address :</b> 214/4 Outer Ring Rd 2 San Phi Suea, Mueang Chiang Mai District, Chiang Mai 50300 Thailand</p>
              <p class="dealertxt"><b>Thai Tel:</b> 084-378-9319</p>
              <p class="dealertxt"><b>ENG Tel:</b> 061-270-5551</p>
          </div>
          <hr style="width:50%;border-top: 1px solid rgb(180, 180, 180);">
            <div class="col-sm-12" style="padding-top: 10px;">
              <label class="f_size_ct15">
{{--               <div> @{{datalistcontactus[0].contact_us_text_header}}</div>--}}
              </label>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6 text-Center">
            <div class="alert alert-success" id="success">
                <span></span>
            </div>
            <form action="" enctype="multipart/form-data" id="contact-mail" class="form-horizontal"  style="margin-bottom: 15px;">
              <div class="contact-info">
                  <div class="row">
                      <div class="col-lg-12">
                          <h3 style="margin-bottom: 10px;">  Please contact us for more information.</h3>
                      </div>
                  </div>
                      <div class="row col-sm-6">
                        <input class="form-control placeholder_style contactbox f_size_ct15" type="text" id="name" name="name" required placeholder="Company Name" style="background: rgb(218, 218, 218);">
                      </div>
                      <div class="row col-sm-6">
                        <input class="form-control placeholder_style contactbox f_size_ct15" type="email" id="email" name="email" required placeholder="Email" style="background: rgb(218, 218, 218);">
                      </div>
                  <div class="row col-sm-12">
                      <textarea class="form-control placeholder_style" style="min-height:200px;background:rgb(218, 218, 218); margin-bottom: 15px;border-radius: 0;" type="text" id="message" name="message" required placeholder="Message"></textarea>
                  </div>
                </div>
            </form>
            <div class="row col-sm-12 hide-responsive">
              <button class="btn-send" style="margin-bottom: 65px;" id="contactMail">Send Email</button>
            </div>
            <div class="row col-sm-12 show-responsive">
              <button class="btn-send" id="contactMail">Send Email<</button>
            </div>
        </div>
        <hr style="width:50%;border-top: 1px solid rgb(180, 180, 180);"hidden>
        <div class="container text-center"hidden>
          <div class="col-lg-12" >
              <div class="contact-info  hide-responsive" ng-repeat="data in datalistcontactus "  style="padding-bottom: 45px;">
                <label>SOCIAL</label>
                  <div class="social-icon">
                      <a href = @{{data.contact_us_facebook_url}} ><i class="fa fa-facebook"></i></a>
                      <a href = @{{data.contact_us_twitter_url}} ><i class="fa fa-twitter"></i></a>
                      <a href = @{{data.contact_us_instagram_url}} ><i class="fa fa-instagram"></i></a>
                  </div>
              </div>
              <div class="contact-info  show-responsive" ng-repeat="data in datalistcontactus " style="padding-bottom:35px;" >
                <label>SOCIAL</label>
                  <div class="social-icon">
                      <a href = @{{data.contact_us_facebook_url}} ><i class="fa fa-facebook"></i></a>
                      <a href = @{{data.contact_us_twitter_url}} ><i class="fa fa-twitter"></i></a>
                      <a href = @{{data.contact_us_instagram_url}} ><i class="fa fa-instagram"></i></a>
                  </div>
              </div>
          </div>
       </div>
    </div>
</div>
</div>
<script src="{{asset('js/dealer/dealer.js')}}"></script>
@endsection
