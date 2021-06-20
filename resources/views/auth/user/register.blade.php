@extends('frontend.layout.template2')
@section('body')

    <div class="container">

        <div class="row">
            <div class="col">

                <div class="featured-boxes">
                    <div class="row">
                        <div class="col-md-12 " style="padding: 0 50px;">
                            <div class="featured-box featured-box-primary text-left mt-5 reg.cus">
                                <div class="box-content">
                                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Register</h4>
                                    <form method="POST" action="{{ route('register.submit') }}" id="frmSignUp" class="needs-validation" novalidate="novalidate">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">Name</label>
                                                <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">E-mail Address</label>
                                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label class="font-weight-bold text-dark text-2">Reference</label>
                                                <input id="reffer" type="text" class="form-control form-control-lg @error('reffer') is-invalid @enderror" name="reffer" value="{{ old('reffer') }}" required>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-6">
                                                <label class="font-weight-bold text-dark text-2">Password</label>
                                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="font-weight-bold text-dark text-2">Re-enter Password</label>
                                                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">

                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-lg-9">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="terms">
                                                    <label class="custom-control-label text-2" for="terms">I have read and agree to the <a href="#">terms of service</a></label>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <input type="submit" value="Register" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
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
