@extends('layouts.app')
@section('content')
<div ng-controller="BackendUserController" ng-cloak >
    <?php if(isset($data)){?>
        <div  data-ng-init=<?php echo"load_data(".$data.")" ?> ></div>
    <?php } ?>
    <div class="last-section-bg push-down-10">
        <div class="container">
        </div>
    </div>
    <div class="container">
      <div class="col-lg-6 text-left">
          <div class="head-txt-product">Member Management </div>
      </div>
        <div class="row push-down-10">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <label class="control-label reg-size">Name - Lastname</label>
            </div>
            <div class="col-lg-6 col-md-7 col-sm-12">
                <div role="search" class="form-group">
                    <span class="input-group">
                        <input id="input-user" name="input-user" aria-label="Search text" type="text" class="form-control" value="" />
                        <span class="input-group-btn">
                            <div>
                                <button aria-label="Search" type="button" id="search-user" class="btn btn-info">
                                    <span><i class="fa fa-search"></i></span>
                                </button>
                            </div>
                        </span>
                    </span>
                </div>
            </div>
        </div>
        <div class="table-responsive-xl table-responsive-lg table-responsive-md table-responsive-sm">
            <table class="table" id="user-table"
                data-toggle="table"
                data-pagination = "true"
                data-page-size="8" >
                <thead>
                    <tr>
                        <th data-formatter="indexFormatter" data-align="left" data-halign="center">#</th>
                        <th data-field="fullName" data-formatter="nameFormatter" data-align="center" data-halign="center">Name - Lastname</th>
                        <th data-field="email" data-align="center" data-halign="center">Email</th>
                        <th data-field="customers.tel" data-align="center" data-halign="center">Tel.</th>
                        <th data-field="customers.full_address" data-align="left" data-halign="center">Address</th>
                        <th data-formatter="deleteFormatter" data-align="center">Del</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<script src="{{ asset('js/backend-user/user.js') }}"></script>
@endsection
