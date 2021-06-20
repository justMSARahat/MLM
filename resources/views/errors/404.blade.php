@extends('frontend.layout.template2')
@section('body')

    @php
        $item   = App\Models\Backend\pageheader::where('page','404')->first();
    @endphp
    <section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url({{ asset('Backend/Image/Pageheader/'.$item->image) }});">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-12 align-self-center p-static order-2 text-center">
                    <h1 class="text-9 font-weight-bold">{{ $item->title }}</h1>
                </div>
                <div class="col-md-12 align-self-center order-1">
                    <ul class="breadcrumb breadcrumb-light d-block text-center">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">{{ $item->breadcrumbs }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <section class="http-error">
            <div class="row justify-content-center py-3">
                <div class="col-md-7 text-center">
                    <div class="http-error-main">
                        <h2>404!</h2>
                        <p>We're sorry, but the page you were looking for doesn't exist.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
