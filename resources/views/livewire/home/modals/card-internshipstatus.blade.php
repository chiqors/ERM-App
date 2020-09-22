<div wire:ignore.self class="modal fade" id="modalCardInternshipStatus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Internship Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
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
                </div>
        
                <div class="row">
                    <div class="col">
                        <div class="table-responsive dt-responsive" style="border: 1px solid #dee2e6;">
                            <table class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th width="70">
                                            Name
                                        </th>
                                        <th width="70">
                                            Position
                                        </th>
                                        <th width="70">
                                            Contract
                                        </th>
                                        <th width="70">
                                            Status
                                        </th>
                                        <th width="70">
                                            Action
                                        </th>
                                </thead>
                                <tbody>
                                    @if(!$internshipstatus->isEmpty())
                                    @foreach ($internshipstatus as $emp)
                                    <tr>
                                        <td>{{ $emp->full_name }}</td>
                                        <td>{{ $emp->position }}</td>
                                        <td><i class="icofont icofont-clock-time"></i> <span class="font-weight-bold">{{ dateDifference(now(),$emp->end_date,"%a") }} days remaining, </span>(End at {{ timeForHuman($emp->end_date,"standard") }})</td>
                                        <td>{!! ($emp->status=="Active") ? '<i
                                                class="icofont icofont-tick-mark"></i> Active' : '<i
                                                class="icofont icofont-close"></i> Inactive' !!}</td>
                                        <td>
                                            <a style="cursor: pointer" wire:click="show_internship({{ $emp->id }})" class="icofont icofont-file-text" data-toggle="modal"
                                                data-target="#modalCardShowInternshipStatus" data-dismiss="modal"></a></td>
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
                        {{ $internshipstatus->links() }}
                    </div>
        
                    <div class="col text-right text-muted">
                        Showing {{ $internshipstatus->firstItem() }} to {{ $internshipstatus->lastItem() }} out of {{ $internshipstatus->total() }} results
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>