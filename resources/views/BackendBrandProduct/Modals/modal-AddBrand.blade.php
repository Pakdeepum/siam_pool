<!-- Modal Add -->
<form action="{{route('BackendBrandProduct.AddBrand')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
{{csrf_field()}}
  <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="modal-AddBrand">
            <div class="modal-dialog modal-lg" role="document">
              <div class="col">
                <div class="modal-content modal-pos">
                    <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title">ADD Brand</h5>
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
                                                <input type="file" class="file" name="file1" id = "file1" title="Browse file" onchange="preview_image1(event)" style="width: 100%;" required/>
                                                <img class="img-responsive image-resize" id  = "output_image_add_1" >
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                    <p style="color:red;">*Image Size 480x480</p>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Brand Name</label>
                                                <div class="col-md-6">
                                                    <input id = "brandname"  name="brandname" type="text" class="form-control" placeholder="Please enter Brand Name" required/>
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
                    <button type="submit" class="btn btn-success" >Save</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
  </form>
