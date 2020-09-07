<div class="modal fade" id="modalAddEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-3">
                        <label>Employee Name</label>
                        <input type="text" class="form-control form-control-sm" wire:model="full_name">
                    </div>

                    <div class="md-form mb-3">
                        <label>Position</label>
                        <select class="form-control form-control-sm" wire:model="position">
                            <option value="Regular">Regular</option>
                            <option value="Manager">Manager</option>
                            <option value="Manager">Secretary</option>
                            <option value="Manager">Owner</option>
                        </select>
                    </div>

                    <div class="md-form mb-3">
                        <label>Join Date</label>
                        <input id="join_date_employee" type="date" class="form-control form-control-sm"
                            wire:model="join_date">
                    </div>

                    <div class="md-form mb-3">
                        <label>End Date</label>
                        <input id="end_date_employee" type="date" class="form-control form-control-sm"
                            wire:model="end_date">
                        <input type="hidden" class="form-control" value="Aktif" wire:model="status">
                    </div>

                    <div class="md-form mb-3">
                        <label>Contract (Days) =&nbsp</label><label id="contract" class="font-weight-bold">0</label>
                        <input type="hidden" class="form-control form-control-sm" wire:model="contract" readonly>
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
                    <button wire:click.prevent="store_employee"
                        class="btn btn-primary waves-effect waves-light">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
