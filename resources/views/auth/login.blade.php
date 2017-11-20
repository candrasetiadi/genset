@extends('layouts.default')

@section('main-content')
<body class="app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group mb-0">
                    <div class="card p-4">
                        <div class="card-block">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <!-- <label for="email" class="col-md-4 control-label">E-Mail Address</label> -->

                                    <div class="input-group mb-3">
                                        <span class="input-group-addon"><i class="icon-user"></i>
                                            </span>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <!-- <label for="password" class="col-md-4 control-label">Password</label> -->

                                    <div class="input-group mb-4">
                                        <span class="input-group-addon"><i class="icon-lock"></i>
                                            </span>
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary px-4">
                                            Login
                                        </button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card card-inverse card-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-block text-center">
                            <div>
                                <h2>Sign up</h2>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
                                <a href="{{ url('admin/register') }}"><button type="button" class="btn btn-primary active mt-3">Register Now!</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
