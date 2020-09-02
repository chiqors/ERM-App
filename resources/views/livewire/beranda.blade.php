@extends('layouts.app', ['activeMenu' => 'beranda'])

@section('hstyles')

@endsection

@section('content')
<!--Modal Pop Up Form tambah employee-->
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
            <form>
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
                        <label>Contract (Days) =&nbsp</label><label id="contract" class="font-weight-bold"></label>
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
            </form>
            <div class="modal-footer d-flex justify-content-right">
                <button wire:click.prevent="store_employee()" class="btn btn-primary waves-effect waves-light"
                    data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>
<!--Modal Pop Up Form Edit employee-->
<div class="modal fade" id="modalEditEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Edit Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                    <select class="form-control">
                        <option>--Select Job--</option>
                        <option>CTO</option>
                        <option>HRD</option>
                        <option>Programer</option>
                    </select>
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
            <div class="modal-footer d-flex justify-content-right">
                <input type="submit" class="btn btn-primary waves-effect waves-light" value="Submit">
            </div>
        </div>
    </div>
</div>
<!--Modal Pop Up Form Lihat Detail employee-->
<div class="modal fade" id="modalDetailEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Detail Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
            <div class="modal-footer d-flex justify-content-right">
                <input type="submit" class="btn btn-primary waves-effect waves-light" value="Submit">
            </div>
        </div>
    </div>
</div>
<!--Modal Pop Up Form Upload File employee-->
<div class="modal fade" id="modalUploadFileEmployee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Upload File</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-3">
                    <label>Employee Name</label>
                    <input type="text" class="form-control form-control-sm" readonly>
                </div>
                <div class="md-form mb-3">
                    <label>CV</label>
                    <input type="file" class="form-control-file border">
                </div>
                <div class="md-form mb-3">
                    <label>KTP</label>
                    <input type="file" class="form-control-file border">
                </div>
                <div class="md-form mb-3">
                    <label>Certificate</label>
                    <input type="file" class="form-control-file border">
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-right">
                <input type="submit" class="btn btn-primary waves-effect waves-light" value="Submit">
            </div>
        </div>
    </div>
</div>
<!--Modal Pop Up Form event-->
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
<!-- PAGE INNER CONTENT -->
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-xl-6 col-12">
                        <div class="full-calender">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Full Calender</h5>
                                    <div class="card-header-right">
                                        <!--Button Panggil Pop Up-->
                                        <div class="text-center">
                                            <a href="" class="btn btn-default btn-sm icofont icofont-plus"
                                                data-toggle="modal" data-target="#modalAddEvent"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12">
                                            <div id='calendar'></div>
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
                        </div>
                    </div>
                    <div class="col-xl-6 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Event</h5>
                            </div>
                            <div class="card-block table-border-style">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>File</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>the Bird</td>
                                                <td>@twitter</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Employee</h5>
                                <div class="card-header-right">
                                    <!--Button Panggil Pop Up-->
                                    <div class="text-center">
                                        <a href="" class="btn btn-default btn-sm icofont icofont-plus"
                                            data-toggle="modal" data-target="#modalAddEmployee"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-block">
                                <div class="table-responsive dt-responsive">
                                    <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th width="50">File</th>
                                                <th width="70">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td><a href="" class="icofont icofont-download mr-3"></a>
                                                    <a href="" class="icofont icofont-upload" data-toggle="modal"
                                                        data-target="#modalUploadFileEmployee"></a></td>
                                                <td><a href="" class="icofont icofont-edit mr-3" data-toggle="modal"
                                                        data-target="#modalEditEmployee"></a>
                                                    <a href="" class="icofont icofont-bin mr-3"></a>
                                                    <a href="" class="icofont icofont-file-text" data-toggle="modal"
                                                        data-target="#modalDetailEmployee"></a></td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>Accountant</td>
                                                <td><a href="" class="icofont icofont-download mr-3"></a>
                                                    <a href="" class="icofont icofont-upload" data-toggle="modal"
                                                        data-target="#modalUploadFileEmployee"></a></td>
                                                <td><a href="" class="icofont icofont-edit mr-3" data-toggle="modal"
                                                        data-target="#modalEditEmployee"></a>
                                                    <a href="" class="icofont icofont-bin mr-3"></a>
                                                    <a href="" class="icofont icofont-file-text" data-toggle="modal"
                                                        data-target="#modalDetailEmployee"></a></td>
                                            </tr>
                                            <tr>
                                                <td>Ashton Cox</td>
                                                <td>Junior Technical Author</td>
                                                <td><a href="" class="icofont icofont-download mr-3"></a>
                                                    <a href="" class="icofont icofont-upload" data-toggle="modal"
                                                        data-target="#modalUploadFileEmployee"></a></td>
                                                <td><a href="" class="icofont icofont-edit mr-3" data-toggle="modal"
                                                        data-target="#modalEditEmployee"></a>
                                                    <a href="" class="icofont icofont-bin mr-3"></a>
                                                    <a href="" class="icofont icofont-file-text" data-toggle="modal"
                                                        data-target="#modalDetailEmployee"></a></td>
                                            </tr>
                                            <tr>
                                                <td>Cedric Kelly</td>
                                                <td>Senior Javascript Developer</td>
                                                <td><a href="" class="icofont icofont-download mr-3"></a>
                                                    <a href="" class="icofont icofont-upload" data-toggle="modal"
                                                        data-target="#modalUploadFileEmployee"></a></td>
                                                <td><a href="" class="icofont icofont-edit mr-3" data-toggle="modal"
                                                        data-target="#modalEditEmployee"></a>
                                                    <a href="" class="icofont icofont-bin mr-3"></a>
                                                    <a href="" class="icofont icofont-file-text" data-toggle="modal"
                                                        data-target="#modalDetailEmployee"></a></td>
                                            </tr>
                                            <tr>
                                                <td>Airi Satou</td>
                                                <td>Accountant</td>
                                                <td><a href="" class="icofont icofont-download mr-3"></a>
                                                    <a href="" class="icofont icofont-upload" data-toggle="modal"
                                                        data-target="#modalUploadFileEmployee"></a></td>
                                                <td><a href="" class="icofont icofont-edit mr-3" data-toggle="modal"
                                                        data-target="#modalEditEmployee"></a>
                                                    <a href="" class="icofont icofont-bin mr-3"></a>
                                                    <a href="" class="icofont icofont-file-text" data-toggle="modal"
                                                        data-target="#modalDetailEmployee"></a></td>
                                            </tr>
                                            <tr>
                                                <td>Brielle Williamson</td>
                                                <td>Integration Specialist</td>
                                                <td><a href="" class="icofont icofont-download mr-3"></a>
                                                    <a href="" class="icofont icofont-upload" data-toggle="modal"
                                                        data-target="#modalUploadFileEmployee"></a></td>
                                                <td><a href="" class="icofont icofont-edit mr-3" data-toggle="modal"
                                                        data-target="#modalEditEmployee"></a>
                                                    <a href="" class="icofont icofont-bin mr-3"></a>
                                                    <a href="" class="icofont icofont-file-text" data-toggle="modal"
                                                        data-target="#modalDetailEmployee"></a></td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('fscripts')
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/pages/data-table/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/pages/data-table/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/pages/data-table/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/pages/data-table/js/data-table-custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/classie.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/moment/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/fullcalendar/js/fullcalendar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/full-calender/calendar.js') }}"></script>

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

@endsection
