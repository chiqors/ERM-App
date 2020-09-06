<div class="full-calender">
    <div class="card">
        <div class="card-header">
            <h5>Full Calender</h5>
            <div class="card-header-right">
                <!--Button Panggil Pop Up-->
                <div class="text-center">
                    <a href="" class="btn btn-default btn-sm icofont icofont-plus" data-toggle="modal"
                        data-target="#modalAddEvent"></a>
                </div>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div id='calender'></div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-error">
        <div class="card text-center">
            <div class="card-block">
                <div class="m-t-10">
                    <i class="icofont icofont-warning text-white bg-c-yellow"></i>
                    <h4 class="f-w-600 m-t-25">Not supported</h4>
                    <p class="text-muted m-b-0">Full Calender not supported
                        in this device
                    </p>
                </div>
            </div>
        </div>
    </div>

    @push('calender-script')
        <script type="text/javascript">
            $(document).ready(function () {
                $('#calender').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,listMonth'
                    },
                    navLinks: true,
                    businessHours: false,
                    editable: false,
                    droppable: false,
                    drop: function () {
                        if ($('#checkbox2').is(':checked')) {
                            $(this).remove();
                        }
                    },
                    events: {!! $calendar !!}
                });
            });
        </script>
    @endpush
</div>
