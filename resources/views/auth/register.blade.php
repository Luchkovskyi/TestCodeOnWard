@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}


<!-- ///////////////////////////////////////////////////////  AVATARKA ////////////////////////////////////////////////////////  -->











<!--/////////////////////////////////////////////////////////////// Soname  //////////////////////////////// -->
                        <div class="form-group{{ $errors->has('Soname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Soname</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('Soname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Soname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--/////////////////////////////////////////////////////////////// name  ////////////////////////////////-->

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--/////////////////////////////////////////////////////////////// email  ////////////////////////////////-->

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--/////////////////////////////////////////////////////////////// date  ////////////////////////////////-->

                        <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Date of birth(гггг-мм-дд)</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="Date" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--/////////////////////////////////////////////////////////////// Phone  ////////////////////////////////-->

                        <div class="form-group{{ $errors->has('Phone') ? ' has-error' : '' }}">
                            <label for="Phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="Phone" type="text" class="form-control" name="Phone" value="{{ old('email') }}">
                                @if ($errors->has('Phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--/////////////////////////////////////////////////////////////// Password  ////////////////////////////////-->

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--/////////////////////////////////////////////////////////////// Conf  Password  ////////////////////////////////-->

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--/////////////////////////////////////////////////////////////// Capcha ////////////////////////////////-->

                        <div class="form-group{{ $errors->has('CaptchaCode') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Captcha</label>

                            <div class="col-md-6">
                                {!! captcha_image_html('ContactCaptcha') !!}

                                <input class="form-control" type="text" id="CaptchaCode" name="CaptchaCode" style="margin-top:5px;">


                                @if ($errors->has('CaptchaCode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('CaptchaCode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Register
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
