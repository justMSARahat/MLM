@extends('frontend.layout.template2')
@section('body')

    <div class="container">

        <div class="row py-4">
            <div class="col-lg-6">

                <div class="overflow-hidden mb-1">
                    <h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><strong class="font-weight-extra-bold">Contact</strong> Us</h2>
                </div>
                <div class="overflow-hidden mb-4 pb-3">
                    <p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400">Feel free to ask for details, don't save any questions!</p>
                </div>
                <form class="contact-form" method="post" action="{{ route('contact-us') }}">
                    @csrf
                    <div class="contact-form-success alert alert-success d-none mt-4">
                        <strong>Success!</strong> Your message has been sent to us.
                    </div>

                    <div class="contact-form-error alert alert-danger d-none mt-4">
                        <strong>Error!</strong> There was an error sending your message.
                        <span class="mail-error-message text-1 d-block"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label class="required font-weight-bold text-dark text-2">Full Name</label>
                            <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control @error('name') is-invalid @enderror" name="name" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-lg-6">
                            <label class="required font-weight-bold text-dark text-2">Email Address</label>
                            <input type="email" value="" data-msg-required="Please enteremail address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control @error('email') is-invalid @enderror" name="email" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="font-weight-bold text-dark text-2">Phone Number</label>
                            <input type="text" value="" data-msg-required="Please enter Phone Number." maxlength="100" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required>
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="font-weight-bold text-dark text-2">Subject</label>
                            <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control @error('subject') is-invalid @enderror" name="subject" required>
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label class="required font-weight-bold text-dark text-2">Message</label>
                            <textarea maxlength="5000" data-msg-required="Please enter your message." rows="8" class="form-control @error('message') is-invalid @enderror" name="message" required></textarea>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="submit" value="Send Message" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-6">

                <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
                    <h4 class="mt-2 mb-1">Our <strong>Office</strong></h4>
                    <ul class="list list-icons list-icons-style-2 mt-2">
                        <li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Address:</strong> {{ $contact->address }}</li>
                        <li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Phone:</strong> {{ $contact->phone }}</li>
                        <li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></li>
                    </ul>
                </div>

                <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="950">
                    <h4 class="pt-5">Business <strong>Hours</strong></h4>
                    <ul class="list list-icons list-dark mt-2">
                        <li><i class="far fa-clock top-6"></i> Sunday - Thursday - {{ $contact->schedule1 }}</li>
                        <li><i class="far fa-clock top-6"></i> Saturday - {{ $contact->schedule2 }}</li>
                        <li><i class="far fa-clock top-6"></i> Friday - {{ $contact->schedule3 }}</li>
                    </ul>
                </div>

                <h4 class="pt-5">Get in <strong>Touch</strong></h4>
                <p class="lead mb-0 text-4">{{ $contact->description }}</p>

            </div>

        </div>

    </div>
@endsection
