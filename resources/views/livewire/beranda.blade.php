@extends('layouts.app', ['activeMenu' => 'beranda'])

@section('hstyles')

@endsection

@section('content')
<div class="pcoded-content">
    <!-- PAGE INNER CONTENT -->
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <!-- HERE IS THE EXAMPLE CONTENT-->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Mingguan</h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li><i class="fa fa fa-wrench open-card-option"></i>
                                            </li>
                                            <li><i class="fa fa-window-maximize full-card"></i></li>
                                            <li><i class="fa fa-minus minimize-card"></i></li>
                                            <li><i class="fa fa-refresh reload-card"></i></li>
                                            <li><i class="fa fa-trash close-card"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable"
                                            class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Jumlah Rekam Medis Minggu Ini</th>
                                                    <th>Tempat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Data 1</td>
                                                    <td>0 Kali</td>
                                                    <td>Data 2 0 - 0</td>
                                                    <td>
                                                        <a href="#" class="btn btn-sm btn-primary">Pantau >></a>
                                                    </td>
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
</div>
@endsection

@section('fscripts')
<script type="text/javascript" src="{{ asset('assets/pages/dashboard/my-dashboard.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<script src="{{ asset('assets/pages/chart/float/jquery.flot.js') }}"></script>
<script src="{{ asset('assets/pages/chart/float/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('assets/pages/chart/float/curvedLines.js') }}"></script>
<script src="{{ asset('assets/pages/chart/float/jquery.flot.tooltip.min.js') }}"></script>

<script src="{{ asset('assets/pages/widget/amchart/amcharts.js') }}"></script>
<script src="{{ asset('assets/pages/widget/amchart/gauge.js') }}"></script>
<script src="{{ asset('assets/pages/widget/amchart/serial.js') }}"></script>
<script src="{{ asset('assets/pages/widget/amchart/light.js') }}"></script>
<script src="{{ asset('assets/pages/widget/amchart/pie.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('assets/pages/widget/excanvas.js') }}"></script>

<script src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>
@endsection
