@extends('layouts.app-element')
@section('content')
    <div ng-controller="ContactUsController" ng-cloak>
        <div class="last-section-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3" style="padding-top: 36px;">
                        <h3 class="headdealer">
                            <center>POOLSHOP BKK</center>
                        </h3>
                        <p class="dealertxt"><b>{{trans('profile.address')}} :</b> {{trans('profile.address_detail')}}</p>
                        <p class="dealertxt"><b>{{trans('profile.email')}} :</b> sale@poolshopbkk.com</p>
                    </div>
                    <hr style="width:50%;border-top: 1px solid rgb(180, 180, 180);">
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
                    <form action="" enctype="multipart/form-data" id="contact-mail" class="form-horizontal"
                          style="margin-bottom: 15px;">
                        <div class="contact-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 style="margin-bottom: 10px;">{{trans('profile.enquiry')}}</h3>
                                </div>
                            </div>
                            <div class="row col-sm-6">
                                <input class="form-control placeholder_style contactbox f_size_ct15" type="text"
                                       id="name" name="name" required placeholder="{{trans('profile.name')}}"
                                       style="background: rgb(218, 218, 218);">
                            </div>
                            <div class="row col-sm-6">
                                <input class="form-control placeholder_style contactbox f_size_ct15" type="email"
                                       id="email" name="email" required placeholder="{{trans('profile.email')}}"
                                       style="background: rgb(218, 218, 218);">
                            </div>
                            <div class="row col-sm-12">
                                <textarea class="form-control placeholder_style"
                                          style="min-height:200px;background:rgb(218, 218, 218); margin-bottom: 15px;border-radius: 0;"
                                          type="text" id="message" name="message" required
                                          placeholder={{trans('profile.message')}}></textarea>
                            </div>
                        </div>
                    </form>
                    <div class="row col-sm-12 hide-responsive">
                        <button class="btn-send" style="margin-bottom: 65px;"
                                id="contactMail">{{trans('profile.sendemail')}}</button>
                    </div>
                    <div class="row col-sm-9 show-responsive">
                        <button class="btn-send" id="contactMail">{{trans('profile.sendemail')}}</button>
                    </div>
                </div>
                <hr style="width:50%;border-top: 1px solid rgb(180, 180, 180);" hidden>
                <div class="container text-center" hidden>
                    <div class="col-lg-12">
                        <div class="contact-info  hide-responsive" ng-repeat="data in datalistcontactus "
                             style="padding-bottom: 45px;">
                            <label>SOCIAL</label>
                            <div class="social-icon">
                                <a href=@{{data.contact_us_facebook_url}}><i class="fa fa-facebook"></i></a>
                                <a href=@{{data.contact_us_twitter_url}}><i class="fa fa-twitter"></i></a>
                                <a href=@{{data.contact_us_instagram_url}}><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="contact-info  show-responsive" ng-repeat="data in datalistcontactus "
                             style="padding-bottom:35px;">
                            <label>SOCIAL</label>
                            <div class="social-icon">
                                <a href=@{{data.contact_us_facebook_url}}><i class="fa fa-facebook"></i></a>
                                <a href=@{{data.contact_us_twitter_url}}><i class="fa fa-twitter"></i></a>
                                <a href=@{{data.contact_us_instagram_url}}><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3" style="padding-top: 36px;">
                        <h3 class="headdealer">{{trans('profile.dealersection')}}</h3>
                    </div>
                    <hr style="width:50%;border-top: 1px solid rgb(180, 180, 180);">
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6 text-Center">
                        <form action="" enctype="multipart/form-data" id="contact-mail-dealer" class="form-horizontal"
                              style="margin-bottom: 15px;">
                            <div class="contact-info">
                                <div class="row col-sm-6">
                                    <input class="form-control placeholder_style contactbox f_size_ct15" type="text"
                                           id="name" name="name" required placeholder="{{trans('profile.company_name')}}"
                                           style="background: rgb(218, 218, 218);">
                                </div>
                                <div class="row col-sm-6">
                                    <input class="form-control placeholder_style contactbox f_size_ct15" type="email"
                                           id="email" name="email" required placeholder="{{trans('profile.email')}}"
                                           style="background: rgb(218, 218, 218);">
                                </div>
                                <div class="row col-sm-12">
                                    <textarea class="form-control placeholder_style"
                                              style="min-height:200px;background:rgb(218, 218, 218); margin-bottom: 15px;border-radius: 0;"
                                              type="text" id="message" name="message" required
                                              placeholder="{{trans('profile.message')}}"></textarea>
                                </div>
                            </div>
                        </form>
                        <div class="row col-sm-12 hide-responsive">
                            <button class="btn-send" style="margin-bottom: 65px;"
                                    id="contactMailDealer">{{trans('profile.sendemail')}}</button>
                        </div>
                        <div class="row col-sm-12 show-responsive">
                            <button class="btn-send" id="contactMailDealer">{{trans('profile.sendemail')}}<</button>
                        </div>
                    </div>
                    <hr style="width:50%;border-top: 1px solid rgb(180, 180, 180);" hidden>
                    <div class="container text-center" hidden>
                        <div class="col-lg-12">
                            <div class="contact-info  hide-responsive" ng-repeat="data in datalistcontactus "
                                 style="padding-bottom: 45px;">
                                <label>{{trans('profile.socail')}}</label>
                                <div class="social-icon">
                                    <a href=@{{data.contact_us_facebook_url}}><i class="fa fa-facebook"></i></a>
                                    <a href=@{{data.contact_us_twitter_url}}><i class="fa fa-twitter"></i></a>
                                    <a href=@{{data.contact_us_instagram_url}}><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="contact-info  show-responsive" ng-repeat="data in datalistcontactus "
                                 style="padding-bottom:35px;">
                                <label>{{trans('profile.socail')}}</label>
                                <div class="social-icon">
                                    <a href=@{{data.contact_us_facebook_url}}><i class="fa fa-facebook"></i></a>
                                    <a href=@{{data.contact_us_twitter_url}}><i class="fa fa-twitter"></i></a>
                                    <a href=@{{data.contact_us_instagram_url}}><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <hr style="width:50%;border-top: 1px solid rgb(180, 180, 180);">
                    <div class="col-md-6 col-md-offset-3" style="padding-top: 36px;">
                        <h3>{{trans('profile.map')}}</h3>

                        {{-- <iframe id="gmap_canvas" src="https://www.google.com/maps/d/embed?mid=1wVtGEtMx_egxzeKjHzd9NV6RGc4bYYN_" width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>                         --}}

                        {{-- <img id="siamPoolMap" src="{{asset('img/pic/map_SiamPool.jpg')}}" alt="{{trans('profile.map')}}" style="width:100%;">
                      <!-- The Modal -->
                      <div id="siamPoolMapModal" class="modal">
                        <span class="closeMap">&times;</span>
                        <img class="modal-content" id="map01">
                        <div id="caption"></div>
                      </div> --}}
                    </div>

                </div>
                  <div class="container">
                    <div class="col-md-6 col-md-offset-3" style="padding-top: 36px;align:center">
                <div class="mapouter"><div class="gmap_canvas">
                  <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=poolshopbkk%20google%20map&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                  {{-- <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/place/POOLSHOPBKK/@18.7710291,99.0402156,17z/data=!3m1!4b1!4m5!3m4!1s0x30da2f7fa408f345:0xfe0571500d321dd0!8m2!3d18.7710291!4d99.0424043?hl=th&hl=es;z=14&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"> --}}


                  </iframe>
                </div>
                <style>.mapouter{position:relative;align:center;text-align:center;height:100%;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:100%;}
                </style>
                </div>
                </div>
                </div>
                <div style="padding:20px"></div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/contact-us/form.js')}}"></script>
@endsection
