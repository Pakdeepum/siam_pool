<!-- Modal Add -->
<form action="{{route('VideoSetting.SaveEditVideo')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
{{csrf_field()}}
  <!-- Modal -->
      <div class="container">
        <div class="row">
        <div class="modal" tabindex="-1" role="dialog" id="modal-EditVideo" ng-controller="BackendVideoSettingController">
            <div class="modal-dialog modal-lg" role="document">
              <div class="col">
                <div class="modal-content modal-pos">
                    <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Video</h5>
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
                                          <div class="form-group">
                                              <label align="right" class="col-md-4 control-label">Link</label>
                                              <div class="col-md-6">
                                                <input id="EditVideoId"  name="id_video"  type="hidden" />
                                                  <input id = "EditvideoLink"  name="video_url" ng-model="EditVideoLink" ng-change="onInputEditLinkChange()" type="text" class="form-control" placeholder="Please enter Video Link" required/>
                                              </div>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label align="right" class="col-md-4 control-label">Preview</label>
                                        <div class="col-md-6" style="background: url('dependencies/img/blueimp/loading.gif') no-repeat center;">
                                            <iframe id="EditVideoIframe" width="100%" height="250" ng-src="@{{EditVideoEmbed| trusted}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <input name="video_url_embed" value="@{{EditVideoEmbed}}" type="hidden" />
                                        </div>
                                        <!-- Group of default radios - option 1 -->
                                        <div align="right">
                                        <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" id="editRadio1" name="IsPubblish" value=1 [(ngModel)]="videoStatus">
                                          <label class="custom-control-label" for="editRadio1">Published</label>
                                        </div>
                                        <!-- Group of default radios - option 2 -->
                                        <div class="custom-control custom-radio">
                                          <input type="radio" class="custom-control-input" id="editRadio2" name="IsPubblish" value=0 [(ngModel)]="videoStatus" >
                                          <label class="custom-control-label" for="editRadio2">Unpublish</label>
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
      </div>
      </div>
  </form>
