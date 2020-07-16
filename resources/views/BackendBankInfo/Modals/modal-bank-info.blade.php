<!-- Modal Add -->
<form id="bank-info-update" action="" enctype="multipart/form-data" class="form-horizontal" role="form">
{{ method_field('PUT') }}
{{csrf_field()}}
  <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="modal-bank-info">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content modal-fix">
                    <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Bank-Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="row"> -->
                        <div class="col-md-12">
                            <div class="block">
                                <div class="col-md-8">
                                    <div class="row">
                                        <input type="hidden" id="id" name="id"/>
                                        <div class="col mb-2">
                                        <label>Bank</label>
                                            <div class="form-group col">
                                                <select class="form-control" id="bank-name-edit" name="bank-name-edit"
                                                data-placement="right" data-toggle="popover" data-trigger="focus" data-content="Bank is required." >
                                                    <option value="">please select ...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-2">
                                            <label>Account Name</label>
                                            <div class="form-group col">
                                                <input class="form-control" type="text" id="account-name-edit" name="account-name-edit"
                                                data-placement="right" data-toggle="popover" data-trigger="focus" data-content="Account Name is required."/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-2">
                                        <label>Account Number</label>
                                            <div class="form-group col">
                                                <input class="form-control" type="text" id="account-number-edit" name="account-number-edit"
                                                data-placement="right" data-toggle="popover" data-trigger="focus" data-content="Account Number is required."/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <button type="button" class="btn btn-success" id="edit-bank-info">Save</button>
                    </div>
                </div>
            </div>
        </div>
  </form>
