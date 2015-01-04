@extends('layouts.default')

@section('content')
    <h1>Sign In!</h1>

    <div class="row">
        <div class="col-md-6">
            {{ Form::open(['route' => 'login_path']) }}
            <!-- Email Form Input -->
            <div class="form-group">
                {{ Form::label('email', 'Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
            </div>

            <!-- Password Form Input -->
            <div class="form-group">
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
            </div>

            <div class="checkbox">
                <label for="remember">
                    <input type="hidden" name="remember" value="0">
                    <input tabindex="4" type="checkbox" name="remember" id="remember" value="1"> {{{ Lang::get('users.login.remember') }}}
                </label>
            </div>
            <!-- Sign In Input -->
            <div class="form-group">
                {{ Form::submit('Sign In', ['class' => 'btn btn-primary']) }}
                {{ link_to('/password/remind', 'Reset Your Password') }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
@stop
