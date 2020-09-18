<div wire:ignore.self class="modal fade" id="modalShowEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Detail Event</h4>
                <button wire:click="cancel" type="button" class="close" data-toggle="modal"
                data-target="#modalControlEvent" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-4">
                    <label style="color:#6D4786;font-size:15px;font-weight: bold;">Employee Name :</label><br>
                    <label style="font-size:15px;">
                    @foreach($employee_names as $emp)
                        {{ $emp->full_name }}
                    @endforeach
                    </label>
                </div>
                <div class="md-form mb-4">
                    <label style="color:#6D4786;font-size:15px;font-weight: bold;">Event Name :</label><br>
                    <label style="font-size:15px;">{{ $event_name }}</label>
                </div>
                <div class="md-form row mb-4">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <label style="color:#6D4786;font-size:15px;font-weight: bold;">Event Start :</label><br>
                                <label style="font-size:15px;">
                                    <i class="icofont icofont-calendar"></i> 
                                    {{ timeforHuman($event_start,"standard") }}  
                                    <br><i class="icofont icofont-clock-time"></i> 
                                    {{ timeforHuman($event_start,"timeOnly") }}  
                                </label>
                            </div>
                            <div class="col-lg-6">
                                <label style="color:#6D4786;font-size:15px;font-weight: bold;">Event End :</label><br>
                                <label style="font-size:15px;">
                                    <i class="icofont icofont-calendar"></i> 
                                    {{ timeforHuman($event_end,"standard") }}  
                                    <br><i class="icofont icofont-clock-time"></i> 
                                    {{ timeforHuman($event_end,"timeOnly") }}  
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label style="color:#6D4786;font-size:15px;font-weight: bold;">Event Type :</label><br>
                        <label style="font-size:15px;">{{ $event_type }}</label>
                    </div>
                </div>
                <div class="md-form mb-4">
                    <label style="color:#6D4786;font-size:15px;font-weight: bold;">Event Details :</label><br>
                <label style="font-size:15px;text-align: justify;">{!! $event_details !!}</label>
                </div>
            </div>
        </div>
    </div>
</div>
