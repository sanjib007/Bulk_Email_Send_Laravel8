@extends('mainLayout')
@section('content')
                
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Group</h1>
    </div>

    <!-- Begin Page Content -->
    <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Group Edit</h6>
                    </div>
                    <div class="col-md-6 text-right">
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Group</h1>
                            </div>
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form class="user" method="POST" action="{{ route('group.update',$group->id) }}">
                            @csrf
                            @method('PUT')
                                <div class="form-group row">
                                    <x-input id="groupname" class="form-control form-control-user" type="text" name="groupname" value="{{$group->groupname}}" placeholder="Group Name" required autofocus />
                                </div>
                                <div class="form-group">
                                    <!-- <x-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" placeholder="Email Address" required /> -->
                                    <textarea class="ckeditor form-control form-control-user" name="templete" placeholder="templete" required>{{$group->templete}}</textarea>
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


</div>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.ckeditor').ckeditor();
        });
    </script>
<!-- /.container-fluid -->

            

    
@endsection