@extends('layouts.cms_panel.auth')

@section('content')
    <div class="mai-wrapper mai-sign-up">
        <div class="main-content container">
            <div class="splash-container row">
                <div class="col-md-6 form-message"><span class="splash-description text-center mt-4 mb-4">Reset Password</span>
                    <form class="sign-up-form" method="POST" action="{{ route('cms_panel.auth.register') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group"><span class="input-group-addon"><i class="icon s7-mail"></i></span>
                                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ $email or old('email') }}" required>
                            </div>
                        </div>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif

                        <div class="form-group inline row {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-sm-6">
                                <div class="input-group"><span class="input-group-addon"><i class="icon s7-lock"></i></span>
                                    <input id="pass1" type="password" placeholder="Password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="col-sm-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                                <div class="input-group"><span class="input-group-addon"><i class="icon s7-lock"></i></span>
                                    <input type="password" id="password-confirm" placeholder="Confirm" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group sign-up-submit">
                            <button data-dismiss="modal" type="submit" class="btn btn-lg btn-primary btn-block">Reset Password</button>
                        </div>

                        <p class="conditions">You agree with the <a href="#">Terms and Conditions</a>.</p>
                    </form>
                </div>
                <div class="col-md-6 user-message"><span class="splash-message text-left">Welcome to<br> Enjoy</span><span class="alternative-message text-right">Don't have an account? <a href="{{ route('cms_panel.auth.register') }}">Sign Up</a></span></div>
            </div>
        </div>
    </div>
@endsection