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
        <div class="row mb-4">
            <div class="col-12 col-lg-6 form-inline">
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-6 col-form-label">Per Page:</label>
                        <div class="col-sm-6">
                            <select wire:model="perPage" class="form-control form-bg-purle fill">
                                <option>10</option>
                                <option>15</option>
                                <option>25</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="input-group">
                    <input wire:model="search" type="text" class="form-control" placeholder="Full Name / Position">
                    <span class="input-group-append">
                        <label class="input-group-text"><i class="icofont icofont-ui-search"></i></label>
                    </span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="table-responsive dt-responsive" style="border: 1px solid #dee2e6;">
                    <table class="table table-striped table-bordered nowrap">
                        <thead>
                            <tr>
                                <th><a wire:click.prevent="sortBy('full_name')" role="button" href="#">
                                    Name
                                    @include('includes.dt-sorticon', ['field' => 'full_name'])
                                </a></th>
                                <th><a wire:click.prevent="sortBy('position')" role="button" href="#">
                                    Position
                                    @include('includes.dt-sorticon', ['field' => 'position'])
                                </a></th>
                                <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                                    Status
                                    @include('includes.dt-sorticon', ['field' => 'status'])
                                </a></th>
                                <th width="50">
                                    File
                                </th>
                                <th width="70">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!$employees->isEmpty())
                            @foreach ($employees as $emp)
                            <tr>
                                <td>{{ $emp->full_name }}</td>
                                <td>{{ $emp->position }}</td>
                                <td>{!! ($emp->status=="Active") ? '<i
                                        class="icofont icofont-tick-mark"></i> Active' : '<i
                                        class="icofont icofont-close"></i> Inactive' !!}</td>
                                <td>
                                    <a style="cursor: pointer" wire:click="show({{ $emp->id }})" class="icofont icofont-download mr-3" data-toggle="modal"
                                    data-target="#modalDownloadEmployee"></a>
                                    <a style="cursor: pointer" wire:click="edit({{ $emp->id }})" class="icofont icofont-upload" data-toggle="modal"
                                        data-target="#modalUploadEmployee"></a></td>
                                <td>
                                    <a style="cursor: pointer" wire:click="edit({{ $emp->id }})" class="icofont icofont-edit mr-3" data-toggle="modal"
                                        data-target="#modalEditEmployee"></a>
                                    <a style="cursor: pointer" wire:click="confirm_delete({{ $emp->id }})" class="icofont icofont-bin mr-3" data-toggle="modal" data-target="#modalDeleteEmployee"></a>
                                    <a style="cursor: pointer" wire:click="show({{ $emp->id }})" class="icofont icofont-file-text" data-toggle="modal"
                                        data-target="#modalShowEmployee"></a></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">
                                    No data available
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                {{ $employees->links() }}
            </div>

            <div class="col text-right text-muted">
                Showing {{ $employees->firstItem() }} to {{ $employees->lastItem() }} out of {{ $employees->total() }} results
            </div>
        </div>
    </div>
    <!--Modal Pop Up Form create employee-->
    @include('livewire.home.modals.employee-create')
    <!--Modal Pop Up Form edit employee-->
    @include('livewire.home.modals.employee-edit')
    <!--Modal Pop Up Form view/show employee-->
    @include('livewire.home.modals.employee-show')
    <!--Modal Pop Up Form upload files employee-->
    @include('livewire.home.modals.employee-upload')
    <!--Modal Pop Up Form download files employee-->
    @include('livewire.home.modals.employee-download')
    <!--Modal Pop Up Confirm delete employee-->
    @include('livewire.home.modals.employee-delete')

    @push('employee-script')
        @stack('employee-create-script')
        @stack('employee-update-script')
        @stack('employee-upload-script')
        @stack('employee-delete-script')
    @endpush
</div>

