<div wire:ignore.self class="modal fade" id="modalCardShowInternshipStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Detail Employee</h4>
                <button wire:click="cancel" type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="#modalCardInternshipStatus" aria-label="Close">
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
                        <label style="font-size:15px;">{{ $contract_duration }} days</label>
                    </div>
                </div>
                <div class="md-form row mb-4">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="color:#6D4786;font-size:15px;font-weight: bold;">Join Date :</label><br>
                                <label style="font-size:15px;"><i class="icofont icofont-calendar"></i> {{ timeForHuman($join_date,'standard') }}</label>
                            </div>
                            <div class="col-lg-6">
                                <label style="color:#6D4786;font-size:15px;font-weight: bold;">End Date :</label><br>
                                <label style="font-size:15px;"><i class="icofont icofont-calendar"></i> {{ timeForHuman($end_date,'standard') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-form mb-4">
                    <label style="color:#6D4786;font-size:15px;font-weight: bold;">Additional Information :</label><br>
                <label style="font-size:15px;text-align: justify;">{!! $addition_information !!}</label>
                </div>
            </div>
        </div>
    </div>
</div>
