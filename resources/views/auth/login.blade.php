@extends('layouts.user')

@section('content')
<!--Form with header-->
<br><br><br><br>
<div class="row">
    <div class="col-md-4 offset-md-4">
        <div class="card">
            <div class="card-block">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <!--Header-->
                    <div class="form-header blue darken-4">
                        <h3><i class="fa fa-lock"></i> Login:</h3>
                    </div>

                    <!--Body-->
                    <div class="md-form form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <i class="fa fa-envelope prefix"></i>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        <label for="email">Your email</label>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="md-form form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <i class="fa fa-lock prefix"></i>
                        <input id="password" type="password" class="form-control" name="password" required>
                        <label for="password">Your password</label>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="text-center">
                        <button class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>

            <!--Footer-->
            <div class="modal-footer">
                <div class="options">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                    <a href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>

        </div>
        <!--/Form with header-->
    </div>
</div>
@endsection
