<div class="modal fade" id="modalEditEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Event</h4>
                <button type="button" class="close" data-toggle="modal" data-target="#modalControllEvent"
                    data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="modal-body mx-3">
                    <div class="md-form mb-3">
                        <label>Event Name <span class="text-c-red">*</span></label>
                        <input type="text" class="form-control" wire:model="event_name">
                        @error('event_name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="md-form mb-3">
                        <label>Choose number of employees <span class="text-c-red">*</span></label>
                        @if($employees)
                        <input class="form-control" type="number" wire:model="employee_count">
                        @for($f = 0; $f < $employee_count; $f++)
                        <select class="form-control" wire:model="employee_ids.{{ $f }}">
                            @foreach($employees as $emp)
                            <option value="{{ $emp->id }}" {{ ($employee_ids[$f]==$emp->id) ? 'selected' : '' }}>{{ $emp->full_name }}</option>
                            @endforeach
                        </select>
                        @endfor
                        @error('employee_count') <span class="text-danger error">{{ $message }}</span>@enderror
                        @else
                        <input type="text" class="form-control" value="PLEASE, GO BACK & INSERT EMPLOYEE INFO FIRST!!" readonly>
                        @endif
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
                        <button wire:click.prevent="cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button wire:click.prevent="store" class="btn btn-primary waves-effect waves-light">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
