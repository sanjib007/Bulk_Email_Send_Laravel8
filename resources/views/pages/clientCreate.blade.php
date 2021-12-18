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
        </div>
    </div>
    <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-lg-7">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form class="user" method="POST" action="{{ route('client.store') }}">
                    @csrf
                    <div class="form-group row">
                        <x-input id="clientName" class="form-control form-control-user" type="text" name="clientName" :value="old('clientName')" placeholder="Client Name" required autofocus />
                    </div>
                    <div class="form-group row">
                        <x-input id="clientEmail" class="form-control form-control-user" type="text" name="clientEmail" :value="old('clientEmail')" placeholder="Client Email" required autofocus />
                    </div>
                    <div class="form-group">
                        <select name="groupName" class="form-control form-control-user" style="padding: 0">
                            @foreach ($allGroup as $value)
                                <option value="{{ $value->groupname }}">{{ $value->groupname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <x-button class="btn btn-primary btn-user btn-block">
                        {{ __('Submit') }}
                    </x-button>
                    <hr>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->


</div>

<!-- /.container-fluid -->

@endsection
