<h4>Welcome to PHPMap, {{ $user->username }}!</h4>
<p>Thanks for siging up on PHPMap!</p>
<p>Your temporary password is: <strong>{{ 'PHPMap_'.$user->username.'_TEMP' }}</strong></p>
<p>To change your password, visit <a href="{{ url('/settings') }}">this URL</a>.</p>