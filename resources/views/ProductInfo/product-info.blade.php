@extends('layouts.app-element')
@section('content')
<div class="container">
    <div ng-controller="ProductInfoController" ng-cloak >
          <?php if(isset($data)){?>
              <div  data-ng-init=<?php echo"load_data(".$data.")" ?> ></div>
          <?php } ?>
          <div class="last-section-bg push-down-30">
              <div class="container">

              </div>
          </div>
          <div class="container profiles push-down-50">
            <div class="stepwizard col-md-offset-3  push-up-30">
              <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                  <a href="{{ url('/v1/address') }}" type="button" class="btn btn-default btn-circle">1</a>
                  <p>{{ trans('product.Delivery_Address') }}</p>
                </div>
                <div class="stepwizard-step">
                  <a href="#step-2" type="button" class="btn btn-primary btn-circle">2</a>
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
                <div class="col-md-10 col-lg-offset-1 proinfo-bg">
                  <div class="row push-down-10">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          {{-- <h3>ตรวจสอบรายการสั่งซื้อ</h3> --}}
                          <h3>{{ trans('product.Check_Order_List') }}</h3>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 push-down-10">
                          {{-- <label>*กรุณาตรวจสอบสินค้าและข้อมูลการจัดส่งว่าถูกต้องครบถ้วน จากนั้นกดยืนยันการสั่งซื้อ</label> --}}
                          <label>*{{   trans('product.Please_check_order_and_delivery_address_are_correct_then_press_Confirm')}}</label>
                      </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            {{-- <label class="reg-size">ที่อยู่สำหรับจัดส่งสินค้า</label> --}}
                            <label class="reg-size">{{ trans('product.Delivery_Address') }}</label>
                        </div>
                        <div class="vl">
                        <div class="col-lg-12 col-md-12 col-sm-12 addr-font">
                            {{-- <label>ชื่อ-นามสกุลผู้รับ</label> : <span id="info-name"></span> --}}
                            <label>{{ trans('product.Receiver_First_Last_Name') }}</label> : <span id="info-name"></span>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 addr-font">
                            {{-- <label>ที่อยู่ผู้รับ</label> : <span id="info-address"></span> --}}
                            <label>{{ trans('product.Receiver_Address') }}</label> : <span id="info-address"></span>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 addr-font">
                            {{-- <label>เบอร์โทรศัพท์ ผู้รับ</label> : <span id="info-tel"></span> --}}
                            <label>{{ trans('product.Receiver_Tel') }}</label> : <span id="info-tel"></span>
                        </div>
                      </div>
                      <input type="hidden" type="text" id="info-descript"/>
                  </div>
                  <div class="table-responsive">
                      <table id="productInfo-table" class="table" data-pagination="false"data-page-size="4" data-toggle="table">
                          <thead class="text-primary">
                          <tr>
                              <th scope="col" data-field="image" data-width="100px" data-formatter="cartImageFormatter" data-align="center" data-halign="center"></th>
                              <th scope="col" data-field="productName" data-align="center" data-halign="center" class="reg-size">{{ trans('product.product') }}</th>
                              <th scope="col" data-field="Amount" data-formatter="amountInfoFormatter" data-align="right" data-sortable="true"  data-halign="center" class="reg-size">{{ trans('product.amount') }}</th>
                              <th scope="col" data-field="price" data-formatter="priceInfoFormatter" data-align="right" data-sortable="true"  data-halign="center" class="reg-size">{{ trans('product.price') }}</th>
                              <th scope="col" data-field="totalPrice" data-formatter="totalFormatter" data-align="right" data-sortable="true"  data-halign="center" class="reg-size">{{ trans('product.total_price') }}</th>
                          </tr>
                          </thead>
                      </table>
                  </div>
                  <div class="row hr push-down-30"></div>
                  <div class="row product-info-footer push-down-20">
                      <div class="col-lg-6 col-md-6 col-sm-6 reg-size">
                          {{-- <span>สรุปรายการสินค้า</span> <span id="totalList-info"></span>  รายการ
                              <span id="totalAmount-info"></span>  ชิ้น --}}
                              <span>{{ trans('product.Product_Summary') }}</span> <span id="totalList-info"></span>  {{ trans('product.list') }}
                                  <span id="totalAmount-info"></span>  {{ trans('product.item')}}
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 reg-size">
                          <div class="cart-right">
                              {{-- <span>ราคาสินค้าทั้งหมด</span> <span id="totalPrices-info"></span>  บาท --}}
                              <span>{{ trans('product.total_price') }} </span> <span id="totalPrices-info"></span>  {{ trans('product.Bath') }}
                          </div>
                      </div>
                  </div>
                  <input type="hidden" id="sendType-tmp" value="1"/>
                      <div class="row hr push-down-30"></div>
                      <div class="row product-info-footer push-down-20">
                          <div class="col-lg-12 col-md-12 col-sm-12 reg-size">
                              <div class="cart-right">
                                  {{-- <span>ราคารวมทั้งหมด </span><span id="totalPriceInfo"></span> --}}
                                  <span>{{ trans('product.total_price') }} </span><span id="totalPriceInfo">@{{TotalPrice}}</span>
                              </div>
                          </div>
                        </div>
                      <div class="row product-info-footer">
                          <div class="col-lg-6 col-md-3 col-sm-3">
                              {{-- <a href="javascript:void(0);" id="cancel-payment">ยกเลิกการสั่งซื้อ</a> --}}
                              <a href="{{ url('/v1/address') }}">
                              <button type="button" id="back-payment" class="btn btn-sign-up buy_btn2">{{ trans('product.Back') }}</button>
                            </a>
                          </div>
                          <input type="hidden" value="{{Session::get('data.email')}}" id="email-tmp" name="email-tmp"/>
                          <div class="col-lg-6 col-md-3 col-sm-3">
                              <div class="cart-right">
                                {{-- <label ng-show="!IsCheckDelivery" style="color:red"> *please select deliver method</label> --}}
                                  {{-- <button type="button" id="accept-payment" class="btn btn-sign-up buy_btn">ยืนยันการสั่งซื้อ</button> --}}
                                  {{-- <button type="button" id="accept-payment" ng-disabled="!IsCheckDelivery" class="btn btn-sign-up buy_btn">Confirm Order</button> --}}
                                  <button type="button" id="accept-payment" class="btn btn-sign-up buy_btn">{{ trans('product.Confirm_Order') }}</button>
                              </div>

                          </div>
                       </div>
                  </div>

            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/product-info/product-info.js')}}"></script>
@endsection
