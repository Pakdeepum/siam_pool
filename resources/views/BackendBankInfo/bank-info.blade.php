@extends('layouts.app')
@section('content')
<div ng-controller="BackendPaymentController" ng-cloak >
    <?php if(isset($data)){?>
        <div  data-ng-init=<?php echo"load_data(".$data.")" ?> ></div>
    <?php } ?>
<div class="last-section-bg push-down-10">
    <div class="container">
      <div class="col">
                <div class="head-txt-product">Bank Info Management</div>
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
                <h3 class="card-title">Add Bank Information</h3>
                <form id="bank-info-form" enctype="multipart/form-data" action="">
                <div class="row">
                    <div class="col push-down-10">
                    <label class="pr-med">Bank</label>
                        <div>
                            <select class="form-control col-lg-8 col-md-6" id="bank-name" name="bank-name"
                            data-placement="right" data-toggle="popover" data-trigger="focus" data-content="Bank is required." >
                                <option value="">please select ...</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col push-down-10">
                        <label class="pr-med">Account Name</label>
                        <div class="form-group">
                            <input class="form-control col-lg-8 col-md-6" type="text" id="account-name" name="account-name"
                            data-placement="right" data-toggle="popover" data-trigger="focus" data-content="Account Name is required."/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col push-down-10">
                    <label class="pr-med">Account Number</label>
                        <div class="form-group">
                            <input class="form-control col-lg-8 col-md-6" type="text" id="account-number" name="account-number"
                            data-placement="right" data-toggle="popover" data-trigger="focus" data-content="Account Number is required."/>
                        </div>
                    </div>
                </div>
                </form>
                <button type="button" class="btn btn-outline-primary floatright" id="add-bank">Add Bank</button>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 table-responsive">
                <h3 class="card-title">Bank Info Manage</h3>
                <table class="table" id="bank-information"
                    data-toggle="table"
                    data-pagination = "true"
                    data-page-size="8"
                    style="background-color: rgb(236, 236, 236);"
                    >
                        <thead class="text-primary">
                            <tr>
                                <th scope="col" data-field="account_name" data-align="left" data-halign="center">Account Name</th>
                                <th scope="col" data-field="account_number" data-align="left" data-halign="center">Account Number</th>
                                <th scope="col" data-field="bank_name" data-align="left" data-halign="center">Bank Name</th>
                                <th scope="col" data-formatter="editFormatter" data-align="right"></th>
                                <th scope="col" data-formatter="deleteFormatter" data-align="right"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
</div>
</div>
@include('BackendBankInfo.Modals.modal-bank-info')
<script src="{{ asset('js/backend-bank-info/bank-info.js') }}"></script>
@endsection
