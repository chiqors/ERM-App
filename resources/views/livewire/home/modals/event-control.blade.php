<div class="modal fade" id="modalControllEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Event Control</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <table id="EventList" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <tr>
                                            <th>Employee Name</th>
                                            <th>Event Name</th>
                                            <th>Event Type</th>
                                            <th>Event Start</th>
                                            <th>Event End</th>
                                            <th>Event Details</th>
                                            <th width="50">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(@$eventcontrol)
                                        @foreach($eventcontrol as $evn)
                                        <tr>
                                            <td>{{ $evn->employee->full_name }}</td>
                                            <td>{{ $evn->event->event_name }}</td>
                                            <td>{{ $evn->event->event_type }}</td>
                                            <td>{{ $evn->event->event_start }}</td>
                                            <td>{{ $evn->event->event_end }}</td>
                                            <td>{{ $evn->event->event_details }}</td>
                                            <td><a href="" class="icofont icofont-edit mr-3" data-toggle="modal"
                                                    data-target="#modalEditEvent" data-dismiss="modal"></a>
                                                <a href="" class="icofont icofont-bin mr-3"></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
