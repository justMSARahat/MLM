@php
    $webinfo    = App\Models\Backend\webinfo::orderBy('id','asc')->first();
        $item   = App\Models\Backend\pageheader::where('page','home')->first();
@endphp
<!DOCTYPE html>
<html lang="en">
	<head>
        <!-- Meta File -->
        @include('frontend.include.header')
        <!-- Css File -->
        @include('frontend.include.css')
	</head>
	<body class="loading-overlay-showing back-image" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}" style="background-image:url({{ asset('Backend/Image/Pageheader/'.$item->image) }});">

        <!-- Preloader -->
        @include('frontend.include.preloader')

		<div class="body ">

            <!-- Css File -->
            @include('frontend.include.menu')

			<div role="main" class="main home_main">

                @include('frontend.include.breacrub')

                @yield('body')

			</div>
		</div>


        <!-- Css File -->
        @include('frontend.include.script')

	</body>
</html>
