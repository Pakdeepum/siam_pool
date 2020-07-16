@extends('layouts.app')
@section('content')
<div ng-controller="BackendSilpController" ng-cloak >
    <?php if(isset($data)){?>
        <div  data-ng-init=<?php echo"load_data(".$data.")" ?> ></div>
    <?php } ?>
<div class="last-section-bg push-down-10">
    <div class="container">
    </div>
</div>
<div class="container">
    <div class="alert alert-success" id="success">
        <span></span>
    </div>
    <div class="alert alert-danger" id="error">
        <span></span>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="col-lg-6">
          <div class="head-txt-product">Order Management</div>
      </div>
        <div class="col-lg-6">
        <div class="row">
            <div class="col-2 push-down-10">
                <label>Order ID</label>
            </div>
            <div class="col-3 push-down-10">
                <div class="form-group">
                    <input class="form-control" type="text" id="order-id" name="order-id"
                    data-placement="right" data-toggle="popover" data-trigger="focus" data-content="Order ID is required."/>
                </div>
            </div>
            <div class="row col-lg-3 col-md-6 col-sm-12 push-down-10">
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <button type="button" id="btn-order" class="btn btn-md btn-success"><span><i class="fa fa-search"></i></span></button>
                </div>
            </div>
        </div>
        </div>
        <div class="table-responsive-xl table-responsive-lg table-responsive-md table-responsive-sm">
            <table class="table" id="order-information"
                data-toggle="table"
                data-pagination = "true"
                data-page-size="8" data-detail-view="true"
                data-detail-formatter="detailFormatter">
                <thead>
                    <tr>
                        <th data-field="order_id" data-align="left" data-halign="center">Order Id</th>
                        <th data-field="status" data-align="center" data-halign="center">Status</th>
                        <th data-field="send_type" data-align="center" data-halign="center">Delivery service</th>
                        <th data-field="receiverName" data-align="center" data-halign="center">Receiver Name</th>
                        <th data-field="description" data-align="center" data-halign="center">More Detail</th>
                        <th data-field="delivery_address" data-align="center" data-halign="center">Delivery address</th>
                        <th data-field="paid_date" data-formatter="datePaidFormatter" data-align="center" data-halign="center">Payment date</th>
                        <th data-field="slip_image" data-formatter="imageFormatter" data-align="center" data-halign="center">silp</th>
                        <th data-formatter="emailTrackFormatter" data-align="right">Send Tracking</th>
                        <th data-formatter="approveFormatter" data-align="right">Approved</th>
                        <th data-formatter="deleteFormatter" data-align="right">Delete</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
</div>
@include('BackendSilp.modals.send-tracking')
<script src="{{ asset('js/backend-silp/silp.js') }}"></script>
@endsection
