<div wire:ignore.self class="modal fade" id="modalDeleteEmployee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Emloyee</h5>
            </div>
            <div class="modal-body"> Do you want to delete <span class="font-weight-bold">{{ $full_name }}</span>?</div>
            <div class="modal-footer d-flex justify-content-right">
                <div wire:loading.remove wire:target="delete">
                    <button wire:click.prevent="cancel" class="btn btn-secondary waves-effect waves-light" data-dismiss="modal">Cancel</button>
                    <button wire:click.prevent="delete" class="btn btn-danger waves-effect waves-light"><i class="icofont icofont-trash"></i> Delete</button>
                </div>
                <div wire:loading wire:target="delete" wire:loading.class="btn btn-outline-info waves-effect waves-light disabled">
                    <i class="icofont icofont-cloud-upload"></i> Loading..
                </div>
            </div>
        </div>
    </div>
    @push('employee-delete-script')
    <script type="text/javascript">
        window.livewire.on('employeeDelete', () => {
            $('#modalDeleteEmployee').modal('hide');
        });
    </script>
    @endpush
</div>
