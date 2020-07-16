@extends('layouts.app-element')
@section('content')
<div ng-controller="PromotionController" ng-cloak>
    <div class="last-section-bg">
        <div class="container">
            <div class="hide-responsive">
                <div class="col-lg-12 col-lg-offset-3">
                    <div class="col-lg-6 text-center">
                        <button class="head-txt-product" ng-click="SelectAllPromotion()" style="background: #078FDD; border: 0px;">Healthy Topic | </button>
                        <button class="head-txt-product" ng-repeat="data in allcategorypromotion"  ng-click="SelectCategoryPromotion(data.id_category_promotion)" style="background: #078FDD; border: 0px;margin-right:6px;">@{{data.category_promotion_name}} | </button>
                    </div>
                    <div class="col-lg-6 text-right" hidden>
                        <div class="link-txt-product">HEALTH HAND HEART > Healthy Topic</div>
                    </div>
                </div>
            </div>
            <div class="show-responsive">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="head-txt-product">Healthy Topic</div>
                    </div>
                    <div class="col-lg-6">
                        <div class="link-txt-product"hidden>HEALTH HAND HEART > Healthy Topic</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" >
        <div class="row">
            <div class="col-sm-4 col-xs-offset-4">
                <input type="text" class="form-control" style = "width : 100%; border-radius: 5px; background: #fff;margin: 10px 0;height: 39px;" id = "SearchNamePromotion" placeholder="Search Name Promotion" ng-model = "SearchNamePromotion.promotion_name"; />
            </div>

        </div>
        <div class="col-sm-10 col-sm-offset-1">


        <div dir-paginate="data in datalistpromotion | filter : SearchNamePromotion : promotion_name  |  itemsPerPage:5" >
            <div class="row" style=" margin-bottom: 40px;"  >
                <div class="col-lg-4">
                    <img src=<?php echo asset('/storage/promotion').'/{{data.id_promotion}}/{{data.pic_url}}' ; ?> style="width: 100%;">
                </div>
                <div class="col-lg-8">
                    <label class="head-txt-promo">@{{data.promotion_name}}</label>
                    <div class="example" style=" white-space: pre-wrap;font-size: 16px;text-indent:5em;">@{{data.promotion_detail}}</div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">

                        </div>
                        <div class="col-lg-6 text-right">
                            <form action="{{route('promotion.ListPromotionDetail')}}" method="get" enctype="multipart/form-data" class="form-horizontal" role="form">
                                {{csrf_field()}}
                                <input type="hidden" name="id_promotion" value="@{{data.id_promotion}}">
                                <button type="submit" class="btn buy_btn" style="font-size: 15px;float: right;">See more</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-dot" style=" margin-bottom: 40px;"></div>
        </div>
</div>
        {{-- <div class="border-dot"></div> --}}
        {{-- <div class="row text-center" style="margin-top: 40px; margin-bottom: 40px;">
            <div class="pagination">
                <a href=""><i class="fa fa-caret-left"></i></a>
                <a href="">1</a>
                <a href="">2</a>
                <a href="">3</a>
                <a href="">4</a>
                <a href=""><i class="fa fa-caret-right"></i></a>
            </div>
        </div> --}}

        <div class="col-sm-8 col-xs-11">
            <nav aria-label="...">
                <ul class="pagination pagination-sm" style="float:right;">
                    <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" >
                    </dir-pagination-controls>
                </ul>
            </nav>
        </div>



    </div>
</div>
<script src="{{asset('js/promotion/form.js')}}"></script>
<!-- NO CLICK NO TAB -->
<script type="text/JavaScript">
function killCopy(e){
    return false
}
function reEnable(){
    return true
}
document.onselectstart=new Function ("return false")
if (window.sidebar){
    document.onmousedown=killCopy
    document.onclick=reEnable
}
</script>
<script language=JavaScript>
var message="";
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if
    (document.layers||(document.getElementById&&!document.all)) {
        if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers)
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false")
</script>
@endsection
