@extends('mainLayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Client</h1>
    </div>

    <!-- Begin Page Content -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Client Edit</h6>
                    </div>
                    <div class="col-md-6 text-right">
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="row justify-content-md-center">
                    <div class="col-lg-7">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form class="user" method="POST" action="{{ route('client.update',$client->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <input id="clientName" class="form-control form-control-user"
                                       type="text" name="clientName" value="{{$client->clientName}}"
                                       placeholder="Client Name" required autofocus />
                            </div>
                            <div class="form-group row">
                                <input id="clientEmail" class="form-control form-control-user"
                                       type="text" name="clientEmail" value="{{$client->clientEmail}}"
                                       placeholder="Client Email" required autofocus />
                            </div>
                            <div class="form-group">
                                <select name="groupName" class="form-control form-control-user" style="padding: 0">
                                    @foreach ($allGroup as $value)

                                        <option value="{{ $value->groupname }}" {{ ($client->groupName == $value->groupname ? "selected":"") }}>{{ $value->groupname }}</option>
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
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
<!-- /.container-fluid -->




@endsection
