<!-- Modal Successfully- -->
<div class="modal fade" id="modal-successfully" data-backdrop="static">
    <div class="modal-success modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row push-down-10">
                    <div class="col content-center">
                        <div class="crop-success"><img src="{{asset('img/pic/success.png')}}"/></div>               
                    </div>                    
                </div>
                <div class="row push-down-10">
                    <div class="col content-center">
                        <span>{{ trans('payment.Successfully_Completed') }}</span>
                    </div>
                </div>
                <div class="row push-down-10">
                    <div class="col content-center">
                        <button type="button" class="btn btn-success" id="success" data-dismiss="modal" aria-label="Close">{{ trans('payment.ok') }}</button> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Problem-->
<div class="modal fade" id="modal-problem" data-backdrop="static">
    <div class="modal-success modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row push-down-10">
                    <div class="col content-center">
                        <div class="crop-success"><img src="{{asset('storage/confirmation.png')}}"/></div>               
                    </div>                    
                </div>
                <div class="row push-down-10">
                    <div class="col content-center">
                        <span>{{ trans('payment.These_Was_has_a_problem') }}</span>
                    </div>
                </div>
                <div class="row push-down-10">
                    <div class="col content-center">
                        <button type="button" class="btn btn-danger" id="problem" data-dismiss="modal" aria-label="Close">{{ trans('payment.ok') }}</button> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
