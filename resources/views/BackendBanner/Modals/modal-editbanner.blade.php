<!-- Modal Add -->
<form action="/BackendBanner/EditBanner" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
{{csrf_field()}}
  <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="modal-banner">
            <div class="modal-dialog modal-lg" role="document">
              <div class="col">
                <div class="modal-content modal-pos">
                    <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Banner</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="row"> -->
                        <div class="col-md-12">
                            <div class="block">
                            <div class="col-md-8">
                                <input type="hidden" name="id" id="tempID"/>
                                <input type="file" class="file" name="file" id="image-edit" title="Browse file" style="width: 100%;"/>
                                <div id="gallery-edit" class="banner-list">
                                    <img id="edit-img">
                                </div>
                            </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <button type="submit" class="btn btn-success" >Save</button>
                    </div>
                </div>
              </div>
            </div>
        </div>
  </form>
