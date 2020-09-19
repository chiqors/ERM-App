<div wire:ignore.self class="modal fade" id="modalCreateEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Employee</h4>
            </div>
            <div>
                <div class="modal-body mx-3">
                    <div class="md-form row mb-3">
                        <div class="col-lg-6">
                            <label>Employee Name <span class="text-c-red">*</span></label>
                            <input type="text" class="form-control form-control-sm" wire:model="full_name">
                            @error('full_name') <span class="text-danger error">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-lg-6">
                            <label>Position <span class="text-c-red">*</span></label>
                            <input type="text" class="form-control form-control-sm" wire:model="position">
                            @error('position') <span class="text-danger error">{{ $message }}</span>@enderror
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
                            <input type="hidden" class="form-control" value="Aktif" wire:model="status">
                        </div>
                    </div>
                    <div class="md-form mb-3">
                        <label>Contract =&nbsp</label><label class="font-weight-bold">{{ (is_null(@$contract_duration)) ? '-' : (($contract_duration == 0) ? 'Permanent' : $contract_duration.' days') }}</label>
                        <input type="hidden" class="form-control form-control-sm" wire:model="contract_duration" readonly>
                        @error('contract_duration') <span class="text-danger error">{{ $message }}</span> @enderror
                    </div>

                    <hr class="hr-text" data-content="Additional Information">

                    <div class="md-form mb-3">
                        <label>Addition Information</label>
                        <textarea class="form-control form-control-sm" wire:model="addition_information"></textarea>
                    </div>

                    <div class="md-form row">
                        <div class="col-lg-4">
                            <label><i class="icofont icofont-card"></i> KTP</label>
                            <div
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <!-- File Input -->
                                <input type="file" class="form-control-file border" wire:model="ktp">
    
                                <!-- Progress Bar -->
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            @error('ktp') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-lg-4">
                            <label><i class="icofont icofont-paper"></i> CV</label>
                            <div
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <!-- File Input -->
                                <input type="file" class="form-control-file border" wire:model="cv">
    
                                <!-- Progress Bar -->
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            @error('cv') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-lg-4">
                            <label><i class="icofont icofont-certificate"></i> Certificate</label>
                            <div
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <!-- File Input -->
                                <input type="file" class="form-control-file border" wire:model="certificate">
    
                                <!-- Progress Bar -->
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
                            </div>
                            @error('certificate') <span class="text-danger error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-right">
                    <div wire:loading.remove wire:target="store">
                        <button wire:click.prevent="cancel" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Cancel</button>
                        <button wire:click.prevent="store" class="btn btn-primary waves-effect waves-light"><i class="icofont icofont-upload"></i> Store</button>
                    </div>
                    <div wire:loading wire:target="store" wire:loading.class="btn btn-info waves-effect waves-light disabled">
                        <i class="icofont icofont-cloud-upload"></i> Loading..
                    </div>
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
