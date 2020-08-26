@extends('auth.layouts.app')

@section('hstyles')

@endsection

@section('content')
<section class="login-block">

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <form class="md-float-material form-material">
                    <div class="text-center">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="logo.png">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">Sign In</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="text" name="email" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label">Your Email Address</label>
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label">Password</label>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="button"
                                        class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign
                                        in</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

</section>
@endsection

@section('fscripts')

@endsection
