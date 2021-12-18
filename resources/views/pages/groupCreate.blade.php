@extends('mainLayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Insert Group</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                <h6 class="m-0 font-weight-bold text-primary">Group Create</h6>
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
        <div class="row justify-content-md-center">
                <div class="col-lg-7">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form class="user" method="POST" action="{{ route('group.store') }}">
                        @csrf
                        <div class="form-group row">
                            <x-input id="groupname" class="form-control form-control-user" type="text" name="groupname" :value="old('groupname')" placeholder="Group Name" required autofocus />
                        </div>
                        <div class="form-group">
                            <!-- <x-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" placeholder="Email Address" required /> -->
                            <textarea class="ckeditor form-control form-control-user" name="templete" :value="old('templete')" placeholder="templete" required></textarea>
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


    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
