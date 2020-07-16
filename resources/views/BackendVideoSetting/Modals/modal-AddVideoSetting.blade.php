<!-- Modal Add -->
<form action="{{route('VideoSetting.AddVideo')}}" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
{{csrf_field()}}
  <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="modal-AddVideo" ng-controller="ModalAddVideoController">
            <div class="modal-dialog modal-lg" role="document">
              <div class="col">
                <div class="modal-content modal-pos">
                    <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title">ADD Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="row"> -->
                        <div class="col-md-12">
                            <div class="block">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Link</label>
                                                <div class="col-md-6">
                                                    <input id = "videoLink"  name="video_url" ng-model="videoLink" ng-change="onInputLinkChange()" type="text" class="form-control" placeholder="Please enter Video Link" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Preview</label>
                                                <div class="col-md-6" style="background: url('dependencies/img/blueimp/loading.gif') no-repeat center;">
                                                    <iframe width="100%" height="250" ng-src="@{{videoLink_embed| trusted}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    <input name="video_url_embed" value="@{{videoLink_embed}}" type="hidden" />
                                                </div>
                                                <!-- Group of default radios - option 1 -->
                                                <div align="right">
                                              <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="IsPubblish" value=1 [(ngModel)]="videoStatus" checked="true">
                                                <label class="custom-control-label" for="defaultGroupExample1">Published</label>
                                              </div>
                                              <!-- Group of default radios - option 2 -->
                                              <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="IsPubblish" value=0 [(ngModel)]="videoStatus" >
                                                <label class="custom-control-label" for="defaultGroupExample2">Unpublish</label>
                                              </div>
                                            </div>
                                                {{-- <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="status" checked="true" [value]=1 [(ngModel)]="videoStatus">Published
                                                <label class="custom-control-label">
                                                </label>
                                                <input class="custom-control-input" type="radio" name="status" [value]=0[(ngModel)]="videoStatus">Unpublish
                                                <label class="custom-control-label">
                                                </label>
                                                </div> --}}
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
