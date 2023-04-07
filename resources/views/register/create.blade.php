@extends('layout')
@section('content')
    <h3>{{$page_title}}</h3>
    <x-layout.box class="mb-5">
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12">
                    <div class="row mb-3 justify-content-center">
                        <div class="form-group col-md-8 col-sm-12">
                            <label for="name" class="mb-2">Name</label>
                            <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="form-group col-md-8 col-sm-12">
                            <label for="email" class="mb-2">Email</label>
                            <input type="email" value="{{old('name')}}" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="form-group col-md-8 col-sm-12">
                            <label for="password" class="mb-2">Password</label>
                            <input type="password" value="{{old('password')}}" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="form-group col-md-8 col-sm-12">
                            <label for="password" class="mb-2">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="form-group col-md-8 col-sm-12">
                            <label for="image">Profile Picture</label>
                            <input type="file" class="form-control-file border" id="image" name="image">
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-center">
                        <div class="form-group col-md-8 col-sm-12">
                            <x-layout.button_yellow type="submit" id="register-user">
                                Save
                            </x-layout.button_yellow>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-layout.box>
@endsection