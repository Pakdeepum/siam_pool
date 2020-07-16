<!-- Modal Add -->
<form action="{{route('BackendCategoryProduct.SaveEditCategory')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
{{csrf_field()}}
  <!-- Modal -->
      <div class="container">
        <div class="row">
        <div class="modal" tabindex="-1" role="dialog" id="modal-EditCategory">
            <div class="modal-dialog modal-lg" role="document">
              <div class="col">
                <div class="modal-content modal-pos">
                    <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="row"> -->
                        <div class="col-md-12">
                            <div class="block">
                                    <div class ="row">
                                        <div class = "col-md-12">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-8">
                                                <input type="file" class="file" name="file_e" id = "file_e" title="Browse file" onchange="preview_image_e(event)" style="width: 100%;" />
                                                <img class="img-responsive image-resize" style="width: 50%;height: auto;"id ="output_image_e" >
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                    <p style="color:red;">*Image Size480x480</p>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Category Name</label>
                                                <div class="col-md-6">
                                                    <input id = "categoryname"  name="categoryname" type="text" class="form-control" placeholder="Please enter Category Name" required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Detail</label>
                                                <div class="col-md-6">
                                                <textarea id = "categorydetail"  name="categorydetail" type="text" class="form-control" placeholder="Category Detail" ></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" id = "idsaveedit"  name="idsaveedit" type="text" class="form-control" />
                                        </div>
                                    </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" >Save</button>
                    </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      </div>
  </form>
