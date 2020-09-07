<div class="row">
    <div class="col-xl-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5>Event Today</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="dataTables center">
                    <table id="EventListToday" class="table table-striped table-bordered nowrap">
                        <thead >
                            <tr role="row" style="height: 0px;">
                                    <th>Full Name</th>
                                    <th>Event Name</th>
                                    <th>Event Type</th>
                                    <th>Event Start</th>
                                    <th>Event End</th>
                                    <th>Event Details</th>
                                    <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(@$eventtoday)
                            @foreach($eventtoday as $evn)
                            <tr>
                                <td>{{ $evn->employee->full_name }}</td>
                                <td>{{ $evn->event->event_name }}</td>
                                <td>{{ $evn->event->event_type }}</td>
                                <td>{{ $evn->event->event_start }}</td>
                                <td>{{ $evn->event->event_end }}</td>
                                <td>{{ $evn->event->event_details }}</td>
                                <td><a href="" class="icofont icofont-check mr-3"></a>
                                    <a href="" class="icofont icofont-close mr-3"></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
