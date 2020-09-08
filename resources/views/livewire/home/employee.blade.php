<div class="card">
    <div class="card-header">
        <h5>Employee</h5>
        <div class="card-header-right">
            <div class="text-center">
                <a href="" class="btn btn-default btn-sm icofont icofont-plus"
                    data-toggle="modal" data-target="#modalCreateEmployee"></a>
            </div>
        </div>
    </div>
    <div class="card-block">
        @include('includes.messages')
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
                        <td>{!! ($emp->status=="Active") ? '<i
                                class="icofont icofont-tick-mark"></i> Active' : '<i
                                class="icofont icofont-close"></i> Inactive' !!}</td>
                        <td><a href="" class="icofont icofont-download mr-3"></a>
                            <a href="" class="icofont icofont-upload" data-toggle="modal"
                                data-target="#modalUploadFileEmployee"></a></td>
                        <td><a style="cursor: pointer" wire:click="edit({{ $emp->id }})" class="icofont icofont-edit mr-3" data-toggle="modal"
                                data-target="#modalEditEmployee"></a>
                            <a style="cursor: pointer" wire:click="confirm_delete({{ $emp->id }})" class="icofont icofont-bin mr-3" data-toggle="modal" data-target="#modalDeleteEmployee"></a>
                            <a href="" class="icofont icofont-file-text" data-toggle="modal"
                                data-target="#modalShowEmployee"></a></td>
                    </tr>
                    @endforeach
                    @endif
            </table>
        </div>
    </div>
    <!--Modal Pop Up Form create employee-->
    @include('livewire.home.modals.employee-create')
    <!--Modal Pop Up Form edit employee-->
    @include('livewire.home.modals.employee-edit')
    <!--Modal Pop Up Form view/show employee-->
    @include('livewire.home.modals.employee-show')
    <!--Modal Pop Up Confirm delete employee-->
    @include('livewire.home.modals.employee-delete')
</div>

