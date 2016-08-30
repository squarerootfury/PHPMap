<h4>Welcome to {{ config('app.name') }}, {{ $user->username }}!</h4>
<p>Thanks for signing up on {{ config('app.name') }}!</p>
<p>Your temporary password is: <strong>{{ 'PHPMap_'.$user->username.'_TEMP' }}</strong></p>
<p>To change your password, visit <a href="{{ url('/settings') }}">this URL</a>.</p>
