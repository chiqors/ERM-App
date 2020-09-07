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
                <div class="md-form mb-3">
                    <label>Event Name</label>
                    <input type="text" class="form-control ">
                </div>
                <div class="md-form mb-3">
                    <label>Employee Name</label>
                    <select class="form-control">
                        <option>--Select Employee--</option>
                        <option>Employee 1</option>
                        <option>Employee 2</option>
                        <option>Employee 3</option>
                        <option>Employee 4</option>
                    </select>
                </div>
                <div class="md-form mb-3">
                    <label>Event Type</label>
                    <select class="form-control">
                        <option>--Select Event--</option>
                        <option>One Time</option>
                        <option>Recurring 2</option>
                    </select>
                </div>
                <div class="md-form mb-3">
                    <label>Start Date</label>
                    <input type="datetime-local" class="form-control ">
                </div>
                <div class="md-form mb-3">
                    <label>End Date</label>
                    <input type="datetime-local" class="form-control ">
                </div>
                <div class="md-form mb-3">
                    <label>Event Details</label>
                    <textarea class="form-control form-control-sm"></textarea>
                </div>
                <div class="modal-footer d-flex justify-content-right">
                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="Submit">
                </div>
            </div>
        </div>
    </div>
</div>
