<div wire:ignore.self class="modal fade" id="modalDownloadEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold"><i class="icofont icofont-cloud-download"></i> Download Center</h4>
                <button wire:click="cancel" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                @include('includes.employee-messages')
                <div wire:loading wire:target="download" wire:loading.class="btn btn-outline-info waves-effect waves-light disabled">
                    <i class="icofont icofont-cloud-download"></i> Processing..
                </div>
                <div class="md-form mb-3">
                    <label>Employee Directory</label>
                    <input type="text" class="form-control form-control-sm" value="{{ $employee_id.'-'.$full_name }}" readonly>
                </div>

                <hr class="hr-text" data-content="Files Information">

                <div
                    class="md-form mb-3 d-flex justify-content-around"
                    x-data="{}"
                    x-init="
                        @this.on('download', (folder,file) => {
                            window.location = '/download/'+folder+'/'+file;
                        })
                ">
                    @if(empty($ktp) && empty($cv) && empty($certificate))
                    <div class="btn btn-outline-info waves-effect waves-light disabled">
                        <i class="icofont icofont-info"></i> No download available!
                    </div>
                    @else
                    @if(!empty($ktp))
                    <button wire:click.prevent="download('{{ $dir_name }}','{{ $ktp }}')" class="btn btn-outline-primary waves-effect waves-light"><i class="icofont icofont-card"></i> KTP</button>
                    @endif
                    @if(!empty($cv))
                    <button wire:click.prevent="download('{{ $dir_name }}','{{ $cv }}')" class="btn btn-outline-primary waves-effect waves-light"><i class="icofont icofont-paper"></i> CV</button>
                    @endif
                    @if(!empty($certificate))
                    <button wire:click.prevent="download('{{ $dir_name }}','{{ $certificate }}')" class="btn btn-outline-primary waves-effect waves-light"><i class="icofont icofont-certificate"></i> Certificate</button>
                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
