@extends('layouts.app')
@section('content')
<div class="last-section-bg">
    <div class="container">
        <div class="hide-responsive" >
            <div class="row">
                <div class="col-lg-6 text-left">
                    <div class="head-txt-product">Review Content Management</div>
                </div>
                <div class="col-lg-6 text-right"hidden>
                    <div class="link-txt-product">POOLSHOPBKK > Review</div>
                </div>
            </div>
        </div>
        <div class="show-responsive">
            <div class="row">
                <div class="col-lg-6">
                    <div class="head-txt-product">Review Content Management</div>
                </div>
                <div class="col-lg-6">
                    <div class="link-txt-product"hidden>POOLSHOPBKK > Review</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="img-review">
    <div class="container" ng-controller="BackendReviewsController" ng-cloak>
        <div class = "row" >
            <div class = "col-sm-3 col-sm-offset-9">
                <button class="btn-Add" ng-click="AddBackendreview()">Add Review</button>
            </div>

        </div>
        <br/>
        <div class = "row">
            <table class="table"  border="0"  style="width:100% " >
                <thead>
                    <tr >
                        <th style = "text-align : center !important; ">#</th>
                        <th style = "text-align : center !important; ">Picture</th>
                        <th style = "text-align : center !important; ">Name</th>
                        <th style = "text-align : center !important; ">Detail</th>
                        <th style = "text-align : center !important; ">Edit</th>
                        <th style = "text-align : center !important; ">Delete</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr  dir-paginate="data in datalistreviews | itemsPerPage:5 " >
                        <td style = "vertical-align: middle !important;" >@{{$index+1}}</td>
                        <td style = "vertical-align: middle !important; width: 250px;" ><img class="img-responsive image-resize" ng-src=<?php echo asset('/storage/review').'/{{data.id_review}}'.'/{{data.pic_url}}' ; ?>>
                        <td style = "vertical-align: middle !important;" >@{{data.name_review}}</td>
                        <td style = "vertical-align: middle !important;" >@{{data.review_detail}}</td>
                        <td style = "vertical-align: middle !important;" ng-click="EditReview(data.id_review)"><button class="btedit" >Edit</button></td>
                        <td style = "vertical-align: middle !important;" >
                            <form method="get" action="{{ route('BackendReview.DeleteReview') }}">
                                <input name="id_review" type="hidden" value="@{{data.id_review}}" >
                                <button type="submit" class="btdel"  >Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="border-dot" style="margin-top: 40px;"></div>
        <div  style="margin-top: 40px; margin-bottom: 40px;">
            <nav aria-label="...">
                <ul class="pagination pagination-sm" style="float:right;">
                    <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" >
                    </dir-pagination-controls>
                </ul>
            </nav>
        </div>
        @include('BackendReview.Modals.modal-AddBackendreview')
        @include('BackendReview.Modals.modal-EditBackendreview')
    </div>
</div>
<script src="{{asset('js/backend-review/form.js')}}"></script>
@endsection
