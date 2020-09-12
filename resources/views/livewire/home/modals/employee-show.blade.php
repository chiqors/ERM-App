<div wire:ignore.self class="modal fade" id="modalShowEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Detail Employee</h4>
                <button wire:click="cancel" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-3">
                    <label>Employee Name</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="md-form mb-3">
                    <label>Position</label>
                    <input type="text" class="form-control form-control-sm">
                </div>
                <div class="md-form mb-3">
                    <label>Join Date</label>
                    <input type="date" class="form-control form-control-sm">
                </div>
                <div class="md-form mb-3">
                    <label>End Date</label>
                    <input type="date" class="form-control form-control-sm">
                </div>
                <div class="md-form mb-3">
                    <label>Contract</label>
                    <input type="text" class="form-control form-control-sm" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
