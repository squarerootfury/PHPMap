<footer id="footer">
    <div class="container">
        <p>Copyright &copy; {{ date('Y') }} - Made with <span class="red"><i class="fa fa-heart" aria-hidden="true"></i></span> &amp; <i class="fa fa-coffee" aria-hidden="true"></i> by <a href="https://twitter.com/fwartner">Florian</a>.
            Find this on <a href="https://github.com/PHPMap/PHPMap">GitHub</a> | <a href="{{ url('/p/imprint') }}">Imprint</a> - <a href="{{ url('/p/terms') }}">Terms</a></p>
    </div>
</footer>

@if(env('APP_ENV') == 'production')
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-83274930-1', 'auto');
        ga('send', 'pageview');

    </script>
@endif