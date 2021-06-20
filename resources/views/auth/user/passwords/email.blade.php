@extends('frontend.layout.template2')
@section('body')

    <div class="container">

        <div class="row">
            <div class="col">

                <div class="featured-boxes">
                    <div class="row ">
                        <div class="col-md-12 " style="padding: 0 50px;">
                            <div class="featured-box featured-box-primary text-left mt-5" style="height: 280px;">
                                <div class="box-content">
                                    <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Password Reset</h4>
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('user.password.email') }}" id="frmSignIn" class="needs-validation" novalidate="novalidate">
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
                                            <div class="form-group col-lg-12 text-center">
                                                <input type="submit" value=" {{ __('Send Password Reset Link') }}" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
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
