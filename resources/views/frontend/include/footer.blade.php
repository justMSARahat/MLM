@php
    $footer = App\Models\Backend\footer::orderBy('id','asc')->first();
@endphp
<footer id="footer">
    <div class="container">
        <div class="row py-5 my-4">
            <div class="col-md-6 col-lg-5 mb-4 mb-lg-0">
                <img src="{{ asset('Backend/Image/Website/'.$footer->logo) }}" alt="Logo" width="150px" style="margin-bottom: 20px">
                <h5 class="text-3 mb-3">{{ $footer->site_title }}</h5>
                <p class="pr-1">{{ $footer->description }}</p>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                <div class="contact-details">
                    <h5 class="text-3 mb-3">CONTACT US</h5>
                    <ul class="list list-icons list-icons-lg">
                        <li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i><p class="m-0">{{ $footer->address }}</p></li>
                        <li class="mb-1"><i class="fab fa-whatsapp text-color-primary"></i><p class="m-0"><a href="tel:8001234567">{{ $footer->phone }}</a></p></li>
                        <li class="mb-1"><i class="far fa-envelope text-color-primary"></i><p class="m-0"><a href="mailto:{{ $footer->email }}">{{ $footer->email }}</a></p></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="text-3 mb-3">FOLLOW US</h5>
                <ul class="social-icons">
                    <li class="social-icons-facebook"><a href="{{ $footer->facebook }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="social-icons-twitter"><a href="{{ $footer->twitter }}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <li class="social-icons-linkedin"><a href="{{ $footer->linkedin }}" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container py-2">
            <div class="row py-4">
                <div class="col-lg-12 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                    <p style="display: block;  margin: auto; color:white;">{{ $footer->copywrite }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
