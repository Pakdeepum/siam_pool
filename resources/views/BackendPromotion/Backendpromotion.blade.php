@extends('layouts.app')
@section('content')
<div ng-controller="BackendPromotionController" ng-cloak>
  <div class="card"  style="box-shadow: 0 0 10px rgba(0,0,0,0.4);height:820px;width:auto;">
  <div class="card-body">
    <div class="last-section-bg">
        <div class="container">
            <div class="hide-responsive">
                <div class="row">
                    <div class="col-lg-6 text-left" hidden>
                        <a href="/BackendPromotion">
                            <button class="head-txt-product"  style="background: #42D2E9; border: 0px;">Healthy Topic | </button>
                        </a>
                        <button class="head-txt-product" ng-repeat="data in allcategorypromotion"  ng-click="SelectCategoryPromotion(data.id_category_promotion)" style="background: #42D2E9; border: 0px;">@{{data.category_promotion_name}} | </button>
                    </div>
                    <div class="col-lg-6 text-right" hidden>
                        <div class="link-txt-product">POOLSHOPBKK > Healthy Topic</div>
                    </div>
                    <div class="col-lg-6 text-left">
                      <div class="head-txt-product">Blog Management

                      </div>
                    </div>
                </div>
            </div>
            <div class="show-responsive">
                <div class="row">
                    <div class="col-lg-6"hidden>
                        <div class="link-txt-product">POOLSHOPBKK > Poolshopbkk Topic</div>
                    </div>
                    <div class="col-lg-6 text-left">
                      <div class="head-txt-product">Blog Management

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="img-review">
        <div class="container" >
            <div style="padding: 15px 0px;" >
                <div class = "row" >
                    <div class = "col-9"></div>
                     <div class = "col">
                        <button type="button" class="btaddproduct" id="openmodal" ng-click="AddPromotion()" >Add Poolshopbkk Topic</button>
                    </div>
                </div>
            </div>
            <hr style = "border-top: 2px solid #eee; width: 100%; margin-top: 0px;" >
            <div style = "padding-top : 1%">
            </div>
            <div class = "table-responsive">
                <table class="table"  border="0"  style="width:100% " >
                    <thead  class="text-primary">
                        <tr >
                            <th scope="col" style = "text-align : center !important; ">#</th>
                            <th scope="col" style = "text-align : center !important; ">Picture</th>
                            <th scope="col" style = "text-align : center !important; ">Name</th>
                            <th scope="col" style = "text-align : center !important; ">Detail</th>
                            <th scope="col" style = "text-align : center !important; ">Upload Date</th>
                            <th scope="col" style = "text-align : center !important; ">expired Date</th>
                            <th scope="col" style = "text-align : center !important; ">Category Healthy Topic</th>
                            <th scope="col" style = "text-align : center !important; ">Edit</th>
                            <th scope="col" style = "text-align : center !important; ">Delete</th>
                        </tr>
                    </thead>
                    <tbody align="center">
                        <tr  dir-paginate="data in datalistpromotion | itemsPerPage:5 " >
                            <td scope="col" style = "vertical-align: middle !important;" >@{{$index+1}}</td>
                            <td scope="col" style = "vertical-align: middle !important;" ><img class="img-responsive image-resize" src="/storage/promotion/@{{data.id_promotion}}/@{{data.pic_url}}">
                            <td scope="col" style = "vertical-align: middle !important;" >@{{data.promotion_name}}</td>
                            <td scope="col" style = "vertical-align: middle !important;" >@{{data.promotion_detail}}</td>
                            <td scope="col" style = "vertical-align: middle !important;" >@{{data.date_upload}}</td>
                            <td scope="col" style = "vertical-align: middle !important;" >@{{data.date_end_show}}</td>
                            <td scope="col" style = "vertical-align: middle !important;" >@{{data.category_promotion_name}}</td>
                            <td scope="col" style = "vertical-align: middle !important;" ng-click="EditPromotion(data.id_promotion)"><button class="btedit" >Edit</button></td>
                            <td scope="col" style = "vertical-align: middle !important;" ng-click="DeletePromotion(data.id_promotion)" ><button class="btdel" >Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="border-dot" style="margin-top: 40px;"></div>
            <div style="margin-top: 40px; margin-bottom: 40px;">

                <nav aria-label="...">
                    <ul class="pagination pagination-sm" style="float:right;">
                        <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" >
                        </dir-pagination-controls>
                    </ul>
                </nav>
            </div>
            @include('BackendPromotion.Modals.modal-EditPromotion')
            @include('BackendPromotion.Modals.modal-AddPromotion')
        </div>
    </div>
</div>
</div>
</div>
<script src="{{asset('js/backend-promotion/form.js')}}"></script>
@endsection
