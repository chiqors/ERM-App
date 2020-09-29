<div wire:ignore.self class="modal fade" id="modalEditEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Employee</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form row mb-3">
                    <div class="col-lg-4">
                        <label>Employee Name <span class="text-c-red">*</span></label>
                        <input type="text" class="form-control form-control-sm" wire:model="full_name">
                        @error('full_name') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-lg-4">
                        <label>Position <span class="text-c-red">*</span></label>
                        <input type="text" class="form-control form-control-sm" wire:model="position">
                        @error('position') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-lg-4">
                        <label>Status <span class="text-c-red">*</span></label>
                        <select class="form-control form-control-sm" wire:model="status">
                            <option value="">-- CHOOSE --</option>
                            <option value="Active" {{ ($status == "Active") ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ ($status == "Active") ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </div>

                @include('includes.employee-contract')

                <div class="md-form row mb-3">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Join Date <span class="text-c-red">*</span></label>
                                <input id="join_date_employee" type="date" class="form-control form-control-sm"
                                wire:model="join_date">
                                @error('join_date') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-lg-6">
                                <label>End Date (Blank, if permanent)</label>
                                <input id="end_date_employee" type="date" class="form-control form-control-sm"
                                wire:model="end_date">
                                @error('end_date') <span class="text-danger error">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Contracts <span class="text-c-red">*</span></label>
                        <button class="btn btn-sm btn-primary" type="button" wire:click="$emit('contractCalc')"><span class="icofont icofont-calculations"></span> Calculate</button>
                    </div>
                </div>

                <div class="md-form mb-3">
                    <label>Contract =&nbsp</label><label class="font-weight-bold">{{ (is_null(@$contract_duration)) ? '-' : (($contract_duration == 0) ? 'Permanent' : $contract_duration.' days') }}</label>
                    <input type="hidden" class="form-control form-control-sm" wire:model="contract_duration" readonly>
                    @error('contract_duration') <span class="text-danger error">{{ $message }}</span> @enderror
                </div>

                <div class="md-form mb-3">
                    <label>Addition Information</label>
                    <textarea class="form-control form-control-sm" wire:model="addition_information"></textarea>
                </div>

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
    @push('employee-update-script')
    <script type="text/javascript">
        window.livewire.on('employeeUpdate', () => {
            $('#modalEditEmployee').modal('hide');
        });
    </script>
    @endpush
</div>
