@extends('layouts.app-element')
@section('content')
<div ng-controller="MyOrderController" ng-cloak ng-init="init({{$customer_id}},{{$order_id}})">

    <div class="last-section-bg push-down-30">
        <div class="container">

        </div>
    </div>

    <div class="container">
    <div class="row">
            <div class="col-md-8 col-md-offset-2 proinfo-bg push-down-30">
                <div class="push-down-10">
                {{-- <h3 class="card-title">แจ้งชำระเงิน</h3> --}}
                <h3 class="card-title">{{trans('payment.Payment_Notification')}}</h3>
                <form id="payment-form" enctype="multipart/form-data" action="">
                {{ method_field('PUT') }}
                    <div class="row push-down-5 ">
                        <div class="col-lg-3 col-md-6 reg-size ">
                            {{-- <label class="control-label">บัญชีที่โอนเงิน*</label>                                                                             --}}
                            <label class="control-label">{{trans('payment.Choose_Bank_To_Tranfer')}}*</label>
                        </div>
                        <div class="col-lg-8 col-md-10 col-sm-12 has-error-redio" id="validate-bank">
                            <div id="radio-valid">
                                {{-- <small style="color:#E04B4A;">กรุณาเลือกบัญชีที่โอนเงิน..</small>                               --}}
                                <small style="color:#E04B4A;">{{ ('payment.Please_Select_Bank_Account_to_transfer')}}</small>
                            </div>

                        </div>
                    </div>
                    <div class="row push-down-10">
                        <div class="col-lg-3 col-md-6 reg-size">
                            {{-- <label class="control-label">วันที่ชำระเงิน*</label>                           --}}
                            <label class="control-label">{{trans('payment.Transfer_Date')}}*</label>
                        </div>
                        <div class="col-lg-6 col-md-10 col-sm-12" id="validate-date">
                            <div id="date-valid">
                                {{-- <small style="color:#E04B4A;">กรุณาเลือกวันที่ชำระเงิน*..</small>                               --}}
                                <small style="color:#E04B4A;">{{trans('payment.Please_Select_Transfer_Date')}}*..</small>
                            </div>
                            <input id="date_upload"  name="date_upload" type="date" class="form-control"/>
                        </div>
                    </div>
                    <div class="row push-down-10">
                        <div class="col-lg-3 col-md-6 reg-size">
                            {{-- <label class="control-label">จำนวนเงิน</label>                           --}}
                            <label class="control-label">{{trans('payment.Amount')}}</label>
                        </div>
                        <div class="col-lg-6 col-md-10 col-sm-12" id="validate-paid">
                            <div id="paid-valid">
                                {{-- <small style="color:#E04B4A;">กรุณาเลือกจำนวนเงิน*..</small>                               --}}
                                <small style="color:#E04B4A;">{{trans('payment.Please_Fill_Amount')}}</small>
                            </div>
                            <input id="paid"  name="paid" type="text" class="form-control" />
                        </div>
                    </div>
                    <div class="row push-down-10 reg-size">
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            {{-- <label class="control-label">หลักฐานการโอน</label>                           --}}
                            <label class="control-label">{{trans('payment.Transfer_Slip')}}</label>
                        </div>

                        <div class="col-lg-6 col-md-10 col-sm-12" id="validate-silp">
                            <div id="silp-valid">
                                {{-- <small style="color:#E04B4A;">กรุณาเลือกหลักฐานการโอน*..</small>                               --}}
                                <small style="color:#E04B4A;">{{trans('payment.Please_Select_Transfer_Slip')}}</small>
                            </div>
                            <input id="silp"  name="silp" type="file" />
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 center">
                            {{-- <small style="color:#E04B4A;">การแนบหลักฐานจะช่วยทำให้ตรวจสอบได้เร็วขึ้น</small>                           --}}
                        <small style="color:#E04B4A;">{{trans('payment.Attach_transfer_slip_will_make_checking_faster')}}</small>
                        </div>
                    </div>
                    <div class="row push-down-10">
                        <div class="col-lg-3 col-md-6 col-sm-8">
                            {{-- <label class="control-label reg-size">กรอกเลขที่การสั่งซื้อที่ต้องการชำระ</label>                           --}}


                            <label class="control-label reg-size">{{trans('payment.Type_Order_Number_that_you_need_to_pay')}}</label>
                        </div>
                        <div class="col-lg-6 col-md-10 col-sm-12" id="validate-order">
                            <div id="order-valid">
                                {{-- <small style="color:#E04B4A;">กรุณากรอกเลขที่การสั่งซื้อที่ต้องการชำระ..</small>                               --}}
                                <small style="color:#E04B4A;">{{trans('payment.Plesee_Fill_Order_Number')}}</small>
                            </div>
                            <div role="search" class="form-group">
                                <span class="input-group">
                                    {{-- <input placeholder="เลขที่การสั่งซื้อ.." id="input-order" name="order-id"  type="text" class="form-control" /> --}}
                                    <select class="custom-select" id="input-order" style="width: 300px; height:40px;" name="order-id" class="form-control" type="text">
                                            <option selected>Choose...</option>
                                            <?php
                                            $counter =0;
                                            $len = count($order_id);
                                            ?>
                                            @foreach ($order_id as $item)
                                                @if($counter==$len-1){
                                                  <option value="{{ $item->order_id }}" selected="selected"> {{ $item->order_id }}</option>
                                                }
                                              @else{
                                                <option value="{{ $item->order_id }}"> {{ $item->order_id }}</option>
                                              }
                                              @endif
                                              <?php $counter++ ?>
                                             @endforeach
                                    </select>
                                    {{-- <input placeholder="{{ trans('payment.placeholder.Order_Number')}}" id="input-order" name="order-id"  type="text" class="form-control" />--}}
                                    <span class="input-group-btn">
                                        <div>
                                            <button aria-label="Search" type="button" id="search-order" class="btn btn-info" style="height:40px;">
                                                <span><i class="fa fa-search"></i></span>
                                            </button>
                                        </div>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="col-lg-12 col-sm-6 push-down-10">
                <h3 class="card-title">{{trans('payment.Oder')}} </h3>
                <table class="table banner" id="order-table"
                    data-toggle="table"  data-show-footer="true"
                    data-pagination = "false">
                    <thead>
                        <tr>
                            <th data-field="pic1url" data-footer-formatter="titleFormatter" data-formatter="imageFormatter" data-align="left" data-halign="center"></th>
                            {{-- <th data-field="product_name" data-align="left" data-halign="center" class="reg-size">สินค้า</th> --}}
                            <th data-field="product_name" data-footer-formatter="titleShippingFormatter"  data-align="left" data-halign="center" class="reg-size">{{ trans('payment.product') }}</th>
                            {{-- <th data-field="price" data-formatter="priceFormatter"  data-align="right" data-halign="center" class="reg-size">ราคา/ชิ้น</th> --}}
                            <th data-field="price" data-formatter="priceFormatter"  data-align="center" data-halign="center" class="reg-size">{{ trans('payment.price/item') }}</th>
                            {{-- <th data-field="product_amount" data-align="right" data-halign="center" class="reg-size">จำนวน</th> --}}
                            <th data-field="product_amount" data-align="center" data-halign="center" class="reg-size">{{ trans('payment.amount') }}</th>
                            {{-- <th data-field="charge" data-align="right" data-halign="center" class="reg-size">ค่าบริการ</th> --}}
                            {{-- <th data-field="charge" data-align="center" data-halign="center" class="reg-size">Shipping Charge</th> --}}
                            {{-- <th data-field="total" data-formatter="totalFormatter" data-footer-formatter="totalPriceSumFormatter" data-align="right" data-halign="center" class="reg-size">ราคารวม</th> --}}
                            <th data-field="total" data-formatter="totalFormatter" data-footer-formatter="totalPriceSumFormatter" data-align="center" data-halign="center" class="reg-size">{{ trans('payment.total_price') }}</th>
                        </tr>
                    </thead>
                </table>
                </div>
                <div class="row col-lg-12 col-md-12 col-sm-12 push-down-10">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        {{-- <button type="button" id="btn-payment" class="btn btn-md buy_btn cart-right">แจ้งการชำระเงิน</button> --}}
                        <button type="button" id="btn-payment" class="btn btn-md buy_btn cart-right">{{ trans('payment.Payment_Notify') }}</button>
                    </div>
                </div>
        </div>
    </div>
    </div>
</div>
<script src="{{asset('js/my-order/myOrder.js')}}"></script>
@endsection
