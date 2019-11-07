@extends('layouts.cms_panel.auth')

@section('content')
    <div class="panel">
        <div class="panel-body">
            <div class="brand">
                <h2 class="brand-text font-size-18">Hello! Is good to see you again</h2>
            </div>
            <form method="POST" ff="{{ route('cms_panel.auth.login') }}">

                {{ csrf_field() }}
                @if ($errors->has('email'))
                    <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif

                <div class="form-group form-material floating">
                    <input id="email" type="email" class="form-control" placeholder="Email or login" name="email" value="{{ old('email') }}" autocomplete="off" required autofocus>
                    <label class="floating-label">Email</label>
                </div>

                @if ($errors->has('password'))
                    <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

                <div class="form-group form-material floating">
                    <input id="password" type="password" placeholder="Password" name="password" class="form-control" required>
                    <label class="floating-label">Password</label>
                </div>
                <div class="form-group clearfix">
                    <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left">
                        <input type="checkbox" id="inputCheckbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="inputCheckbox">Remember me</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Sign in</button>
            </form>
        </div>
    </div>



@endsection