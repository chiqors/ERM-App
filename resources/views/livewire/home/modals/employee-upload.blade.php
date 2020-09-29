<div wire:ignore.self class="modal fade" id="modalUploadEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"><i class="icofont icofont-cloud-upload"></i> Upload Center</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-3">
                    <label>Employee Directory</label>
                    <input type="text" class="form-control form-control-sm" value="{{ $employee_id.'-'.$full_name }}" readonly>
                </div>

                <hr class="hr-text" data-content="Files Information">

                <div class="md-form row">
                    <div class="col-lg-4">
                        <label><i class="icofont icofont-card"></i> KTP {!! (!empty($ktp)) ? '<span class="font-weight-bold">(Exists)</span>' : '' !!}</label>
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
                        <label><i class="icofont icofont-paper"></i> CV {!! (!empty($cv)) ? '<span class="font-weight-bold">(Exists)</span>' : '' !!}</label>
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
                        <label><i class="icofont icofont-certificate"></i> Certificate {!! (!empty($certificate)) ? '<span class="font-weight-bold">(Exists)</span>' : '' !!}</label>
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
                <div wire:loading.remove wire:target="upload">
                    <button wire:click.prevent="cancel" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Cancel</button>
                    <button wire:click.prevent="upload" class="btn btn-warning waves-effect waves-light"><i class="icofont icofont-upload"></i> Upload</button>
                </div>
                <div wire:loading wire:target="upload" wire:loading.class="btn btn-outline-info waves-effect waves-light disabled">
                    <i class="icofont icofont-cloud-upload"></i> Loading..
                </div>
            </div>
        </div>
    </div>
    @push('employee-upload-script')
    <script type="text/javascript">
        window.livewire.on('employeeUploadFiles', () => {
            $('#modalUploadEmployee').modal('hide');
        });
    </script>
    @endpush
</div>
