@extends('mainLayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Begin Page Content -->
<div class="container-fluid">
<div class="row">
        <div class="col-md-4">
           <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between">
Client Upload
        </div>
        </div>
        <div class="col-md-8">


            <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-7">
                <div class="form-group">
                    <div>
                        <label for="customFile">Choose file</label>
                        <input type="file" name="file" id="customFile">
                    </div>
                </div>
                </div>
                <div class="col-md-5">
                    <button class="btn btn-primary">Import data</button>
                </div>
            </div>


        </form>

        </div>
    </div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-6">
            <h6 class="m-0 font-weight-bold text-primary">Client List</h6>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('client.create') }}" class="btn btn-primary btn-icon-split btn-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Add Client</span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Client Email</th>
                        <th>Gorup Name</th>
                        <th>Send Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($clients as $aClient)
                    <tr>
                        <td>{{$aClient->clientName}}</td>
                        <td>{{$aClient->clientEmail}}</td>
                        <td>{{$aClient->groupName}}</td>
                        <td>
                            <a href="{{ route('basic_email',$aClient->id) }}" class="btn btn-primary btn-icon-split btn-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-flag"></i>
                                </span>
                                <span class="text">Send Email</span>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('client.delete',$aClient->id) }}" method="POST">

                                <a href="{{ route('client.edit',$aClient->id) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-trash"></i></button>
                                </form>


                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->


</div>
<!-- /.container-fluid -->



@endsection
