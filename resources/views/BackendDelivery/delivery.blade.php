@extends('layouts.app')
@section('content')
<div ng-controller="BackendPaymentController" ng-cloak >
    <?php if(isset($data)){?>
        <div  data-ng-init=<?php echo"load_data(".$data.")" ?> ></div>
    <?php } ?>
<div class="last-section-bg push-down-10">
    <div class="container">
      <div class="col">
          <div class="head-txt-product">Delivery Management</div>
      </div>
    </div>
</div>
<div class="container proinfo-bg">
    <div class="alert alert-success" id="success">
        <span></span>
    </div>
    <div class="alert alert-danger" id="error">
        <span></span>
    </div>
            <div class="col-lg-6 col-md-12 col-sm-12 vr">
                <h3 class="card-title">Add shipping information</h3>
                <form id="service-form" enctype="multipart/form-data" action="">
                <div class="row">
                    <div class="col-12" id="validate-service-name">
                        <label class="pr-med">Service Name</label>
                        <div id="service-name-valid">
                            <small style="color:#E04B4A;">Please specify the shipping service name...</small>
                        </div>
                        <div class="form-group">
                            <input class="form-control col-lg-8 col-md-6" type="text" id="service-name" name="service-name"/>
                        </div>
                    </div>
                    <div class="col push-down-10">
                        <small>Shipping service name</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <label class="pr-med">Service Url</label>
                        <div class="form-group">
                            <input class="form-control col-lg-8 col-md-6" type="text" id="service-url" name="service-url"/>
                        </div>
                    </div>
                    <div class="col push-down-10">
                        <small>Tracking products link</small>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label class="pr-med">Service Charge</label>
                        <div class="form-group">
                            <input class="form-control col-lg-8 col-md-6" type="text" value="0" id="service-charge" name="service-charge"/>

                        </div>
                    </div>
                    <div class="col push-down-10">
                        <small>Service charge</small>
                    </div>
                </div>
                </form>
                <button type="button" class="btn btn-outline-primary" id="add-service">เพิ่ม</button>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 table-responsive">
                <h3 class="card-title">Choose delivery type</h3>
                <table class="table" id="delivery-information"
                    data-toggle="table"
                    data-pagination = "true"
                    data-page-size="8" data-click-to-select="true"
                    data-single-select="true"
                    style="background-color: rgb(236, 236, 236);">
                        <thead class="text-primary">
                            <tr>
                                <th scope="col" data-checkbox="true" data-align="right">#</th>
                                <th scope="col" data-field="service" data-align="left" data-halign="center">Name</th>
                                <th scope="col" data-formatter="chargeFormatter" data-field="service_charge" data-align="left" data-halign="center">Charge</th>
                                <th scope="col" data-formatter="urlFormatter"data-field="service_url" data-align="left" data-halign="center">Track & Trace Url</th>
                                <th scope="col" data-formatter="deleteFormatter" data-align="right"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
</div>
</div>
@include('BackendBankInfo.Modals.modal-bank-info')
<script src="{{ asset('js/backend-delivery/delivery.js') }}"></script>
@endsection
