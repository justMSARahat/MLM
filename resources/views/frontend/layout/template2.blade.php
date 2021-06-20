<!DOCTYPE html>
<html lang="en">
	<head>
        <!-- Meta File -->
        @include('frontend.include.header')
        <!-- Css File -->
        @include('frontend.include.css')
	</head>
	<body class="loading-overlay-showing" data-plugin-page-transition data-loading-overlay data-plugin-options="{'hideDelay': 500}" >

        <!-- Preloader -->
        @include('frontend.include.preloader')

		<div class="body ">

            <!-- Css File -->
            @include('frontend.include.menu')

			<div role="main" class="main home_main">

                @include('frontend.include.breacrub')

                @yield('body')

			</div>

            <!-- Footer File -->
            @include('frontend.include.footer')

		</div>


        <!-- Script File -->
        @include('frontend.include.script')

	</body>
</html>
