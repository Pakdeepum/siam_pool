@extends('layouts.app')
@section('content')
  <div class="card"  style="box-shadow: 0 0 10px rgba(0,0,0,0.4);height:820px;width:auto;">
    <div class="card-body">
    <div class="last-section-bg">
        <div>
{{--            <div class="hide-responsive">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-6 text-left">--}}
{{--                      <div class="head-txt-product"><b>Product Management</b></div>--}}
{{--                        --}}{{-- <a href="/BackendProduct">--}}
{{--                            <button class="head-txt-product"  style="background: #42D2E9; border: 0px;">All Product</button>--}}
{{--                        </a>--}}
{{--                        @foreach($allcategoryproduct as $type)--}}
{{--                            <a href="/BackendProduct/CategoryProduct/{{$type->id_category_product}}">--}}
{{--                                <button class="head-txt-product" style="background: #42D2E9; border: 0px;">| {{$type->category_product_name}} </button>--}}
{{--                            </a>--}}
{{--                        @endforeach --}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6 text-right" hidden>--}}
{{--                        <div class="link-txt-product">All Product</div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6 text-left">--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

            <div class="show-responsive">
                <div class="row">
                    <div class="col-lg-6"hidden>
                        <a href="/BackendProduct">
                            <button class="head-txt-product"  style="background: #42D2E9; border: 0px;">All Product | </button>
                        </a>
                        @foreach($allcategoryproduct as $type)
                            <a href="/BackendProduct/CategoryProduct/{{$type->id_category_product}}">
                                <button class="head-txt-product" style="background: #42D2E9; border: 0px;">{{$type->category_product_name}} </button>
                            </a>
                        @endforeach
                    </div>
                    <div class="col-lg-6" hidden>
                        <div class="link-txt-product">All Product</div>
                    </div>
                    <div class="col-lg-6 text-left">
                      <div class="head-txt-product">Product Management

                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div ng-controller="BackendProductController">
        <div style="padding: 15px 0px;" >
            <div class = "row" >
              @if(session()->has('message'))
                  <div id="message" align="center" class="alert alert-success">
                      <h2>{{ session()->get('message') }}</h2>
                  </div>
              @endif
                <div class = "col-lg-9">
                    <div class="head-txt-product"><b>Product Management</b></div>

                </div>
                <div class = "col-lg-3">
                    <button type="button" class="btn btn-success txtrigth" id="open-modal-AddProduct" >ADD Product</button>
                </div>
            </div>
        </div>
        <hr style = "border-top: 2px solid #eee; width: 100%; margin-top: 0px;" >
{{--            <div class="row">--}}
{{--                <div class="col-md-12" >--}}
{{--                    <div class="col-md-2">--}}
{{--                        <h5>Total Items : {{$allproduct->total()}}</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-2">--}}
{{--                        <h5>Page No : {{$allproduct->currentPage()}}</h5>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-2">--}}
{{--                        <h5>Perpage Items : {{$allproduct->perPage()}}</h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        <div class = "table-responsive" style="overflow: scroll; max-height: 600px;">
            <table class="table"  border="0"  style="width:100% " >
                <thead  class="text-primary">
                    <tr >
                        <th scope="col" style = "text-align : center !important; ">No.</th>
                        <th scope="col" style = "text-align : center !important; ">Product Code</th>
                        <th scope="col" style = "text-align : center !important; ">Picture</th>
                        <th scope="col" style = "text-align : center !important; ">Product Name</th>
                        <th scope="col" style = "text-align : center !important; ">Category</th>
                        <th scope="col" style = "text-align : center !important; ">Brand</th>
                        <th scope="col" style = "text-align : center !important; ">Promotion</th>
                        <th scope="col" style = "text-align : center !important; ">Price</th>
                        {{-- <th scope="col" style = "text-align : center !important; ">By</th> --}}
                        <th scope="col" style = "text-align : center !important; ">Stock</th>
                        <th scope="col" style = "text-align : center !important; ">Edit</th>
                        <th scope="col" style = "text-align : center !important; ">Delete</th>
                    </tr>
                </thead>
                <tbody align="center">
                @foreach($allproduct as $product)
                    <tr >
                        <td scope="col" style = "vertical-align: middle !important;" >{{$loop->index +1 }}</td>
                        <td scope="col" style = "vertical-align: middle !important;" >{{$product->product_code}}</td>
                        <td scope="col" style = "vertical-align: middle !important;" ><a target="_blank" href="/product/ListProductDetail?id_product={{$product->id_product}}&id_category={{$product->id_category_product}}"><img class="img-responsive image-resize" src="{{asset('/storage/product')}}/{{$product->id_product}}/{{$product->pic1_url}}"> </a></td>
                        <td scope="col" style = "vertical-align: middle !important;" ><a target="_blank" href="/product/ListProductDetail?id_product={{$product->id_product}}&id_category={{$product->id_category_product}}">{{$product->product_name}} </a></td>
                        <td scope="col" style = "vertical-align: middle !important;" >{{$product->category_product_name}}</td>
                        <td scope="col" style = "vertical-align: middle !important;" >{{$product->brand_name}}</td>
                        <td scope="col" style = "vertical-align: middle !important;" >{{$product->special_name}}</td>
                        <td scope="col" style = "vertical-align: middle !important;" >{{$product->price}} ฿</td>
                        {{-- <td scope="col" style = "vertical-align: middle !important;" >ADMIN</td> --}}
                        <td scope="col" style = "vertical-align: middle !important;" >{{$product->stock_amount}}</td>
                        <td scope="col" style = "vertical-align: middle !important;" ><button class="btedit" onClick="EditProduct({{$product->id_product}})" >Edit</button></td>
                        <td scope="col" style = "vertical-align: middle !important;" ><a href="/BackendProduct/DeleteProduct/{{$product->id_product}}"  onclick="return confirm('Are you sure?')"><button class="btdel" >Delete</button></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
                <div class="row">
                    <div class="col-md-12" >
                        {{$allproduct->links()}}
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
@include('BackendProduct.Modals.modal-AddProduct')
@include('BackendProduct.Modals.modal-EditProduct')
<script src="{{asset('js/backend-product/form.js')}}"></script>
@endsection
