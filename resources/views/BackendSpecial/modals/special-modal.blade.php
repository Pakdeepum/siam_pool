<form action="" id="promotion-form" enctype="multipart/form-data">
<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="modal-promotion">
        <div class="modal-dialog modal-md" role="document">
          <div class="col">
            <div class="modal-content send-modal modal-pos">
                <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title">Promotion</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row push-down-10">
                        <div class="col-12 mb-3">
                            <div id="promotion-error" class="alert alert-danger">
                                <label id="label-promotion"></label>
                            </div>
                            <div class="form-group">
                                <label for="image_promotion">Promotion Image</label>
                                <div id="image_promotion-valid">
                                    <label class="label-promotion">Choose File</label>
                                </div>
                                <input name="image_promotion" type="file" id="image_promotion">
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="cropped-promotion" id="image"></div>
                        </div>
                    </div>
                    <p style="color:red;">*Image Size1090x420</p>
                    <div class="row push-down-10">
                        <div class="col-12 mb-3">
                            <div class="col-lg-3 col-md-12 col-sm-12">
                                <label class="control-label reg-size">Promotion Name</label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group valid-special_name">
                                    <div id="special-name-valid">
                                        <label class="label-promotion">Please input promotion name</label>
                                    </div>
                                    <input id="special_name" name="special_name" aria-label="Search text" type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row push-down-10">
                        <div class="col-12 mb-3">
                            <div class="col-lg-3 col-md-12 col-sm-12">
                                <label class="control-label reg-size">Discount</label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group valid-special_discount">
                                    <div id="special-discount-valid">
                                        <label class="label-promotion">Please specify the discount.</label>
                                    </div>
                                    <input id="special_discount" name="special_discount" aria-label="Search text" type="text" class="form-control" />
                                    <small>*Discount specified as percent</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button  class="btn btn-success" type="button" id="add-promotion">save</button>
                </div>
            </div>
          </div>
        </div>
    </div>
    </form>
