@extends('layouts.app')
@section('content')
{{--<div class="last-section-bg">--}}
{{--    <div class="container">--}}
{{--        <div class="hide-responsive">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6 text-left">--}}
{{--                    <div class="head-txt-product">หน้าจัดการภาพปก</div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6 text-right" hidden>--}}
{{--                    <div class="link-txt-product">HEALTH HAND HEART > Banner</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="show-responsive">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="head-txt-product">หน้าจัดการภาพปก Home และ Show Product</div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="link-txt-product">HEALTH HAND HEART > Banner</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="container" style="padding:10px;">
        <!-- message from controller-->
    @if ($errors->any())
        <div class="alert alert-danger" id="response">
            {{ implode('', $errors->all()) }}
        </div>
    @endif
    @if (session('status'))
    <div class="alert alert-success" id="response">
        {{ session('status') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger" id="response">
        {{ session('error') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
        <h3 class="card-title">Banner<span class="badge badge-secondary">Adding</span></h3>
            <form enctype="multipart/form-data" method="post" action="{{url('/BackendBanner/StoreBanner')}}">
                {{ csrf_field() }}
                <div class="col mb-3">
                    <div class="form-group">
                        <label for="imageInput">Banner Image</label>
                          <p style="color:black;">*Image size 1906x842</p>
                        <input name="carousel" type="file" id="imageInput" required>
                    </div>
                </div>
                <div class="col crop">
                    <div id="gallery"></div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <input type="submit" value="Add Banner" class="btn btn-outline-primary"/>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body table-responsive">
        <h3 class="card-title">Banner<span class="badge badge-secondary">List</span></h3>
        <input type="hidden" id="bannerLoad" value="@if(session('load')) {{session('load')}} @endif"/>
        <table class="table banner" id="banner"
            data-toggle="table"
            data-pagination = "true"
            data-page-size="3">
                <thead class="text-primary">
                    <tr>
                      <div class="col-sm-12">
                        <th scope="col" data-formatter="viewbannerFormatter"></th>
                        </div>
                        <th scope="col" data-formatter="editBannerFormatter" data-align="right" data-width="100px"></th>
                        <th scope="col" data-formatter="deleteBannerFormatter" data-align="right" data-width="100px"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
@include('BackendBanner.Modals.modal-editbanner')
<script src="{{ asset('js/backend-banner/banner.js') }}"></script>
@endsection
