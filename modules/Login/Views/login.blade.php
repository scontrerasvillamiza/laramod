@extends('Core::common', ['page_title' => __('Login::login_page_title')])

@section('extra_styles')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection

@section('extra_scripts')
@endsection

@section('body_content')
    <div class="container-fluid">
        <div class="row login-centered-form">
            <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title"><i class="fa fa-sign-in" aria-hidden="true"></i> Please login</h1>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->any() ? ' has-error' : '' }}">
                                @if ($errors->has('email'))
                                    <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}"
                                       required autofocus placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control" name="password" required
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- /panel-body -->
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
@endsection
