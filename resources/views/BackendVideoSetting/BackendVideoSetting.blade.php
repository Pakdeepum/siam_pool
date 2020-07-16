@extends('layouts.app')
@section('content')
    <div class="card" style="box-shadow: 0 0 10px rgba(0,0,0,0.4);height:820px;width:auto;">
        <div class="card-body">
            <div class="container" ng-controller="BackendVideoSettingController">
                <div class="col-lg-12 col-lg-offset">
                    <div style="padding: 15px 0px;">
                        <div class="row">
                            <div class="col-9">
                                <div class="head-txt-product">Video Setting</div>
                                @if(session()->has('message'))
                                    <div id="message" align="center" class="alert alert-success">
                                        <h2>{{ session()->get('message') }}</h2>
                                    </div>
                                @endif
                            </div>
                            <div class="col">
                                <button class="btn btn-success floatright" id="open-modal-AddVideo">ADD Video</button>
                            </div>
                        </div>
                    </div>
                    <hr style="border-top: 2px solid #eee; width: 100%; margin-top: 0px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 table-responsive"
                         style="overflow: scroll; max-height: 600px;">
                        <table class="table" border="0" style="width:100% ">
                            <thead class="text-primary">
                            <tr>
                                <th scope="col" style="text-align : center !important; ">No.</th>
                                <th scope="col" style="text-align : center !important; ">Link</th>
                                <th scope="col" style="text-align : center !important; ">Setting</th>
                                <th scope="col" style="text-align : center !important; ">Edit</th>
                                <th scope="col" style="text-align : center !important; ">Delete</th>
                            </tr>
                            </thead>
                            <tbody align="center">
                            <tr ng-repeat="video in datalistVideoSetting.data">
                                <td style="vertical-align: middle !important;">@{{$index+1}}</td>
                                <td>
                                    <iframe width="100%" height="250" ng-src="@{{video.video_url_embed | trusted}}"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                </td>
                                <td align="left" style="vertical-align: middle !important;"><a
                                            href="@{{video.video_url}}" target="_blank">@{{video.video_url}}</a>
                                    <div align="left" ng-switch on="video.status" ng-model="video.status">Status :
                                        <b ng-switch-when="true">Published</b>
                                        <b ng-switch-when="false">Unpublish</b>

                                    </div>
                                </td>
                                <td style="vertical-align: middle !important;"><label class="switch">
                                        <input type="checkbox" ng-checked="video.status" ng-model="video.status"
                                               ng-click="switchPublish(!video.status,video.id_video)">
                                        <span class="slider round"></span>
                                    </label></td>
                                <td style="vertical-align: middle !important;">
                                    <button class="btedit" ng-click="EditVideo(video.id_video)">Edit</button>
                                </td>
                                <td style="vertical-align: middle !important;"><a
                                            href="/VideoSetting/DeleteVideo/@{{video.id_video}}">
                                        <button class="btdel">Delete</button>
                                    </a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    @include('BackendVideoSetting.Modals.modal-AddVideoSetting')
    @include('BackendVideoSetting.Modals.modal-EditVideoSetting')
    <script src="{{asset('js/backend-VideoSetting/VideoSetting.js')}}"></script>
@endsection
