@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}" enctype="multipart/form-data" >
                        {{ csrf_field() }}
<!-- ///////////////////////////////////////////////////////  AVATARKA ////////////////////////////////////////////////////////  -->

                        <div class="form-group{{ $errors->has('preview') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">upload photos</label>
                                <div class="col-md-6">
                                    <div class="controls clearfix">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon-plus"></i> <input type="file" name="preview" id="image" />
                                        </span>
                                    </div>
                                </div>
                        </div>





<!--/////////////////////////////////////////////////////////////// Soname  //////////////////////////////// -->
                        <div class="form-group{{ $errors->has('soname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Soname</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="soname" value="{{ old('soname') }}">

                                @if ($errors->has('soname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('soname') }}</strong>
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

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Date of birth(YYYY-MM-DD)</label>

                            <div class="col-md-6">
                                <input id="text" type="text" class="form-control" name="date" value="{{ old('date') }}">

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!--/////////////////////////////////////////////////////////////// Phone  ////////////////////////////////-->

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="Phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="Phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
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
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
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
