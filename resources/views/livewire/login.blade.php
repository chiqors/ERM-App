<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="md-float-material form-material">
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <img style="display: block; margin: auto;" src=" assets/images/logo-aniqma2.png">
                                </div>
                            </div>
                            @include('includes.messages')
                            <form wire:submit.prevent="login">
                                <div class="form-group form-primary form-static-label">
                                    <input type="text" wire:model="email" class="form-control" placeholder="-">
                                    <span class="form-bar"></span>
                                    <label class="float-label">E-Mail Address</label>
                                    @error('email') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group form-primary form-static-label">
                                    <input type="password" wire:model="password" class="form-control fill" placeholder="-">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                    @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
