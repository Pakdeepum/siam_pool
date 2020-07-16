
<!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="modal-sendTracking">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content send-modal">
                <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title">Send Tracking PostOffice</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row push-down-10">                        
                        <div class="col">
                            <label class="control-label col-sm-2" for="send-email" >email</label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <input type="text" name="send-email" id="send-email" class="form-control" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row push-down-10">                        
                        <div class="col" id="track-validate">
                            <label class="control-label col-sm-2">Tracking</label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                                <input type="text" name="send-tracking" id="send-tracking" class="form-control"
                                data-placement="top" data-toggle="popover" data-trigger="focus" data-content="กรุณาระบุ Tracking Number!"/>
                            </div>
                        </div>
                    </div>
                    <div class="row push-down-10">                        
                        <div class="col">
                            <label class="control-label col-sm-2">Service</label>
                            <div class="col-lg-10 col-md-10 col-sm-10">
                            <div id="trackCode-valid">Please choose delivery service.</div>
                                <select class="form-control" id="trackCode" name="trackCode" >
                                    <option value="">please select ...</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="customer" value=""/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button  class="btn btn-success" type="button" id="email-track">send email</button>
                </div>
            </div>
        </div>
    </div>