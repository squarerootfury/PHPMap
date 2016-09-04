<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="apple-mobile-web-app-title" content="PHPMap">
    <meta name="application-name" content="PHPMap">
    <meta name="theme-color" content="#ffffff">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=69kBAP6MmN">
    <link rel="icon" type="image/png" href="/favicon-32x32.png?v=69kBAP6MmN" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png?v=69kBAP6MmN" sizes="16x16">
    <link rel="manifest" href="/manifest.json?v=69kBAP6MmN">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=69kBAP6MmN" color="#5bbad5">
    <link rel="shortcut icon" href="/favicon.ico?v=69kBAP6MmN">


    <title>@yield('page_title', 'PHPMap') | PHPMap</title>

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" >

    @yield('styles')

    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
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
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_KEY') }}"></script>
    <script src="{{ elixir('js/app.js') }}"></script>
    @yield('scripts')

    <script src="https://cdn.smooch.io/smooch.min.js"></script>
    @if(auth()->check())
        <script>
            Smooch.init({
                appToken: 'ao84wt37gf0zkgj8j6yxx88ke',
                givenName: '{!! auth()->user()->name !!}',
                email: '{!! auth()->user()->email !!}'
            });
        </script>
    @else
        <script>
            Smooch.init({ appToken: 'ao84wt37gf0zkgj8j6yxx88ke' });
        </script>
    @endif
</body>
</html>
