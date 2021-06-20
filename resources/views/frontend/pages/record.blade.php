@extends('frontend.layout.template2')
@section('body')

    <div class="container py-4">
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i = 1;  @endphp
                    @foreach ( App\Models\Backend\payment::orderBy('id','desc')->where('status','1')->get() as $item )
                        <tr>
                            <th>{{ $i++ }}</th>
                            <th>{{ $item->name }}</th>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->payment_invoice }}</td>
                            <td>{{ $item->payment_amount }}</td>
                            <td>
                                @if ($item->status==1)
                                    Success
                                @elseif ($item->status==2)
                                    Pending
                                @else
                                    Canceled
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
