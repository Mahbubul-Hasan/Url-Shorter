@extends('auth.layouts.app')

@section('content')
    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
        @csrf
        <span class="login100-form-title"> Register </span>
        <div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
            </div>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <div class="wrap-input100 validate-input">
                <input class="input100" type="text" name="email" placeholder="Email" value="{{ old('email') }}"
                    required />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <div class="wrap-input100 validate-input" data-validate="Password is required">
                <input class="input100" type="password" name="password" placeholder="Password" required />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div>
            <div class="wrap-input100 validate-input" data-validate="Password is required">
                <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password"
                    required />
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
            </div>
            @error('password_confirmation')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="container-login100-form-btn">
            <button class="login100-form-btn">Register</button>
        </div>
        {{-- <div class="text-center p-t-12">
            <span class="txt1"> Forgot </span>
            <a class="txt2" href="#"> Username / Password? </a>
        </div> --}}
        <div class="text-center p-t-136">
            <p>Already hane an account? </p>
            <a class="txt2" href="{{ route('login') }}">
                Login
                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
        </div>
    </form>
@endsection
