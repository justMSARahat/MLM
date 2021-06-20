@extends('frontend.layout.template2')
@section('body')
    <div class="container py-4">
        <div class="row" style="display: block; margin:auto; text-align:center">
            <h3><b>{{ $video->title }}</b></h3>
            {!! $video->video !!}
        </div>
    </div>

@endsection
@section('script')
    <script>
        $( document ).ready(function() {

            setTimeout(function(){
                var user_id  = '{{ Auth::guard('customer')->user()->id }}';
                var video_id = '{{ $video->id }}';
                var status   = '1';
                // alert(video_id,user_id)

                $.get('{{ route('video.submit') }}', {user_id: user_id,video_id: video_id,status: status}, function (response) {

                })
             }, 3000);
        });

    </script>

@endsection
