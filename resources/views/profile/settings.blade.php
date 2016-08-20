@extends('layouts.default')

@section('page_title')
    Account Settings
@stop

@section('styles')

@stop

@section('scripts')
	<script>

	</script>
@stop

@section('content')
	<div class="container">
		<div>
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
				<li role="presentation"><a href="#notifications" aria-controls="notifications" role="tab" data-toggle="tab">Notifications</a></li>
				<li role="presentation"><a href="#password" aria-controls="password" role="tab" data-toggle="tab">Password</a></li>
				{{--<li role="presentation"><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab">Orders</a></li>--}}
				<li role="presentation"><a href="#oauth" aria-controls="oauth" role="tab" data-toggle="tab">OAuth</a></li>
			</ul>

			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="profile">
					<br>

					<profilesettings :user="{{ auth()->user() }}"></profilesettings>
				</div>

				<div role="tabpanel" class="tab-pane" id="notifications">
					<br>

				</div>

				<div role="tabpanel" class="tab-pane" id="password">
					<br>
					<accountsettings :user="{{ auth()->user() }}"></accountsettings>
				</div>

				{{--<div role="tabpanel" class="tab-pane" id="orders">--}}
					{{--<br>--}}

				{{--</div>--}}

				<div role="tabpanel" class="tab-pane" id="oauth">
					<br>
					<passport-clients></passport-clients>
					<passport-authorized-clients></passport-authorized-clients>
					<passport-personal-access-tokens></passport-personal-access-tokens>
				</div>
			</div>
		</div>
	</div>
@stop