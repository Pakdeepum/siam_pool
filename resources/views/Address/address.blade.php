@extends('layouts.app-element')
@section('content')
<div ng-controller="AddressController" ng-cloak >
    <?php if(isset($data)){?>
        <div  data-ng-init=<?php echo"load_data(".$data.")" ?> ></div>
    <?php } ?>
<div class="container">
  <div class="stepwizard col-md-offset-3  push-up-30">
    <div class="stepwizard-row setup-panel">
      <div class="stepwizard-step">
        <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
        <p>{{ trans('product.Delivery_Address') }}</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
        <p>{{ trans('product.Check_Order_List') }}</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
        <p>{{ trans('product.Order_Complete') }}</p>
      </div>
      <div class="stepwizard-step">
        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
        <p>{{ trans('product.Payment_Notify') }}</p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2 push-down-30">
    <!-- hide responsive -->
    <div class="show-address text-left panel-padding ">
      <form id="address-form" enctype="multipart/form-data" action="">
      {{-- <p class="top_head_txt">ที่อยู่จัดส่ง</p> --}}
      <p class="top_head_txt">{{ trans('product.Delivery_Address') }}</p>
      {{-- <p>*กรุณากรอกรายละเอียดและที่อยู่ในการจัดส่ง เพื่อความมั่นใจในการจัดส่งสินค้าถึงปลายทาง ก่อนกด "ดำเนินการต่อ"*</p> --}}
      <p>{{ trans('product.Please_fill_in_the_details_and_delivery_address_To_ensure_the_delivery_of_goods_to_the_destination_before_pressing_Continue') }}</p>
      <input type="radio" name="address" value="db" id="select_system_address">
      {{-- <label>ที่อยู่จากระบบ</label> --}}
      <label>{{ trans('product.Address_from_the_system') }}</label>
      <div class="">
      <!-- ใส่ข้อมูล -->
        <div class="col">
          <span id="db-address"></span>
          <span id="db-district"></span>
          <span id="db-amphur"></span>
          <span id="db-province"></span>
          <span id="db-post_codes"></span>
        </div>
      </div>
      <p>
        <input type="radio" name="address" value="new">
        {{-- <label>ที่อยู่ใหม่</label> --}}
        <label>{{ trans('product.New_Address') }}</label>
      </p>
      <div class="container">
        <div class="row">
          <div class="col-md-3" id="address-validate-name">
            {{-- <p>ชื่อ-นามสกุล</p>
            {{-- <input class="form-control" type="text" name="address-name" id="address-name" placeholder="ชื่อ-นามสกุล"
            data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="กรุณาชื่อ-นามสกุล!"/> --}}
            <p>{{ trans('product.First_Last_Name') }}</p>
            <input class="form-control" type="text" name="address-name" id="address-name" placeholder="{{ trans('profile.placeholder.First_Last_Name') }}"
            data-placement="top" data-toggle="popover" data-trigger="focus" data-html="true"  data-content="{{ trans('profile.placeholder.First_Last_Name') }}!"/>
          </div>
          <div class="col-md-3" id="address-validate-dalivery">
            {{-- <p>ที่อยู่</p>
            {{-- <input class="form-control" type="text" name="address-dalivery" id="address-dalivery"
            placeholder="กรุณาระบุที่อยู่(บ้านเลขที่,หมู่บ้าน,ถนน)" data-placement="top" data-toggle="popover"
            data-trigger="focus" data-html="true"  data-content="กรุณาระบุที่อยู่!"/> --}}
            <p>{{ trans('product.Delivery_Address') }}</p>
            <input class="form-control" type="text" name="address-dalivery" id="address-dalivery"
            placeholder="{{ trans('profile.placeholder.Please_FIll_Address_House_Number_Village_Road') }}" data-placement="top" data-toggle="popover"
            data-trigger="focus" data-html="true"  data-content="{{ trans('profile.placeholder.Please_FIll_Address_House_Number_Village_Road') }}!"/>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="col-md-3" id="address-validate-tel">
          {{-- <p>หมายเลขโทรศัพท์</p>
          {{-- <input class="form-control" type="text" name="address-tel" id="address-tel"
          placeholder="โปรดป้อนหมายเลขโทรศัพท์ของคุณ" data-placement="top" data-toggle="popover"
            data-trigger="focus" data-html="true"  data-content="กรุณาโปรดป้อนหมายเลขโทรศัพท์ของคุณ!" /> --}}
            <p>{{ trans('product.tel') }}</p>
            <input class="form-control" type="text" name="address-tel" id="address-tel"
            placeholder="{{ trans('profile.placeholder.Please_Fill_Your_Phone_Number') }}" data-placement="top" data-toggle="popover"
              data-trigger="focus" data-html="true"  data-content="{{ trans('profile.placeholder.Please_Fill_Your_Phone_Number') }}" />
        </div>
        <div class="row">
          <div class="col-md-2 col-md-offset">
            {{-- <p>จังหวัด</p>
            {{-- <select class="select-address" id="address-province" placeholder="กรุณาเลือกจังหวัด"
            data-placement="top" data-toggle="popover"
            data-trigger="focus" data-html="true"  data-content="กรุณาเลือกจังหวัด!" >
              <option value="0">...</option>
            </select> --}}
            <p>{{ trans('profile.provice') }}</p>
            <select class="select-address" id="address-province" placeholder="{{ trans('profile.placeholder.Please_Select_Province') }}"
            data-placement="top" data-toggle="popover"
            data-trigger="focus" data-html="true"  data-content="{{ trans('profile.placeholder.Please_Select_Province') }}!" >
              <option value="0">...</option>
            </select>
            {{-- <p>แขวง/ตำบล</p>
            {{-- <select class="select-address" id="address-district" placeholder="กรุณาเลือกแขวง/ตำบล"
            data-placement="top" data-toggle="popover"
            data-trigger="focus" data-html="true"  data-content="กรุณาเลือกแขวง/ตำบล!" >
              <option value="0">...</option>
            </select> --}}
            <p>{{ trans('profile.district') }}</p>
            <select class="select-address" id="address-district" placeholder="{{ trans('profile.placeholder.Please_Select_District') }}"
            data-placement="top" data-toggle="popover"
            data-trigger="focus" data-html="true"  data-content="{{ trans('profile.placeholder.Please_Select_District') }}" >
              <option value="0">...</option>
            </select>
          </div>
          <div class="col-md-2 col-md-offset">
            {{-- <p>เขต/อำเภอ</p>
            <select class="select-address" id="address-aumphar" placeholder="กรุณาเลือกเขต/อำเภอ"
            data-placement="top" data-toggle="popover"
            data-trigger="focus" data-html="true"  data-content="กรุณาเลือกเขต/อำเภอ!">
              <option value="0">...</option>
            </select> --}}
            <p>{{ trans('profile.sub_district') }}</p>
            <select class="select-address" id="address-aumphar" placeholder="{{ trans('profile.placeholder.Please_Select_Sub_District') }}"
            data-placement="top" data-toggle="popover"
            data-trigger="focus" data-html="true"  data-content="{{ trans('profile.placeholder.Please_Select_Sub_District') }}!">
              <option value="0">...</option>
            </select>
            {{-- <p>รหัสไปรษณีย์</p>
            <select class="select-address" id="address-postcode" placeholder="กรุณาระบุรหัสไปรษณีย์"
            data-placement="top" data-toggle="popover"
            data-trigger="focus" data-html="true"  data-content="กรุณาระบุรหัสไปรษณีย์!">
              <option value="0">...</option>
            </select> --}}
            <p>{{ trans('profile.zip_code') }}</p>
            <select class="select-address" id="address-postcode" placeholder="{{ trans('profile.placeholder.Please_Fill_Zip_Code') }}"
            data-placement="top" data-toggle="popover"
            data-trigger="focus" data-html="true"  data-content="{{ trans('profile.placeholder.Please_Fill_Zip_Code') }}!">
              <option value="0">...</option>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group push-down-10">
        {{-- <label class="top_head_txt" for="comment">หมายเหตุ/อื่นๆ</label>
        <textarea class="form-control" rows="5" id="comment" placeholder="หมายเหตุ-เพิ่มเติม"></textarea> --}}
        <label class="top_head_txt" for="comment">{{ trans('product.Note') }}</label>
        <textarea class="form-control" rows="5" id="comment" placeholder="{{ trans('product.Note') }}"></textarea>
      </div>
      <input type="hidden" id="address-district-tmp"/>
      <input type="hidden" id="address-aumphar-tmp"/>
      <input type="hidden" id="address-province-tmp"/>
      <input type="hidden" id="address-postcode-tmp"/>
      <input type="hidden" id="address-name-tmp"/>
      <input type="hidden" id="address-lastname-tmp"/>
      <input type="hidden" id="address-tel-tmp"/>
    </form>
        <div class="show-address2">
          <div class="row col-sm-3 col-md-offset pull-right">
              {{-- <button class="btn buy_btn push-down-5"  type="button" id="address-submit">ดำเนินการต่อ</button> --}}
              <button class="btn buy_btn push-down-5"  type="button" id="address-submit">{{trans('product.Continue')}}</button>
          </div>
          <div class="row col-sm-3 col-md-offset pull-left">
              {{-- <button class="btn buy_btn push-down-5"  type="button" id="address-submit">ดำเนินการต่อ</button> --}}
              <a href="{{ url('/') }}">
              <button class="btn buy_btn2 push-down-5"  type="button" >{{trans('product.Back')}}</button>
            </a>
          </div>
        </div>
    </div>
  </div>
</div>
</div>

@include('Payment.modals.successfully-modal')
<script src="{{asset('js/address/address.js')}}"></script>
@endsection
