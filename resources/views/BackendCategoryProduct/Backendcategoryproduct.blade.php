@extends('layouts.app')
@section('content')
<div class="last-section-bg">
  <div class="card"  style="box-shadow: 0 0 10px rgba(0,0,0,0.4);height:820px;width:auto;">  
    <div class="container" style="overflow: scroll; max-height: -webkit-fill-available;">
{{--      <div class="col-lg-6">--}}
{{--          <div class="head-txt-product">Category Management</div>--}}
{{--      </div>--}}
      <div class="col-lg-12 col-lg-offset">
          <div style="padding: 15px 0px;">
              <div class = "row" >
                  <div class = "col-lg-9">
                      <div class="head-txt-product">Category Management</div>
                  @if(session()->has('message'))
                      <div id="message" align="center" class="alert alert-success">
                          <h2>{{ session()->get('message') }}</h2>
                      </div>
                  @endif
                  </div>
                  <div class="col-lg-3">
                      <button class="btn btn-success floatright" id="open-modal-AddCategory">ADD Category</button>
                  </div>
              </div>
          </div>
          <hr style = "border-top: 2px solid #eee; width: 100%; margin-top: 0px;" >
{{--          <div class="row">--}}
{{--              <div class="col-md-12" >--}}
{{--                  <div class="col-md-2">--}}
{{--                      <h5>Total Items : {{$allcategoryproduct->total()}}</h5>--}}
{{--                  </div>--}}
{{--                  <div class="col-md-2">--}}
{{--                      <h5>Page No : {{$allcategoryproduct->currentPage()}}</h5>--}}
{{--                  </div>--}}
{{--                  <div class="col-md-2">--}}
{{--                      <h5>Perpage Items : {{$allcategoryproduct->perPage()}}</h5>--}}
{{--                  </div>--}}
{{--              </div>--}}
{{--          </div>--}}
          <div class = "col-lg-12 col-md-12 col-sm-12 table-responsive">
              <table class="table"  border="0"  style="width:100% " >
                  <thead  class="text-primary">
                      <tr >
                          <th  scope="col" style = "text-align : center !important; ">No.</th>

                          <th  scope="col" style = "text-align : center !important; ">Picture</th>

                          <th  scope="col" style = "text-align : center !important; ">Category</th>

                          <th  scope="col" style = "text-align : center !important; ">By</th>
                          <th  scope="col" style = "text-align : center !important; ">Edit</th>
                          <th  scope="col" style = "text-align : center !important; ">Delete</th>
                      </tr>
                  </thead>
                  <tbody align="center">
                  @foreach($allcategoryproduct as $type)
                      <tr >
                          <td style = "vertical-align: middle !important;" >{{$loop->index +1 }}</td>

                          <td style = "vertical-align: middle !important;" ><img class="img-responsive image-resize" src="/storage/categoryProduct/{{$type->id_category_product}}/{{$type->pic_url}}">  </td>

                          <td style = "vertical-align: middle !important;" >{{$type->category_product_name}}</td>

                          <td style = "vertical-align: middle !important;" >ADMIN</td>
                          <td style = "vertical-align: middle !important;" ><button class="btedit" onClick="EditCategory({{$type->id_category_product}})">Edit</button></td>
                          <td style = "vertical-align: middle !important;" ><a href="/BackendCategoryProduct/DeleteCategory/{{$type->id_category_product}}"><button class="btdel" >Delete</button></a></td>
                      </tr>
                  @endforeach
                  </tbody>
              </table>
              <div class="row">
                  <div class="col-md-12" >
                      {{$allcategoryproduct->links()}}
                  </div>
              </div>
          </div>
      </div>
</div>
</div>
</div>
</div>
@include('BackendCategoryProduct.Modals.modal-AddCategory')
@include('BackendCategoryProduct.Modals.modal-EditCategory')
<script src="{{asset('js/backend-categoryproduct/form.js')}}"></script>
@endsection
