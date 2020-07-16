
{{-- <!-- Modal Add --> --}}
<form action= "{{ route('BackendCategoryPromotion.SaveEditCategoryPromotion') }}" method="get" enctype="multipart/form-data" class="form-horizontal" role="form">
    {{csrf_field()}}
<!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-EditCategoryPromotion" ng-controller="BackendCategoryPromotionController" ng-cloak >
        <div class="modal-dialog modal-lg" role="document">
          <div class="col">
            <div class="modal-content modal-pos">
                <div class="alert alert-danger" style="display:none"></div>
            <div class="modal-header">

                <h5 class="modal-title">Edit Category Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <div class="row"> -->
                    <div class="col-md-12" ng-repeat="data in datacategorypromotion ">
                        <div class="block">
                            <div class ="row">
                                <div class = "col-md-1">
                                </div>
                                <div class = "col-md-8">
                                    <div class = "row">
                                        <div class = "col-md-3">
                                                Name :
                                        </div>
                                        <div class = "col-md-9">
                                            <input id = "category_promotion_name" value = "@{{data.category_promotion_name}}"   name="category_promotion_name" type="text" class="form-control" placeholder="Category Promotion Name"  required/>
                                            <input id = "id_category_promotion" value = "@{{data.id_category_promotion}}"  name="id_category_promotion" type="hidden" class="form-control" placeholder="Promotion Name"  required/>
                                        </div>
                                    </div>
                                    <br/>
                                    <div class = "row">
                                        <div class = "col-md-3">
                                                Detail :
                                        </div>
                                        <div class = "col-md-9">
                                            {{-- <input id = "category_promotion_detail"  value = "@{{data.category_promotion_detail}}"  name="category_promotion_detail" type="text" class="form-control" placeholder="Category Promotion Detail"  required/> --}}
                                            <textarea id = "category_promotion_detail"  name="category_promotion_detail" placeholder="Category Promotion Detail"  class="form-control" type="text" required>@{{data.category_promotion_detail}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class = "col-md-2">
                                </div> --}}
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
