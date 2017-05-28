@extends('layouts.user')

@section('content')
<div class="container" style="margin-top:96px">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="panel panel-default card" style="padding:24px">
                <h4 class="text-center"><b>Register</b></h4>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="md-form form-group{{ $errors->has('nama_user') ? ' has-error' : '' }}">
                            <label for="nama_user">Nama</label>
                            <input id="nama_user" type="text" class="form-control" name="nama_user" value="{{ old('nama_user') }}" required autofocus>

                            @if ($errors->has('nama_user'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nama_user') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                            <label for="no_telp">No. Telepon</label>
                            <input id="no_telp" type="text" class="form-control" name="no_telp" value="{{ old('no_telp') }}" required>

                            @if ($errors->has('no_telp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_telp') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="md-form form-group">
                        <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-theme">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
