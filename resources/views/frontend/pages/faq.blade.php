@extends('frontend.layout.template2')
@section('body')

    <div class="container py-4">

        <div class="row">
            <div class="col">

                <h2 class="font-weight-normal text-7 mb-2">Frequently Asked <strong class="font-weight-extra-bold">Questions</strong></h2>
                <hr class="solid my-5">

                <div class="toggle toggle-primary" data-plugin-toggle="">
                    @php
                        $itemscount = $items->count();
                    @endphp
                    @if ( $itemscount==0 )
                        <span class="alert alert-danger" style="display: block">No Question Found</span>
                    @else
                        @foreach ($items as $item )
                            <section class="toggle">
                                <a class="toggle-title">{{ $item->title }}</a>
                                <div class="toggle-content" style="display: none;">
                                    <p>{{ $item->description }}</p>
                                </div>
                            </section>
                        @endforeach
                    @endif



                </div>

            </div>

        </div>

    </div>
@endsection
