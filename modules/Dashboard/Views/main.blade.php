@extends('Core::common',
    [
        'page_title' => __('Dashboard::messages.page_title'),
        'body_class' => 'nav-md'
    ])

@section('extra_styles')
    <link href="{{ asset('css/nprogress.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/jqvmap.css') }}" rel="stylesheet" >
@endsection

@section('extra_scripts')
<script src="{{ asset('js/fastclick.js') }}"></script>
<script src="{{ asset('js/nprogress.js') }}"></script>
<script src="{{ asset('js/chart.js') }}"></script>
<script src="{{ asset('js/gauge.js') }}"></script>
<script src="{{ asset('js/bootstrap-progressbar.js') }}"></script>
<script src="{{ asset('js/icheck.js') }}"></script>
<script src="{{ asset('js/skycons.js') }}"></script>
<script src="{{ asset('js/jquery.flot.js') }}"></script>
<script src="{{ asset('js/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('js/jquery.flot.time.js') }}"></script>
<script src="{{ asset('js/jquery.flot.stack.js') }}"></script>
<script src="{{ asset('js/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('js/date.js') }}"></script>
<script src="{{ asset('js/jqvmap.js') }}"></script>
<script src="{{ asset('js/jqvmap.world.js') }}"></script>
<script src="{{ asset('js/jqvmap.sampledata.js') }}"></script>
<script src="{{ asset('js/moment.js') }}"></script>
<script src="{{ asset('js/bootstrap-daterangepicker.js') }}"></script>
@endsection

@section('body_content')
    <div class="container body">
        <div class="main_container">
            @include('Core::nav_left')
            @include('Core::nav_top')
            @include('Dashboard::main_content')
        </div>
    </div>
@endsection
