@extends('layouts.app-element')
@section('content')

<?php
// print_r($data);
$data = end($data);
  ?>

<div class="last-section-bg">
    <div class="container">
        <div class="hide-responsive">
            <div class="row">
                <div class="col-lg-6 text-left">
                    <div class="head-txt-product"hidden>{{$data['promotion_name']}}</div>
                </div>
                <div class="col-lg-6 text-right"hidden>
                    <div class="link-txt-product">HEALTH HAND HEART > Healthy Topic  > {{$data['promotion_name']}}</div>
                </div>
            </div>
        </div>
        <div class="show-responsive">
            <div class="row">
                <div class="col-lg-6">
                    <div class="head-txt-product"hidden>{{$data['promotion_name']}}</div>
                </div>
                <div class="col-lg-6"hidden>
                    <div class="link-txt-product">HEALTH HAND HEART > Healthy Topic > {{$data['promotion_name']}}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-8 col-lg-offset-4">
            <img src='<?php echo asset('/storage/promotion').'/'.($data['id_promotion']).'/'.($data['pic_url']); ?>' style="width: 50%;">
        </div >
    </div>
    <div class="col-lg-9 col-lg-offset-2" style="margin-bottom: 50px;">
        <div class="txt-promotion-detail">
            <h1>{{$data['promotion_name']}}</h1>
            <div class="row">
                <div class="col-lg-12" style="white-space: pre-wrap;text-align: justify;text-indent: 5em;">
                        <p>{{$data['promotion_detail']}}</p>
                </div>
            </diV>
        </div>
    </div>
</div>
<script src="{{asset('js/promotion-details/form.js')}}"></script>
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
