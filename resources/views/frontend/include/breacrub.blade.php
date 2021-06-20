@if ( Route::currentRouteNamed('home') )
@elseif ( Route::currentRouteNamed('about') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','about')->first();
    @endphp
    @if ( $item->visibility==1 )
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
    @endif
@elseif ( Route::currentRouteNamed('faq') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','faq')->first();
    @endphp
    @if ( $item->visibility==1 )
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
    @endif
@elseif ( Route::currentRouteNamed('record') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','record')->first();
    @endphp
    @if ( $item->visibility==1 )
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
    @endif
@elseif ( Route::currentRouteNamed('contact') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','contact')->first();
    @endphp
    @if ( $item->visibility==1 )
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
    @endif
@elseif ( Route::currentRouteNamed('login.form') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','login')->first();
    @endphp
    @if ( $item->visibility==1 )
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
    @endif
@elseif ( Route::currentRouteNamed('register.form') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','register')->first();
    @endphp
    @if ( $item->visibility==1 )
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
    @endif
@elseif ( Route::currentRouteNamed('user.password.request') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','reset')->first();
    @endphp
    @if ( $item->visibility==1 )
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
    @endif
@elseif ( Route::currentRouteNamed('user.password.reset') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','Reset')->first();
    @endphp
    @if ( $item->visibility==1 )
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
    @endif
@elseif ( Route::currentRouteNamed('account') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','account')->first();
    @endphp
    @if ( $item->visibility==1 )
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
    @endif
@elseif ( Route::currentRouteNamed('video') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','video')->first();
    @endphp
    @if ( $item->visibility==1 )
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
    @endif
@endif
