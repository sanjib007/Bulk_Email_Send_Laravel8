@extends('mainLayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col-md-6">
            <h6 class="m-0 font-weight-bold text-primary">Group List</h6>
            </div>
            <div class="col-md-6 text-right">
            <a href="{{ route('group.create') }}" class="btn btn-primary btn-icon-split btn-sm">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Add Group</span>
            </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Mail Subject</th>
                        <th>Mail Sender Email</th>
                        <th>Sender Name</th>
                        <th>Send Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($groups as $aGroup)
                    <tr>
                        <td>{{$aGroup->groupname}}</td>
                        <td>{{$aGroup->mailSubject}}</td>
                        <td>{{$aGroup->fromMail}}</td>
                        <td>{{$aGroup->fromName}}</td>
                        <td>
                        <a href="{{ route('bulk_email',$aGroup->id) }}" class="btn btn-primary btn-icon-split btn-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-flag"></i>
                            </span>
                            <span class="text">Send Email</span>
                        </a>
                        </td>
                        <td>
                            <form action="{{ route('group.delete',$aGroup->id) }}" method="POST">

                                <a href="{{ route('group.edit',$aGroup->id) }}" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a>
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

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>

@endsection
