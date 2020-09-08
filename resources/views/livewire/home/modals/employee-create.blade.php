<div wire:ignore.self class="modal fade" id="modalCreateEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Employee</h4>
            </div>
            <div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-3">
                        <label>Employee Name <span class="text-c-red">*</span></label>
                        <input type="text" class="form-control form-control-sm" wire:model="full_name">
                        @error('full_name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>

                    <div class="md-form mb-3">
                        <label>Position <span class="text-c-red">*</span></label>
                        <input type="text" class="form-control form-control-sm" wire:model="position">
                        @error('position') <span class="text-danger error">{{ $message }}</span>@enderror
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
                            <label>Contracts <span class="text-c-red">*</span></label>
                            <button class="btn btn-sm btn-outline-secondary" type="button" wire:click="$emit('contractCalc')">Calculate</button>
                            <input type="hidden" class="form-control" value="Aktif" wire:model="status">
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <label>Contract =&nbsp</label><label class="font-weight-bold">{{ (@$contract_duration) ? $contract_duration : '0' }} days</label>
                        <input type="hidden" class="form-control form-control-sm" wire:model="contract_duration" readonly>
                    </div>

                    <div class="md-form mb-3">
                        <label>Addition Information</label>
                        <textarea class="form-control form-control-sm" wire:model="addition_information"></textarea>
                    </div>

                    <div class="md-form mb-3">
                        <label>CV</label>
                        <input type="file" class="form-control-file border">
                    </div>
                    <div class="md-form mb-3">
                        <label>KTP</label>
                        <input type="file" class="form-control-file border">
                    </div>
                    <div class="md-form">
                        <label>Certificate</label>
                        <input type="file" class="form-control-file border">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-right">
                    <button wire:click.prevent="cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button wire:click.prevent="store" class="btn btn-primary waves-effect waves-light">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @push('employee-create-script')
    <script type="text/javascript">
        window.livewire.on('employeeStore', () => {
            $('#modalCreateEmployee').modal('hide');
        });
    </script>
    @endpush
</div>
