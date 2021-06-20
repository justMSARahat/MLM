@extends('frontend.layout.template2')
@section('body')

    <div class="container">

        <div class="row pt-5">
            <div class="col">

                <div class="row text-center pb-5">
                    <div class="col-md-9 mx-md-auto">
                        <div class="overflow-hidden mb-3">
                            <h1 class="word-rotator slide font-weight-bold text-8 mb-0 appear-animation" data-appear-animation="maskUp">
                                {{ $about->title }}
                            </h1>
                        </div>
                        <div class="overflow-hidden mb-3" style="text-align: left; margin-top:25px">
                            {{-- <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum, nulla vel pellentesque consequat, ante nulla hendrerit arcu, ac tincidunt mauris lacus sed leo.
                            </p> --}}
                            {!! $about->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
