
<!-- Modal Add -->
<form action="{{ route('BackendPromotion.SaveEditPromotion') }}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
    {{csrf_field()}}
<!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-EditPromotion" ng-controller="BackendPromotionController" ng-cloak >
        <div class="modal-dialog modal-lg" role="document">
          <div class="col">
            <div class="modal-content modal-pos">
                <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">

                <h5 class="modal-title">Edit Poolshopbkk Topic</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div class="row"> -->
                    <div class="col-md-12" ng-repeat="data in datapromotion ">
                        <div class="block">
                            <div class ="row">
                                <div class = "col-md-1">
                                </div>
                                <div class = "col-md-10">
                                    <div class = "row">
                                        <div class = "col-md-3">
                                                Picture :
                                        </div>
                                        <div class = "col-md-9">
                                            <input type="file" class="file" name="file" id = "file" title="Browse file" onchange="preview_image_e(event)" style="width: 100%;"  />
                                            <img class="img-responsive image-resize" id  = "output_image_e" src="/storage/promotion/@{{data.id_promotion}}/@{{data.pic_url}}" >
                                        </div>
                                    </div>
                                    <br/>
                                    <div class = "row">
                                        <div class = "col-md-3">
                                                Name :
                                        </div>
                                        <div class = "col-md-9">
                                            <input id = "promotion_name" value = "@{{data.promotion_name}}"  name="promotion_name" type="text" class="form-control" placeholder="Promotion Name"  required/>
                                            <input id = "id_promotion" value = "@{{data.id_promotion}}"  name="id_promotion" type="hidden" class="form-control" placeholder="Promotion Name"  required/>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class = "row">
                                        <div class = "col-md-3">
                                                Detail :
                                        </div>
                                        <div class = "col-md-9">
                                            <textarea id = "promotion_detail"  name="promotion_detail" type="text" class="form-control" placeholder="Promotion Detail"  required >@{{data.promotion_detail}}</textarea>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class = "row">
                                        <div class = "col-md-3">
                                            Date Upload :
                                        </div>
                                        <div class = "col-md-9">
                                            <input id = "date_upload"  name="date_upload" value = "@{{data.date_upload}}"  type="date" class="form-control" placeholder="Promotion Date Upload"  required/>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class = "row">
                                        <div class = "col-md-3">
                                            Date Expired  :
                                        </div>
                                        <div class = "col-md-9">
                                            <input id = "date_end_show"  name="date_end_show" value = "@{{data.date_end_show}}" type="date" class="form-control" placeholder="Promotion Date Upload"  required/>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class = "row">
                                        <div class = "col-md-3">
                                            Category Poolshopbkk Topic  :
                                        </div>
                                        <div class = "col-md-9">
                                            <select name="id_category_promotion"   class="form-control" required>
                                                <option value="" hidden>Category Healthy Topic</option>
                                                <option ng-repeat="data1 in allcategorypromotion" value="@{{data1.id_category_promotion}}" ng-if = "data.id_category_promotion == data1.id_category_promotion" selected>@{{data1.category_promotion_name}}</option>
                                                <option ng-repeat="data1 in allcategorypromotion" value="@{{data1.id_category_promotion}}" ng-if = "data.id_category_promotion != data1.id_category_promotion" >@{{data1.category_promotion_name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button  class="btn btn-success" id="ajaxSubmit">Save</button>
                </div>
            </div>
          </div>
        </div>
    </div>
</form>
