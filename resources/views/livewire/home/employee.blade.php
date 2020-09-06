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
                        <th>Position</th>
                        <th>Status</th>
                        <th width="50">File</th>
                        <th width="70">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(@$employees)
                    @foreach($employees as $emp)
                    <tr>
                        <td>{{ $emp->full_name }}</td>
                        <td>{{ $emp->position }}</td>
                        <td>{!! ($emp->status=="Aktif") ? '<i
                                class="icofont icofont-tick-mark"></i> Aktif' : '<i
                                class="icofont icofont-close"></i> Tidak Aktif' !!}</td>
                        <td><a href="" class="icofont icofont-download mr-3"></a>
                            <a href="" class="icofont icofont-upload" data-toggle="modal"
                                data-target="#modalUploadFileEmployee"></a></td>
                        <td><a href="" class="icofont icofont-edit mr-3" data-toggle="modal"
                                data-target="#modalEditEmployee"></a>
                            <a href="" class="icofont icofont-bin mr-3"></a>
                            <a href="" class="icofont icofont-file-text" data-toggle="modal"
                                data-target="#modalDetailEmployee"></a></td>
                    </tr>
                    @endforeach
                    @endif
            </table>
        </div>
    </div>
</div>

