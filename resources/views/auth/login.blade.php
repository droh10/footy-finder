@extends('layout')
@section('content')
<form method="POST" action="{{ route('user.authenticate') }}" id="login-form">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <div class="row mb-3 justify-content-center">
                <div class="form-group col-md-8 col-sm-12 text-center">
                    <h4>Login</h4>
                    <h5>Time to have fun and connect with people around.</h5>
                    <hr>
                    @if (session('error'))
                        <div class="text-center">
                            <p class="text-danger schedule-status">{{session('error')}}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="form-group col-md-8 col-sm-12">
                    <label for="email" class="mb-2">Email</label>
                    <input type="text" value="{{old('email')}}" class="form-control" id="email" name="email" placeholder="Email" required>
                    @error('email')
                        <p class="text-danger form-error-txt">{{$message}}</p>    
                    @enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="form-group col-md-8 col-sm-12">
                    <label for="password" class="mb-2">Password</label>
                    <input type="password" value="" class="form-control" id="password" name="password" placeholder="Password" required>
                    @error('password')
                        <p class="text-danger form-error-txt">{{$message}}</p>    
                    @enderror
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="form-group col-md-8 col-sm-12 text-center">
                    <x-layout.button_yellow type="submit" id="login-user">
                       Login
                    </x-layout.button_yellow>
                    <p class="mr-top-1"><a href="#" class="link-primary">Forgot password?</a></p>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="form-group col-md-8 col-sm-12 text-center">
                    <a href="{{route('register.create')}}" class="btn btn-success font-weight-bold text-light px-4 fs-5">Create new account</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection