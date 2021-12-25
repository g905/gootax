<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Module Main</title>

        {{-- Laravel Mix - CSS File --}}
        {{-- <link rel="stylesheet" href="{{ mix('css/main.css') }}"> --}}
        <!--<link rel="stylesheet" href="{{ mix('css/main.css') }}">-->
        <link rel="stylesheet" href="{{ Module::asset('main:css/bootstrap.min.css') }}">
    </head>
    <body>
        @include('main::includes.header')
        <main>
            @yield('content')
        </main>
        @include('main::includes.footer')

        @include('main::includes.loader')

        {{-- Laravel Mix - JS File --}}
        {{-- <script src="{{ mix('js/main.js') }}"></script> --}}
    <!--<script src="{{ mix('js/main.js') }}"></script>-->
    <script src='{{ Module::asset("main:js/jquery.min.js") }}'></script>
    <script src='{{ Module::asset("main:js/bootstrap.bundle.js") }}'></script>
    <script src='{{ Module::asset("main:js/jquery-ui.min.js") }}'></script>
    <script src='{{ Module::asset("main:js/app.js") }}'></script>
    <script src="https://cdn.jsdelivr.net/npm/suggestions-jquery@21.8.0/dist/js/jquery.suggestions.min.js"></script>

    @yield('module-scripts')
</body>
</html>
