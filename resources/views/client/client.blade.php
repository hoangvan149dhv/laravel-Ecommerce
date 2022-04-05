@extends('layouts.base')
@section('styles')
    <link href="{{ mix('css/client/app.css') }}" rel="stylesheet">
    @yield('style')
@endsection
@section('body')
    <div id="wrapper" style="min-height: 100vh">
    <!-- Content Wrapper -->
        <div id="content-wrapper" class="page-wrapper d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('client.components.header')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('client.components.footer')
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('script')
@endsection
