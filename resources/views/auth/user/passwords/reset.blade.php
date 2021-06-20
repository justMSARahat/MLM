@extends('frontend.layout.template2')
@section('body')

    <div class="container">

        <div class="row">
            <div class="col">

                <div class="featured-boxes">
                    <div class="row ">
                        <div class="col-md-12 " style="padding: 0 50px;">
                            <div class="featured-box featured-box-primary text-left mt-5" style="height: 368.188px;">
                                <div class="box-content">
                                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Reset Password</h4>

                                    <form method="POST" action="{{ route('user.password.update') }}" id="frmSignIn" class="needs-validation" novalidate="novalidate">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">Username or E-mail Address</label>
                                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-6">
                                                <label class="font-weight-bold text-dark text-2">Password</label>
                                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="font-weight-bold text-dark text-2">Confirm Password</label>
                                                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <input type="submit" value="Reset Password" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
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
