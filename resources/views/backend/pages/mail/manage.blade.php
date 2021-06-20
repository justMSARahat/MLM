@extends('backend.layout.template')
@section('body')
<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mails</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Mails</li>
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
                <h3 class="card-title">All Mails</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects" style="text-align: center">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 30%">
                                Name
                            </th>
                            <th style="width: 20%">
                                Email
                            </th>
                            <th style="width: 20%">
                                Phone
                            </th>
                            <th style="width: 30%" class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ( $items as $item )
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td><a> {{ $item->name }}</a></td>
                            <td><a> {{ $item->email }}</a></td>
                            <td><a> {{ $item->phone_number }}</a></td>

                            <td class="project-actions text-center">
                                <a class="btn btn-info btn-sm" href=""  data-toggle="modal" data-target="#exampleModal-{{ $item->id }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    View
                                </a>
                            </td>
                            <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Email</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
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
                                            <input type="text" disabled value="{{ $item->phone_number }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Subject</label>
                                            <input type="text" disabled value="{{ $item->subject }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Message</label>
                                            <textarea cols="30" rows="3" disabled class="form-control">{{ $item->message }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
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
