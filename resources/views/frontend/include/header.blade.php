@php
    $webinfo    = App\Models\Backend\webinfo::orderBy('id','asc')->first();
@endphp
<!DOCTYPE html>
<html lang="en">
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">


		<!-- Favicon -->
		<link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

@if ( Route::currentRouteNamed('home') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','home')->first();
    @endphp

    <title> {{ $webinfo->title }} - {{ $webinfo->description }} </title>

    <meta name="keywords" content="{{ $item->title }}" />
    <meta name="title" content="{{ $item->title }}">
    <meta name="description" content="{{ $item->description }}">
@elseif ( Route::currentRouteNamed('about') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','about')->first();
    @endphp

    <title> {{ $webinfo->title }} - {{ $item->title }} </title>

    <meta name="keywords" content="{{ $item->title }}" />
    <meta name="title" content="{{ $item->title }}">
    <meta name="description" content="{{ $item->description }}">
@elseif ( Route::currentRouteNamed('faq') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','faq')->first();
    @endphp

    <title> {{ $webinfo->title }} - {{ $item->title }} </title>

    <meta name="keywords" content="{{ $item->title }}" />
    <meta name="title" content="{{ $item->title }}">
    <meta name="description" content="{{ $item->description }}">
@elseif ( Route::currentRouteNamed('record') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','record')->first();
    @endphp

    <title> {{ $webinfo->title }} - {{ $item->title }} </title>

    <meta name="keywords" content="{{ $item->title }}" />
    <meta name="title" content="{{ $item->title }}">
    <meta name="description" content="{{ $item->description }}">
@elseif ( Route::currentRouteNamed('contact') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','contact')->first();
    @endphp

    <title> {{ $webinfo->title }} - {{ $item->title }} </title>

    <meta name="keywords" content="{{ $item->title }}" />
    <meta name="title" content="{{ $item->title }}">
    <meta name="description" content="{{ $item->description }}">
@elseif ( Route::currentRouteNamed('login.form') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','login')->first();
    @endphp

    <title> {{ $webinfo->title }} - {{ $item->title }} </title>

    <meta name="keywords" content="{{ $item->title }}" />
    <meta name="title" content="{{ $item->title }}">
    <meta name="description" content="{{ $item->description }}">
@elseif ( Route::currentRouteNamed('register.form') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','register')->first();
    @endphp

    <title> {{ $webinfo->title }} - {{ $item->title }} </title>

    <meta name="keywords" content="{{ $item->title }}" />
    <meta name="title" content="{{ $item->title }}">
    <meta name="description" content="{{ $item->description }}">
@elseif ( Route::currentRouteNamed('user.password.request') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','reset')->first();
    @endphp

    <title> {{ $webinfo->title }} - {{ $item->title }} </title>

    <meta name="keywords" content="{{ $item->title }}" />
    <meta name="title" content="{{ $item->title }}">
    <meta name="description" content="{{ $item->description }}">
@elseif ( Route::currentRouteNamed('user.password.reset') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','reset')->first();
    @endphp

    <title> {{ $webinfo->title }} - {{ $item->title }} </title>

    <meta name="keywords" content="{{ $item->title }}" />
    <meta name="title" content="{{ $item->title }}">
    <meta name="description" content="{{ $item->description }}">
@elseif ( Route::currentRouteNamed('account') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','account')->first();
    @endphp

    <title> {{ $webinfo->title }} - {{ $item->title }} </title>

    <meta name="keywords" content="{{ $item->title }}" />
    <meta name="title" content="{{ $item->title }}">
    <meta name="description" content="{{ $item->description }}">
@elseif ( Route::currentRouteNamed('video') )
    @php
        $item   = App\Models\Backend\pageheader::where('page','video')->first();
    @endphp

    <title> {{ $webinfo->title }} - {{ $item->title }} </title>

    <meta name="keywords" content="{{ $item->title }}" />
    <meta name="title" content="{{ $item->title }}">
    <meta name="description" content="{{ $item->description }}">
@endif
