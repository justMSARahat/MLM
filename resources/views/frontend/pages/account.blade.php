@extends('frontend.layout.template2')
@section('body')

    <div class="container py-2">
        <div class="row">
            <div class="col-lg-12" style="margin-bottom: 30px;">
                <div class="">
                    <div class="row gutters-sm">
                        <div class="col-md-4 d-none d-md-block">
                            <div class="card">
                                <div class="card-body">
                                    <nav class="nav flex-column nav-pills nav-gap-y-1">
                                        <a href="" data-toggle="tab"
                                            class="nav-item nav-link has-icon nav-link-faded disabled">
                                            Balance: {{ Auth::guard('customer')->user()->amount }}
                                        </a>
                                        <a href="#profile" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
                                            <span class="fa fa-user"></span>
                                            Profile
                                        </a>
                                        <a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                            <span class="fa fa-credit-card"></span>
                                            Payment
                                        </a>
                                        <a href="#notification" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                            <span class="fa fa-cash-register"></span>
                                            History
                                        </a>
                                        <a href="#users" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                            <span class="fa fa-users"></span>
                                            Referred User
                                        </a>
                                        <a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
                                            <span class="fa fa-unlock"></span>
                                            Password
                                        </a>
                                        <a class="nav-item nav-link has-icon nav-link-faded" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <span class="fa fa-sign-out-alt"></span>
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header border-bottom mb-3 d-flex d-md-none">
                                    <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                                        <li class="nav-item">
                                            <a href="#profile" data-toggle="tab"
                                                class="nav-link has-icon active">
                                                <span class="fa fa-user"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#account" data-toggle="tab" class="nav-link has-icon">
                                                <span class="fa fa-credit-card"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#notification" data-toggle="tab"
                                                class="nav-link has-icon">
                                                <span class="fa fa-cash-register"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#users" data-toggle="tab"
                                                class="nav-link has-icon">
                                                <span class="fa fa-users"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#security" data-toggle="tab" class="nav-link has-icon">
                                                <span class="fa fa-unlock"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-item nav-link has-icon nav-link-faded" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                <span class="fa fa-sign-out-alt"></span>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                    @if ( is_null( Auth::guard('customer')->user()->payment ) && Auth::guard('customer')->user()->status == 2  )
                                        <span style="display: block;  margin-bottom:20px" class="alert alert-danger">Payment Due! Please Clear The Payment to Active your Account <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong"> Active</a></span>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Payment Information</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form action="{{ route('active.account',Auth::guard('customer')->user()->id ) }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Payment Mobile Number</label>
                                                            <input type="text" class="form-control" name="payment">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Payment Invoice</label>
                                                            <input type="text" class="form-control" name="invoice">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Active</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                    @elseif (  !is_null( Auth::guard('customer')->user()->payment ) && !is_null( Auth::guard('customer')->user()->invoice ) && Auth::guard('customer')->user()->status == 2  )
                                        <span style="display: block;  margin-bottom:20px" class="alert alert-danger">Payment Prosessing.</span>
                                    @elseif (  Auth::guard('customer')->user()->status == 2  )
                                        <span style="display: block;  margin-bottom:20px" class="alert alert-danger">Account Disabled! Contact with Customer Care. <a href="{{ route('contact') }}" class="btn btn-primary">Send Mail</a></span>
                                    @endif
                                <div class="card-body tab-content">
                                    <div class="tab-pane active" id="profile">
                                        <h6>PROFILE INFORMATION</h6>
                                        <hr>
                                        <form action="{{ route('account.profile',Auth::guard('customer')->user()->id ) }}" method="POST"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="Profile">Profile</label>
                                                @if( !is_null( Auth::guard('customer')->user()->image ) )
                                                    <img src="{{ asset('Backend/Image/User/'. Auth::guard('customer')->user()->image) }}" alt="" height="150px; width:150px;" style="border-radius: 50%; display: block;">
                                                @else
                                                    <img src="{{ asset('Backend\Image\User\avatar.png') }}" height="150px" width="150px" style="border-radius: 50%; display: block;">
                                                @endif
                                                <input type="file" class="form-control-files" name="image" style="margin-top: 15px;">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Name</label>
                                                <input type="text" class="form-control" name="name" value="{{ Auth::guard('customer')->user()->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Email Address</label>
                                                <input type="text" class="form-control" name="email" value="{{ Auth::guard('customer')->user()->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Phone Number</label>
                                                <input type="text" class="form-control" name="phone" value="{{ Auth::guard('customer')->user()->phone }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Address</label>
                                                <input type="text" class="form-control" name="address" value="{{ Auth::guard('customer')->user()->address }}">
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="fullName">Reference</label>
                                                <input type="text" class="form-control" disabled value="{{ Auth::guard('customer')->user()->reffer }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Referral Code</label>
                                                <input type="text" class="form-control" disabled value="{{ Auth::guard('customer')->user()->ref_id }}">
                                            </div>


                                            <button type="submit" class="btn btn-primary">Update
                                            Profile</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="account">
                                        <h6>Request Pay Out</h6>
                                        <hr>
                                        <form action="{{ route('payment.request') }}" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <label for="fullName">Number ( Bkash, Rokect, Nagad )</label>
                                                <input type="text" class="form-control" name="payment_number" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="fullName">Payment Method</label>
                                                <select name="payment_method" id="" class="form-control">
                                                    <option value="1">Bkash</option>
                                                    <option value="2">Nagad</option>
                                                    <option value="3">Roket</option>
                                                </select>
                                            </div>
                                            @if ( Auth::guard('customer')->user()->status == 2 )
                                                <button type="submit" class="btn btn-warning" disabled>Account Disabled</button>
                                            @elseif ( Auth::guard('customer')->user()->amount == 0 )
                                                <button type="submit" class="btn btn-danger" disabled>Insufficient Balance</button>
                                            @elseif ( Auth::guard('customer')->user()->amount != 0 )
                                                <button type="submit" class="btn btn-primary">Request Pay Out</button>
                                            @endif
                                        </form>
                                    </div>
                                    <div class="tab-pane" id="users">
                                        <h6>User</h6>
                                        <hr>

                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1;  @endphp
                                                @foreach ( App\Models\Customer::orderBy('id','desc')->where('reffer',Auth::guard('customer')->user()->ref_id )->get() as $item )
                                                    <tr>
                                                        <th>{{ $i++ }}</th>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->phone }}</td>
                                                        <td>{{ $item->amount }}</td>
                                                        <td>
                                                            @if ($item->status==1)
                                                                Active
                                                            @else
                                                                Disabled
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="notification">
                                        <h6>History</h6>
                                        <hr>

                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Transection</th>
                                                    <th scope="col">Number</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1;  @endphp
                                                @foreach ( App\Models\Backend\payment::orderBy('id','desc')->where('user_id',Auth::guard('customer')->user()->id )->get() as $item )
                                                    <tr>
                                                        <th>{{ $i++ }}</th>
                                                        <td>{{ $item->transection_code }}</td>
                                                        <td>{{ $item->payment_number }}</td>
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
                                    <div class="tab-pane" id="security">

                                        @if (count($errors))
                                            @foreach ($errors->all() as $error)
                                                <p class="alert alert-danger">{{$error}}</p>
                                            @endforeach
                                        @endif
                                        <h6>PASSWORD SETTINGS</h6>
                                        <hr>
                                        <form action="{{ route('account.password') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <input type="password" id="first-name" class="form-control mt-1"  placeholder="Enter old password" name="oldpassword">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" id="first-name" placeholder="Enter new password" class="form-control mt-1" name="newpassword">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" id="first-name"  class="form-control mt-1"placeholder="Enter password confirmation"  name="password_confirmation">
                                            </div>
                                            <hr>
                                            <button type="submit" class="btn btn-primary">Update Password</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
<style>
    .main-body {
        padding: 15px;
    }

    .nav-link {
        color: #4a5568;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #0088CC;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }
</style>
