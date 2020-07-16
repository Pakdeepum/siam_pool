
<!-- Modal Add -->
<form action="{{ route('BackendReview.SaveReview') }}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
    {{csrf_field()}}
<!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-AddBackendreview">
        <div class="modal-dialog modal-lg" role="document">
          <div class="col">
            <div class="modal-content modal-pos">
                <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">

                <h5 class="modal-title">Add Review</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div class="row"> -->
                    <div class="col-md-12">
                        <div class="block">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <input type="file" class="file" name="file" id="file" title="Browse file" onchange="preview_image(event)" style="width: 100%;" required />
                                    <img class="img-responsive image-resize" id="output_image_add" >
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                            <p style="color:red;">*Image Size 580x580</p>
                            <div class="row">
                                <div class="col-md-3" style="text-align: -webkit-right;">
                                    <label >name review :</label>
                                </div>
                                <div class="col-md-7">
                                    <input id="name_review" name="name_review" type="text" class="form-control" placeholder="Name Review"  required/>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-3" style="text-align: -webkit-right;">
                                    <label >review detail :</label>
                                </div>
                                <div class="col-md-7">
                                    <textarea id="review_detail"  name="review_detail" class="form-control" placeholder="Review Detail"  required></textarea>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                            <br/>
                            <div class ="row">
                                <div class="col-md-3" style="text-align: -webkit-right;">
                                    <label >about product : </label>
                                </div>
                                <div class="col-md-7">
                                    <select name="id_product" class="form-control"  required>
                                        <option value="" hidden>Name Product</option>
                                        <option ng-repeat="data1 in allaboutproduct" value="@{{data1.id_product}}"  >@{{data1.product_name}}</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  class="btn btn-success" id="ajaxSubmit">Save changes</button>
                </div>
            </div>
          </div>
        </div>
    </div>
</form>
