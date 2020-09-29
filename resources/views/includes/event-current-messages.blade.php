@if (session()->has('success-event-current'))
<div class="row">
    <div class="col">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {!! session('success-event-current') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
</div>
@endif
@if (session()->has('error-event-current'))
<div class="row">
    <div class="col">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! session('error-event-current') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
</div>
@endif
