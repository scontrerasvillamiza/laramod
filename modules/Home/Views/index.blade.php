@extends('Core::common', ['page_title' => __('app.name')])

@section('extra_styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('extra_scripts')
@endsection

@section('body_content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                @lang('app.name')
            </div>
            <div class="links">
                <a href="https://github.com/htr3n/laramod">GitHub</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                @endif
            </div>
        </div>
    </div>
@endsection
