@extends('layouts.app')
@section('content')
<div class="last-section-bg">
    <div class="container">
        <div class="hide-responsive">
            <div class="row">
                <div class="col-lg-6 text-left">
                    <div class="head-txt-product">Blog Management</div>
                </div>
                <div class="col-lg-6 text-right" hidden>
                    <div class="link-txt-product">Poolshopbkk > Category Promotion</div>
                </div>
            </div>
        </div>
        <div class="show-responsive">
            <div class="row">
                <div class="col-lg-6">
                    <div class="head-txt-product">Blog Management</div>
                </div>
                <div class="col-lg-6" hidden>
                    <div class="link-txt-product">Poolshopbkk > Category Promotion</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="img-review">
    <div class="container"  ng-controller="BackendCategoryPromotionController" ng-cloak>
        <div style="padding: 15px 0px;" >
            <div class = "row" >
            <div class="col-9"></div>
                <div class="col">
                    <button type="button" class="btaddproduct" id="openmodal" ng-click="AddCategoryPromotion()" >Add Category</button>
                </div>
            </div>
        </div>
        <hr style = "border-top: 2px solid #eee; width: 100%; margin-top: 0px;" >
        <div style = "padding-top : 1%">
        </div>
        <div class = "table-responsive">
            <table class="table"  border="0"  style="width:100% " >
                <thead class="text-primary">
                    <tr >
                        <th scope="col" style = "text-align : center !important; ">#</th>
                        <th scope="col" style = "text-align : center !important; ">Name</th>
                        <th scope="col" style = "text-align : center !important; ">Detail</th>
                        <th scope="col" style = "text-align : center !important; ">Edit</th>
                        <th scope="col" style = "text-align : center !important; ">Delete</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr  dir-paginate="data in datalistcategorypromotion | itemsPerPage:10 ">
                        <td scope="col" style = "vertical-align: middle !important;" >@{{$index+1}}</td>
                        <td scope="col" style = "vertical-align: middle !important;" >@{{data.category_promotion_name}}</td>
                        <td scope="col" style = "vertical-align: middle !important;" >@{{data.category_promotion_detail}}</td>
                        <td scope="col" style = "vertical-align: middle !important;" ng-click="EditCategoryPromotion(data.id_category_promotion)"><button class="btedit" >Edit</button></td>
                        <td scope="col" style = "vertical-align: middle !important;" ng-click="DeleteCategoryPromotion(data.id_category_promotion)" ><button class="btdel" >Delete</button></td>
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
        @include('BackendCategoryPromotion.Modals.modal-EditCategoryPromotion')
        @include('BackendCategoryPromotion.Modals.modal-AddCategoryPromotion')
    </div>
</div>
<script src="{{asset('js/backend-categorypromotion/form.js')}}"></script>
@endsection
