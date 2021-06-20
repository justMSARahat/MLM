@extends('frontend.layout.template2')
@section('body')

    <div class="container py-4">
        @if ($count == 0)
            <span class="alert alert-danger" style="display: block">No Video Found</span>
        @else
        <div class="row">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Point</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($items as $item)
                            <tr>
                                <th>{{ $i++ }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->point }}</td>
                                <td>
                                    @php
                                        $status     = App\Models\Backend\view::where('user_id',Auth::guard('customer')->user()->id)->where('video_id',$item->id)->first();
                                    @endphp
                                    @if ( !is_null($status) )
                                        Watched
                                    @else
                                        Not Watched
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('video.show',$item->id) }}" class="btn btn-primary">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
