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

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDlDS7KYdMMQd_CynknFWTxhZwUwMhnZAg"></script>

</head>
<body id="app">

    @include('_includes.navigation')

    @yield('content')

    <footer id="footer">
        <div class="container">
            <p>Copyright &copy; - Made with <span class="red">❤︎</span> by <a href="https://twitter.com/fwartner">Florian</a>.
                Find this on <a href="https://github.com/PHPMap/PHPMap">GitHub</a></p>
        </div>
    </footer>

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
