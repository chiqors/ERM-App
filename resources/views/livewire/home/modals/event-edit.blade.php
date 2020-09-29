<div wire:ignore.self class="modal fade" id="modalEditEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Event</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="modal-body mx-3">
                    <div class="md-form row">
                        <div class="col-lg-6">
                            <label>Event Name <span class="text-c-red">*</span></label>
                            <div class="input-group input-group-button">
                                <div class="input-group-prepend">
                                    <button class="btn btn-sm btn-secondary" wire:click="sendCuti">Cuti? <i class="icofont icofont-arrow-right"></i></button>
                                </div>
                                <input wire:model="event_name" type="text" class="form-control">
                            </div>
                            @error('event_name') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-lg-6">
                            <label>Choose number of employees <span class="text-c-red">*</span></label>
                            @if($employees)
                            <input class="form-control mb-2" type="number" wire:model="employee_count" min="0" max="{{ $employees->count() }}">
                            @else
                            <input type="text" class="form-control" value="PLEASE, GO BACK & INSERT EMPLOYEE INFO FIRST!!" readonly>
                            @endif
                            @error('employee_count') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="md-form row mb-3">
                        @for($f = 0; $f < $employee_count; $f++)
                        <div class="col-lg-4">
                            <select class="form-control" wire:model="employee_ids.{{ $f }}">
                                <option value="">-- CHOOSE --</option>
                                @foreach($employees as $emp)
                                @if(empty($employee_ids[$f]))
                                <option value="{{ $emp->id }}" {{ (@$employee_ids[$f]==$emp->id) ? 'selected' : '' }}>{{ $emp->full_name }}</option>
                                @else
                                <option value="{{ $emp->id }}">{{ $emp->full_name }}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        @endfor
                    </div>
                    <div class="md-form mb-3">
                        <label>Event Type <span class="text-c-red">*</span></label>
                        <select class="form-control" wire:model="event_type">
                            <option value="">-- SELECT --</option>
                            <option value="One Time">One Time</option>
                            <option value="Recurring Monthly">Recurring Monthly</option>
                            <option value="Recurring Yearly">Recurring Yearly</option>
                        </select>
                        @error('event_type') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="md-form mb-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Event Start <span class="text-c-red">*</span></label>
                                <input type="datetime-local" class="form-control form-control-sm"
                                wire:model="event_start">
                                @error('event_start') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label>Event End <span class="text-c-red">*</span></label>
                                <input type="datetime-local" class="form-control form-control-sm"
                                wire:model="event_end">
                                @error('event_end') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <label>Event Details</label>
                        <textarea class="form-control form-control-sm" wire:model="event_details"></textarea>
                        @error('event_details') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="modal-footer d-flex justify-content-right">
                        <div wire:loading.remove wire:target="update">
                            <button wire:click.prevent="cancel" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Cancel</button>
                            <button wire:click.prevent="update" class="btn btn-warning waves-effect waves-light" style="background-color: #FFB012"><i class="icofont icofont-swoosh-up"></i> Update</button>
                        </div>
                        <div wire:loading wire:target="update" wire:loading.class="btn btn-outline-info waves-effect waves-light disabled">
                            <i class="icofont icofont-cloud-upload"></i> Loading..
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('event-edit-script')
    <script type="text/javascript">
        window.livewire.on('eventUpdate', () => {
            $('#modalEditEvent').modal('hide');
            $('#modalControlEvent').modal('show');
        });
    </script>
    @endpush
</div>
