@extends('layouts.app-element')
@section('content')
<div ng-controller="categoryController">
{{-- <section class="imgposban clearfix" style="background-image: url({{asset('storage/banner/')}}/{{$carousel[0]->carousel_path}});">
</section> --}}
<!--hide start -->
<div class="container hide-responsive">
	<div class="row push-down-30">
		<div class="col-lg-12">
			<div  class="row">
	    {{-- <div ng-repeat="item in data.products" class="col-lg-6"> --}}
	        	<div class="col-lg-6" ng-repeat="i in chlorinatorItem">
							<a ng-href="/product/ListProductDetail?id_product=@{{i.id_product}}&id_category=@{{i.id_category_product}}">
									<div class="img-box"   style="height:auto;">
										<img ng-src="{{asset('/storage/product')}}/@{{i.id_product}}/@{{i.pic1_url}}"
										 class="img-responsive img-fluid" alt="">
									</div>
									<div class="thumb-content">
										<h4>@{{i.product_name}}</h4>
										<p class="item-price">
											<span style="font-size:24px;">@{{ i.price - ((i.price / 100) * i.special[0].discount) | number }} </span>
											<div>
											<span ng-if="i.special[0].discount"><strike style="color: #E04B4A;"><span style="color:#E04B4A"> @{{i.price | number}} </span></strike> บาท</span>
											</div>
											<span ng-if="!i.special[0].discount"><span>@{{i.price | number}}</span> Baht</span>
										</p>
									</div>
						</div>
	    {{-- </div> --}}
			</div>
			{{-- <div ng-repeat="data in items">
				<div class="col-lg-12 text-center">
					<label style="color:#078FDD;padding-top: 35px;"class="f_size_ct20">@{{data.category_product_name}}</label>
				</div>
				<input type="hidden" id="_id" name="_id" value="@{{data.id_category_product}}"/>
				<div id="myCarousel_@{{$index}}" class="carousel slide" data-ride="carousel" data-interval="3000">
				<!-- Carousel indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarousel_@{{$index}}" ng-repeat="data in data.products" data-slide-to="@{{$index}}" ng-class="{active: $index===0}"></li>
					</ol>
					<!-- Wrapper for carousel items -->
					<div class="carousel-inner">
						<div class="item carousel-item" ng-repeat="item in data.products" ng-class="{active: $index===0}">
							<div class="row">
							<div class="col-sm-3" ng-repeat="i in item">
								<div class="thumb-wrapper">
								<a ng-href="/product/ListProductDetail?id_product=@{{i.id_product}}&id_category=@{{i.id_category_product}}">
										<div class="img-box"   style="height:auto;">
											<img ng-src="{{asset('/storage/product')}}/@{{i.id_product}}/@{{i.pic1_url}}"
											 class="img-responsive img-fluid" alt="">
										</div>
										<div class="thumb-content">
											<h4>@{{i.product_name}}</h4>
											<p class="item-price">
												<span style="font-size:24px;">@{{ i.price - ((i.price / 100) * i.special[0].discount) | number }} </span>
												<div>
												<span ng-if="i.special[0].discount"><strike style="color: #E04B4A;"><span style="color:#E04B4A"> @{{i.price | number}} </span></strike> บาท</span>
												</div>
												<span ng-if="!i.special[0].discount"><span>@{{i.price | number}}</span> บาท</span>
											</p>
										</div>
									</a>
									</div>
								</div>
							</div>
						</div>
						<!-- Carousel controls -->
						<a class="carousel-control left carousel-control-prev" href="#myCarousel_@{{$index}}" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="carousel-control right carousel-control-next" href="#myCarousel_@{{$index}}" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
				<!-- promotion -->
				<div id="myCarouselpm1" class="carousel slide" data-ride="carousel"  data-interval="3000">
					<!-- Indicators -->
					<ol class="carousel-indicators" hidden>
						<li data-target="#myCarouselpm1" ng-repeat="data in promotions[$index]" data-slide-to="@{{$index}}" ng-class="{active: $index===0}"></li>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<div class="item carousel-item" ng-repeat="items in promotions[$index]" ng-class="{active: $index===0}">
							<img ng-src="{{asset('/storage/special')}}/@{{items[0].special_image}}" class="img-responsive img-fluid" alt="">
						</div>
					</div>
				</div>
                <div class="col-xm-12" style="text-align:center;">
                <a href="/product" class="view_all_p">ดูสินค้าทั้งหมด</a>
                </div>
			</div> --}}
		</div>
	</div>
</div>
<!-- show-responsive -->
<!-- show-responsive -->
<!-- show-responsive -->
<!-- show-responsive -->
<!-- show-responsive -->
<!-- show-responsive -->
{{-- <div class="container show-responsive">
	<div class="row push-down-30">
		<div class="col-md-12">
			<div ng-repeat="res in itemsResponse">
				<div class="col-lg-12 text-center">
					<label style="color:#078FDD;padding-top: 35px;"class="f_size_ct20">@{{data.category_product_name}}</label>
				</div>
				<input type="hidden" id="_id" name="_id" value="@{{res.id_category_product}}"/>
				<div id="myCarouselx" class="carousel slide" data-ride="carousel" data-interval="3000">
				<!-- Carousel indicators -->
					<ol class="carousel-indicators" hidden>
						<li data-target="#myCarouselx" ng-repeat="r in res.products" data-slide-to="@{{$index}}" ng-class="{active: $index===0}"></li>
					</ol>
					<!-- Wrapper for carousel items -->
					<div class="carousel-inner">
						<div class="item carousel-item" ng-repeat="item in res.products" ng-class="{active: $index===0}">
							<div class="row">
							<div class="col-sm-3">
								<div class="thumb-wrapper">
										<div class="img-box">
											<img ng-src="{{asset('/storage/product')}}/@{{item.id_product}}/@{{item.pic1_url}}"
											 class="img-responsive img-fluid" alt="">
										</div>
										<div class="thumb-content">
											<h4>@{{item.product_name}}</h4>
											<p class="item-price animate-if">
												<span>@{{ item.price - ((item.price / 100) * item.special[0].discount) | number }}</span>
												<strike><span>@{{item.price | number}}</span></strike>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Carousel controls -->
						<a class="carousel-control left carousel-control-prev" href="#myCarouselx" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="carousel-control right carousel-control-next" href="#myCarouselx
						" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div>
				<!-- promotion -->
				<div id="myCarouselpm2" class="carousel slide" data-ride="carousel"  data-interval="3000">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#myCarouselpm2" ng-repeat="data in promotions[$index]" data-slide-to="@{{$index}}" ng-class="{active: $index===0}"></li>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner" >
						<div class="item carousel-item" ng-repeat="items in promotions[$index]" ng-class="{active: $index===0}">
							<img ng-src="{{asset('/storage/special')}}.'/{{items[0].special_image}}';?>" class="img-responsive img-fluid" alt="">
						</div>
					</div>
				</div>
                    <div class="col-xm-12" style="text-align:center;">
                    <a href="/product" class="view_all_p">ดูสินค้าทั้งหมด</a>
                    </div>
				<!-- end replace-->
			</div>
		</div>
	</div>
</div> --}}

<script src="{{asset('js/product-category/category.js')}}"></script>
@endsection
