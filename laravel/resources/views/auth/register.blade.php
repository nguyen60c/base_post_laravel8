@extends('layouts.auth-master')

@section('content')
    <form method="POST" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <img class="mb-4" src="{!! url('images/bootstrap-logo.svg') !!}" alt="" width="72" height="57">

        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                placeholder='name@example.com' required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder='username'
                required="required" autofocus>
            <label for="floatingEmail">Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                placeholder='password' required="required" autofocus>
            <label for="floatingEmail">Password</label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation"
                value="{{ old('password_confirmation') }}" placeholder='password_confirmation' required="required"
                autofocus>
            <label for="floatingEmail">Password confirm</label>
            @if ($errors->has('password_confirmation'))
                <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        <hr>
        <a href="{{ route('login.show') }}" class="w-100 btn btn-lg btn-primary">Back to login</a>

        @include('auth.partials.copy')
    </form>
@endsection
