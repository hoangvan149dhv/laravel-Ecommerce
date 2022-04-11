@extends('layouts.base')
@section('styles')
    <link href="{{ mix('css/admin/app.css') }}" rel="stylesheet">
    @yield('style')
@endsection
@section('body')
    <div id="wrapper" style="min-height: 100vh">
    @if(isset($user))
        @include('admin.components.sidebar')
    @endif
    <!-- Content Wrapper -->
        <div id="content-wrapper" class="{{ isset($user) ? 'page-wrapper' : '' }} d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @if(isset($user))
                    @include('admin.components.header')
                @endif
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
