<div class="pcoded-inner-content">

    @push("styles")
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/fullcalendar/css/fullcalendar.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('bower_components/fullcalendar/css/fullcalendar.print.css') }}" media='print'>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
    @endpush

    <!-- PAGE INNER CONTENT -->
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-xl-6 col-12">
                        @livewire('home.calender')
                    </div>
                    <div class="col-xl-6 col-12">
                        @livewire('home.event')
                        @livewire('home.card')
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-12">
                        @livewire('home.employee')
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript" src="{{ asset('assets/js/classie.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/moment/js/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/fullcalendar/js/fullcalendar.min.js') }}"></script>
        @stack("calender-script")
        @stack('employee-create-script')
        @stack('employee-update-script')
        @stack('employee-delete-script')
        <script type="text/javascript">
            $(document).ready(function () {
                $('#EventList').DataTable();
                $('#EventListToday').DataTable( {
                    "searching": false,
                    "ordering": false,
                    "scrollY": 200,
                    "scrollX": true,
                    "paging": false,
                    "scrollCollapse": true,
                    "fixedColumns": true
                });
            });
        </script>
    @endpush
</div>
