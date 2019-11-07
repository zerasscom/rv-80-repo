@extends('layouts.cms_panel.auth')

@section('content')
<div class="mai-wrapper mai-forgot-password">
    <div class="main-content container">
        <div class="splash-container row">
            <div class="col-md-6 user-message"><span class="splash-message text-right">Oops!<br> this will take<br> just a moment.</span><span class="alternative-message text-right">Don't have an account? <a href="{{ route('cms_panel.auth.register') }}">Sign Up</a></span></div>
            <div class="col-md-6 form-message"><span class="splash-description text-center mt-5 mb-5">Don't worry, we'll send you an email to reset your password.</span>
                <form class="form-forgot-password"  method="POST" action="{{ route('cms_panel.auth.password.email') }}">
                    {{ csrf_field() }}
                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="input-group"><span class="input-group-addon"><i class="icon s7-mail"></i></span>
                            <input id="email" type="email" class="form-control" placeholder="Your Email"  name="email" value="{{ old('email') }}" required>

                        </div>
                    </div>

                    <div class="form-group login-submit">
                        <button data-dismiss="modal" type="submit" class="btn btn-lg btn-primary btn-block">Send Password Reset Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection