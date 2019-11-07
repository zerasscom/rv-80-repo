@extends('layouts.cms_panel.auth')

@section('content')
    <div class="mai-wrapper mai-sign-up">
        <div class="main-content container">
            <div class="splash-container row">
                <div class="col-md-6 form-message"><span class="splash-description text-center mt-4 mb-4">Sign up</span>
                    <form class="sign-up-form" method="POST" action="{{ route('cms_panel.auth.register') }}">
                        {{ csrf_field() }}

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                        <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <div class="input-group"><span class="input-group-addon"><i class="icon s7-user"></i></span>
                                <input id="first_name" type="text" placeholder="First name" name="first_name" autocomplete="off" class="form-control" value="{{ old('first_name') }}" required autofocus>
                            </div>
                        </div>

                        @if ($errors->has('last_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                        <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                            <div class="input-group"><span class="input-group-addon"><i class="icon s7-users"></i></span>
                                <input id="last_name" type="text" placeholder="Last name" name="last_name" autocomplete="off" class="form-control" value="{{ old('last_name') }}" >
                            </div>
                        </div>

                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <div class="input-group"><span class="input-group-addon"><i class="icon s7-phone"></i></span>
                                <input id="first_name" type="text" placeholder="Phone" name="phone" autocomplete="off" class="form-control" value="{{ old('phone') }}">
                            </div>
                        </div>



                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group"><span class="input-group-addon"><i class="icon s7-mail"></i></span>
                                <input id="email" type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                        <div class="form-group inline row {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-sm-6">
                                <div class="input-group"><span class="input-group-addon"><i class="icon s7-lock"></i></span>
                                    <input id="pass1" type="password" placeholder="Password" class="form-control" name="password" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group"><span class="input-group-addon"><i class="icon s7-lock"></i></span>
                                    <input type="password" placeholder="Confirm" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group sign-up-submit">
                            <button data-dismiss="modal" type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>
                            <a  class="btn btn-lg btn-info btn-block" href="{{ route('cms_panel.auth.login') }}">Sign in</a>
                        </div>

                        <p class="conditions">By creating an account, you agree with the <a href="#">Terms and Conditions</a>.</p>
                    </form>
                </div>
                <div class="col-md-6 user-message"><span class="splash-message text-left">Welcome to<br> Enjoy</span><span class="alternative-message text-right"><a href="{{ route('cms_panel.auth.password.request') }}">Forgot Password?</a></span></div>
            </div>
        </div>
    </div>
@endsection