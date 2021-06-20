@extends('frontend.layout.template2')
@section('body')
    <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(img/default.jpg);">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="text-9 font-weight-bold">User Login</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">
            <div class="col">

                <div class="featured-boxes">
                    <div class="row ">
                        <div class="col-md-12 " style="padding: 0 50px;">
                            <div class="featured-box featured-box-primary text-left mt-5" style="height: 368.188px;">
                                <div class="box-content">
                                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Login</h4>

                                    <form method="POST" action="{{ route('password.confirm') }}">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Confirm Password') }}
                                                </button>

                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>

                                    <form method="POST" action="{{ route('login.submit') }}" id="frmSignIn" class="needs-validation" novalidate="novalidate">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">Username or E-mail Address</label>
                                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <a class="float-right" href="#">(Lost Password?)</a>
                                                <label class="font-weight-bold text-dark text-2">Password</label>
                                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" type="checkbox" name="remember" id="rememberme" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label text-2" for="rememberme">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <input type="submit" value="Login" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
