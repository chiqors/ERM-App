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
                        @livewire('home.event-current')
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
        @stack("employee-script")
        <script type="text/javascript">
            // Hack to enable multiple modals by making sure the .modal-open class
            // is set to the <body> when there is at least one modal open left
            $('body').on('hidden.bs.modal', function () {
                if($('.modal.show').length > 0)
                {
                    $('body').addClass('modal-open');
                }
            });
        </script>
    @endpush
</div>
