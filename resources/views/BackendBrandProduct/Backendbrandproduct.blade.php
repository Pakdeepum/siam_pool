@extends('layouts.app')
@section('content')
<div class="card"  style="box-shadow: 0 0 10px rgba(0,0,0,0.4);height:820px;width:auto;">
<div class="card-body">
{{--<div class="last-section-bg">--}}
{{--    <div class="container">--}}
{{--       --}}
{{--        <div class="show-responsive">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="head-txt-product">Category Management</div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="link-txt-product" hidden>POOLSHOPBKK > Brand</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
    <div class="container" ng-controller="BackendBrandProductController">
      <div class="col-lg-12 col-lg-offset">
          <div style="padding: 15px 0px;">
              <div class = "row" >
                  <div class = "col-lg-9">
                      <div class="head-txt-product">Brand Management</div>

                  @if(session()->has('message'))
                      <div id="message" align="center" class="alert alert-success">
                          <h2>{{ session()->get('message') }}</h2>
                      </div>
                  @endif
                  </div>
                  <div class="col-lg-3">
                      <button class="btn btn-success floatright" id="open-modal-AddBrand">ADD Brand</button>
                  </div>
              </div>
          </div>
          <hr style = "border-top: 2px solid #eee; width: 100%; margin-top: 0px;" >
          <div class = "col-lg-12 col-md-12 col-sm-12 table-responsive" style="overflow: scroll; max-height: 600px;">
              <table class="table"  border="0"  style="width:100% " >
                  <thead  class="text-primary">
                      <tr >
                          <th  scope="col" style = "text-align : center !important; ">No.</th>

                          <th  scope="col" style = "text-align : center !important; ">Picture</th>

                          <th  scope="col" style = "text-align : center !important; ">Brand Name</th>

                          {{-- <th  scope="col" style = "text-align : center !important; ">Product Count</th> --}}
                          <th  scope="col" style = "text-align : center !important; ">Edit</th>
                          <th  scope="col" style = "text-align : center !important; ">Delete</th>
                      </tr>
                  </thead>
                  <tbody align="center">
                    <tr ng-repeat="data in datalistBrand">
                        <td style = "vertical-align: middle !important;" >@{{$index+1 }}</td>

                        <td style = "vertical-align: middle !important;" ><img class="img-responsive image-resize" src="/storage/brandProduct/@{{data.id_brand}}/@{{data.brand_pic_url}}">  </td>

                        <td style = "vertical-align: middle !important;" >@{{data.brand_name}}</td>

                        {{-- <td style = "vertical-align: middle !important;" >1</td> --}}
                        <td style = "vertical-align: middle !important;" ><button class="btn btn-warning" ng-click="EditBrand(data.id_brand)">Edit</button></td>
                        <td style = "vertical-align: middle !important;" ><a href="/BackendBrandProduct/DeleteBrand/@{{data.id_brand}}"><button class="btn btn-danger" >Delete</button></a></td>
                    </tr>
                  </tbody>
              </table>
              <div class="row">
                  <div class="col-md-12" >
                      {{-- {{$allBrandproduct->links()}} --}}
                  </div>
              </div>
          </div>
      </div>
</div>
</div>
</div>
</div>
@include('BackendBrandProduct.Modals.modal-AddBrand')
@include('BackendBrandProduct.Modals.modal-EditBrand')
<script src="{{asset('js/backend-brandproduct/brand.js')}}"></script>
@endsection
