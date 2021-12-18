@include('layouts.header')

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <!-- Session Status -->
                                        <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                
                                <form class="user" method="POST" action="{{ route('login') }}">
                                @csrf
                                    <div class="form-group">
                                        <!-- <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address..."> -->
                                            <x-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" required autofocus />
                                    </div>
                                    <div class="form-group">
                                        <!-- <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password"> -->
                                            <x-input id="password" class="form-control form-control-user"
                                                type="password"
                                                name="password"
                                                required autocomplete="current-password" />
                                    </div>
                                    <!-- Remember Me -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        
                                        <x-button class="btn btn-primary btn-user btn-block">
                                            {{ __('Log in') }}
                                        </x-button>
                                    
                                        
                                </form>
                                <hr>
                                <div class="text-center">
                                @if (Route::has('password.request'))
                                    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                @endif                                
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@include('layouts.footer')



