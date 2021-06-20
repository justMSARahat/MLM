<!-- Vendor -->
<script src="{{ asset('Frontend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/popper/umd/popper.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/common/common.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/vide/jquery.vide.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/vivus/vivus.min.js') }}"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('Frontend/js/theme.js') }}"></script>

<!-- Current Page Vendor and Views -->
<script src="{{ asset('Frontend/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('Frontend/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

<!-- Theme Custom -->
<script src="{{ asset('Frontend/js/custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('Frontend/js/theme.init.js') }}"></script>

<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-12345678-1', 'auto');
    ga('send', 'pageview');
</script>
 -->

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
    @if ( Session::has('message') )
         var type = "{{ Session::get('alert-type','info') }}";

         switch (type){
             case 'info':

                 toastr.options.positionClass = 'toast-bottom-left';
                 toastr.info("{{ Session::get('message') }}");
             break;

             case 'success':
                toastr.options.positionClass = 'toast-bottom-left';
                toastr.success("{{ Session::get('message') }}");
             break;

             case 'warning':
                toastr.options.positionClass = 'toast-bottom-left';
                toastr.warning("{{ Session::get('message') }}");
             break;

             case 'danger':
                toastr.options.positionClass = 'toast-bottom-left';
                toastr.error("{{ Session::get('message') }}");
             break;
     }
     @endif
</script>
<script>
    toastr.options = {
    "closeButton": true,
    "debug": true,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-bottom-left",
    "preventDuplicates": true,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
    }
</script>
@yield('script')
