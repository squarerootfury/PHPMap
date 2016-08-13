<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title', 'PHPMap') | PHPMap</title>

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" >

    @yield('styles')

    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}"></script>

</head>
<body id="app">

    @include('_includes.navigation')

    @yield('content')

    @include('_includes.footer')

    <script>
        window.USER = {!! Auth::check() ? Auth::user() : 'null' !!};
        window.PUSHER_OPTIONS = {
            pusherKey: '{{ config('broadcasting.connections.pusher.key') }}',
            cluster: '{{ config('broadcasting.connections.pusher.options.cluster') }}'
        };
    </script>

    @yield('footer_scripts')
    <script src="{{ elixir('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
