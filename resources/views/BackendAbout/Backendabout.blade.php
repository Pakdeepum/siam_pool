@extends('layouts.app')
@section('content')
    <div class="last-section-bg">
        <div class="container">
            <div class="hide-responsive">
                <div class="row" hidden>
                    <div class="col-lg-6 text-left">
                        <div class="head-txt-product">About</div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <div class="link-txt-product">POOLSHOPBKK > About</div>
                    </div>
                </div>
            </div>
            <div class="show-responsive">
                <div class="row" hidden>
                    <div class="col-lg-6">
                        <div class="head-txt-product">About</div>
                    </div>
                    <div class="col-lg-6">
                        <div class="link-txt-product">POOLSHOPBKK > About</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-bg">
        <div class="container">
            <div class=" text-center margin-about">
                <label class="about-us-txt"><i>About Us</i></label>
                <label class="hhh-txt">POOLSHOPBKK</label>
            </div>
        </div>
    </div>
<div ng-controller="BackendAboutController">
    <form action="{{ route('BackendAbout.SaveEditAbout') }}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
        {{csrf_field()}}
        <div class="container" >
            <div class="text-center" style="margin-top: 20px;">
                <textarea class="textarea-about"  name="about_us_text_header" id="about_us_text_header" maxlength="600" cols="30"  rows="10" style=" white-space: pre-wrap;"></textarea>
            </div>
            <div class="text-center">
                <img ng-src='{{asset("img/About/about.png")}}' style="width: 30%; margin-bottom: -5px;">
            </div>
        </div>
        <div class="blue-bg blue-bg-about" style="height: auto;"hidden>
            <div class="container">
                <div class="row">
                    <div class="col" style="margin-top: 40px;">
                        <div class="col-lg-4">
                            <div class="vision-img">
                                <img name="about_us_content_1_pic_url"  id="about_us_content_1_pic_url" style="width: 285px;">
                            </div>
                              <p style="color:white;">*Image Size350x350</p>
                            <div>
                                <input class="font-size-content-choosefile" name="about_us_content_1_file_pic" id="about_us_content_1_file_pic" type="file" onchange="preview_image_add_1_pic(event)">
                            </div>
                        </div>
                        <!-- col-lg-8-->
                        <div class="col-lg-8">
                            <div class="list-vision">
                                <ul>
                                    <li>
                                        <input class="form-control font-size-header" name="about_us_content_1_header" id="about_us_content_1_header" placeholder="Header" maxlength="30" type="text">
                                    </li>
                                    <li>
                                        <input class="form-control font-size-content" name="about_us_content_1_text_1" id="about_us_content_1_text_1" maxlength="150" type="text">
                                    </li>
                                    <li>
                                        <input class="form-control font-size-content" name="about_us_content_1_text_2" id="about_us_content_1_text_2" maxlength="150" type="text">
                                    </li>
                                    <li>
                                        <input class="form-control font-size-content" name="about_us_content_1_text_3" id="about_us_content_1_text_3" maxlength="150" type="text">
                                    </li>
                                    <li>
                                        <input class="form-control font-size-content" name="about_us_content_1_text_4" id="about_us_content_1_text_4" maxlength="150" type="text">
                                    </li>
                                    <li>
                                        <input class="form-control font-size-content" name="about_us_content_1_text_5" id="about_us_content_1_text_5" maxlength="150" type="text">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- col-lg-8-->
                    </div>
                </div>
            </div>
        </div>
        <!--dark-blue-bg -->
        <div class="dark-blue-bg">
            <div class="container text-center">
                <!-- row -->
                <div class="row" style="margin-top: 40px;" hidden>
                    <div class="col">
                        <!-- lg-8-->
                        <div class="col-lg-8">
                            <div class="list-mission">
                                <ul>
                                    <li>
                                        <input class="form-control font-size-header" name="about_us_content_2_header" id="about_us_content_2_header" placeholder="Header" maxlength="30" type="text">
                                    </li>
                                    <li>
                                        <input class="form-control font-size-content" name="about_us_content_2_text_1" id="about_us_content_2_text_1" maxlength="150" type="text">
                                    </li>
                                    <li>
                                        <input class="form-control font-size-content" name="about_us_content_2_text_2" id="about_us_content_2_text_2" maxlength="150" type="text">
                                    </li>
                                    <li>
                                        <input class="form-control font-size-content" name="about_us_content_2_text_3" id="about_us_content_2_text_3" maxlength="150" type="text">
                                    </li>
                                    <li>
                                        <input class="form-control font-size-content" name="about_us_content_2_text_4" id="about_us_content_2_text_4" maxlength="150" type="text">
                                    </li>
                                    <li>
                                        <input class="form-control font-size-content" name="about_us_content_2_text_5" id="about_us_content_2_text_5" maxlength="150" type="text">
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- lg-8-->
                        <!-- lg-4-->
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="mission-img">
                                    <img name="about_us_content_2_pic_url"  id="about_us_content_2_pic_url" style="width: 285px;" >
                                </div>
                                  <p style="color:white;">*Image Size 350x350</p>
                                <div>
                                    <input class="font-size-content-choosefile" name="about_us_content_2_file_pic" id="about_us_content_2_file_pic" type="file" onchange="preview_image_add_2_pic(event)">
                                </div>
                            </div>
                        </div>
                        <!-- -->
                    </div>
                </div>
                <!-- row -->
                <button  type="submit" class="btn-save">SAVE</button>
            </div>
        </div>
        <!--dark-blue-bg -->
    </form>
</div>
<script src="{{asset('js/backend-about/form.js')}}"></script>
@endsection
