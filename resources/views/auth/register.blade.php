@include('layouts.header')

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form class="user" method="POST" action="{{ route('register') }}">
                    @csrf
                        <div class="form-group row">
                            <x-input id="name" class="form-control form-control-user" type="text" name="name" :value="old('name')" placeholder="Full Name" required autofocus />
                        </div>
                        <div class="form-group">
                            <x-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" placeholder="Email Address" required />
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <x-input id="password" class="form-control form-control-user"
                                type="password"
                                name="password"
                                placeholder="Password"
                                required autocomplete="new-password" />
                            </div>
                            <div class="col-sm-6">
                                <x-input id="password_confirmation" class="form-control form-control-user"
                                type="password"
                                name="password_confirmation" placeholder="Repeat Password" required />
                            </div>
                        </div>
                        <x-button class="btn btn-primary btn-user btn-block">
                            {{ __('Register Account') }}
                        </x-button>
                        <hr>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>

@include('layouts.footer')

