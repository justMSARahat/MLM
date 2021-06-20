@php
    $webinfo    = App\Models\Backend\webinfo::orderBy('id','asc')->first();
@endphp
@extends('frontend.layout.template')
@section('body')
    <div class="text-center home_index" style="" >
        <div class="text home_text">
            <h1 style="font-weight:bold; text-transform:uppercase; padding-top: 150px; display: block;">{{ $webinfo->title }}</h1>
            <p class="mx-auto" style="width: 50%;">{{ $webinfo->description }}</p>
        </div>
        <div class="btns" >
            @if ( Auth::guard('customer')->check() )
                <a href="{{ route('account') }}" class="btn btn-primary" style="font-weight:bold; text-transform: uppercase;">My Account</a>
            @else
                <a href="{{ route('login.form') }}" class="btn btn-primary" style="font-weight:bold; text-transform: uppercase;">Login</a>
                <a href="{{ route('register.form') }}" class="btn btn-primary" style="font-weight:bold; text-transform: uppercase;">Register</a>
            @endif
        </div>
    </div>
@endsection
