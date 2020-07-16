<div class="modal fade " id="modal-profile" data-backdrop="static">
    <div class="modal-success modal-sm" role="document">
        <div class="modal-content push-up-50">
            <div class="modal-body">
                <div class="row push-down-10">
                    <div class="col content-center">
                        <div class="crop-success"><img src="{{asset('img/pic/success.png')}}"/></div>               
                    </div>
                </div>
                <div class="row push-down-10">
                    <div class="col content-center">
                        <span>{{ trans('profile.Successfully_Completed')}}</span>
                    </div>
                </div>
                <div class="row push-down-10">
                    <div class="col content-center">
                        <button type="button" class="btn btn-success" id="profile-success" data-dismiss="modal" aria-label="Close">{{ trans('profile.ok') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
