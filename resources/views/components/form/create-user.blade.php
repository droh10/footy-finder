<form method="POST" action="{{ route('register.store') }}" id="register-form" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            @if (session('status'))
                <div class="row mb-3 justify-content-center">
                    <div class="form-group col-md-8 col-sm-12 text-center">
                        <h4>REGISTER</h4>
                        <hr>
                    </div>
                </div>
                <div class="text-center">
                    <h5 class="text-success">New user created!</h5>
                    <p>An email has been sent. Please verify your account</p>
                </div>
            @else:
                <div class="row mb-3 justify-content-center">
                    <div class="form-group col-md-8 col-sm-12 text-center">
                        <h4>REGISTER</h4>
                        <h5>Create an account to post and join football schedules</h5>
                        <hr>
                        @if (session('error'))
                        <div class="text-center">
                            <p class="text-danger">Unable to create new user!</p>
                        </div>
                    @endif
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="form-group col-md-8 col-sm-12">
                        <label for="name" class="mb-2">Name</label>
                        <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name" placeholder="Name" required>
                        @error('name')
                            <p class="text-danger form-error-txt">{{$message}}</p>    
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="form-group col-md-8 col-sm-12">
                        <label for="email" class="mb-2">Email</label>
                        <input type="email" value="{{old('email')}}" class="form-control" id="email" name="email" placeholder="Email">
                        @error('email')
                            <p class="text-danger form-error-txt">{{$message}}</p>    
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="form-group col-md-8 col-sm-12">
                        <label for="password" class="mb-2">Password</label>
                        <input type="password" value="{{old('password')}}" class="form-control" id="password" name="password" placeholder="Password" required>
                        @error('password')
                            <p class="text-danger form-error-txt">{{$message}}</p>    
                        @enderror
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
                        <label for="image"  class="mb-2">Profile Picture</label>
                        <br/>
                        <input type="file" class="form-control-file border" id="image" name="image">
                        @error('image')
                            <p class="text-danger form-error-txt">{{$message}}</p>    
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 justify-content-center">
                    <div class="form-group col-md-8 col-sm-12 text-center">
                        <x-layout.button_yellow type="submit" id="register-user">
                            Sign Up
                        </x-layout.button_yellow>
                    </div>
                </div>
            @endif
        </div>
    </div>
</form>