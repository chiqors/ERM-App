<div class="modal fade" id="modalAddEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Add Event</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                    </select>
                </div>

                <div class="md-form mb-3">
                    <label>Date</label>
                    <input type="date" class="form-control ">
                </div>
                <div class="md-form mb-3">
                    <label>Duration</label>
                    <form class="form-inline">
                        <input type="text" class="form-control form-control mb-2 mr-sm-3">
                        <div class="form-check form-check-inline mb-2 mr-sm-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option1">
                                Day
                            </label>
                        </div>
                        <div class="form-check form-check-inline mb-2 mr-sm-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option2">
                                Month
                            </label>
                        </div>
                        <div class="form-check form-check-inline mb-2 mr-sm-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" value="option3">
                                Year
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-right">
                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="Submit">
                </div>
            </div>
        </div>
    </div>
</div>
