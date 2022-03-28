@extends('admin.layouts.base')
@section('styles')
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @yield('style')
@endsection
@section('body')
    <div id="wrapper" style="min-height: 100vh">
    @include('admin.components.sidebar')
    <!-- Content Wrapper -->
        <div id="content-wrapper" class="page-wrapper d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @include('admin.components.header')
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('admin.components.footer')
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('script')
@endsection
