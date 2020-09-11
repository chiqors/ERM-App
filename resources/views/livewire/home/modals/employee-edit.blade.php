<div wire:ignore.self class="modal fade" id="modalEditEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Employee</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-3">
                    <label>Employee Name <span class="text-c-red">*</span></label>
                    <input type="text" class="form-control form-control-sm" wire:model="full_name">
                    @error('full_name') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="md-form row mb-3">
                    <div class="col-lg-6">
                        <label>Position <span class="text-c-red">*</span></label>
                        <input type="text" class="form-control form-control-sm" wire:model="position">
                        @error('position') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-lg-6">
                        <label>Employee Status <span class="text-c-red">*</span></label>
                        <select class="form-control form-control-sm" wire:model="status">
                            <option value="Active">Aktif</option>
                            <option value="Inactive">Tidak Aktif</option>
                        </select>
                        @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="md-form row mb-3">
                    <div class="col-lg-10">
                        <label>Join Date - End Date(Blank, if permanent) <span class="text-c-red">*</span></label>
                        <div class="row">
                            <div class="col-lg-6">
                                <input id="join_date_employee" type="date" class="form-control form-control-sm"
                                wire:model="join_date">
                            </div>
                            <div class="col-lg-6">
                                <input id="end_date_employee" type="date" class="form-control form-control-sm"
                                wire:model="end_date">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Long Contract? <span class="text-c-red">*</span></label>
                        <button class="btn btn-sm btn-outline-secondary" type="button" wire:click="$emit('contractCalc')">Calculate</button>
                        <input type="hidden" class="form-control" value="Aktif" wire:model="status">
                    </div>
                </div>
                <div class="md-form mb-3">
                    <label>Contract =&nbsp</label><label class="font-weight-bold">{{ (@$contract_duration) ? $contract_duration : '0' }} days</label>
                    <input type="hidden" class="form-control form-control-sm" wire:model="contract_duration" readonly>
                    @error('contract_duration') <span class="text-danger error">{{ $message }}</span>@enderror
                </div>

                <div class="md-form mb-3">
                    <label>Addition Information</label>
                    <textarea class="form-control form-control-sm" wire:model="addition_information"></textarea>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-right">
                <button wire:click.prevent="cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button wire:click.prevent="update" class="btn btn-primary waves-effect waves-light">Submit</button>
            </div>
        </div>
    </div>
    @push('employee-update-script')
    <script type="text/javascript">
        window.livewire.on('employeeUpdate', () => {
            $('#modalEditEmployee').modal('hide');
        });
    </script>
    @endpush
</div>
