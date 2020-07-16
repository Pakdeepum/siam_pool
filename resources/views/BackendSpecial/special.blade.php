@extends('layouts.app')
@section('content')
    <div ng-controller="BackendSpecialController" ng-cloak>
        <div class="card" style="box-shadow: 0 0 10px rgba(0,0,0,0.4);height:820px;width:auto;">
            <div class="card-body">
                <?php if(isset($data)){?>
                <div data-ng-init=<?php echo "load_data(" . $data . ")" ?> ></div>
                <?php } ?>
                <div class="last-section-bg push-down-10">
                    <div class="container">
                    </div>
                </div>
                <div class="container">
                    <div class="row push-down-10">
                        <div class="col">
                            <div class="head-txt-product">Promotion Topic Management</div>
                        </div>
                    </div>
                    <div class="row push-down-10">
                        <div class="col alert alert-success" id="promotion-success">
                            <label class="control-label promotion-label"></label>
                        </div>
                        <div class="col alert alert-error" id="promotion-list-error">
                            <label class="control-label promotion-label"></label>
                        </div>
                    </div>
                    <div class="row push-down-10">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="control-label reg-size">Promotion Topic Name</label>
                                </div>
                                <div class="col-lg-5">
                                    <div class="input-group mb-3">
                                        <input id="input-promotion" name="input-promotion" aria-label="Search text"
                                               type="text" class="form-control" value=""/>
                                        <div class="input-group-prepend">
                                            <button aria-label="Search" type="button" id="search-promotion"
                                                    class="btn btn-primary">
                                                <span><i class="fa fa-search"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                                    <button aria-label="Search" type="button" id="modal_add-promotion"
                                            class="btn btn-success floatright">
                                        <span>Add Promotion</span>
                                    </button>
                        </div>
                    </div>
                    <div class="table-responsive-xl table-responsive-lg table-responsive-md table-responsive-sm">
                        <table class="table" id="promotion-table" data-unique-id="id"
                               data-toggle="table"
                               data-pagination="true"
                               data-page-size="4">
                            <thead>
                            <tr>
                                <th data-formatter="indexFormatter" data-align="center" data-halign="center">#</th>
                                <th data-field="special_name" data-align="center" data-halign="center">Promotion Name
                                </th>
                                <th data-formatter="promotionFormatter" data-align="center" data-halign="center">
                                    Promotion
                                </th>
                                <th data-formatter="editFormatter" data-align="center">edit</th>
                                <th data-formatter="deleteFormatter" data-align="center">Delete</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('BackendSpecial.modals.special-modal')
    @include('BackendSpecial.modals.special-edit-modal')
    <script src="{{ asset('js/backend-special/special.js') }}"></script>
@endsection
