<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
        <meta name="format-detection" content="telephone=no">
        <meta name="robots" content="noindex" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        @yield('styles')
    </head>
    <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
        <div id="app">
            @yield('body')
        </div>
        @yield('scripts')
    </body>
</html>
