<form action="" id="promotion-edit-form" enctype="multipart/form-data">
{{ method_field('PUT') }}
<!-- Modal -->
<div class="modal" tabindex="-1" role="dialog" id="modal-edit-promotion">
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
                            <div id="promotion-error-edit" class="alert alert-danger">
                                <label id="label-promotion"></label>
                            </div>
                            <div class="form-group">
                                <label for="image_promotion_edit">Promotion Image</label>
                                <div id="image_promotion_edit-valid">
                                    <label class="label-promotion">Choose File</label>
                                </div>
                                <input name="image_promotion_edit" type="file" id="image_promotion_edit">
                                <input type="hidden" name="oldFile" id="oldFile"/>
                                <input type="hidden" name="_id" id="_id"/>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="cropped-promotion" id="image_edit"></div>
                        </div>
                    </div>
                    <p style="color:red;">*Image size 1090x420</p>
                    <div class="row push-down-10">
                        <div class="col-12 mb-3">
                            <div class="col-lg-3 col-md-12 col-sm-12">
                                <label class="control-label reg-size">Promotion Name</label>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group valid-special_name_edit">
                                    <div id="edit-name-valid">
                                        <label class="label-promotion">Plese input Promotion name</label>
                                    </div>
                                    <input id="special_name_edit" name="special_name_edit" aria-label="Search text" type="text" class="form-control" />
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
                                <div class="form-group valid-special_discount_edit">
                                    <div id="special-discount-valid-edit">
                                        <label class="label-promotion">Please specify the discount.</label>
                                    </div>
                                    <input id="special_discount_edit" name="special_discount_edit" aria-label="Search text" type="text" class="form-control" />
                                    <small>*Discount specified as percent</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                    <button  class="btn btn-success" type="button" id="add-promotion-edit">save</button>
                </div>
            </div>
          </div>
        </div>
    </div>
    </form>
