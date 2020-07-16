@extends('layouts.app-element')
@section('content')

<div class="last-section-bg">
    <div class="container">
        <div class="hide-responsive">
            <div class="row">
                <div class="col-lg-6 text-left"hidden>
                    <div class="head-txt-product">About</div>
                </div>
                <div class="col-lg-6 text-right"hidden>
                    <div class="link-txt-product">HEALTH HAND HEART > About</div>
                </div>
            </div>
        </div>
        <div class="show-responsive">
            <div class="row">
                <div class="col-lg-6"hidden>
                    <div class="head-txt-product">About</div>
                </div>
                <div class="col-lg-6"hidden>
                    <div class="link-txt-product">HEALTH HAND HEART > About</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="about-bg">
    <div class="container">
      <div class="row">
          <div class="col-sm-12 col-sm-offset-2 margin-about">
              <label class="about-us-txt"><i>About Us</i></label>
              <label class="hhh-txt">HEALTH HAND HEART</label>
          </div>
          </div>
    </div>
</div>
<div ng-controller="AboutController" ng-cloak>
    <div  ng-repeat="data in datalistabout " >
        <div class="container" >
            <div class="row" style="margin-top: 20px;">
                <p style="font-size: 18px; padding: 20px; margin-top: 20px; text-align: justify;text-indent: 5em;">
                @{{data.about_us_text_header}}
                </p>

            </div>
            <div class="text-center">
<img ng-src='{{asset("img/About/about.png")}}' style="width: 30%; margin-bottom: -4px;">
            </div>
        </div>
        <div class="blue-bg blue-bg-about" style="background-color:#00b5d4;height: auto;"hidden>
            <div class="container">
                <div class="row" style="padding-top: 6%;">
                    <div class="col-lg-4 text-center">
                        <div class="vision-img">
                            <img ng-src=<?php echo asset('/storage/About/1').'/{{data.about_us_content_1_pic_url}}' ; ?> >
                        </div>
                    </div>
                    <div class="col-lg-8" style="padding-top: 6%;">
                        <h1 style="color: #fff; font-size: 40px; margin-left: 30px;">@{{data.about_us_content_1_header}}</h1>
                        <div class="list-vision">
                            <ul>
                                <li>
                                    <i class="fa fa-caret-right right-vision"></i>
                                    @{{data.about_us_content_1_text_1}}
                                </li>
                                <li>
                                    <i class="fa fa-caret-right right-vision"></i>
                                    @{{data.about_us_content_1_text_2}}
                                </li>
                                <li>
                                    <i class="fa fa-caret-right right-vision"></i>
                                    @{{data.about_us_content_1_text_3}}
                                </li>
                                <li>
                                    <i class="fa fa-caret-right right-vision"></i>
                                    @{{data.about_us_content_1_text_4}}
                                </li>
                                <li>
                                    <i class="fa fa-caret-right right-vision"></i>
                                    @{{data.about_us_content_1_text_5}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dark-blue-bg" style="background-color:#00b5d4;"hidden>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8"style="padding-top: 6%;">
                        <h1 style="color: #fff; font-size: 40px; margin-left: 30px;">@{{data.about_us_content_2_header}}</h1>
                        <div class="list-mission">
                            <ul>
                                <li>
                                    <i class="fa fa-caret-right right-mission"></i>
                                    @{{data.about_us_content_2_text_1}}
                                </li>
                                <li>
                                    <i class="fa fa-caret-right right-mission"></i>
                                    @{{data.about_us_content_2_text_2}}
                                </li>
                                <li>
                                    <i class="fa fa-caret-right right-mission"></i>
                                    @{{data.about_us_content_2_text_3}}
                                </li>
                                <li>
                                    <i class="fa fa-caret-right right-mission"></i>
                                    @{{data.about_us_content_2_text_4}}
                                </li>
                                <li>
                                    <i class="fa fa-caret-right right-mission"></i>
                                    @{{data.about_us_content_2_text_5}}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 text-center">
                        <div class="mission-img">
                            <img ng-src=<?php echo asset('/storage/About/2').'/{{data.about_us_content_2_pic_url}}' ; ?> >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/about/form.js')}}"></script>

@endsection
