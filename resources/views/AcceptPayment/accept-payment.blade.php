@extends('layouts.app-element')
@section('content')
<div ng-controller="AcceptPaymentController" ng-cloak >
    <?php if(isset($data)){?>
        <div  data-ng-init=<?php echo"load_data(".$data.")" ?> ></div>
    <?php } ?>
    <div class="last-section-bg push-down-30">
        <div class="container">
        </div>
    </div>
    <div class="container">
      <div class="stepwizard col-md-offset-3  push-up-30">
        <div class="stepwizard-row setup-panel">
          <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-default btn-circle"  disabled="disabled">1</a>
            <p>{{ trans('product.Delivery_Address') }}</p>
          </div>
          <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>{{ trans('product.Check_Order_List') }}</p>
          </div>
          <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-primary btn-circle">3</a>
            <p>{{ trans('product.Order_Complete') }}</p>
          </div>
          <div class="stepwizard-step">
            {{-- @foreach ($customer_id as $item) --}}


            <a href="{{ url('/v1/payment/'.$customer_id[0]->customer_id)}}" type="button" class="btn btn-default btn-circle">4</a>
            {{-- @endforeach --}}
            <p>{{ trans('product.Payment_Notify') }}</p>
          </div>
        </div>
      </div>
      <div class="row" >
        <div class="col-12 col-lg-offset push-down-50">

          <!-- hide responsive -->
          <div class="col-md-8 col-md-offset-2 show-product hide-responsive">
            <div class="col-md-12 col-md-offset" style="background-color:#eaeff2;padding:15px; margin-top:10px;">
              <img src="{{asset('img/pic/success.png')}}" style="width: 60px;">
              {{-- <p style="font-family: promptmedium;padding-top:15px;">สั่งซื้อเรียบร้อย(รอชำระเงิน)</p> --}}
              <p style="font-family: promptmedium;padding-top:15px;">{{ trans('product.Order_Complete_Wait_For_Payment') }}</p>
              {{-- <p>รายการสั่งซื้อของคุณคือ <label>#{{$order}}</label></p> --}}

              <p>{{ trans('product.Your_Order_Number_is') }}<label>#{{$order}}</label></p>
              <hr />
              <div class="row">
                <div class="col">
                  <img src="{{asset('img/pic/donation.png')}}" style="padding-bottom: 13px;">
                  {{-- <p>ชำระเงินและแจ้งชำระเงินภายใน</p> --}}
                  <p>{{ trans('product.Payment_to_be_receive_within_24_hours_to_confirm_order') }}</p>
                  <label style="font-family: promptmedium;color: #3497d2;"><span id="add3day">{{$_day}}</span></label>
                </div>
                <div class="col">
                  <img src="{{asset('img/pic/pay-per-click.png')}}" style="padding-bottom: 13px;">
                  {{-- <p>จำนวนเงินที่ต้องชำระ</p> --}}
                  <p>{{ trans('product.Amount_to_be_paid') }}</p>
                  {{-- <label style="font-family: promptmedium;color: #eb5656;"
                  id="accept-price">{{$total}} บาท</label> --}}
                  <label style="font-family: promptmedium;color: #eb5656;"
                  id="accept-price">{{$total}} {{ trans('product.Bath') }}</label>

                  {{-- <p><span class="glyphicon glyphicon-hand-right" style="padding-right:10px;"></span><a href="{{ route('payment') }}">เลือกวิธีชำระที่นี้</a></p> --}}
                  {{-- @foreach ($customer_id as $item) --}}
                  <p><span class="glyphicon glyphicon-hand-right" style="padding-right:10px;"></span>

                    <a href="{{ url('/v1/payment/'.$customer_id[0]->customer_id)}}">{{ trans('product.Choose_Payment_Method_Here') }}</a></p>
                    {{-- @endforeach --}}
                </div>
                <div class="col">
                    <img src="{{asset('img/pic/Group 29.png')}}" style="padding-bottom: 13px;">
                    {{-- <p>สถานะรายการสั่งซื้อ</p>
                    <label style="font-family: promptmedium;color: #16c075;">รอชำระเงิน</label>
                    <p>กรุณาชำระเงินตามข้อมูลที่ระบุ</p> --}}
                    <p>{{ trans('product.Order_Status') }}</p>
                    <label style="font-family: promptmedium;color: #16c075;">{{ trans('product.Wait_for_Payment') }}</label>
                    <p>{{ trans('product.Please_pay_according_to_the_information_specified') }}ุ</p>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-md-offset" style="background-color: #d3dfe7;padding:10px;">
              <div class="col-md-12 col-md-offset text-center">
                  {{-- <p>ระบบจะส่งอีเมล์อัตโนมัติไปยัง <label> <span>{{$result[0]->email}}</span> </label> เพื่อแจ้งการสั่งซื้อสินค้าครั้งนี้</p> --}}
                  <p>{{ trans('product.System_will_send_email_to') }}<label> <span>{{$result[0]->email}}</span> </label> {{ trans('product.for_notify_the_purchase_of_this_order') }} </p>
                  <p>{{ trans('product.if_not_receiving_an_email_in_1_hour_please_contact_us') }}</p>
                  <p>{{ trans('product.Full_payment_must_be_received_within_24_hours') }}</p>
                  
                  <div class="col-lg-12 col-md-12 col-sm-12">
                      <div class="cart-right">

                         {{-- @foreach ($customer_id as $item) --}}
                             <a href="{{ url('/v1/payment/'.$customer_id[0]->customer_id)}}">
                                <button class="btn buy_btn push-down-5" >{{ trans('product.Payment') }}</button>
                              </a>
                         {{-- @endforeach --}}


                      </div>
                  </div>
              </div>
            </div>
          </div>
          <!-- show responsive -->
          <div class="col-md-8 col-md-offset-2 show-product show-responsive">
            <div class="col-md-12 col-md-offset" style="background-color:#eaeff2;padding:15px; margin-top:10px;">
              <img src="{{asset('img/pic/success.png')}}" style="width: 60px;">
              {{-- <p style="font-family: promptmedium;padding-top:15px;">สั่งซื้อเรียบร้อย(รอชำระเงิน)</p> --}}
              <p style="font-family: promptmedium;padding-top:15px;">{{ trans('product.Order_Complete_Wait_For_Payment') }}</p>
              {{-- <p>รายการสั่งซื้อของคุณคือ <label>#{{$order}}</label></p> --}}
              <p>{{ trans('product.Your_Order_Number_is') }}<label>#{{$order}}</label></p>
              <hr />
              <div class="text-center">
                <div class="row">
                  <div class="col-2">
                    <img src="{{asset('img/pic/donation.png')}}" style="padding-top: 18px;; width:30px;">
                  </div>
                  <div class="col-10">
                    {{-- <p>ชำระเงินและแจ้งชำระเงินภายใน</p> --}}
                    <p>{{ trans('product.Payment_to_be_receive_within') }}</p>
                    <label style="font-family: promptmedium;color: #3497d2;" id="add3day2"><span>{{$_day}}</span></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-2">
                    <img src="{{asset('img/pic/pay-per-click.png')}}" style="padding-top: 18px;width:30px;">
                  </div>
                  <div class="col-10">
                    {{-- <p>จำนวนเงินที่ต้องชำระ</p> --}}
                    <p>{{ trans('product.Amount_to_be_paid') }}</p>
                    {{-- <label style="font-family: promptmedium;color: #eb5656;"
                    id="accept-price">{{$total}} บาท</label> --}}
                    <label style="font-family: promptmedium;color: #eb5656;"
                    id="accept-price">{{$total}} {{ trans('product.Baht') }}</label>
                    {{-- <p><span class="glyphicon glyphicon-hand-right" style="padding-right:10px;"></span><a href="{{ route('payment') }}">เลือกวิธีชำระที่นี้</a></p> --}}
                    <p><span class="glyphicon glyphicon-hand-right" style="padding-right:10px;"></span>
                      {{-- @foreach ($customer_id as $item) --}}

                        <a href="{{ url('/v1/payment/'.$customer_id[0]->customer_id)}}">{{ trans('product.Choose_Payment_Method_Here') }}</a>

                  {{-- @endforeach --}}
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-2">
                    <img src="{{asset('img/pic/Group 29.png')}}" style="padding-top: 18px;width:30px;">
                  </div>
                  <div class="col-10">
                    {{-- <p>สถานะรายการสั่งซื้อ</p>
                    <label style="font-family: promptmedium;color: #16c075;">รอชำระเงิน</label>
                    <p>กรุณาชำระเงินตามข้อมูลที่ระบุ</p> --}}
                    <p>{{ trans('product.Order_Status') }}</p>
                    <label style="font-family: promptmedium;color: #16c075;">{{ trans('product.Wait_for_Payment') }}</label>
                    <p>{{ trans('product.Please_pay_according_to_the_information_specified') }}</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-md-offset" style="background-color: #d3dfe7;padding:10px;">
                <div class="col-md-12 col-md-offset text-center">
                  {{-- <p>ระบบจะส่งอีเมล์อัตโนมัติไปยัง <label> <span>{{$result[0]->email}}</span> </label> เพื่อแจ้งการสั่งซื้อสินค้าครั้งนี้</p> --}}
                  <p>{{ trans('product.System_will_send_email_to') }} <label> <span> {{$result[0]->email}}</span> </label>{{ trans('product.for_notify_the_purchase_of_this_order') }} </p>
                </div>
                <div class="col-md-12 col-md-offset text-left">
                  
                  {{ trans('product.if_not_receiving_an_email_in_1_hour_please_contact_us') }}
                </div>

            </div>


          </div>
        </div>
      </div>
    </div>
</div>
<script src="{{asset('js/accept-payment/accept-payment.js')}}"></script>
@endsection
