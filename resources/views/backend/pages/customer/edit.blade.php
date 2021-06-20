@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Users Info</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Users Info</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('user.update',$user->id) }}" method="Post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Information</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" id="inputName" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input type="email" id="inputName" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Password</label>
                                <input type="password" id="inputName" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Phone</label>
                                <input type="text" id="inputName" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Address</label>
                                <input type="text" id="inputName" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}">
                            </div>
                            <div class="form-group">
                                <label for="inputName">Referral Code</label>
                                <input type="text" id="inputName" class="form-control @error('reffer') is-invalid @enderror" name="reffer" value="{{ $user->reffer }}">
                            </div>
                            <div class="form-group">
                                <label for="inputStatus">Status</label>
                                <select id="inputStatus"
                                    class="form-control custom-select @error('status') is-invalid @enderror" value="{{ old('status') }}"
                                    name="status">
                                    <option selected="" disabled="">Select one</option>
                                    <option @if( $user->status == 1 ) selected @endif value="1">Enabled</option>
                                    <option @if( $user->status == 2 ) selected @endif value="2">Disabled</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <input type="file" name="image" id="" class="form-control-files">
                                <img src="{{ asset('Backend/Image/User/'. $user->image) }}" alt="" width="200px" style="display: block">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <div class="row">
                <div class="col-12" style="margin-bottom:20px">
                    <input type="submit" value="Update" class="btn btn-success float-right">
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
</div>
@endsection
