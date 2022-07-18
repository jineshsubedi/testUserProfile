@extends('layouts.adminapp')

@section('content')
<div class="login-page ">
    <div class="row justify-content-center">
        <div class="login-box">
            <div class="login-logo">
                <img src="{{asset('images/logo.png')}}">
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
        
                    <form action="{{route('login')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="input-group mb-3 ">
                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                            @endif
                        </div>
                        <div class="input-group mb-3 ">
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block resunga-button">Sign In</button>
                            </div>
                            <!-- /.col -->
                            <div class="col-md-12 text-center">
                                <span>OR</span> <br>
                                <a href="{{ route('register') }}" class="">Register as a New User</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
</div>

<!-- /.login-box -->
@endsection
