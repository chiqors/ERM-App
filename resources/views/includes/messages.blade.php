@if (session()->has('message'))
    <div class="alert alert-success" style="margin-top:30px;">x
        {{ session('message') }}
    </div>
@endif
