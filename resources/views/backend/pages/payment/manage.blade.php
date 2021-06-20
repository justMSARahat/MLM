@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Payment</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Payment</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Manage Payments
                </h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects" style="text-align: center">
                    <thead>
                        <tr>
                            <th>
                                Invoice
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Number
                            </th>
                            <th>
                                Transection
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Method
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $items as $item )
                        <tr>
                            <td><a> {{ $item->payment_invoice }}</a> </td>
                            <td><a> {{ $item->name }}</a> </td>
                            <td><a> {{ $item->email }}</a> </td>
                            <td><a> {{ $item->phone }}</a> </td>
                            <td><a> {{ $item->payment_number }}</a> </td>
                            <td><a> {{ $item->transection_code }}</a> </td>
                            <td><a> {{ $item->payment_amount }}</a> </td>
                            <td>
                                @if ($item->payment_method==1)
                                    Bkash
                                @elseif ($item->payment_method==2)
                                    Nagad
                                @else
                                    Rocket
                                @endif
                            </td>

                            <td>
                                @if ($item->status==1)
                                    Success
                                @elseif ($item->status==2)
                                    Pending
                                @else
                                    Canceled
                                @endif
                            </td>

                            <td class="project-actions text-center">
                                <a class="btn btn-info btn-sm" href="" data-toggle="modal" data-target="#accept{{ $item->id }}">
                                    <i class="fas fa-pencil-alt ">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                    <i class="fas fa-trash">
                                    </i>
                                    Decline
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="accept{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('payment.update',$item->id) }}" method="POST">
                                                @csrf

                                                <div class="modal-body" style="text-align: left">
                                                    <div class="form-group">
                                                        <label for="">Invoice</label>
                                                        <input type="text" disabled value="{{ $item->payment_invoice }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Name</label>
                                                        <input type="text" disabled value="{{ $item->name }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="text" disabled value="{{ $item->email }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Phone</label>
                                                        <input type="text" disabled value="{{ $item->phone }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Transection Number</label>
                                                        <input type="text"  name="payment_number" value="{{ $item->payment_number }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Payment Amount</label>
                                                        <input type="text" disabled value="{{ $item->payment_amount }}" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Method</label>
                                                        <select name="payment_method" id="" class="form-control">
                                                            <option value="1">Bkash</option>
                                                            <option value="2">Nagad</option>
                                                            <option value="3">Roket</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Status</label>
                                                        <select name="status" id="" class="form-control">
                                                            <option value="1">Success</option>
                                                            <option value="2">Pending</option>
                                                            <option value="3">Declined</option>
                                                        </select>
                                                    </div>
                                                    <hr>
                                                    <div class="form-group">
                                                        <label for="">Transection ID</label>
                                                        <input type="text" name="transection_code" value="{{ $item->transection_code }}" class="form-control">
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Complete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="text-align: left">
                                                I Agree to Decline this Payment!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <a class="btn btn-info" href="{{ route('payment.delete',$item->id) }}" >Decline</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {!! $items->links('vendor.pagination.custom_2') !!}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection
