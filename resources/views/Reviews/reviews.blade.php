@extends('layouts.app-element')
@section('content')
<div class="last-section-bg">
    <div class="container">
        <div class="hide-responsive">
            <div class="row">
                <div class="col-lg-6 text-left"hidden>
                    <div class="head-txt-product">Review</div>
                </div>
                <div class="col-lg-6 text-right"hidden>
                    <div class="link-txt-product">HEALTH HAND HEART > Review</div>
                </div>
            </div>
        </div>
        <div class="show-responsive">
            <div class="row">
                <div class="col-lg-6">
                    <div class="head-txt-product"hidden>Review</div>
                </div>
                <div class="col-lg-6">
                    <div class="link-txt-product">HEALTH HAND HEART > Review</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="img-review">
    <div class="container" style="margin-top: 30px;" ng-controller="ReviewsController" ng-cloak>
            <div dir-paginate="data in datalistreviews | itemsPerPage:9 ">
                <div class="row" style=" margin-bottom: 40px;"  >
                    <div class="col-lg-5" style="margin: auto;">
                        <img ng-src=<?php echo asset('/storage/review').'/{{data.id_review}}/{{data.pic_url}}' ; ?> style="width: 50%;margin: auto;display: block;">
                    </div>
                    <div class="col-lg-7">
                        <label class="head-txt-promo">@{{data.name_review}}</label>
                        <p style="white-space: pre-wrap;text-indent:5em;font-size: 16px; text-align: justify;">@{{data.review_detail}}</p>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 ">
                                <div ng-repeat="data1 in allaboutproduct" ng-show = "data.id_product == data1.id_product" >About Product : @{{data1.product_name}}</div>

                            </div>
                            <div class="col-lg-6">
                                <form  method="get" action="{{route('reviews.ListReviewDetail')}}" enctype="multipart/form-data" class="pull-right form-horizontal" role="form">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id_review" value="@{{data.id_review}}">
                                    <button type="submit" class="btn-see-more" style="font-size: 15px;">See more</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-dot" style=" margin-bottom: 40px;"></div>
            </div>
         <nav aria-label="...">
            <ul class="pagination pagination-sm" style="float:right;">
                <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" >
                </dir-pagination-controls>
            </ul>
        </nav>
    </div>
</div>
<script src="{{asset('js/review/form.js')}}"></script>
@endsection
