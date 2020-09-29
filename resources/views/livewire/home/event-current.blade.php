<div class="row">
    <div class="col-xl-12 col-12">
        <div class="card">
            <div class="card-header">
                <h5>This Month</h5>
            </div>
            <div class="card-block">
                @include('includes.event-current-messages')
                <div class="row">
                    <div class="col">
                        <div class="table-responsive dt-responsive" style="border: 1px solid #dee2e6;">
                            <table class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>
                                            Full Name
                                        </th>
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
                                            {!! $loop->first ? '' : '-' !!}
                                            <span class="nice">{{ $emp->full_name }}</span>
                                            @endforeach
                                        </td>
                                        <td><span class="label" style="background-color: {{ (strtok($ev->event_name, " ")=="Cuti:") ? '#FFB012' : '#546D77' }}">{{ $ev->event_name }}</span></td>
                                        <td><span class="label {{ ($ev->event_type=="One Time") ? 'bg-danger' : (($ev->event_type=="Recurring Monthly") ? 'bg-primary' : 'bg-success') }}">{{ $ev->event_type }}</span></td>
                                        <td>
                                            <i class="icofont icofont-ui-calendar text-c-blue"></i> {{ timeforHuman($ev->event_start,"current") }}
                                            <br>
                                            <i class="icofont icofont-flag-alt-2 text-c-green"></i> {{ timeforHuman($ev->event_end,"current") }}
                                        </td>
                                        <td>
                                            <a style="cursor: pointer" wire:click="complete({{ $ev->id }},true)" class="icofont icofont-check mr-3"></a>
                                            <a style="cursor: pointer" wire:click="complete({{ $ev->id }},false)" class="icofont icofont-close mr-3"></a>
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
