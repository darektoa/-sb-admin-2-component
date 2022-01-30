@extends('layouts.guest')
@section('title', 'Login')
@section('head')
<style>
    body{
        background-color: var(--secondary);
        background-size: cover;
        background-position: center;
    }

    .bg-login-image{
        padding-top: 50%;
        background-color: var(--primary);
        background-image: url("{{ asset('assets/img/background/login.svg') }}");
    }
</style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <x-text value="Login" class="h4 text-gray-900 mb-4 text-center"/>

                                @if($errors->any())
                                <x-alert color="danger" :value="$errors" />
                                @endif

                                <x-form action="/login" class="user">
                                    <x-input.email    name="email" placeholder="Email" value="{{ old('email') }}" class="form-control-user" required />
                                    <x-input.password name="password" placeholder="Password" class="form-control-user" required />
                                    <x-input.checkbox name="remember" label="Remember Me" />
                                    <x-button.submit  value="Login" class="btn-primary btn-user btn-block"/>
                                </x-form>

                                @if(Route::has('password.request'))
                                <x-text :href="route('password.request')" value="Forgot Password" class="text-center" />
                                @endif

                                @if (Route::has('register'))
                                <x-text :href="route('register')" value="Create an Account!" class="text-center" />
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection