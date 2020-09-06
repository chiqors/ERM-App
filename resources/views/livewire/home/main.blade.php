<div class="pcoded-inner-content">

    @push("styles")
        <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/fullcalendar/css/fullcalendar.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('bower_components/fullcalendar/css/fullcalendar.print.css') }}" media='print'>
        <link rel="stylesheet" type="text/css"
            href="{{ asset('bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/pages/data-table/css/buttons.dataTables.min.css') }}">
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

    <div wire:ignore>
        <!--Modal Pop Up Form create employee-->
        @livewire('home.modals.employee-create')

        <!--Modal Pop Up Form edit employee-->
        @livewire('home.modals.employee-edit')

        <!--Modal Pop Up Form view employee-->
        @livewire('home.modals.employee-view')

        <!--Modal Pop Up Form files employee-->
        @livewire('home.modals.employee-files')

        <!--Modal Pop Up Form create event-->
        @livewire('home.modals.event-create')
    </div>

    @push('scripts')
        <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/pages/data-table/js/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/pages/data-table/js/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/pages/data-table/js/vfs_fonts.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
        </script>
        <script src="{{ asset('assets/pages/data-table/js/data-table-custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/classie.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/moment/js/moment.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('bower_components/fullcalendar/js/fullcalendar.min.js') }}"></script>
        @stack("calender-script")
        <script type="text/javascript">
            function daysdifference(firstDate, secondDate) {
                var startDay = new Date(firstDate);
                var endDay = new Date(secondDate);

                var millisBetween = startDay.getTime() - endDay.getTime();
                var days = millisBetween / (1000 * 3600 * 24);

                return Math.round(Math.abs(days));
            }
            $(function () {
                $("#end_date_employee").blur(function () {
                    var join_date = $("#join_date_employee").val();
                    var end_date = $("#end_date_employee").val();
                    var contract_result = daysdifference(join_date, end_date);
                    $("#contract").text(contract_result);
                });
            });
        </script>
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
