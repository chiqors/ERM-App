@if (session()->has('error-contract'))
<div class="row">
    <div class="col">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {!! session('error-contract') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
</div>
@endif
