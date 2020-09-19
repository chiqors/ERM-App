<div wire:ignore.self class="modal fade" id="modalShowEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Detail Employee</h4>
                <button wire:click="cancel" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4">
                    <label style="color:#6D4786;font-size:15px;font-weight: bold;">Employee Name :</label><br>
                <label style="font-size:15px;">{{ $full_name }}</label>
                </div>
                <div class="md-form row mb-4">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="color:#6D4786;font-size:15px;font-weight: bold;">Position :</label><br>
                                <label style="font-size:15px;">{{ $position }}</label>
                            </div>
                            <div class="col-lg-6">
                                <label style="color:#6D4786;font-size:15px;font-weight: bold;">Status :</label><br>
                                <label style="font-size:15px;">{{ $status }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label style="color:#6D4786;font-size:15px;font-weight: bold;">Contract :</label><br>
                        <label style="font-size:15px;">{{ (is_null(@$contract_duration)) ? '-' : (($contract_duration == 0) ? 'Permanent' : $contract_duration.' days') }}</label>
                    </div>
                </div>
                <div class="md-form row mb-4">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="color:#6D4786;font-size:15px;font-weight: bold;">Join Date :</label><br>
                                <label style="font-size:15px;"><i class="icofont icofont-calendar"></i> {{ timeForHuman($join_date,'standard') }}</label>
                            </div>
                            @if($end_date != '1970-01-01')
                            <div class="col-lg-6">
                                <label style="color:#6D4786;font-size:15px;font-weight: bold;">End Date :</label><br>
                                <label style="font-size:15px;"><i class="icofont icofont-calendar"></i> {{ timeForHuman($end_date,'standard') }}</label>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="md-form mb-4">
                    <label style="color:#6D4786;font-size:15px;font-weight: bold;">Additional Information :</label><br>
                    <label style="font-size:15px;text-align: justify;">{!! $addition_information !!}</label>
                </div>

                <hr class="hr-text" data-content="Open Files Information">

                <div class="md-form mb-3 d-flex justify-content-around">
                    @if(!empty($ktp))
                    <a href="{{ url('/stream/'.$dir_name.'/'.$ktp) }}" class="btn btn-outline-primary waves-effect waves-light" target="_blank"><i class="icofont icofont-card"></i> KTP</a>
                    @endif
                    @if(!empty($cv))
                    <a href="{{ url('/stream/'.$dir_name.'/'.$cv) }}" class="btn btn-outline-primary waves-effect waves-light" target="_blank"><i class="icofont icofont-paper"></i> CV</a>
                    @endif
                    @if(!empty($certificate))
                    <a href="{{ url('/stream/'.$dir_name.'/'.$certificate) }}" class="btn btn-outline-primary waves-effect waves-light" target="_blank"><i class="icofont icofont-certificate"></i> Certificate</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
