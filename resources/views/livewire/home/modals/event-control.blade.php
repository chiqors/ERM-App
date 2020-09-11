<div wire:ignore.self class="modal fade" id="modalControlEvent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Event Control</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                @include('includes.messages')
                <div class="row mb-2">
                    <div class="col-12 col-lg-6 form-inline">
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-6 col-form-label">Per Page:</label>
                                <div class="col-sm-6">
                                    <select wire:model="perPage" class="form-control form-bg-purle fill">
                                        <option>5</option>
                                        <option>10</option>
                                        <option>15</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="input-group">
                            <input wire:model="search" type="text" class="form-control" placeholder="Event Name">
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
                                            Employee Name
                                            @include('includes.dt-sorticon', ['field' => 'full_name'])
                                        </a></th>
                                        <th><a wire:click.prevent="sortBy('event_name')" role="button" href="#">
                                            Event Name
                                            @include('includes.dt-sorticon', ['field' => 'event_name'])
                                        </a></th>
                                        <th><a wire:click.prevent="sortBy('event_type')" role="button" href="#">
                                            Event Type
                                            @include('includes.dt-sorticon', ['field' => 'event_type'])
                                        </a></th>
                                        <th><a wire:click.prevent="sortBy('event_start')" role="button" href="#">
                                            Event Date
                                            @include('includes.dt-sorticon', ['field' => 'event_start'])
                                        </a></th>
                                        <th width="70">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!$events->isEmpty())
                                    @foreach ($events as $ev)
                                    <tr>
                                        <td>
                                            @foreach($ev->employee as $emp)
                                            {{ $loop->first ? '' : '-' }}
                                            <span class="nice">{{ $emp->full_name }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $ev->event_name }}</td>
                                        <td>{{ $ev->event_type }}</td>
                                        <td>{{ $ev->event_start }} - {{ $ev->event_end }}</td>
                                        <td>
                                            <a style="cursor: pointer" wire:click="edit({{ $ev->id }})" class="icofont icofont-edit mr-3" data-toggle="modal"
                                                data-target="#modalEditEvent" data-dismiss="modal"></a>
                                            <a style="cursor: pointer" wire:click="confirm_delete({{ $ev->id }})" class="icofont icofont-bin mr-3" data-toggle="modal"
                                                data-target="#modalDeleteEvent" data-dismiss="modal"></a>
                                            <a style="cursor: pointer" wire:click="show({{ $ev->id }})" class="icofont icofont-file-text" data-toggle="modal"
                                                data-target="#modalShowEvent" data-dismiss="modal"></a>
                                        </td>
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
                        {{ $events->links() }}
                    </div>

                    <div class="col text-right text-muted">
                        Showing {{ $events->firstItem() }} to {{ $events->lastItem() }} out of {{ $events->total() }} results
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
